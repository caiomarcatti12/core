<?php
//
//namespace CaioMarcatti12\Core\Validation\Resolver;
//
//use MongoDB\BSON\ObjectId;
//use ReflectionClass;
//use CaioMarcatti12\Core\Bean\Annotation\AnnotationResolver;
//use CaioMarcatti12\Core\Bean\Enum\BeanType;
//use CaioMarcatti12\Core\Bean\InstanceMaker;
//use CaioMarcatti12\Core\Bean\Interfaces\ClassResolverInterface;
//use CaioMarcatti12\Core\Bean\Interfaces\PropertyResolverInterface;
//use CaioMarcatti12\Core\Bean\Objects\BeanAlias;
//use CaioMarcatti12\Core\Bean\Objects\BeanResolver;
//use CaioMarcatti12\Core\Validation\Annotation\Valid;
//use CaioMarcatti12\Core\Validation\Assert;
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