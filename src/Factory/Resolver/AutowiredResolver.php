<?php

namespace CaioMarcatti12\Core\Factory\Resolver;

use CaioMarcatti12\Core\Bean\Annotation\AnnotationResolver;
use CaioMarcatti12\Core\Bean\BeanLoader;
use CaioMarcatti12\Core\Bean\Interfaces\PropertyResolverInterface;
use CaioMarcatti12\Core\Factory\Annotation\Autowired;
use CaioMarcatti12\Core\Validation\Assert;
use ReflectionProperty;

#[AnnotationResolver(Autowired::class)]
class AutowiredResolver implements PropertyResolverInterface
{

    public function handler(object &$instance, ReflectionProperty $reflectionProperty): void
    {
        $name = $this->getInjectClass($reflectionProperty);

//        if($this->isRepository($name)){
//            $reflectionProperty->setValue($instance, (new RepositoryFactory($name))->factory());
//        }else{
            $reflectionProperty->setValue($instance, BeanLoader::loader($name));
//        }
    }

    private function getInjectClass(ReflectionProperty $reflectionProperty): string {
        $injectClassName = $reflectionProperty->getType()->getName();

        $attributes = $reflectionProperty->getAttributes(Autowired::class);

        /** @var \ReflectionAttribute $reflectionAttribute */
        $reflectionAttribute = array_shift($attributes);

        /** @var Autowired $instaceAutowired */
        $instaceAutowired = $reflectionAttribute->newInstance();

        if(Assert::isNotEmpty($instaceAutowired->getClassName())){
            $injectClassName = $instaceAutowired->getClassName();
        }

        return $injectClassName;
    }

//    private function isRepository(string $className): bool{
//        $reflectionClass = new ReflectionClass($className);
//
//        return Assert::isNotEmpty($reflectionClass->getAttributes(Repository::class));
//
//    }
}