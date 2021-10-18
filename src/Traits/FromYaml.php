<?php

namespace Keven\OpenAPI\Traits;

use Symfony\Component\Yaml\Parser;

trait FromYaml
{
    use Creator;

    public static function fromYaml(string $specification): self
    {
        return self::create((new Parser)->parse($specification));
    }
}
