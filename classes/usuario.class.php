<?php

require_once("../models/usuario.model.php");
require_once("interfaces/crud.interface.php");
class Usuario extends Base implements ICrud
{
    public $componentes;

    const TABELA = "usuario";

    public function insert($model)
    {
        try {
            $sql = "INSERT INTO " . self::TABELA . " (nome, email, senha) VALUES (?, ?, ?)";

            $params = $this->parse($model);
            $conexao = Database::connect();
            $conexao->insert_id;
            $comando = $conexao->prepare($sql);
            $comando->bind_param("sss", ...$params);

            if ($comando->execute()) {
                return $comando->insert_id;
            } else {
                echo $comando->error;
                return null;
            }
        } finally {
            Database::disconnect();
        }
    }

    public function update($model)
    {
        try {
            $sql = "UPDATE " . self::TABELA . " SET nome = ?, email = ?, senha = ?";

            $params = $this->parse($model);

            $conexao = Database::connect();
            $comando = $conexao->prepare($sql);
            $comando->bind_param("sss", ...$params);

            $resultado = $comando->execute();

            echo $comando->error;

            return $resultado;
        } finally {
            Database::disconnect();
        }
    }

    private function parse($model)
    {
        $data = array(
            $model->getNome(),
            $model->getEmail(),
            $model->getSenha(),
        );

        if (!empty($model->getId())) {
            array_push($data, $model->getId());
        }

        return $data;
    }
}
