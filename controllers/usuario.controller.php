
<?php
require_once(ROOT . "classes/usuario.class.php");
require_once(ROOT . "models/usuario.model.php");
class UsuarioController extends Controller
{
    function index()
    {
        if (isset($_POST["login"])) {
            $this->login();
        } else {
            $this->render("index");
        }
    }

    function create()
    {
        if (isset($_POST["cancel"])) {
            $this->redirect();
        } else if (isset($_POST["save"])) {
            $usuario = new Usuario();
            if ($usuario->check($_POST["email"]) > 0) {
                $this->phpAlert("Este email já foi utilizado por outro usuário.");
                $d["nome"] = $_POST["nome"];
                $this->set($d);
                $this->render("form.usuario");
            } else {
                $id = $usuario->insert($this->map());
                if (!is_null($id)) {
                    $this->redirect();
                }
            }
        } else {
            $this->render("form.usuario");
        }
    }

    private function login()
    {
        $usuario = new Usuario();
        $login = $usuario->login($_POST["email"], $_POST["senha"]);
        if (!empty($login["nome"])) {
            session_unset();

            session_start();
            $_SESSION["idUsuario"] = $login["id"];
            $_SESSION["nomeUsuario"] = $login["nome"];

            return header("Location: " . WEBROOT . "veiculo/index");
        } else {
            $this->phpAlert("Login informado é incorreto, tente novamente.");
            $this->render("index");
        }
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
