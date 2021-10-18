<?php

namespace Keven\OpenAPI\Traits;

trait FromJson
{
    use Creator;

    /** @throws \JsonException  */
    public static function fromJSON(string $specification): self
    {
        return self::create(json_decode($specification, true, 512, JSON_THROW_ON_ERROR));
    }
}
