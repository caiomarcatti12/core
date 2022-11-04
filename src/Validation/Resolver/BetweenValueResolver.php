<?php
//
//namespace CaioMarcatti12\Core\Validation\Resolver;
//
//use ReflectionAttribute;
//use ReflectionProperty;
//use CaioMarcatti12\Core\Bean\Annotation\AnnotationResolver;
//use CaioMarcatti12\Core\Bean\Impl\PropertyResolverInterface;
//use CaioMarcatti12\Core\Validation\Annotation\BetweenValue;
//use CaioMarcatti12\Core\Validation\Assert;
//use CaioMarcatti12\Core\Validation\Exception\BetweenValueException;
//
//#[AnnotationResolver(BetweenValue::class)]
//class BetweenValueResolver implements PropertyResolverInterface
//{
//    public function handle(object &$instance, ReflectionProperty &$property, ReflectionAttribute &$attribute): void
//    {
//        /** @var BetweenValue $betweenValue */
//        $betweenValue = $property->getAttributes(BetweenValue::class)[0]->newInstance();
//
//        $name = $property->getName();
//        $property->setAccessible(true);
//        $value = $property->getValue($instance);
//
//        if ($value < $betweenValue->getMin() || $value > $betweenValue->getMax()) {
//            if(Assert::isEmpty($betweenValue->getError())) throw new \Exception($betweenValue->getError(),400);
//            else throw new BetweenValueException('Parameter ' . $name . ' is not between values ' . $betweenValue->getMin() . ' and ' . $betweenValue->getMax(),400);
//        }
//
//    }
//}