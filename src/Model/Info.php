<?php

namespace Keven\OpenAPI\Model;

use Keven\OpenAPI\Traits\Builder;
use Keven\OpenAPI\Traits\Creator;
use Keven\OpenAPI\Traits\Deriver;
use Keven\OpenAPI\Traits\Extensions;
use Keven\OpenAPI\Traits\FromJson;
use Keven\OpenAPI\Traits\FromYaml;
use Keven\OpenAPI\Traits\JsonSerialize;

final class Info implements \JsonSerializable
{
    use JsonSerialize, Extensions, Deriver, Creator, FromJson, FromYaml, Builder;

    private string $title, $version;
    private ?string $description, $termsOfService;
    private ?Contact $contact;
    private ?License $license;

//    public static function create(array $info): self
//    {
//        $obj = new self;
//
//        foreach ($info as $name => $value) {
//            switch($name) {
//                default: $obj = $obj->with($name, $value);
//            }
//        }
//
//        return $obj;
//    }
}
