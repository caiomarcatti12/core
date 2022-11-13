<?php

namespace CaioMarcatti12\Core\Compiler;

class TemplateSupervisor
{
    private string $command;
    private string $name;
    private int $workers;

    public function __construct(string $command, string $name, int $workers = 1)
    {
        $this->command = $command;
        $this->name = $name;
        $this->workers = $workers;
    }

    public function make(): string{
        $template  = '';
        $template .= '[program:'.$this->name.']'. PHP_EOL;
        $template .= 'command='.$this->command. PHP_EOL;
        $template .= 'autostart=true'. PHP_EOL;
        $template .= 'autorestart=true'. PHP_EOL;
        $template .= 'stdout_logfile=/dev/fd/1'. PHP_EOL;
        $template .= 'stderr_logfile=/dev/fd/2'. PHP_EOL;
        $template .= 'redirect_stderr=true'. PHP_EOL;
        $template .= 'stdout_logfile_maxbytes=0'. PHP_EOL;
        $template .= 'stderr_logfile_maxbytes=0'. PHP_EOL;
        $template .= 'startretries=0'. PHP_EOL;
        $template .= 'process_name=%(program_name)s_%(process_num)02d'. PHP_EOL;
        $template .= 'numprocs='.$this->workers. PHP_EOL;

        return $template;
    }
}
