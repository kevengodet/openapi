<?php

namespace Keven\OpenAPI\Traits;

trait Builder
{
    use Deriver;

    public function __call($name, $value): self
    {
        return $this->derive($name, ...$value);
    }
}
