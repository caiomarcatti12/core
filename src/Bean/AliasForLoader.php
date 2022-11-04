<?php
//
//namespace CaioMarcatti12\Core\Bean;
//
//use CaioMarcatti12\Core\Bean\Objects\BeanAlias;
//use CaioMarcatti12\Core\Validation\Assert;
//
//class AliasForLoader
//{
//    /**
//     * @throws \ReflectionException
//     */
//    public function load(): void
//    {
//        $files = getFilesByPath($this->getPathFramework());
//
//        foreach($files as $file){
//            $reflection = new \ReflectionClass($file);
//            $attributes = $reflection->getAttributes(AliasFor::class);
//
//            if(Assert::isNotEmpty($attributes)){
//                /** @var \ReflectionAttribute $attribute */
//                $attribute = array_shift($attributes);
//
//                /** @var AliasFor $instanceAttribute */
//                $instanceAttribute = $attribute->newInstance();
//
//                BeanAlias::add($instanceAttribute->getBeanType(), $reflection->getName());
//            }
//        }
//    }
//
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