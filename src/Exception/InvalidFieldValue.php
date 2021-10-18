<?php

namespace Keven\OpenAPI\Exception;

final class InvalidFieldValue extends \InvalidArgumentException implements OpenAPIException
{
    public static function create(string $name, $value, $expected = null): self
    {
        $message = "Invalid value for field '$name'.";
        if (null !== $expected) {
            $message .= " Expected: '$expected'.";
        }
        $message .= " Given: '$value'.";

        return new self($message);
    }
}
