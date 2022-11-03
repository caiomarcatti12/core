<?php

namespace CaioMarcatti12\Factory\Resolver;

use ReflectionProperty;
use CaioMarcatti12\Bean\Annotation\AnnotationResolver;
use CaioMarcatti12\Bean\BeanLoader;
use CaioMarcatti12\Bean\Interfaces\PropertyResolverInterface;
use CaioMarcatti12\Validation\Assert;

use CaioMarcatti12\Factory\Annotation\Autowired;

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