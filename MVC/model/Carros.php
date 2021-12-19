<?php

class Carros
{

    public $id;
    public $marca;
    public $carro;
    public $fab;
    public $quilometros;
    public $preco;

    public function __construct()
    {
        $this->id = 0;
        $this->marca = "";
        $this->carro = "";
        $this->fab = "";
        $this->quilometros = "";
        $this->preco = "";
    }

    public function validarCampos()
    {
        if (strlen($this->marca) < 3) {
            return false;
        }
        if (strlen($this->carro) == 0) {
            return false;
        }
        if (strlen($this->fab) == 0) {
            return false;
        }
        if (strlen($this->quilometros) == 0) {
            return false;
        }
        if (strlen($this->preco) == 0) {
            return false;
        }
        return true;
    }

}
