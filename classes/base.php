<?php
header('Content-Type: text/html; charset=UTF-8');
require_once("query.class.php");

abstract class Base
{
    const TABELA = "";

    public function count($model = null)
    {
        try {
            $conexao = Database::connect();
            $result = $conexao->query("SELECT COUNT(id) FROM " . static::TABELA);
            $row = $result->fetch_row();
            return $row[0];
        } finally {
            Database::disconnect();
        }
    }

    public function getAll()
    {
        try {
            $conexao = Database::connect();
            $result = $conexao->query("SELECT * FROM " . static::TABELA);
            return $result;
        } finally {
            Database::disconnect();
        }
    }

    public function getPaginated(int $limit = 20, int $offset = 0, $model = null)
    {
        try {
            $conexao = Database::connect();
            $query = $conexao->prepare("SELECT * FROM " . static::TABELA . " LIMIT ? OFFSET ?");
            $query->bind_param("ii", $limit, $offset);
            $query->execute();
            $result = $query->get_result();

            return $result;
        } finally {
            Database::disconnect();
        }
    }

    public function get(int $id)
    {
        try {
            $conexao = Database::connect();
            $query = $conexao->prepare("SELECT * FROM " . static::TABELA . " WHERE id = ?");
            $query->bind_param("i", $id);
            $query->execute();
            $result = $query->get_result();
            $fetch = $result->fetch_assoc();
            return $fetch;
        } finally {
            Database::disconnect();
        }
    }

    public function delete(int $id)
    {
        try {
            $conexao = Database::connect();
            $query = $conexao->prepare("DELETE FROM " . static::TABELA . " WHERE id = ?");
            $query->bind_param("i", $id);
            $comando = $query->execute() == TRUE;
            return $comando;
        } finally {
            Database::disconnect();
        }
    }

    protected function setUser(Query $query, int $idUsuario)
    {
        $query->sql .= " WHERE idUsuario = ?";
        $query->types .= "i";
        array_push($query->params, $idUsuario);
    }

    protected function setOrder(Query $query)
    {
        $query->sql .= " ORDER BY id";
    }

    protected function setPagination(Query $query, int $limit, int $offset)
    {
        $query->sql .= " DESC LIMIT ? OFFSET ?";
        $query->types .= "ii";
        array_push($query->params, $limit, $offset);
    }
}
