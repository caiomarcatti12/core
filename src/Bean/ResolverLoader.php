<?php

//namespace CaioMarcatti12\Bean;
//
//use CaioMarcatti12\Bean\Annotation\AnnotationResolver;
//use CaioMarcatti12\Bean\Exception\BadSearchFrameworkDirectoryException;
//use CaioMarcatti12\Bean\Objects\BeanResolver;
//use CaioMarcatti12\Validation\Assert;
//
//class ResolverLoader
//{
//    public function load(): void
//    {
//        $files = getFilesByPath($this->getPathFramework());
//
//        foreach($files as $file){
//            $reflection = new \ReflectionClass($file);
//            $attributes = $reflection->getAttributes(AnnotationResolver::class);
//
//            if(Assert::isNotEmpty($attributes)){
//                /** @var \ReflectionAttribute $attribute */
//                $attribute = array_shift($attributes);
//
//                /** @var AnnotationResolver $instanceAttribute */
//                $instanceAttribute = $attribute->newInstance();
//
//                BeanResolver::add($instanceAttribute->getAnnotation(), $reflection->getName());
//            }
//        }
//    }
//
//    private function getPathFramework(): string{
//        $listsDirecoryFramework = [
//            $GLOBALS['_library_spring_framework'],
//            $GLOBALS['_library_spring_framework'].'/src/',
//            $GLOBALS['_library_spring_framework'].'/../src/',
//            $GLOBALS['_library_spring_framework'].'/../../src/',
//            $GLOBALS['_library_spring_framework'].'/../../../src/',
//            $GLOBALS['_library_spring_framework'].'/../../../../src/'
//        ];
//
//        foreach($listsDirecoryFramework as $directory){
//            if(is_dir($directory)) return $directory;
//        }
//
//        throw new BadSearchFrameworkDirectoryException();
//    }
//}