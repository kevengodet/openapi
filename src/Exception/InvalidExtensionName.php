<?php

namespace Keven\OpenAPI\Exception;

final class InvalidExtensionName extends \InvalidArgumentException implements OpenAPIException
{
    public static function create(string $extensionName): self
    {
        return new self("Extension name must begin with 'x-', '$extensionName' given.");
    }
}
