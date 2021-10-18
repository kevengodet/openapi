<?php

namespace Keven\OpenAPI\Exception;

final class InextensibleObject extends \InvalidArgumentException implements OpenAPIException
{
    public static function create(string $name): self
    {
        return new self("Object cannot have extensions ('$name' given).");
    }
}
