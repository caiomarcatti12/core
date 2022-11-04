<?php
//
//namespace CaioMarcatti12\Core\Validation\Resolver;
//
//use ReflectionProperty;
//use CaioMarcatti12\Core\Bean\Annotation\AnnotationResolver;
//use CaioMarcatti12\Core\Bean\Interfaces\PropertyResolverInterface;
//use CaioMarcatti12\I18n\Translator;
//use CaioMarcatti12\Core\Validation\Annotation\NotEmpty;
//use CaioMarcatti12\Core\Validation\Assert;
//
//#[AnnotationResolver(NotEmpty::class)]
//class NotEmptyResolver implements PropertyResolverInterface
//{
//    public function handler(object &$instance, ReflectionProperty $reflectionProperty): void
//    {
//        /** @var NotEmpty $notEmptyAttribute */
//        $notEmptyAttribute = $reflectionProperty->getAttributes(NotEmpty::class)[0]->newInstance();
//        $field = $reflectionProperty->getName();
//
//        $name = $reflectionProperty->getName();
//        $value = null;
//
//        if($reflectionProperty->isInitialized($instance)) {
//            $value = $reflectionProperty->getValue($instance);
//        }
//
//        if(Assert::isEmpty($value)){
//            if(!Assert::isEmpty($notEmptyAttribute->getError())){
//                if(Assert::isNotEmpty($notEmptyAttribute->getFieldName())) $field = $notEmptyAttribute->getFieldName();
//
//                $message = Translator::get($notEmptyAttribute->getError(), ['field' => $field]);
//
//                throw new \Exception($message ,400);
//            }
//            else{
//                throw new \Exception('Field ' . $name . ' is required',400);
//            }
//        }
//    }
//}