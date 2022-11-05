<?php

namespace CaioMarcatti12\Core\Launcher\Annotation;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Launcher
{
    private LauncherPriorityEnum $priority = LauncherPriorityEnum::BEFORE_LOAD_FRAMEWORK;

    public function __construct(LauncherPriorityEnum $priority = LauncherPriorityEnum::BEFORE_LOAD_FRAMEWORK){
        $this->priority = $priority;
    }

    public function getPriority(): LauncherPriorityEnum
    {
        return $this->priority;
    }
}