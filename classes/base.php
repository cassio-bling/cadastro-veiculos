<?php
header('Content-Type: text/html; charset=UTF-8');
abstract class Base
{
    const TABELA = "";

    public function count()
    {
        $conexao = Database::connect();
        $result = $conexao->query("SELECT COUNT(id) FROM " . static::TABELA);
        $row = $result->fetch_row();
        
        Database::disconnect();
        return $row[0];
    }

    public function getAll()
    {
        $conexao = Database::connect();
        $result = $conexao->query("SELECT * FROM " . static::TABELA);
        Database::disconnect();
        return $result;    
    }

    public function getAllPaginated(int $limit = 20, int $offset = 0)
    {
        $conexao = Database::connect();
        $query = $conexao->prepare("SELECT * FROM " . static::TABELA . " LIMIT ? OFFSET ?");
        $query->bind_param("ii", $limit, $offset);
        $query->execute();
        $result = $query->get_result();
        // $fetch = $result->fetch_assoc();
        Database::disconnect();
        // return $fetch;
        return $result;
    }

    public function get(int $id)
    {
        $conexao = Database::connect();
        $query = $conexao->prepare("SELECT * FROM " . static::TABELA . " WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        $fetch = $result->fetch_assoc();
        Database::disconnect();
        return $fetch;
    }

    public function delete(int $id)
    {
        $conexao = Database::connect();
        $query = $conexao->prepare("DELETE FROM " . static::TABELA . " WHERE id = ?");
        $query->bind_param("i", $id);
        $comando = $query->execute() == TRUE;
        Database::disconnect();
        return $comando;
    }
}
