<?php

namespace CaioMarcatti12\Core\Cli\Annotation;

use Attribute;
use CaioMarcatti12\Core\Cli\Adapter\PhalconAdapter;
use CaioMarcatti12\Core\Modules\Modules;
use CaioMarcatti12\Core\Modules\ModulesEnum;

#[Attribute(Attribute::TARGET_CLASS)]
class EnableCli
{
    private string $adapter = '';

    public function __construct(string $adapter = PhalconAdapter::class)
    {
        $this->adapter = $adapter;

        Modules::enable(ModulesEnum::CLI);
    }

    public function getAdapter(): string
    {
        return $this->adapter;
    }
}
