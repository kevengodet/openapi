<?php

namespace Keven\OpenAPI;

final class Validator
{
    public function isValid(string $json): bool
    {
        try {
            OpenAPI::fromJSON($json);

            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }
}
