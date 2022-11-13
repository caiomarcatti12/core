<?php

namespace CaioMarcatti12\Core\Compiler;


use CaioMarcatti12\Core\Compiler\Interfaces\CompilerInterface;

class CommandCompiler implements CompilerInterface
{
    public function run(): void{

    }
//    #[Autowired(FileLocalAdapter::class)]
//    private FileManagerInterface $fileManager;
//
//    #[Value('application.path.programs')]
//    private string $programPath;
//
//    #[Value('application.path.root')]
//    private string $rootPath;
//
//    public function run(): void{
//        $routes = $this->getRoutes();
//
//        /** @var Route $route */
//        foreach($routes as $route){
//            $commandAutoLaunch = $this->getAnnotation($route->getClass());
//
//            if(Assert::isNotEmpty($commandAutoLaunch)){
//                $shortName = $this->getShortName($route->getClass());
//
//                $template = new Template($this->makeCommand($commandAutoLaunch->getSignature()), $shortName, $commandAutoLaunch->getWorkers());
//                $template = $template->make();
//
//                $this->fileManager->put($this->programPath.$shortName.'.conf', $template);
//            }
//        }
//    }
//
//    private function getRoutes(): array{
//        $routes = Routes::getAll();
//
//        return $routes[Command::class] ?? [];
//    }
//
//    private function getAnnotation(string $className): ?CommandAutoLauncher{
//        $reflectionClass = new \ReflectionClass($className);
//        $reflectionAttributes = $reflectionClass->getAttributes(CommandAutoLauncher::class);
//
//        if(Assert::isEmpty($reflectionAttributes)) return null;
//
//        /** @var \ReflectionAttribute $attribute */
//        $attribute = array_shift($reflectionAttributes);
//
//        return  $attribute->newInstance();
//    }
//
//    private function getShortName(string $className): string{
//        $reflectionClass = new \ReflectionClass($className);
//
//        return  $reflectionClass->getShortName();
//    }
//
//    private function makeCommand(string $command): string{
//        return 'php '.$this->rootPath.'spring-boot --command='. $command;
//    }
}