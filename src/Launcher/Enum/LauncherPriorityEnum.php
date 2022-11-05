<?php

namespace CaioMarcatti12\Core\Launcher\Enum;

use CaioMarcatti12\Core\ExtractPhpNamespace;
use CaioMarcatti12\Core\Factory\Invoke;
use CaioMarcatti12\Core\Validation\Assert;

enum LauncherPriorityEnum
{
    case BEFORE_LOAD_FRAMEWORK;
    case AFTER_LOAD_FRAMEWORK;
    case BEFORE_LOAD_APPLICATION;
    case AFTER_LOAD_APPLICATION;
}