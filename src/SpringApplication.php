<?php

namespace CaioMarcatti12\Core;

use CaioMarcatti12\Core\Bean\AliasForLoader;
use CaioMarcatti12\Core\Bean\ResolverLoader;
use CaioMarcatti12\Core\Factory\InstanceFactory;

class SpringApplication
{
    public function __construct()
    {
        (new AliasForLoader())->load();
        (new ResolverLoader())->load();

        InstanceFactory::resolveProperties($this);
    }

    public function start(): void
    {

    }
}