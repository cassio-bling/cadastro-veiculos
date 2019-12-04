<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Inclusão de veículos</title>
    <!-- <script src=<?php echo WEBROOT . "templates/veiculo/form.veiculo.js" ?>></script> -->
</head>

<body>
    <?php include(ROOT . "templates/layouts/login.php"); ?>
    <form name="veiculo" method="post" action="" id="form">
        <?php include(ROOT . "templates/layouts/menu.php"); ?>
        <div class="cadastro">
            <h3 class="page-header">Dados cadastrais</h3>
            <hr>
            <div hidden>
                <input hidden type="text" id="id" name="id" value="<?php if (isset($veiculo["id"])) echo $veiculo["id"]; ?>">
            </div>
            <div>
                <span class="block-half">
                    <label for="descricao">Descrição</label>
                    <input type="text" id="descricao" required maxlength="60" placeholder="Descrição do veículo" name="descricao" value="<?php if (isset($veiculo["descricao"])) echo $veiculo["descricao"]; ?>">
                </span>
                <span class="block-quarter">
                    <label for="placa">Placa</label>
                    <input type="text" class="placa" id="placa" required placeholder="Placa do veículo" name="placa" value="<?php if (isset($veiculo["placa"])) echo $veiculo["placa"]; ?>">
                </span>
                <span class="block-quarter">
                    <label for="codigoRenavam">Código RENAVAM</label>
                    <input type="text" class="renavam" id="codigoRenavam" required placeholder="RENAVAM do veículo" name="codigoRenavam" value="<?php if (isset($veiculo["codigoRenavam"])) echo $veiculo["codigoRenavam"]; ?>">
                </span>
            </div>
            <div class="row">
                <span class="block-small">
                    <label for="anoModelo">Ano modelo</label>
                    <input type="number" class="yearpicker" maxlength="4" min="1920" max="2099" autocomplete="off" placeholder="Ano do modelo" id="anoModelo" name="anoModelo" required value="<?php if (isset($veiculo["anoModelo"])) echo $veiculo["anoModelo"]; ?>">
                </span>

                <span class="block-small">
                    <label for="anoFabricacao">Ano fabricação</label>
                    <input type="number" class="yearpicker" maxlength="4" min="1920" max="2099" autocomplete="off" placeholder="Fabricação" id="anoFabricacao" name="anoFabricacao" required value="<?php if (isset($veiculo["anoFabricacao"])) echo $veiculo["anoFabricacao"]; ?>">
                </span>

                <span class="block-quarter">
                    <label for="cor">Cor</label>
                    <input type="text" id="cor" required maxlength="20" placeholder="Cor do veículo" name="cor" value="<?php if (isset($veiculo["cor"])) echo $veiculo["cor"]; ?>">
                </span>

                <span class="block-tiny">
                    <label for="km">KM</label>
                    <input type="text" id="km" class="km" required placeholder="KM" name="km" value="<?php if (isset($veiculo["km"])) echo $veiculo["km"]; ?>">
                </span>

                <span class="block-quarter">
                    <label for="marca">Marca</label>
                    <select id="marca" name="marca" required class="select-css">
                        <option disabled selected value> -- marca -- </option>
                        <option value="Citroen" <?php if (isset($veiculo["marca"]) && $veiculo["marca"] == "Citroen") echo "selected"; ?>>Citroen</option>
                        <option value="Chevrolet" <?php if (isset($veiculo["marca"]) && $veiculo["marca"] == "Chevrolet") echo "selected"; ?>>Chevrolet</option>
                        <option value="Fiat" <?php if (isset($veiculo["marca"]) && $veiculo["marca"] == "Fiat") echo "selected"; ?>>Fiat</option>
                        <option value="Ford" <?php if (isset($veiculo["marca"]) && $veiculo["marca"] == "Ford") echo "selected"; ?>>Ford</option>
                        <option value="Honda" <?php if (isset($veiculo["marca"]) && $veiculo["marca"] == "Honda") echo "selected"; ?>>Honda</option>
                        <option value="Renault" <?php if (isset($veiculo["marca"]) && $veiculo["marca"] == "Renault") echo "selected"; ?>>Renault</option>
                        <option value="Toyota" <?php if (isset($veiculo["marca"]) && $veiculo["marca"] == "Toyota") echo "selected"; ?>>Toyota</option>
                        <option value="Volkswagen" <?php if (isset($veiculo["marca"]) && $veiculo["marca"] == "Volkswagen") echo "selected"; ?>>Volkswagen</option>
                    </select>
                </span>
            </div>

            <div>
                <span class="block-quarter">
                    <label for="preco">Preço</label>
                    <input type="text" class="dinheiro" name="preco" id="preco" required placeholder="R$" maxlength="10" value="<?php if (isset($veiculo["preco"])) echo $veiculo["preco"]; ?>">
                </span>
                <span class="block-quarter">
                    <label for="precoFipe">Preço FIPE</label>
                    <input type="text" class="dinheiro" name="precoFipe" id="precoFipe" required placeholder="R$" maxlength="10" value="<?php if (isset($veiculo["precoFipe"])) echo $veiculo["precoFipe"]; ?>">
                </span>
            </div>

            <h3 class="page-header">Componentes adicionais</h3>
            <hr>
            <div>
                <div>
                    <?php foreach ($componentes as $componente) : ?>
                        <span class="block-quarter">
                            <input type="checkbox" name="componentes[]" id=<?php echo "componente:" . $componente["id"]; ?> <?php echo (isset($componente["checked"]) && $componente["checked"] == 1) ? "checked" : ""; ?> value=<?php echo $componente["id"] ?>>
                            <label class="label-checkbox" for=<?php echo "componente:" . $componente["id"]; ?>><?php echo $componente["descricao"]; ?></label>
                        </span>
                    <?php endforeach ?>
                </div>
            </div>
            <hr>

            <div>
                <span class="block-half">
                    <input type="submit" class="save" value="Salvar" name="save" onclick="validateForm()">
                    <input type="button" class="cancel" value="Cancelar" name="cancel" formnovalidate onclick="redirect()">
                    <!-- <input type="button" class="cancel" value="Cancelar" name="cancel" formnovalidate onclick="window.location.href = '<?php echo WEBROOT . 'veiculo/index';?>'"> -->
                </span>
            </div>
        </div>
    </form>
</body>

</html>