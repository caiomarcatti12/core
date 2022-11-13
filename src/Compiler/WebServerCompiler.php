<?php

namespace CaioMarcatti12\Core\Compiler;

use CaioMarcatti12\Core\Compiler\Interfaces\CompilerInterface;
use CaioMarcatti12\Core\Modules\Modules;
use CaioMarcatti12\Core\Modules\ModulesEnum;

class WebServerCompiler implements CompilerInterface
{
    public function run(): void
    {
        if (!Modules::isEnabled(ModulesEnum::WEBSERVER))
            return;

        $template = new TemplateSupervisor($this->makeCommand(), $this->getShortName(), 1);
        $template = $template->make();

        $this->saveFileConfig($template);
    }

    private function getShortName(): string{
        return 'WebServer';
    }

    private function makeCommand(): string{
        return 'php /var/www/html/main --webserver';
    }

    private function saveFileConfig(string $template): void{
        file_put_contents('/etc/supervisor/conf.d/'. $this->getShortName(). '.conf', $template);
    }
}