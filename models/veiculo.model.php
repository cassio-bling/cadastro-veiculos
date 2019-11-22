<?php

require_once("base.model.php");

class VeiculoModel extends BaseModel
{

    private $descricao;
    private $placa;
    private $codigoRenavam;
    private $anoModelo;
    private $anoFabricacao;
    private $cor;
    private $km;
    private $marca;
    private $preco;
    private $precoFipe;

    //Setters    
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }
    public function setCodigoRenavam($codigoRenavam)
    {
        $this->codigoRenavam = $codigoRenavam;
    }
    public function setAnoModelo($anoModelo)
    {
        $this->anoModelo = $anoModelo;
    }
    public function setAnoFabricacao($anoFabricacao)
    {
        $this->anoFabricacao = $anoFabricacao;
    }
    public function setCor($cor)
    {
        $this->cor = $cor;
    }
    public function setKm($km)
    {
        $this->km = $km;
    }
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }
    public function setPrecoFipe($precoFipe)
    {
        $this->precoFipe = $precoFipe;
    }

    //Getters    
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function getPlaca()
    {
        return $this->placa;
    }
    public function getCodigoRenavam()
    {
        return $this->codigoRenavam;
    }
    public function getAnoModelo()
    {
        return $this->anoModelo;
    }
    public function getAnoFabricacao()
    {
        return $this->anoFabricacao;
    }
    public function getCor()
    {
        return $this->cor;
    }
    public function getKm()
    {
        return $this->km;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function getPreco()
    {
        return $this->preco;
    }
    public function getPrecoFipe()
    {
        return $this->precoFipe;
    }
}