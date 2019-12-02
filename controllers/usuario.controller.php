<?php

require_once(ROOT . "classes/usuario.class.php");
require_once(ROOT . "models/usuario.model.php");
class UsuarioController extends Controller
{
    function index()
    {
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["cancel"])) {
            $this->redirect();
        } else if (isset($_POST["save"])) {
            $usuario = new Usuario();
            $id = $usuario->insert($this->map());
            if (!is_null($id)) {
                $this->redirect();
            }

            /*TODO: tratar falha do insert*/
        } else {
            $this->render("form.usuario");
        }
    }

    function login()
    {
        $this->render("../veiculo");
    }

    private function map()
    {
        $model = new UsuarioModel();

        if (isset($_POST["id"])) {
            $model->setId($_POST["id"]);
        }

        $model->setNome($_POST["nome"]);
        $model->setEmail($_POST["email"]);
        $model->setSenha($_POST["senha"]);
        
        return $model;
    }

    private function redirect()
    {
        return header("Location: " . WEBROOT);
    }
}
