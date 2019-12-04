<?php
class Controller
{
    const LIMIT = 10;
    const FORM_TITLE = "";
    protected $offset = 0;

    var $vars = [];
    var $layout = "default";

    function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }

    function render($filename)
    {
        extract($this->vars);
        ob_start();
        require(ROOT . "templates/" . lcfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.php');
        $content_for_layout = ob_get_clean();

        if ($this->layout == false) {
            $content_for_layout;
        } else {
            require(ROOT . "templates/layouts/" . $this->layout . ".php");
        }
    }

    private function secure_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function secure_form($form)
    {
        foreach ($form as $key => $value) {
            $form[$key] = $this->secure_input($value);
        }
    }

    protected function managePagination(int $count)
    {
        $this->offset = 0;

        if (isset($_POST["page"])) {
            $this->offset = ($_POST["page"] - 1) * static::LIMIT;
        } else if (isset($_POST["prior"])) {
            $this->offset = $_POST["offset"];
            if ($_POST["offset"] > 0) {
                $this->offset -= static::LIMIT;
            }
        } else if (isset($_POST["next"])) {
            $this->offset = $_POST["offset"];
            if ($_POST["offset"] + static::LIMIT < $count) {
                $this->offset += static::LIMIT;
            }
        } else if (isset($_POST["last"])) {
            $this->offset = round(floor($count / static::LIMIT) * static::LIMIT);
            if ($count % static::LIMIT == 0) {
                $this->offset -= static::LIMIT;
            }
            if ($this->offset < 0) {
                $this->offset = 0;
            }
        }

        $d["offset"] = $this->offset;
        $d["count"] = $count;
        $d["numberOfPages"] = ceil($count / static::LIMIT);
        $d["page"] = ceil($this->offset / static::LIMIT) + 1;
        $this->set($d);
    }

    public function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
}
