<?php

namespace CaioMarcatti12\Bean\Interfaces;

interface ClassResolverInterface
{
    public function handler(object &$instance): void;
}