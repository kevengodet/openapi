<?php

namespace Keven\OpenAPI\Model;

use Keven\OpenAPI\Exception\InvalidFieldValue;
use Keven\OpenAPI\Traits\Builder;
use Keven\OpenAPI\Traits\Deriver;
use Keven\OpenAPI\Traits\Extensions;
use Keven\OpenAPI\Traits\FromJson;
use Keven\OpenAPI\Traits\FromYaml;
use Keven\OpenAPI\Traits\JsonSerialize;

final class PathItem implements \JsonSerializable
{
    use JsonSerialize, Extensions, Deriver, FromJson, FromYaml, Builder;

    private ?string $ref, $summary, $description;
    /** @var Operation[]|null  */
    private ?array $operations;
    /** @var Server[]|null  */
    private ?array $servers;
    /** @var Parameter[]|Reference[]|null  */
    private ?array $parameters;

    public static function create(array $data): self
    {
        $obj = new self;
        foreach ($data as $key => $value) {
            if (in_array($key, ['get', 'put', 'post', 'put', 'delete', 'trace', 'options', 'head', 'patch'])) {
                if (empty($obj->operations)) {
                    $obj->operations = [];
                }
                $obj->operations[$key] = Operation::create($value);
            } elseif ($key === 'servers') {
                $obj->servers = array_map([Server::class, 'create'], $value);
            } elseif ($key === 'parameters') {
                $obj->parameters = array_map([Parameter::class, 'create'], $value);
            } else {
                throw InvalidFieldValue::create($key);
            }
        }

        return $obj;
    }
}
