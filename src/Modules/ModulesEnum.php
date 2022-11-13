<?php

namespace CaioMarcatti12\Core\Modules;

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