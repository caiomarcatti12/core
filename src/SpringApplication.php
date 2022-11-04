<?php

namespace CaioMarcatti12\Core;

use CaioMarcatti12\Core\Factory\InstanceFactory;
use CaioMarcatti12\Core\Factory\Annotation\Autowired;
use CaioMarcatti12\Webserver\WebServer;

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
        InstanceFactory::resolveProperties($this);
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

//
//        throw new ApplicationNotFound();
    }
}