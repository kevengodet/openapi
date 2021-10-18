<?php

namespace Keven\OpenAPI\Model;

use Keven\OpenAPI\Traits\Builder;
use Keven\OpenAPI\Traits\Creator;
use Keven\OpenAPI\Traits\Deriver;
use Keven\OpenAPI\Traits\Extensions;
use Keven\OpenAPI\Traits\FromJson;
use Keven\OpenAPI\Traits\FromYaml;
use Keven\OpenAPI\Traits\JsonSerialize;

final class Example implements \JsonSerializable
{
    use JsonSerialize, Extensions, Deriver, Creator, FromJson, FromYaml, Builder;

    private ?string $summary, $description, $externalValue;
    private $value;

}
