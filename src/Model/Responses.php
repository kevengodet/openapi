<?php

namespace Keven\OpenAPI\Model;

use Keven\OpenAPI\Traits\Builder;
use Keven\OpenAPI\Traits\Creator;
use Keven\OpenAPI\Traits\Deriver;
use Keven\OpenAPI\Traits\Extensions;
use Keven\OpenAPI\Traits\FromJson;
use Keven\OpenAPI\Traits\FromYaml;
use Keven\OpenAPI\Traits\JsonSerialize;

final class Responses implements \JsonSerializable
{
    use JsonSerialize, Extensions, Deriver, Creator, FromJson, FromYaml, Builder;

    /** @var Response|Reference|null */
    private $default;
    /** @var Response[]|Reference[]|null  */
    private ?array $responses;

    public static function create(array $data): self
    {
        $obj = new self;
        foreach ($data as $key => $value) {
            if ($key === 'default') {
                $obj->default = Response::create($value);
            } else {
                if (empty($obj->responses)) {
                    $obj->responses = [];
                }
                $obj->responses[$key] = Response::create($value);
            }
        }

        return $obj;
    }
}
