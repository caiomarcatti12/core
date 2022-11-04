<?php

namespace CaioMarcatti12\Core\Bean\Interfaces;

interface ClassResolverInterface
{
    public function handler(object &$instance): void;
}