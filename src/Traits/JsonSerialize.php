<?php

namespace Keven\OpenAPI\Traits;

trait JsonSerialize
{
    public function jsonSerialize(): array
    {
        $properties = [];
        foreach (get_class_vars(__CLASS__) as $name => $value) {
            if (null !== $value) {
                $properties[$name] = $value;
            }
        }

        return $properties;
    }
}
