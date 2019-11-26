<?php

require_once(ROOT . "classes/veiculo.class.php");
require_once(ROOT . "models/veiculo.model.php");
class VeiculoController extends Controller
{
    private $limit = 5;
    public $offset = 0;

    function index()
    {
        $veiculo = new Veiculo();
        $count = $veiculo->count();

        if (isset($_POST["first"])) {
            $this->offset = 0;
        } else if (isset($_POST["prior"])) {
            if ($_POST["offset"] > 0) {
                $this->offset = $_POST["offset"] - $this->limit;
            }
            else { 
                $this->offset = $_POST["offset"];
            }
        } else if (isset($_POST["next"])) {
            if ($_POST["offset"] + $this->limit < $count) {
                $this->offset = $_POST["offset"] + $this->limit;
            } else {
                $this->offset = $_POST["offset"];
            }
        } else if (isset($_POST["last"])) {
            
            $this->offset = round(floor($veiculo->count() / $this->limit) * $this->limit);
        }

        $d["veiculos"] = $veiculo->getAllPaginated($this->limit, $this->offset);
        $d["offset"] = $this->offset;
        
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["save"])) {

            $veiculo = new Veiculo();

            if ($veiculo->insert($this->map())) {
                header("Location: " . WEBROOT);
            }
        } else if (isset($_POST["cancel"])) {
            header("Location: " . WEBROOT);
        } else {
            $this->render("form.veiculo");
        }
    }

    function edit($id)
    {
        $veiculo = new Veiculo();

        $d["veiculo"] = $veiculo->get($id);

        if (isset($_POST["save"])) {
            if ($veiculo->update($this->map())) {
                header("Location: " . WEBROOT);
            }
        } else if (isset($_POST["cancel"])) {
            header("Location: " . WEBROOT);
        } else {
            $this->set($d);
            $this->render("form.veiculo");
        }
    }

    function delete($id)
    {
        $veiculo = new Veiculo();
        if ($veiculo->delete($id)) {
            header("Location: " . WEBROOT);
        }
    }

    private function map()
    {
        $model = new VeiculoModel();

        if (isset($_POST["id"])) {
            $model->setId($_POST["id"]);
        }

        $model->setDescricao($_POST["descricao"]);
        $model->setPlaca($_POST["placa"]);
        $model->setCodigoRenavam($_POST["codigoRenavam"]);
        $model->setAnoModelo($_POST["anoModelo"]);
        $model->setAnoFabricacao($_POST["anoFabricacao"]);
        $model->setCor($_POST["cor"]);
        $model->setKm($_POST["km"]);
        $model->setMarca($_POST["marca"]);
        $model->setPreco($_POST["preco"]);
        $model->setPrecoFipe($_POST["precoFipe"]);

        return $model;
    }
}
