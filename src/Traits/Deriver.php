<?php

namespace Keven\OpenAPI\Traits;

trait Deriver
{
    private function derive(string $name, $value, string $key = null): self
    {
        $obj = clone $this;
        if (func_num_args() === 2) {
            $obj->$name = $value;
        } else {
            $obj->$name = array_merge($this->$name, null === $key ? [$value] : [$key => $value]);
        }

        return $obj;
    }
}
