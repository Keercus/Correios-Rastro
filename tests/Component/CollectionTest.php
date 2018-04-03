<?php declare(strict_types=1);

namespace Tests\Component;

use PHPUnit\Framework\TestCase;
use Correios\Rastro\Component\Collection;

class CollectionTest extends TestCase
{
    public function testInitial()
    {
        $collection = new Collection();

        $this->assertInstanceOf(Collection::class, $collection);
    }

    public function testAssingData()
    {
        $data = [
            'test' => 'testing',
            1 => 0.2,
            1.5 => 'float data'
        ];

        $collection = new Collection($data);

        $this->assertEquals($data, $collection->toArray());
        $this->assertEquals($data['test'], $collection->offsetGet('test'));
    }
}
