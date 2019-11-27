<?php

class VeiculoComponente extends Base
{
    public function get(int $id_veiculo)
    {
        try {
            $conexao = Database::connect();

            $sql = "SELECT A.id, A.descricao, CASE WHEN B.id_componente IS NOT NULL THEN 1 ELSE 0 END AS checked
            FROM componente AS A
            LEFT JOIN veiculo_componente AS B ON A.id = B.id_componente AND B.id_veiculo = ?
            ORDER BY A.id";

            $query = $conexao->prepare($sql);
            $query->bind_param("i", $id_veiculo);
            $query->execute();
            $result = $query->get_result();

            return $result;
        } finally {
            Database::disconnect();
        }
    }

    public function update(int $id_veiculo, $componentes)
    {
        try {
            $conexao = Database::connect();

            $in = str_repeat("?,", count($componentes) - 1) . "?";
            $types = str_repeat("i", count($componentes));

            $sql = "DELETE FROM veiculo_componente WHERE id_veiculo = ? AND id_componente NOT IN ($in)";
            $query = $conexao->prepare($sql);
            $query->bind_param("i" . $types, $id_veiculo, ...$componentes);
            $query->execute();

            $sql = "INSERT IGNORE INTO veiculo_componente (id_veiculo, id_componente) SELECT ?, id FROM componente WHERE id IN ($in)";
            $query = $conexao->prepare($sql);
            $query->bind_param("i" . $types, $id_veiculo, ...$componentes);
            $query->execute();
        } finally {
            Database::disconnect();
        }
    }

    public function delete(int $id_veiculo)
    {
        try {
            $conexao = Database::connect();
            $query = $conexao->prepare("DELETE FROM veiculo_componente WHERE id_veiculo = ?");
            $query->bind_param("i", $id_veiculo);
            $query->execute();
            $query->error;
        } finally {
            Database::disconnect();
        }
    }
}
