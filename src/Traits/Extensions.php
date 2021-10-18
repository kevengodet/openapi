<?php

namespace Keven\OpenAPI\Traits;

use Keven\OpenAPI\Exception\InvalidExtensionName;

trait Extensions
{
    private ?array $extensions;

    /**
     * Add an Extension value
     *
     * @param string $name
     * @param $value
     * @return static
     */
    public function with(string $name, $value): self
    {
        if (strpos($name, 'x-') !== 0) {
            throw InvalidExtensionName::create($name);
        }

        $obj = clone $this;
        $obj->extensions = array_merge($this->extensions ?? [], [$name => $value]);

        return $obj;
    }
}
