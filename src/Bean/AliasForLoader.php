<?php

namespace CaioMarcatti12\Core\Bean;

use CaioMarcatti12\Core\Bean\Annotation\AliasFor;
use CaioMarcatti12\Core\Bean\Objects\BeanAlias;
use CaioMarcatti12\Core\ExtractPhpNamespace;
use CaioMarcatti12\Core\Validation\Assert;

class AliasForLoader
{
    public function load(): void
    {
        $filesApplication = ExtractPhpNamespace::getFilesApplication();
        $filesFramework = ExtractPhpNamespace::getFilesFramework();

        $this->parseFiles(array_merge($filesApplication, $filesFramework));
    }

    private function parseFiles(array $files): void {
        foreach($files as $file){
            $reflection = new \ReflectionClass($file);
            $attributes = $reflection->getAttributes(AliasFor::class);

            if(Assert::isNotEmpty($attributes)){
                /** @var \ReflectionAttribute $attribute */
                $attribute = array_shift($attributes);

                /** @var AliasFor $instanceAttribute */
                $instanceAttribute = $attribute->newInstance();

                BeanAlias::add($instanceAttribute->getBeanType(), $reflection->getName());
            }
        }
    }
}