<?php

namespace CaioMarcatti12\Core\Modules;

use CaioMarcatti12\Core\Bean\AliasForLoader;
use CaioMarcatti12\Core\Bean\ResolverLoader;
use CaioMarcatti12\Core\Factory\InstanceFactory;

enum ModulesEnum
{
    case WEBSERVER;
    case LOG;
    case EVENT;
    case QUEUE_MANAGER;
    case FILE_MANAGER;
    case DIRECTORY_MANAGER;
    case COMMAND;
    case CACHE;
    case CAPTCHA;
    case CLI;
    case WEBSOCKETSERVER;
}