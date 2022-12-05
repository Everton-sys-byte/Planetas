<?php


class Planeta{
    private $nome;
    private $descricao;
    private $gravidade;
    private $qntLuas;

   public function __construct($nome, $descricao, $gravidade, $qntLuas)
   {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->gravidade = $gravidade;
        $this->qntLuas = $qntLuas;
   }

   public function __get($name)
   {
        return $this->$name;
   }
}