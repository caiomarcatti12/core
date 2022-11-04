<?php

namespace CaioMarcatti12\Core;

use CaioMarcatti12\Cli\CLIServer;
use CaioMarcatti12\Cli\Interfaces\ArgvParserInterface;
use CaioMarcatti12\Command\CommandServer;
use CaioMarcatti12\Compiler\Compiler;
use CaioMarcatti12\Core\Exception\ApplicationNotFound;
use CaioMarcatti12\Installer\Installer;
use CaioMarcatti12\QueueManager\QueueConsumerServer;
use CaioMarcatti12\Web\WebServer;

class SpringApplication
{
//    #[Autowired]
//    protected ArgvParserInterface $argvParser;
//
//    #[Autowired]
//    protected CLIServer $cliServer;
//
//    #[Autowired]
//    protected Installer $installer;
//
//    #[Autowired]
//    protected WebServer $webServer;
//
//    #[Autowired]
//    protected Compiler $compiler;
//
//    #[Autowired]
//    protected QueueConsumerServer $queueConsumerServer;
//
//    public function __construct()
//    {
//        BeanLoader::resolve($this);
//    }
//
//    /**
//     * @throws ApplicationNotFound
//     */
    public function start(): void
    {
//        $args = $this->argvParser->getAll();
//
//        if(isset($args['command'])){
//            $this->cliServer->run();
//            return;
//        }
//
//        if(isset($args['queue'])){
//            $this->queueConsumerServer->run();
//            return;
//        }
//
//        if(isset($args['compiler'])){
//            $this->compiler->run();
//            return;
//        }
//
//        if(isset($args['install'])){
//            $this->installer->run();
//            return;
//        }
//
//        if(isset($args['webserver'])){
//            $this->webServer->run();
//            return;
//        }
//
//        throw new ApplicationNotFound();
    }
}