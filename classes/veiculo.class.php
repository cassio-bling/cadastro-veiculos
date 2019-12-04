<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once("../models/veiculo.model.php");
require_once("interfaces/crud.interface.php");
class Veiculo extends Base implements ICrud
{
    public $componentes;

    const TABELA = "veiculo";

    public function count($model = null)
    {
        try {
            $conexao = Database::connect();
            $sql = "SELECT COUNT(id) FROM " . static::TABELA . " WHERE idUsuario = ?";

            $filters = $this->getFilters($model);
            if (!empty($filters[0])) {
                $sql .= $filters[0];
                $query = $conexao->prepare($sql);
                array_unshift($filters[2], $_SESSION["idUsuario"]);
                $query->bind_param("i" . $filters[1], ...$filters[2]);
            } else {
                $query = $conexao->prepare($sql);
                $query->bind_param('i', $_SESSION["idUsuario"]);
            }

            $query->execute();
            $result = $query->get_result();
            $row = mysqli_fetch_array($result);

            return $row[0];
        } finally {
            Database::disconnect();
        }
    }

    public function getPaginated(int $limit = 20, int $offset = 0, $model = null, $allFields = false)
    {
        try {
            $conexao = Database::connect();
            $sql = "SELECT " . ($allFields ? "*" : "id, descricao, placa, marca") . " FROM " . static::TABELA . " WHERE idUsuario = ?";

            $filters = $this->getFilters($model);
            if (!empty($filters[0])) {
                $sql .= $filters[0] . " ORDER BY id DESC LIMIT ? OFFSET ?";
                $query = $conexao->prepare($sql);
                array_unshift($filters[2], $_SESSION["idUsuario"]);
                array_push($filters[2], $limit, $offset);
                $query->bind_param("i" . $filters[1] . "ii", ...$filters[2]);
            } else {
                $sql .= " ORDER BY id DESC LIMIT ? OFFSET ?";
                $query = $conexao->prepare($sql);
                $query->bind_param("iii", $_SESSION["idUsuario"], $limit, $offset);
            }

            $query->execute();
            $result = $query->get_result();

            return $result;
        } finally {
            Database::disconnect();
        }
    }

    public function insert($model)
    {
        try {
            $sql = "INSERT INTO " . self::TABELA . " (descricao, placa, codigoRenavam, anoModelo, anoFabricacao, cor, km, marca, preco, precoFipe, idUsuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $params = $this->parse($model);
            $conexao = Database::connect();
            $conexao->insert_id;
            $comando = $conexao->prepare($sql);
            $comando->bind_param(
                "sssiisisddi",
                ...$params
            );

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
            $sql = "UPDATE " . self::TABELA . " SET descricao = ?, placa = ?, codigoRenavam = ?, anoModelo = ?, anoFabricacao = ?, cor = ?, km = ?, marca = ?, preco = ?, precoFipe = ? idUsuario = ? WHERE id = ?";

            $params = $this->parse($model);

            $conexao = Database::connect();
            $comando = $conexao->prepare($sql);
            $comando->bind_param("sssiisisddi", ...$params);

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
            $model->getDescricao(),
            $model->getPlaca(),
            $model->getCodigoRenavam(),
            $model->getAnoModelo(),
            $model->getAnoFabricacao(),
            $model->getCor(),
            $model->getKm(),
            $model->getMarca(),
            $model->getPreco(),
            $model->getPrecoFipe(),
            $_SESSION["idUsuario"]
        );

        if (!empty($model->getId())) {
            array_push($data, $model->getId());
        }

        return $data;
    }

    private function getFilters($model)
    {
        if (is_null($model)) {
            return;
        }

        $data = array();
        $dataType = "";
        $filters = "";

        if (!empty($model->getDescricao())) {
            $filters .= " AND descricao LIKE ?";
            array_push($data, '%' . $model->getDescricao() . '%');
            $dataType .= "s";
        }

        if (!empty($model->getMarca())) {
            $filters .= " AND marca = ?";
            array_push($data, $model->getMarca());
            $dataType .= "s";
        }

        return array(
            $filters,
            $dataType,
            $data,
        );
    }
}
