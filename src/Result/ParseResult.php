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

        $result->setNumero($objeto->numero);
        $result->setSigla($objeto->sigla);
        $result->setNome($objeto->nome);
        $result->setCategoria($objeto->categoria);

        $eventoObj = $objeto->evento;
        $evento = new Evento();
        $evento->setTipo($eventoObj->tipo);
        $evento->setStatus($eventoObj->status);
        $date = $eventoObj->data;
        if (strpos($date, '/')) {
            list($day, $month, $year) = explode('/', $date);
            $date = sprintf('%s-%s-%s', $year, $month, $day);
        }
        $evento->setDataHora($date . ' ' . $eventoObj->hora);
        $evento->setDescricao($eventoObj->descricao);
        $evento->setDetalhe($eventoObj->detalhe ?? null);
        $evento->setLocal($eventoObj->local);
        $evento->setCodigo($eventoObj->codigo);
        $evento->setCidade($eventoObj->cidade);
        $evento->setUf($eventoObj->uf);

        $result->setEvento($evento);

        return $result;
    }
}
