<?php

namespace CaioMarcatti12\Core\Bean\Objects;

use CaioMarcatti12\Core\Validation\Assert;

final class BeanResolver
{
    private static array $resolvers = [];

    public static function get($class): string
    {
//        $class = BeanProxy::get($class);

        if (Assert::keyExists($class, self::$resolvers)) {
            return self::$resolvers[$class];
        }

        return '';
    }

    public static function add(string $class, string $resolver): void
    {
        self::$resolvers[$class] = $resolver;
    }

    public static function destroy(string $class): void
    {
        unset(self::$resolvers[$class]);
    }
}