<?php

namespace Keven\OpenAPI\Type;

use Keven\OpenAPI\Exception\UnknownPropertyType;

final class GuesserChain implements Guesser
{
    /** @var Guesser[] */
    private array $guessers;

    public function __construct(Guesser ...$guessers)
    {
        $this->guessers = $guessers;
    }

    public function guess(string $class, string $property): ?string
    {
        foreach ($this->guessers as $gusser) {
            if (null !== $type = $gusser->guess($class, $property)) {
                return $type;
            }
        }

        throw UnknownPropertyType::create($class, $property);
    }
}
