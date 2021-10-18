<?php

namespace Keven\OpenAPI\Model;

use Keven\OpenAPI\Traits\Builder;
use Keven\OpenAPI\Traits\Creator;
use Keven\OpenAPI\Traits\Deriver;
use Keven\OpenAPI\Traits\Extensions;
use Keven\OpenAPI\Traits\FromJson;
use Keven\OpenAPI\Traits\FromYaml;
use Keven\OpenAPI\Traits\JsonSerialize;

final class Operation implements \JsonSerializable
{
    use JsonSerialize, Extensions, Deriver, Creator, FromJson, FromYaml, Builder;

    private ?string $summary, $description, $operationId;
    private ?array $tags;
    private ?ExternalDocumentation $externalDocs;
    /** @var Parameter[]|Reference[]|null  */
    private ?array $parameters;
    private ?RequestBody $requestBody;
    private ?Responses $responses;
    /** @var Callback[]|Reference[]|null  */
    private ?array $callbacks;
    private ?bool $deprecated;
    /** @var Security[]|null  */
    private ?array $security;
    /** @var Server[]|null  */
    private ?array $servers;
}
