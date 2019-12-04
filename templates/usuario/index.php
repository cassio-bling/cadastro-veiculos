<!DOCTYPE html>
<html lang="pt-br">

<head>
</head>

<body>
    <?php include(ROOT . "templates/layouts/init.php"); ?>
    <form class="grid" method="post" id="form">
        <div align="center">
            <h1>Sistema de veículos</h1>
            <div class="row">
                <span class="block-quarter" align="left">
                    <label for="email">Email</label>
                    <input type="text" id="email" required maxlength="50" placeholder="Email" name="email" autocomplete="off">
                </span>
            </div>
            </p>
            <div class="row">
                <span class="block-quarter" align="left">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" required placeholder="Senha" name="senha" autocomplete="off">
                </span>
            </div>
            </p>
            <div>
                <span class="block-half">
                    <input type="submit" class="login" value="Login" id="login" name="login" onclick="validateForm()">
                    <input type="button" class="signup" value="Cadastrar" onclick="window.location.href = 'usuario/create'">
                </span>
            </div>
        </div>
    </form>
</body>