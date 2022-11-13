<?php

namespace CaioMarcatti12\Core\Compiler;

use CaioMarcatti12\Core\Compiler\Interfaces\CompilerInterface;
use CaioMarcatti12\Core\Modules\Modules;
use CaioMarcatti12\Core\Modules\ModulesEnum;
use CaioMarcatti12\QueueManager\Annotation\QueueConsumer;
use CaioMarcatti12\QueueManager\Objects\Route;
use CaioMarcatti12\QueueManager\Objects\RoutesQueue;

class QueueCompiler implements CompilerInterface
{
    public function run(): void
    {
        if (!Modules::isEnabled(ModulesEnum::QUEUE_MANAGER))
            return;

        $routes = RoutesQueue::getAll();

        /** @var Route $route */
        foreach($routes as $route){
            $class = $route->getClass();
            $shortName = $this->getShortName($class);
            $queueConsumer = $this->getAnnotation($class);
            $queue = $queueConsumer->getQueue();
            $consumers = $queueConsumer->getOptions()->getWorkers();

            $template = new TemplateSupervisor($this->makeCommand($queue), $shortName, $consumers);
            $template = $template->make();

            $this->saveFileConfig($template, $shortName);
        }
    }

    private function getAnnotation(string $className): QueueConsumer{
        $reflectionClass = new \ReflectionClass($className);
        $reflectionAttributes = $reflectionClass->getAttributes(QueueConsumer::class);

        /** @var \ReflectionAttribute $attribute */
        $attribute = array_shift($reflectionAttributes);

        return  $attribute->newInstance();
    }

    private function getShortName(string $className): string{
        $reflectionClass = new \ReflectionClass($className);

        return $reflectionClass->getShortName();
    }

    private function makeCommand(string $queue): string{
        return 'php /var/www/html/main --queue='.$queue;
    }

    private function saveFileConfig(string $template, string $shortName): void{
        file_put_contents('/etc/supervisor/conf.d/'. $shortName. '.conf', $template);
    }

}