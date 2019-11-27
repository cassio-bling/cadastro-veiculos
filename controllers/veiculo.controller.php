<?php

require_once(ROOT . "classes/veiculo.class.php");
require_once(ROOT . "classes/componente.class.php");
require_once(ROOT . "classes/veiculo_componente.class.php");
require_once(ROOT . "models/veiculo.model.php");
class VeiculoController extends Controller
{
    const LIMIT = 5;

    function index()
    {        
        $veiculo = new Veiculo();
        
        $this->managePagination($veiculo->count());

        $d["data"] = $veiculo->getAllPaginated(self::LIMIT, $this->offset);

        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["cancel"])) {
            $this->redirect();
        }        
        else if (isset($_POST["save"])) {
            $veiculo = new Veiculo();
            if ($veiculo->insert($this->map())) {
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

    function edit($id)
    {
        if (isset($_POST["cancel"])) {
            $this->redirect();
        }
        else if (isset($_POST["save"])) {
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

    function delete($id)
    {
        $veiculo = new Veiculo();
        if ($veiculo->delete($id)) {
            $this->redirect();
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

    private function redirect() {
        return header("Location: " . WEBROOT);
    }
}
