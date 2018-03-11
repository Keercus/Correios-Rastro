<?php

namespace Tests\Result;

use PHPUnit\Framework\TestCase;
use Correios\Rastro\Result\ParseResult;
use Correios\Rastro\Result\Result;

class ParseResultTest extends TestCase
{
    public function testInstance()
    {
        $result = new ParseResult($this->mockData());
        $this->assertInstanceOf(ParseResult::class, $result);
    }

    public function testResultData()
    {
        $parseResult = new ParseResult($this->mockData());
        $result = $parseResult();

        $this->assertInstanceOf(Result::class, $result);
    }

    public function testResultDataWithErrors()
    {
        $parseResult = new ParseResult($this->mockDataWithError());
        $result = $parseResult();

        $this->assertInstanceOf(Result::class, $result);
    }

    private function mockData()
    {
        $data = new \stdClass();
        $data->return = new \stdClass();
        $data->return->objeto = new \stdClass();
        $data->return->versao = "2.0";

        return $data;
    }

    private function mockDataWithError()
    {
        $data = new \stdClass();
        $data->return = new \stdClass();
        $data->return->objeto = new \stdClass();
        $data->return->objeto->erro  = 'Objeto n encontrado na base de dados dos Correios.';
        $data->return->versao = "2.0";

        return $data;
    }
}
