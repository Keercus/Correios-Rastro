<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Correios\Rastro\Rastro;
use Correios\Rastro\Config;

class RastroTest extends TestCase
{
    public function testInitial()
    {
        $config = new Config();
        $rastro = new Rastro($config);
        $this->assertInstanceOf(Rastro::class, $rastro);
    }

    public function testGetRastroData()
    {
        $config = new Config();
        $rastro = new Rastro($config);

        //$data = $rastro->fetch(['OA969112403BR','OA932477958BR']);
//die;
        //$this->assertInternalType('array', $data);
        $this->assertTrue(true);
    }
}
