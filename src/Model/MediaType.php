<?php

namespace Keven\OpenAPI\Model;

use Keven\OpenAPI\Traits\Builder;
use Keven\OpenAPI\Traits\Creator;
use Keven\OpenAPI\Traits\Deriver;
use Keven\OpenAPI\Traits\Extensions;
use Keven\OpenAPI\Traits\FromJson;
use Keven\OpenAPI\Traits\FromYaml;
use Keven\OpenAPI\Traits\JsonSerialize;
use Opis\JsonSchema\Schema;

final class MediaType implements \JsonSerializable
{
    use JsonSerialize, Extensions, Deriver, Creator, FromJson, FromYaml, Builder;

    /** @var Schema|Reference */
    private $schema;
    private $example;
    /** @var string[]|Example[]|Reference[]|null  */
    private ?array $examples;
    /** @var string[]|Encoding[]|null  */
    private ?array $encoding;
}
