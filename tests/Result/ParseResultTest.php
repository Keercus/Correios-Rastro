<?php declare(strict_types=1);

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
        $mockedData = $this->mockData();
        $parseResult = new ParseResult($mockedData);
        $result = $parseResult();

        $objeto = $mockedData->return->objeto;
        $this->assertInstanceOf(Result::class, $result);
        $this->assertEquals($objeto->numero, $result->getNumero());
        $this->assertEquals($objeto->sigla, $result->getSigla());
        $this->assertEquals($objeto->nome, $result->getNome());
        $this->assertEquals($objeto->categoria, $result->getCategoria());

        $evento = $objeto->evento;
        $event = $result->getEvento();
        $this->assertEquals($evento->tipo, $event->getTipo());
        $this->assertEquals($evento->status, $event->getStatus());
        $this->assertEquals($evento->descricao, $event->getDescricao());
        $this->assertEquals($evento->detalhe, $event->getDetalhe());
        $this->assertEquals($evento->local, $event->getLocal());
        $this->assertEquals($evento->codigo, $event->getCodigo());
        $this->assertEquals($evento->cidade, $event->getCidade());
        $this->assertEquals($evento->uf, $event->getUf());
    }

    public function testResultDataWithErrors()
    {
        $mockedData = $this->mockDataWithError();
        $parseResult = new ParseResult($mockedData);
        $result = $parseResult();

        $this->assertEquals($mockedData->return->objeto->erro, $result->getErro());
    }

    private function mockData()
    {
        $evento = new \stdClass();
        $evento->tipo = 'PO';
        $evento->status = '09';
        $evento->data = '05/03/2018';
        $evento->hora = '18:42';
        $evento->descricao = 'Objeto postado ap o horio limite da unidade';
        $evento->detalhe = 'Objeto sujeito a encaminhamento no primo dia til';
        $evento->local = 'AGF JARDIM VERA CRUZ';
        $evento->codigo = '05022970';
        $evento->cidade = 'SAO PAULO';
        $evento->uf = 'SP';

        $objeto = new \stdClass();
        $objeto->numero = 'OA932477958BR';
        $objeto->sigla = 'OA';
        $objeto->nome = 'ENCOMENDA SEDEX (ETIQ LOGICA)';
        $objeto->categoria = 'SEDEX';
        $objeto->evento = $evento;

        $data = new \stdClass();
        $data->return = new \stdClass();
        $data->return->objeto = $objeto;
        $data->return->versao = "2.0";
        $data->return->qtd = '1';

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
