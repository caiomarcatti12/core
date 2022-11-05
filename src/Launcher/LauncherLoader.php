<?php

namespace CaioMarcatti12\Core\Launcher;

use CaioMarcatti12\Core\ExtractPhpNamespace;
use CaioMarcatti12\Core\Launcher\Annotation\Launcher;
use CaioMarcatti12\Core\Launcher\Objects\Launchers;
use CaioMarcatti12\Core\Validation\Assert;

class LauncherLoader
{
    public function handler(): void
    {
        $filesApplication = ExtractPhpNamespace::getFilesApplication();
        $filesFramework = ExtractPhpNamespace::getFilesFramework();

        $this->parseFiles(array_merge($filesFramework, $filesApplication));
    }

    private  function parseFiles(array $files): void{
        foreach($files as $file){
            $reflectionClass = new \ReflectionClass($file);

            $reflectionAttributes = $reflectionClass->getAttributes(Launcher::class);

            if(Assert::isNotEmpty($reflectionAttributes)) {

                /** @var \ReflectionAttribute $attribute */
                $attributeMapping = array_shift($reflectionAttributesMapping);

                /** @var Launcher $instanceAttributeClass */
                $instanceAttributeClass = $attributeMapping->newInstance();

                $priority = $instanceAttributeClass->getPriority();

                Launchers::add($priority, $file);
            }
        }
    }
}