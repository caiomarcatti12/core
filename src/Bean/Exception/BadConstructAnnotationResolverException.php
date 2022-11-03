<?php

namespace CaioMarcatti12\Bean\Exception;

use CaioMarcatti12\Bean\Annotation\AliasFor;
use Exception;
use CaioMarcatti12\Bean\Enum\BeanType;
use Throwable;

#[AliasFor(BeanType::EXCEPTION)]
final class BadConstructAnnotationResolverException extends Exception
{
    public function __construct($message = 'Error in construction of annotation resolution', $code = 500, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}