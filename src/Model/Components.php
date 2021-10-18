<?php

namespace Keven\OpenAPI\Model;

use Keven\OpenAPI\OpenAPI;
use Keven\OpenAPI\Traits\Builder;
use Keven\OpenAPI\Traits\Creator;
use Keven\OpenAPI\Traits\Deriver;
use Keven\OpenAPI\Traits\Extensions;
use Keven\OpenAPI\Traits\FromJson;
use Keven\OpenAPI\Traits\FromYaml;
use Keven\OpenAPI\Traits\JsonSerialize;

final class Components implements \JsonSerializable
{
    use JsonSerialize, Extensions, Deriver, Creator, FromJson, FromYaml, Builder;

    /** @var OpenAPI[]|Reference[]|null  */
    private ?array $schemas;
    /** @var Response[]|Reference[]|null  */
    private ?array $responses;
    /** @var Parameter[]|Reference[]|null  */
    private ?array $parameters;
    /** @var Example[]|Reference[]|null  */
    private ?array $examples;
    /** @var RequestBody[]|Reference[]|null  */
    private ?array $requestBodies;
    /** @var Header[]|Reference[]|null  */
    private ?array $headers;
    /** @var SecurityScheme[]|Reference[]|null  */
    private ?array $securitySchemes;
    /** @var Link[]|Reference[]|null  */
    private ?array $links;
    /** @var Callback[]|Reference[]|null  */
    private ?array $callbacks;
}
