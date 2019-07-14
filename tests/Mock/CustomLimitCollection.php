<?php

declare(strict_types=1);

namespace Kartavik\Tests\Mock;

use Kartavik\LimitCollection;
use Kartavik\Tests\Unit\LimitCollectionTest;

/**
 * Class CustomLimitCollection
 * @package Kartavik\Tests\Mock
 */
class CustomLimitCollection extends LimitCollection
{
    public function type(): string
    {
        return \stdClass::class;
    }

    public function limit(): int
    {
        return LimitCollectionTest::EXPECT_LIMIT;
    }
}
