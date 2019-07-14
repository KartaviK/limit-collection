<?php

declare(strict_types=1);

namespace Kartavik;

use Wearesho\BaseCollection;

/**
 * Class LimitCollection
 * @package Kartavik
 */
abstract class LimitCollection extends BaseCollection
{
    public function __construct(iterable $elements = [], int $flags = 0, string $iteratorClass = \ArrayIterator::class)
    {
        $this->validateCount($elements);

        parent::__construct($elements, $flags, $iteratorClass);
    }

    abstract public function limit(): int;

    public function append($value): BaseCollection
    {
        $this->validateCount();

        return parent::append($value);
    }

    public function exchangeArray($input): array
    {
        $this->validateCount();

        return parent::exchangeArray($input);
    }

    public function offsetSet($index, $value): BaseCollection
    {
        $this->validateCount();

        return parent::offsetSet($index, $value);
    }

    public function isFull(): bool
    {
        return $this->limit() === $this->count();
    }

    protected function validateCount($elements = []): void
    {
        if ((!empty($elements) && $elements > $this->limit()) || $this->isFull()) {
            throw new \InvalidArgumentException("Invalid count of elements.");
        }
    }
}
