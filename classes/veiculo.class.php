<?php
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

            $query = new Query();
            $query->sql = "SELECT COUNT(id) FROM " . static::TABELA;
            $this->setUser($query);
            $this->setFilters($query, $model);
            $this->setOrder($query);

            $statment = $conexao->prepare($query->sql);
            $statment->bind_param($query->types, ...$query->params);
            $statment->execute();

            $result = $statment->get_result();
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

            $query = new Query();
            $query->sql = "SELECT " . ($allFields ? "*" : "id, descricao, placa, marca") . " FROM " . static::TABELA;
            $this->setUser($query);
            $this->setFilters($query, $model);
            $this->setOrder($query);
            $this->setPagination($query, $limit, $offset);
            
            $statment = $conexao->prepare($query->sql);
            $statment->bind_param($query->types, ...$query->params);
            $statment->execute();

            $result = $statment->get_result();

            return $result;
        } finally {
            Database::disconnect();
        }
    }

    public function insert($model)
    {
        try {
            $conexao = Database::connect();
            
            $query = new Query();
            $query->sql = "INSERT INTO " . self::TABELA . " (descricao, placa, codigoRenavam, anoModelo, anoFabricacao, cor, km, marca, preco, precoFipe, idUsuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query->types = "sssiisisddi";
            $query->params = $this->parse($model);
            
            $statment = $conexao->prepare($query->sql);
            $statment->bind_param($query->types, ...$query->params);
            $statment->execute();
            
            return $statment->insert_id;            
        } finally {
            Database::disconnect();
        }
    }

    public function update($model)
    {
        try {
            $conexao = Database::connect();

            $query = new Query();
            $query->sql = "UPDATE " . self::TABELA . " SET descricao = ?, placa = ?, codigoRenavam = ?, anoModelo = ?, anoFabricacao = ?, cor = ?, km = ?, marca = ?, preco = ?, precoFipe = ? idUsuario = ? WHERE id = ?";
            $query->types = "sssiisisddi";
            $query->params = $this->parse($model);
            
            $statment = $conexao->prepare($query->sql);
            $statment->bind_param($query->types, ...$query->params);
            $statment->execute();
            
            $resultado = $statment->execute();
            
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

    private function setFilters(Query $query, $model)
    {
        if ($model == null) {
            return;
        }

        if (!empty($model->getDescricao())) {
            $query->sql .= " AND descricao LIKE ?";
            $query->types .= "s";
            array_push($query->params, '%' . $model->getDescricao() . '%');
        }

        if (!empty($model->getMarca())) {
            $query->sql .= " AND marca = ?";
            $query->types .= "s";
            array_push($query->params, $model->getMarca());
        }
    }    
}
