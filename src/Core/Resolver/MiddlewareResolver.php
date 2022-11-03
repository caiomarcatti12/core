<?php
//
//namespace CaioMarcatti12\Core\Resolver;
//
//use PhpParser\Node\Attribute;
//use ReflectionMethod;
//use CaioMarcatti12\Bean\Annotation\AnnotationResolver;
//use CaioMarcatti12\Bean\BeanLoader;
//use CaioMarcatti12\Bean\Interfaces\MethodResolverInterface;
//use CaioMarcatti12\Core\Annotation\Middleware;
//use CaioMarcatti12\Router\Interfaces\RouterMiddleware;
//
//#[AnnotationResolver(Middleware::class)]
//class MiddlewareResolver implements MethodResolverInterface
//{
//    public function handler(object &$instance, ReflectionMethod $reflectionMethod): void
//    {
//        $middlewaresList = $reflectionMethod->getAttributes(Middleware::class);
//
//        /** @var Attribute $middlewareAttribute */
//        foreach ($middlewaresList as $middlewareAttribute){
//            /** @var Middleware $middleware */
//            $middleware = $middlewareAttribute->newInstance();
//
//            /** @var RouterMiddleware $instance */
//            $instance = BeanLoader::loader($middleware->getClass());
//            $instance->handler();
//        }
//    }
//}