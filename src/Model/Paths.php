<?php

namespace Keven\OpenAPI\Model;

use Keven\OpenAPI\Traits\Builder;
use Keven\OpenAPI\Traits\Deriver;
use Keven\OpenAPI\Traits\Extensions;
use Keven\OpenAPI\Traits\FromJson;
use Keven\OpenAPI\Traits\FromYaml;
use Keven\OpenAPI\Traits\JsonSerialize;

final class Paths implements \JsonSerializable
{
    use JsonSerialize, Extensions, Deriver, FromJson, FromYaml, Builder;

    /** @var PathItem[]|null  */
    private ?array $paths;

    public static function create(array $paths): Paths
    {
        $obj = new self;
        $obj->paths = [];
        foreach ($paths as $path => $item) {
            $obj->paths[$path] = PathItem::create($item);
        }

        return $obj;
    }
}
