<?php

namespace Keven\OpenAPI\Type;

final class ReflectionGuesser implements Guesser
{

    /** @throws \ReflectionException */
    public function guess(string $class, string $property): ?string
    {
        $reflectionProperty = new \ReflectionProperty($class, $property);

        if (!$reflectionProperty->hasType()) {
            return null;
        }

        return $reflectionProperty->getType()->getName();
    }
}
