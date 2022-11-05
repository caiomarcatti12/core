<?php

namespace CaioMarcatti12\Core;

use CaioMarcatti12\Core\Bean\AliasForLoader;
use CaioMarcatti12\Core\Bean\ResolverLoader;
use CaioMarcatti12\Core\Factory\InstanceFactory;
use CaioMarcatti12\Core\Launcher\Annotation\Launcher;
use CaioMarcatti12\Core\Launcher\Annotation\LauncherLoader;
use CaioMarcatti12\Core\Launcher\Annotation\LauncherPriorityEnum;
use CaioMarcatti12\Core\Launcher\Annotation\LauncherRun;

#[Launcher]
class Application
{
    public function __construct()
    {
        (new AliasForLoader())->load();
        (new ResolverLoader())->load();
        (new LauncherLoader())->handler();

        LauncherRun::execute(LauncherPriorityEnum::BEFORE_LOAD_FRAMEWORK);

        InstanceFactory::resolveProperties($this);

        LauncherRun::execute(LauncherPriorityEnum::AFTER_LOAD_FRAMEWORK);
    }

    public function start(): void
    {

    }
}