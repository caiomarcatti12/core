<?php

namespace CaioMarcatti12\Core\Compiler;

use CaioMarcatti12\Core\Compiler\Interfaces\CompilerInterface;
use CaioMarcatti12\Core\Modules\Modules;
use CaioMarcatti12\Core\Modules\ModulesEnum;

class WebSocketCompiler implements CompilerInterface
{
    public function run(): void
    {
        if (!Modules::isEnabled(ModulesEnum::WEBSOCKETSERVER))
            return;

        $template = new TemplateSupervisor($this->makeCommand(), $this->getShortName(), 1);
        $template = $template->make();

        $this->saveFileConfig($template);
    }

    private function getShortName(): string{
        return 'WebSocketServer';
    }

    private function makeCommand(): string{
        return 'php /var/www/html/main --websocketserver';
    }

    private function saveFileConfig(string $template): void{
        file_put_contents('/etc/supervisor/conf.d/'. $this->getShortName(). '.conf', $template);
    }
}