<?php

namespace CaioMarcatti12\Bean\Exception;

use CaioMarcatti12\Bean\Annotation\AliasFor;
use Exception;
use CaioMarcatti12\Bean\Enum\BeanType;
use Throwable;

#[AliasFor(BeanType::EXCEPTION)]
final class NotConcreteInstanceException extends Exception
{
    public function __construct($message = '')
    {
        parent::__construct('it is not possible to implement the concrete class the interface: '.$message, 500, null);
    }
}