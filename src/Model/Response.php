<?php

namespace Keven\OpenAPI\Model;

use Keven\OpenAPI\Traits\Builder;
use Keven\OpenAPI\Traits\Creator;
use Keven\OpenAPI\Traits\Deriver;
use Keven\OpenAPI\Traits\Extensions;
use Keven\OpenAPI\Traits\FromJson;
use Keven\OpenAPI\Traits\FromYaml;
use Keven\OpenAPI\Traits\JsonSerialize;

final class Response implements \JsonSerializable
{
    use JsonSerialize, Extensions, Deriver, Creator, FromJson, FromYaml, Builder;

    private string $description;
    /** @var string[]|Header[]|Reference[]|null  */
    private ?array $headers;
    /** @var string[]|MediaType[]|null  */
    private ?array $content;
    /** @var string[]|Link[]|Reference[]|null  */
    private ?array $links;
}
