<?php declare(strict_types=1);

namespace Correios\Rastro\Result;

class Evento
{
    private $tipo;

    private $status;

    private $dataHora;

    private $descricao;

    private $detalhe;

    private $local;

    private $codigo;

    private $cidade;

    private $uf;

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;
        return $this;
    }

    public function getStatus(): string 
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getDataHora(): \DateTime
    {
        return $this->dataHora;
    }

    public function setDataHora(string $dataHora): self
    {
        $this->dataHora = new \DateTime($dataHora);
        return $this;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getDetalhe(): string
    {
        return $this->detalhe;
    }

    public function setDetalhe(string $detalhe): self
    {
        $this->detalhe = $detalhe;
        return $this;
    }

    public function getLocal(): string
    {
        return $this->local;
    }

    public function setLocal(string $local): self
    {
        $this->local = $local;
        return $this;
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;
        return $this;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade): self
    {
        $this->cidade = $cidade;
        return $this;
    }

    public function getUf(): string
    {
        return $this->uf;
    }

    public function setUf(string $uf): self
    {
        $this->uf = $uf;
        return $this;
    }
}
