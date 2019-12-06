<?php

require_once ROOT . "classes/veiculo.class.php";
require_once ROOT . "classes/componente.class.php";
require_once ROOT . "classes/veiculo_componente.class.php";
require_once ROOT . "models/veiculo.model.php";
require_once ROOT . "templates/layouts/session.php";

class VeiculoController extends Controller
{
    const LIMIT = 10;

    public function index()
    {
        if (!isset($_SESSION["filtros"]) || isset($_POST["filter"])) {
            $this->setFilters();
        }

        $veiculo = new Veiculo();
        $_SESSION["count"] = $veiculo->count($_SESSION["filtros"]);
        $this->managePagination($_SESSION["count"]);
        $d["data"] = $veiculo->getPaginated(self::LIMIT, $this->offset, $_SESSION["filtros"]);

        $componente = new Componente();
        $d["componentes"] = $componente->getAll();

        $this->set($d);
        $this->render("index");
    }

    public function create()
    {
        if (isset($_POST["save"])) {
            $veiculo = new Veiculo();
            $id = $veiculo->insert($this->map());
            if (!is_null($id)) {
                if (isset($_POST["componentes"])) {
                    $veiculo_componente = new VeiculoComponente();
                    $veiculo_componente->update($id, $_POST["componentes"]);
                }

                $this->redirect();
            }

            /*TODO: tratar falha do insert*/
        } else {
            $componente = new Componente();
            $d["componentes"] = $componente->getAll();
            $this->set($d);
            $this->render("form.veiculo");
        }
    }

    public function edit($id)
    {
        if (isset($_POST["save"])) {
            $veiculo = new Veiculo();

            if ($veiculo->update($this->map())) {
                $veiculo_componente = new VeiculoComponente();
                if (isset($_POST["componentes"])) {
                    $veiculo_componente->update($id, $_POST["componentes"]);
                } else {
                    $veiculo_componente->delete($id);
                }

                $this->redirect();
            }
        } else {
            $veiculo = new Veiculo();
            $d["veiculo"] = $veiculo->get($id);
            $veiculo_componente = new VeiculoComponente();
            $d["componentes"] = $veiculo_componente->get($id);
            $this->set($d);
            $this->render("form.veiculo");
        }
    }

    public function delete($id)
    {
        $veiculo_componente = new VeiculoComponente();
        $veiculo_componente->delete($id);

        $veiculo = new Veiculo();
        if ($veiculo->delete($id)) {
            $this->redirect();
        }
    }

    public function report()
    {
        $veiculo = new Veiculo();
        $d["veiculos"] = $veiculo->getPaginated(PHP_INT_MAX, 0, $_SESSION["filtros"], true);
        $this->set($d);
        $this->render("report.veiculo");
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
        $model->setIdUsuario($_SESSION["idUsuario"]);

        if (isset($_POST["componentes"]))
            $model->setComponentes($_POST["componentes"]);

        return $model;
    }

    private function redirect()
    {
        return header("Location: " . WEBROOT . "veiculo/index");
    }

    private function setFilters()
    {
        $model = new VeiculoModel();

        if (isset($_POST["filtro_descricao"]) && !empty(trim($_POST["filtro_descricao"]))) {
            $model->setDescricao($_POST["filtro_descricao"]);
        }

        if (isset($_POST["filtro_marca"])) {
            $model->setMarca($_POST["filtro_marca"]);
        }

        $model->setIdUsuario($_SESSION["idUsuario"]);
        if (isset($_POST["filtroComponentes"])) {
            $model->setComponentes($_POST["filtroComponentes"]);
            $_SESSION["filtro_componentes"] = $_POST["filtroComponentes"];
        } else {
            $_SESSION["filtro_componentes"] = null;
        }

        $_SESSION["filtros"] = $model;
    }
}
