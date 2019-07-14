<?php

declare(strict_types=1);

namespace Kartavik\Tests\Unit;

use Kartavik\Tests\Mock\CustomLimitCollection;
use PHPUnit\Framework\TestCase;

/**
 * Class LimitCollectionTest
 * @package Kartavik\Tests\Unit
 * @internal Test case for limit collection
 * @coversDefaultClass \Kartavik\LimitCollection
 */
class LimitCollectionTest extends TestCase
{
    public const EXPECT_LIMIT = 5;

    public function testInitCollection(): CustomLimitCollection
    {
        $collection = new CustomLimitCollection();

        $this->assertFalse($collection->isFull());

        for ($i = 0; $i < static::EXPECT_LIMIT; $i++) {
            $collection->append(new \stdClass());
        }

        $this->assertCount(static::EXPECT_LIMIT, $collection);
        $this->assertTrue($collection->isFull());

        return $collection;
    }

    /**
     * @param CustomLimitCollection $collection
     *
     * @depends testInitCollection
     */
    public function testAppend(CustomLimitCollection $collection): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid count of elements.");

        $collection->append(new \stdClass());
    }

    /**
     * @param CustomLimitCollection $collection
     *
     * @depends testInitCollection
     */
    public function testOffsetSet(CustomLimitCollection $collection): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid count of elements.");

        $collection["someKey"] = new \stdClass();
    }

    /**
     * @param CustomLimitCollection $collection
     *
     * @depends testInitCollection
     */
    public function testExchangeArray(CustomLimitCollection $collection): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid count of elements.");

        $collection->exchangeArray([
            new \stdClass(),
            new \stdClass(),
            new \stdClass(),
            new \stdClass(),
            new \stdClass(),
            new \stdClass(),
        ]);
    }
}
