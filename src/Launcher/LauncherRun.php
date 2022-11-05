<?php

namespace CaioMarcatti12\Core\Launcher;

use CaioMarcatti12\Core\Factory\Invoke;
use CaioMarcatti12\Core\Launcher\Enum\LauncherPriorityEnum;
use CaioMarcatti12\Core\Launcher\Objects\Launchers;

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