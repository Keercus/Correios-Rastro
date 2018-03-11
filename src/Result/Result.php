<?php declare(strict_types=1);

namespace Correios\Rastro\Result;

class Result
{
    private $versao;

    private $numero;

    private $sigla;

    private $nome;

    private $categoria;

    private $erro;

    public function getNumero() : string
    {
        return $this->numero;
    }

    public function setNumero(string $numero) : self
    {
        $this->numero = $numero;
        return $this;
    }

    public function getSigla() : string
    {
        return $this->sigla;
    }

    public function setSigla(string $sigla) : self
    {
        $this->sigla = $sigla;
        return $this;
    }

    public function getNome() : string
    {
        return $this->nome;
    }

    public function setNome(string $nome) : self
    {
        $this->nome = $nome;
        return $this;
    }

    public function getCategoria() : string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria) : self
    {
        $this->categoria = $categoria;
        return $this;
    }

    public function getErro() : string
    {
        return $this->erro;
    }

    public function setErro(string $erro) : self
    {
        $this->erro = $erro;
        return $this;
    }

    public function getVersao() : string
    {
        return $this->versao;
    }

    public function setVersao(string $versao) : self
    {
        $this->versao = $versao;
        return $this;
    }
}
