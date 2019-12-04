<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Inclusão de usuários</title>
</head>

<body>
    <form name="usuario" method="post" action="" id="form">
        <div class="cadastro">
            <h3 class="page-header">Dados do usuário</h3>
            <hr>
            <div hidden>
                <input hidden type="text" id="id" name="id" value="<?php if (isset($usuario["id"])) echo $usuario["id"]; ?>">
            </div>
            <div>
                <span class="block-half">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" required maxlength="50" autocomplete="off" placeholder="Nome" name="nome" value="<?php if (isset($nome)) echo $nome; ?>">
                </span>
            </div>
            <div class="row">
                <span class="block-half">
                    <label for="email">Email</label>
                    <input type="email" class="email" id="email" required maxlength="100" autocomplete="off" placeholder="Email" name="email" value="<?php if (isset($usuario["email"])) echo $usuario["email"]; ?>">
                </span>
            </div>
            <div>
                <span class="block-quarter">
                    <label for="senha">Senha</label>
                    <input type="password" class="senha" required maxlength="20" id="senha" autocomplete="off" placeholder="Senha" name="senha" value="<?php if (isset($usuario["senha"])) echo $usuario["senha"]; ?>">
                </span>
            </div>
            </p>
            <div>
                <span class="block-half">
                    <input type="submit" class="save" value="Salvar" name="save" onclick="validateForm()">
                    <input type="submit" class="cancel" value="Cancelar" name="cancel" formnovalidate>
                </span>
            </div>
        </div>
    </form>
</body>

</html>