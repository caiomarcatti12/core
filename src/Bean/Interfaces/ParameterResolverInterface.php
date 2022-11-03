<?php

namespace CaioMarcatti12\Bean\Interfaces;

interface ParameterResolverInterface
{
    public function handler(mixed &$instance, \ReflectionParameter $reflectionParameter): void;
}