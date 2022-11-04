<?php

namespace CaioMarcatti12\Core\Bean\Interfaces;

interface ParameterResolverInterface
{
    public function handler(mixed &$instance, \ReflectionParameter $reflectionParameter): void;
}