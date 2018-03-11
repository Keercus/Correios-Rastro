<?php declare(strict_types=1);

namespace Correios\Rastro\Result;

class ParseResult
{
    private $response;

    public function __construct(\stdClass $response)
    {
        $this->response = $response->return;
    }

    public function __invoke() : Result
    {
        $version = $this->response->versao;
        $objeto = $this->response->objeto;

        $result = new Result();
        $result->setVersao($version);
        if (isset($objeto->erro)) {
            $result->setErro($objeto->erro);
            return $result;
        }

        return $result;
    }
}
