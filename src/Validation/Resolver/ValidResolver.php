<?php
//
//namespace CaioMarcatti12\Validation\Resolver;
//
//use MongoDB\BSON\ObjectId;
//use ReflectionClass;
//use CaioMarcatti12\Bean\Annotation\AnnotationResolver;
//use CaioMarcatti12\Bean\Enum\BeanType;
//use CaioMarcatti12\Bean\InstanceMaker;
//use CaioMarcatti12\Bean\Interfaces\ClassResolverInterface;
//use CaioMarcatti12\Bean\Interfaces\PropertyResolverInterface;
//use CaioMarcatti12\Bean\Objects\BeanAlias;
//use CaioMarcatti12\Bean\Objects\BeanResolver;
//use CaioMarcatti12\Validation\Annotation\Valid;
//use CaioMarcatti12\Validation\Assert;
//
//#[AnnotationResolver(Valid::class)]
//class ValidResolver implements ClassResolverInterface
//{
//    public function handler(object &$instance): void
//    {
//        $reflectionClass = new ReflectionClass($instance);
//
//        /** @var \ReflectionProperty $reflectionProperty */
//        foreach ($reflectionClass->getProperties() as $reflectionProperty) {
//            $type = $reflectionProperty->getType()->getName();
//
//            if(!Assert::isPrimitiveTypeName($type) && $type !== ObjectId::class)
//            {
//                $valueInstanceProperty = $reflectionProperty->getValue($instance);
//
//                if(Assert::isEmpty($valueInstanceProperty)){
//                    $valueInstanceProperty = (new ReflectionClass($type))->newInstanceWithoutConstructor();
//                }
//
//                $this->handler($valueInstanceProperty);
//            }
//            else{
//                $this->resolveAttributesProperty($instance, $reflectionProperty);
//            }
//        }
//    }
//
//    private function resolveAttributesProperty(object &$instance, \ReflectionProperty $reflectionProperty): void{
//        $attributesValidation = BeanAlias::get(BeanType::VALIDATOR);
//
//        /** @var \ReflectionAttribute $reflectionAttribute */
//        foreach ($reflectionProperty->getAttributes() as $reflectionAttribute) {
//            if(Assert::inArray($reflectionAttribute->getName(), $attributesValidation)){
//                $resolver = BeanResolver::get($reflectionAttribute->getName());
//
//                if (Assert::isNotEmpty($resolver)) {
//                    /** @var PropertyResolverInterface $instanceResolver */
//                    $instanceResolver = InstanceMaker::createIfNotExists($resolver);
//                    $instanceResolver->handler($instance, $reflectionProperty);
//                }
//            }
//        }
//    }
//}