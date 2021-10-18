<?php

namespace Keven\OpenAPI;

use Keven\OpenAPI\Exception\InvalidFieldValue;
use Keven\OpenAPI\Model\Components;
use Keven\OpenAPI\Model\ExternalDocumentation;
use Keven\OpenAPI\Model\Info;
use Keven\OpenAPI\Model\Paths;
use Keven\OpenAPI\Model\SecurityRequirement;
use Keven\OpenAPI\Model\Server;
use Keven\OpenAPI\Model\Tag;
use Keven\OpenAPI\Traits\Builder;
use Keven\OpenAPI\Traits\Creator;
use Keven\OpenAPI\Traits\Deriver;
use Keven\OpenAPI\Traits\Extensions;
use Keven\OpenAPI\Traits\FromJson;
use Keven\OpenAPI\Traits\FromYaml;
use Keven\OpenAPI\Traits\JsonSerialize;

final class OpenAPI implements \JsonSerializable
{
    use JsonSerialize, Extensions, Deriver, Creator, FromJson, FromYaml, Builder;

    private const
        OPENAPI = 'openapi',
        INFO = 'info',
        SERVERS = 'servers',
        PATHS = 'paths',
        COMPONENTS = 'components',
        SECURITY = 'security',
        TAGS = 'tags',
        EXTERNAL_DOCS = 'externalDocs'
    ;

    private string $openapi;
    private Info $info;
    /** @var null|Server[] */
    private ?array $servers;
    private Paths $paths;
    private ?Components $components;
    /** @var null|SecurityRequirement[]  */
    private ?array $security;
    /** @var null|Tag[]  */
    private ?array $tags;
    private ?ExternalDocumentation $externalDocs;

    public function openapi(string $version): self
    {
        if (!preg_match('/\d\.\d\.\d/', $version)) {
            throw InvalidFieldValue::create('openapi', $version, 'semantic version number: X.Y.Z');
        }

        return $this->derive(self::OPENAPI, $version);
    }

    public function info(Info $info): self
    {
        return $this->derive('info', $info);
    }

    public function servers(Server ...$servers): self
    {
        return $this->derive(self::SERVERS, $servers);
    }

    public function server(Server $server): self
    {
        return $this->derive(self::SERVERS, $server, null);
    }

    public function paths(Paths $paths): self
    {
        return $this->derive(self::PATHS, $paths);
    }

    public function components(Components $components): self
    {
        return $this->derive(self::COMPONENTS, $components);
    }

    public function security(SecurityRequirement ...$securityRequirements): self
    {
        return $this->derive(self::SECURITY, $securityRequirements);
    }

    public function securityRequirement(SecurityRequirement $securityRequirement): self
    {
        return $this->derive(self::SECURITY, $securityRequirement, null);
    }

    public function tags(Tag ...$tags): self
    {
        return $this->derive(self::TAGS, $tags);
    }

    public function tag(Tag $tag): self
    {
        return $this->derive(self::TAGS, $tag, null);
    }

    public function externalDocs(ExternalDocumentation $externalDocs): self
    {
        return $this->derive(self::EXTERNAL_DOCS, $externalDocs);
    }

    /**
     * @param array $specification OpenAPI array specification representation
     * @param bool $loose
     * @return OpenAPI
     */
//    public static function create(array $specification, bool $loose = false): OpenAPI
//    {
//        $openAPI = new self;
//        foreach ($specification as $name => $value) {
//            switch ($name) {
//                case 'openapi': $openAPI = $openAPI->openapi($value); break;
//                case 'info': $openAPI = $openAPI->info(Info::create($value)); break;
//                default: $openAPI = $openAPI->with($name, $value);
//            }
//        }
//
//        return $openAPI;
//    }
}
