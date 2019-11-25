<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Inclusão de veículos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href=<?php echo WEBROOT . "styles/style.css" ?>>
    <link rel="stylesheet" type="text/css" href=<?php echo WEBROOT . "templates/yearpicker/yearpicker.css" ?>>
    <script src=<?php echo WEBROOT . "templates/jquery/jquery.js" ?>></script>
    <script src=<?php echo WEBROOT . "templates/jquery/jquery.mask.js" ?>></script>
    <script src=<?php echo WEBROOT . "templates/veiculo/form.veiculo.js" ?>></script>    
    <script src=<?php echo WEBROOT . "templates/yearpicker/yearpicker.js" ?>></script>    
</head>

<body>
    <form name="veiculo" method="post" action="">
    <input type="text" class="ano" maxlength="4">

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
                <input type="text" class="placa" id="placa" placeholder="Placa do veículo" name="placa" value="<?php if (isset($veiculo["placa"])) echo $veiculo["placa"]; ?>">
            </span>
            <span class="block-quarter">
                <label for="codigoRenavam">Código RENAVAM</label>
                <input type="text" class="renavam" id="codigoRenavam" required placeholder="RENAVAM do veículo" name="codigoRenavam" value="<?php if (isset($veiculo["codigoRenavam"])) echo $veiculo["codigoRenavam"]; ?>">
            </span>
        </div>
        <div class="row">
            <span class="block-small">
                <label for="anoModelo">Ano modelo</label>
                <input type="text" placeholder="Ano do modelo" id="anoModelo" name="anoModelo" required value="<?php if (isset($veiculo["anoModelo"])) echo $veiculo["anoModelo"]; ?>">
                <!-- <div class="input-group date datepicker" data-provide="datepicker" style="top: -3px;">
                    <input type="text" placeholder="Ano do modelo" id="anoModelo" name="anoModelo" value="<?php if (isset($veiculo["anoModelo"])) echo $veiculo["anoModelo"]; ?>">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div> -->
            </span>

            <span class="block-small">
                <label for="anoFabricacao">Ano fabricação</label>
                <input type="text" placeholder="Fabricação" id="anoFabricacao" name="anoFabricacao" required value="<?php if (isset($veiculo["anoFabricacao"])) echo $veiculo["anoFabricacao"]; ?>">
                <!-- <div class="input-group date datepicker" data-provide="datepicker" style="top: -3px;">
                    <input type="text" placeholder="Fabricação" id="anoFabricacao" name="anoFabricacao" value="<?php if (isset($veiculo["anoFabricacao"])) echo $veiculo["anoFabricacao"]; ?>">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div> -->
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
                <input type="text" class="dinheiro" name="preco" id="preco" required placeholder="R$" maxlength="13" value="<?php if (isset($veiculo["preco"])) echo $veiculo["preco"]; ?>">
            </span>
            <span class="block-quarter">
                <label for="precoFipe">Preço FIPE</label>
                <input type="text" class="dinheiro" name="precoFipe" id="precoFipe" required placeholder="R$" maxlength="13" value="<?php if (isset($veiculo["precoFipe"])) echo $veiculo["precoFipe"]; ?>">
            </span>
        </div>

        <h3 class="page-header">Componentes adicionais</h3>
        <hr>
        <div>
            <div>
                <span class="block-quarter">
                    <input type="checkbox" id="arCondicionado">
                    <label class="label-normal" for="arCondicionado">Ar condicionados</label>
                </span>
                <span class="block-quarter">
                    <input type="checkbox" id="airBag">
                    <label class="label-normal" for="airBag">Air Bag</label>
                </span>
                <span class="block-quarter">
                    <input type="checkbox" id="cdPlayer">
                    <label class="label-normal" for="cdPlayer">CD Player</label>
                </span>
                <span class="block-quarter">
                    <input type="checkbox" id="direcaoHidraulica">
                    <label class="label-normal" for="direcaoHidraulica">Direção hidráulica</label>
                </span>
                <span class="block-quarter">
                    <input type="checkbox" id="vidroEletrico">
                    <label class="label-normal" for="vidroEletrico">Vidro elétrico</label>
                </span>
                <span class="block-quarter">
                    <input type="checkbox" id="travaEletrica">
                    <label class="label-normal" for="travaEletrica">Trava elétrica</label>
                </span>
                <span class="block-quarter">
                    <input type="checkbox" id="cambioAutomatico">
                    <label class="label-normal" for="cambioAutomatico">Cambio automático</label>
                </span>
                <span class="block-quarter">
                    <input type="checkbox" id="rodasDeLiga">
                    <label class="label-normal" for="rodasDeLiga">Rodas de liga</label>
                </span>
                <span class="block-quarter">
                    <input type="checkbox" id="alarme">
                    <label class="label-normal" for="alarme">Alarme</label>
                </span>
            </div>
        </div>
        <hr>

        <div>
            <span class="block-half">
                <input type="submit" class="save" value="Salvar" name="save" onclick="validateForm()">
                <input type="submit" class="cancel" value="Cancelar" name="cancel" formnovalidate>
            </span>
        </div>
    </form>
</body>

</html>