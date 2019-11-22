<?php

abstract class BaseModel
{

    private $id;
    private $dataCricao;
    private $dataAlteracao;

    //Setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setDataCriacao($dataCricao)
    {
        $this->dataCricao = $dataCricao;
    }
    public function setDataAlteracao($dataAlteracao)
    {
        $this->dataAlteracao = $dataAlteracao;
    }

    //Getters
    public function getId()
    {
        return $this->id;
    }
    public function getDataCriacao()
    {
        return $this->dataCricao;
    }
    public function getDataAlteracao()
    {
        return $this->dataAlteracao;
    }
}
