<?php

namespace Keven\OpenAPI\Model;

use Keven\OpenAPI\Traits\Builder;
use Keven\OpenAPI\Traits\Creator;
use Keven\OpenAPI\Traits\Deriver;
use Keven\OpenAPI\Traits\Extensions;
use Keven\OpenAPI\Traits\FromJson;
use Keven\OpenAPI\Traits\FromYaml;
use Keven\OpenAPI\Traits\JsonSerialize;

final class ContentType implements \JsonSerializable
{
    use JsonSerialize, Extensions, Deriver, Creator, FromJson, FromYaml, Builder;

    /** @var MediaType[] */
    private array $mediaTypes;

    public function __construct(MediaType ...$mediaTypes)
    {
        $this->mediaTypes = $mediaTypes;
    }

    public function with(MediaType $mediaType): self
    {
        $contentType = new self;
        $contentType->mediaTypes = $this->mediaTypes;
        $contentType->mediaTypes[] = $mediaType;

        return $contentType;
    }

    public function jsonSerialize()
    {
        return implode(', ', $this->types);
    }
}
