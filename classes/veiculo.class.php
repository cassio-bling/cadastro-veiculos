<?php

require_once("../models/veiculo.model.php");
class Veiculo extends Base
{
    const TABELA = "veiculo";

    private function parse($model)
    {
        $data = array(
            "id" => $model->getId(),
            "descricao" => $model->getDescricao(),
            "placa" => $model->getPlaca(),
            "codigoRenavam" => $model->getCodigoRenavam(),
            "anoModelo" => $model->getAnoModelo(),
            "anoFabricao" => $model->getAnoFabricacao(),
            "cor" => $model->getCor(),
            "km" => $model->getKm(),
            "marca" => $model->getMarca(),
            "preco" => $model->getPreco(),
            "precoFipe" => $model->getPrecoFipe()
        );

        return $data;
    }

    public function insert($model)
    {
        $sql = "INSERT INTO " . self::TABELA . " (descricao, placa, codigoRenavam, anoModelo, anoFabricacao, cor, km, marca, preco, precoFipe) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $params = $this->parse($model);
        $conexao = Database::connect();
        $comando = $conexao->prepare($sql);
        $comando->bind_param(
            "sssiisisdd",
            $params["descricao"],
            $params["placa"],
            $params["codigoRenavam"],
            $params["anoModelo"],
            $params["anoFabricao"],
            $params["cor"],
            $params["km"],
            $params["marca"],
            $params["preco"],
            $params["precoFipe"]
        );

        $resultado = $comando->execute();
        Database::disconnect();
        return $resultado;
    }

    public function update($model)
    {
        $sql = "UPDATE " . self::TABELA . " SET descricao = ?, placa = ?, codigoRenavam = ?, anoModelo = ?, anoFabricacao = ?, cor = ?, km = ?, marca = ?, preco = ?, precoFipe = ? WHERE id = ?";

        $params = $this->parse($model);
        $conexao = Database::connect();
        $comando = $conexao->prepare($sql);
        $comando->bind_param(
            "sssiisisddi",
            $params["descricao"],
            $params["placa"],
            $params["codigoRenavam"],
            $params["anoModelo"],
            $params["anoFabricao"],
            $params["cor"],
            $params["km"],
            $params["marca"],
            $params["preco"],
            $params["precoFipe"],
            $params["id"]
        );

        $resultado = $comando->execute();
        Database::disconnect();
        return $resultado;
    }
}
