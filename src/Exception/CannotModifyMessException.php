<?php
declare(strict_types=1);

namespace Zakirullin\Mess\Exception;

use RuntimeException;
use Throwable;

final class CannotModifyMessException extends RuntimeException implements MessExceptionInterface
{
    /**
     * @psalm-var list<string|int>
     *
     * @var array
     */
    private $keySequence;

    /**
     * @psalm-param list<string|int> $keySequence
     *
     * @param array          $keySequence
     * @param Throwable|null $previous
     */
    public function __construct(array $keySequence, Throwable $previous = null)
    {
        $this->keySequence = $keySequence;

        $message = "Mess cannot modify it's value";

        parent::__construct($message, 0, $previous);
    }

    /**
     * @psalm-return list<string|int>
     *
     * @return array
     */
    public function getKeySequence(): array
    {
        return $this->keySequence;
    }
}