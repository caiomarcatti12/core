<?php

namespace CaioMarcatti12\Core\Launcher\Enum;

enum LauncherPriorityEnum
{
    case BEFORE_LOAD_FRAMEWORK;
    case AFTER_LOAD_FRAMEWORK;
    case BEFORE_LOAD_APPLICATION;
    case AFTER_LOAD_APPLICATION;
}