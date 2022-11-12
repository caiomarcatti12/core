<?php

namespace CaioMarcatti12\Core;

use CaioMarcatti12\CacheManager\Annotation\EnableCache;
use CaioMarcatti12\Cli\Adapter\PhalconAdapter;
use CaioMarcatti12\Cli\Annotation\EnableCli;
use CaioMarcatti12\Cli\Interfaces\ArgvParserInterface;
use CaioMarcatti12\Compiler\Compiler;
use CaioMarcatti12\Core\Bean\AliasForLoader;
use CaioMarcatti12\Core\Bean\ResolverLoader;
use CaioMarcatti12\Core\Factory\Annotation\Autowired;
use CaioMarcatti12\Core\Factory\InstanceFactory;
use CaioMarcatti12\Core\Launcher\Annotation\Launcher;
use CaioMarcatti12\Core\Launcher\Enum\LauncherPriorityEnum;
use CaioMarcatti12\Core\Launcher\LauncherLoader;
use CaioMarcatti12\Core\Launcher\LauncherRun;
use CaioMarcatti12\Core\Modules\Modules;
use CaioMarcatti12\Core\Modules\ModulesEnum;
use CaioMarcatti12\Core\Shared\Interfaces\ServerRunInterface;
use CaioMarcatti12\Core\Validation\Assert;
use CaioMarcatti12\QueueManager\QueueConsumerServer;
use CaioMarcatti12\Webserver\WebServer;
use CaioMarcatti12\WebSocketServer\WebSocketServer;

class Application
{
    private ArgvParserInterface $argvParser;

    public function __construct()
    {
        (new AliasForLoader())->load();
        (new ResolverLoader())->load();
        (new LauncherLoader())->handler();

        $this->argvParser = new PhalconAdapter();

        LauncherRun::execute(LauncherPriorityEnum::BEFORE_LOAD_FRAMEWORK);
        InstanceFactory::resolveProperties($this);
        LauncherRun::execute(LauncherPriorityEnum::AFTER_LOAD_FRAMEWORK);

        LauncherRun::execute(LauncherPriorityEnum::BEFORE_LOAD_APPLICATION);
        LauncherRun::execute(LauncherPriorityEnum::AFTER_LOAD_APPLICATION);
    }

    public function start(): void
    {
        $this->startQueueServer();
        $this->startWebServer();
        $this->startWebSocketServer();
        $this->startCompiler();
    }

    private function startQueueServer(): void
    {
        $queue = $this->argvParser->get('queue', '');

        if(Assert::isNotEmpty($queue) && Modules::isEnabled(ModulesEnum::QUEUE_MANAGER)){
            /** @var ServerRunInterface $server */
            $server = InstanceFactory::createIfNotExists(QueueConsumerServer::class);
            $server->run($queue);
        }
    }

    private function startWebServer(): void
    {
        $enabled = $this->argvParser->has('webserver');

        if($enabled && Modules::isEnabled(ModulesEnum::WEBSERVER)){
            /** @var ServerRunInterface $server */
            $server = InstanceFactory::createIfNotExists(WebServer::class);
            $server->run();
        }
    }

    private function startWebSocketServer(): void
    {
        $enabled = $this->argvParser->has('websocketserver');

        if($enabled && Modules::isEnabled(ModulesEnum::WEBSERVER)){
            /** @var ServerRunInterface $server */
            $server = InstanceFactory::createIfNotExists(WebSocketServer::class);
            $server->run();
        }
    }

    private function startCompiler(): void
    {
        $enabled = $this->argvParser->has('compile');

        if($enabled){
            /** @var ServerRunInterface $server */
            $server = InstanceFactory::createIfNotExists(Compiler::class);
            $server->run();
        }
    }
}