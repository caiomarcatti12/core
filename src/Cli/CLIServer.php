<?php

namespace CaioMarcatti12\Core\Cli;

//use CaioMarcatti12\Bean\Objects\BeanProxy;
//use CaioMarcatti12\Core\Cli\Interfaces\ArgvParserInterface;
//use CaioMarcatti12\Command\Annotation\Command;
//use CaioMarcatti12\Core\Interfaces\ServerRunInterface;
//use CaioMarcatti12\Data\Request\Objects\Body;
//use CaioMarcatti12\Factory\Annotation\Autowired;
//use CaioMarcatti12\Objects\Exception\RouteNotFoundException;
//use CaioMarcatti12\Objects\Interfaces\RouterResponseInterface;
//use CaioMarcatti12\Objects\InvokeRoute;
//use CaioMarcatti12\Objects\Objects\Routes;
//use CaioMarcatti12\Validation\Assert;
//
//class CLIServer implements ServerRunInterface
//{
//    #[Autowired]
//    protected ArgvParserInterface $argvParser;
//
//    /**
//     * @throws \ReflectionException
//     * @throws RouteNotFoundException
//     */
//    public function run(): void
//    {
//        $data = $this->argvParser->getAll();
//
//        Body::set($data);
//        $response = '';
//
//        BeanProxy::add(RouterResponseInterface::class, RouterResponseCLI::class);
//
//        if(isset($data['command'])) $response = $this->execCommand($data['command']);
//
//        echo $response->response();
//    }
//
//    public function execCommand(string $command): mixed{
//        $route = Routes::getRoute($command, '', Command::class);
//
//        if(Assert::isEmpty($route)) throw new RouteNotFoundException($command);
//
//        return InvokeRoute::invoke($route->getClass(), $route->getClassMethod());
//    }
//}