<?php

namespace Keven\OpenAPI\Exception;

final class UnknownPropertyType extends \UnexpectedValueException implements OpenAPIException
{
    public static function create(string $class, string $property): self
    {
        throw new self("Impossible to guess the type of property '$class::$property'.");
    }
}
