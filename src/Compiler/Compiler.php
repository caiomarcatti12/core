<?php

namespace CaioMarcatti12\Core\Compiler;

use CaioMarcatti12\Core\Factory\Annotation\Autowired;
use CaioMarcatti12\Core\Shared\Interfaces\ServerRunInterface;

class Compiler implements ServerRunInterface
{
    #[Autowired]
    private QueueCompiler $queueCompiler;

    #[Autowired]
    private ScheduleCompiler $scheduleCompiler;

    #[Autowired]
    private WebSocketCompiler $webSocketCompiler;

    #[Autowired]
    private WebServerCompiler $webServerCompiler;

    #[Autowired]
    private CommandCompiler $commandCompiler;

    public function run(): void
    {
        $this->queueCompiler->run();
        $this->scheduleCompiler->run();
        $this->webSocketCompiler->run();
        $this->webServerCompiler->run();
        $this->commandCompiler->run();
    }
}
