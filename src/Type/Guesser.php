<?php

namespace Keven\OpenAPI\Type;

interface Guesser
{
    public function guess(string $class, string $property): ?string;
}
