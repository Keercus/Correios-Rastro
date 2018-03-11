<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Correios\Rastro\Config;

class ConfigTest extends TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf(Config::class, new Config([]));
    }

    public function testConfigData()
    {
        $data = [
            'user' => 'test',
            'pass' => 'test'
        ];

        $config = new Config($data);

        $this->assertEquals($data['user'], $config->getUsername());
        $this->assertEquals($data['pass'], $config->getPassword());
    }

    public function testDefaultConfigData()
    {
        $config = new Config([]);

        $this->assertEquals('ECT', $config->getUsername());
        $this->assertEquals(Config::TYPE_LIST_OBJECT, $config->getType());
    }
}
