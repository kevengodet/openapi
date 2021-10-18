<?php

namespace Keven\OpenAPI\Traits;

use Keven\OpenAPI\Exception\InextensibleObject;
use Keven\OpenAPI\Exception\InvalidExtensionName;
use Keven\OpenAPI\Model\SecurityRequirement;
use Keven\OpenAPI\Model\Server;

trait Creator
{
    public static function create(array $data): self
    {
        $obj = new self;
        foreach ($data as $name => $value) {
            if (!property_exists(self::class, $name)) {
                if (!strpos($name, 'x-') === 0) {
                    throw InvalidExtensionName::create($name);
                }

                if (!property_exists(self::class, 'extensions')) {
                    throw InextensibleObject::create($name);
                }

                $obj = $obj->with($name, $value);

                continue;
            }

            $property = new \ReflectionProperty(self::class, $name);
            if (!in_array($name, ['servers', 'security']) && (!$property->hasType() || $property->getType()->isBuiltin())) {
                $obj = $obj->$name($value);
            } else {
                if ('servers' === $name) {
                    $obj = $obj->servers(...array_map([Server::class, 'create'], $value));
                } elseif ('security' === $name) {
                    $obj = $obj->security(...array_map([SecurityRequirement::class, 'create'], $value));
                } else {
                    $class = $property->getType()->getName();
                    $obj = $obj->$name($class::create($value));
                }
            }
        }

        return $obj;
    }
}
