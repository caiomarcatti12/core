<?php
//
//namespace CaioMarcatti12\Bean\Exception;
//
//use Exception;
//use CaioMarcatti12\Bean\Enum\BeanType;
//use CaioMarcatti12\Core\Annotation\AliasFor;
//use Throwable;
//
//#[AliasFor(BeanType::EXCEPTION)]
//final class NotConcreteInstanceException extends Exception
//{
//    public function __construct($message = '', $code = 500, Throwable $previous = null)
//    {
//        $message = 'it is not possible to implement the concrete class the interface: '.$message;
//
//        parent::__construct($message, $code, $previous);
//    }
//}