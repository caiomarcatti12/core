<?php

namespace CaioMarcatti12\Core;

use CaioMarcatti12\Core\Bean\ResolverLoader;
use CaioMarcatti12\Core\Factory\InstanceFactory;

class SpringApplication
{
    public function __construct()
    {
        (new ResolverLoader())->load();

        InstanceFactory::resolveProperties($this);
    }

    public abstract function start(): void;
}