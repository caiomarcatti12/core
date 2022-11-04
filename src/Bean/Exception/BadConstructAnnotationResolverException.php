<?php

namespace CaioMarcatti12\Core\Bean\Exception;

use CaioMarcatti12\Core\Bean\Annotation\AliasFor;
use CaioMarcatti12\Core\Bean\Enum\BeanType;
use Exception;
use Throwable;

#[AliasFor(BeanType::EXCEPTION)]
final class BadConstructAnnotationResolverException extends Exception
{
    public function __construct($message = 'Error in construction of annotation resolution', $code = 500, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}