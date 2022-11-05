<?php

namespace CaioMarcatti12\Core\Launcher\Annotation;

use CaioMarcatti12\Core\ExtractPhpNamespace;
use CaioMarcatti12\Core\Factory\Invoke;
use CaioMarcatti12\Core\Launcher\Objects\Launchers;
use CaioMarcatti12\Core\Validation\Assert;
use CaioMarcatti12\Router\Web\Annotation\RequestMapping;

class LauncherRun
{
    public static function execute(LauncherPriorityEnum $priority): void
    {
        $launchers = Launchers::get($priority);

        foreach($launchers as $launcher){
            /** LauncherInterface */
            Invoke::new($launcher, 'handler');
        }
    }
}