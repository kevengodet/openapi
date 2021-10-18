<?php

namespace Keven\OpenAPI\Model;

use Keven\OpenAPI\Traits\Builder;
use Keven\OpenAPI\Traits\Creator;
use Keven\OpenAPI\Traits\Deriver;
use Keven\OpenAPI\Traits\Extensions;
use Keven\OpenAPI\Traits\FromJson;
use Keven\OpenAPI\Traits\FromYaml;
use Keven\OpenAPI\Traits\JsonSerialize;

final class Encoding implements \JsonSerializable
{
    use JsonSerialize, Extensions, Deriver, Creator, FromJson, FromYaml, Builder;

    private ?ContentType $contentType;
    /** @var Header[]|Reference[]|null  */
    private ?array $headers;
    private ?string $style;
    private ?bool $explode;
    private ?bool $allowReserveds;

}
