<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Inclusão de veículos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../../styles/style.css?123">
</head>

<body>
    <!-- <form>                
        <ul class="form-style-1">
            <li>
                <input type="button" value="Submit" />
            </li>
        </ul>
    </form> -->

    <form method="post" action="">
        <h3 class="page-header">Veículo - Dados cadastrais</h3>

        <div>
            <!-- <div class="input-container" <?php if (!isset($veiculo["id"])) echo "hidden" ?>>
                <label for="descricao">Id</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php if (isset($veiculo["id"])) echo $veiculo["id"]; ?>">
            </div> -->
            <span class="block-half">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" maxlength="60" placeholder="Descrição do veículo" name="descricao" value="<?php if (isset($veiculo["descricao"])) echo $veiculo["descricao"]; ?>">
            </span>
            <span class="block-half">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" maxlength="60" placeholder="Descrição do veículo" name="descricao" value="<?php if (isset($veiculo["descricao"])) echo $veiculo["descricao"]; ?>">
            </span>
            <span class="block-quarter">
                <label for="placa">Placa</label>
                <input type="text" class="form-control placa" id="placa" placeholder="Placa do veículo" name="placa" value="<?php if (isset($veiculo["placa"])) echo $veiculo["placa"]; ?>">
            </span>
            <span class="block-quarter">
                <label for="codigoRenavan">Código RENAVAN</label>
                <input type="text" class="form-control renavan" id="codigoRenavan" placeholder="RENAVAN do veículo" name="codigoRenavam" value="<?php if (isset($veiculo["codigoRenavam"])) echo $veiculo["codigoRenavam"]; ?>">
            </span>
        </div>
        <div>
            <span class="block-full">
                <label for="codigoRenavan">Código RENAVAN</label>
                <input type="text" class="form-control renavan" id="codigoRenavan" placeholder="RENAVAN do veículo" name="codigoRenavam" value="<?php if (isset($veiculo["codigoRenavam"])) echo $veiculo["codigoRenavam"]; ?>">
            </span>
        </div>
        <div class="row">
            <span class="block-quarter">
                <label for="anoModelo">Ano modelo</label>
                <input type="text" placeholder="Ano do modelo" id="anoModelo" name="anoModelo" value="<?php if (isset($veiculo["anoModelo"])) echo $veiculo["anoModelo"]; ?>">
                <!-- <div class="input-group date datepicker" data-provide="datepicker" style="top: -3px;">
                    <input type="text" class="form-control" placeholder="Ano do modelo" id="anoModelo" name="anoModelo" value="<?php if (isset($veiculo["anoModelo"])) echo $veiculo["anoModelo"]; ?>">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div> -->
            </span>

            <span class="block-quarter">
                <label for="anoFabricacao">Ano fabricação</label>
                <input type="text" placeholder="Fabricação" id="anoFabricacao" name="anoFabricacao" value="<?php if (isset($veiculo["anoFabricacao"])) echo $veiculo["anoFabricacao"]; ?>">
                <!-- <div class="input-group date datepicker" data-provide="datepicker" style="top: -3px;">
                    <input type="text" class="form-control" placeholder="Fabricação" id="anoFabricacao" name="anoFabricacao" value="<?php if (isset($veiculo["anoFabricacao"])) echo $veiculo["anoFabricacao"]; ?>">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div> -->
            </span>

            <!-- <span class="block-half-quarter">
                <label for="cor">Cor</label>
                <input type="text" class="form-control" id="cor" maxlength="20" placeholder="Cor do veículo" name="cor" value="<?php if (isset($veiculo["cor"])) echo $veiculo["cor"]; ?>">
            </span>

            <span class="block-half-quarter">
                <label for="km">KM</label>
                <input type="text" class="form-control km" id="km" placeholder="KM" name="km" value="<?php if (isset($veiculo["km"])) echo $veiculo["km"]; ?>">
            </span> -->

            <span class="block-quarter">
                <label for="preco">Preço</label>
                <input type="text" name="preco" placeholder="R$" maxlength="13" value="<?php if (isset($veiculo["preco"])) echo $veiculo["preco"]; ?>">
            </span>

            <span class="block-quarter">
                <label for="marca">Marca</label>
                <select id="marca" name="marca">
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
                <input type="text" name="preco" placeholder="R$" maxlength="13" value="<?php if (isset($veiculo["preco"])) echo $veiculo["preco"]; ?>">
            </span>

            <span class="block-quarter">
                <label for="precoFipe">Preço FIPE</label>
                <input type="text" name="precoFipe" placeholder="R$" maxlength="13" value="<?php if (isset($veiculo["precoFipe"])) echo $veiculo["precoFipe"]; ?>">
            </span>

            <span class="block-quarter">
                <label for="precoFipe">Preço FIPE</label>
                <input type="text" name="precoFipe" placeholder="R$" maxlength="13" value="<?php if (isset($veiculo["precoFipe"])) echo $veiculo["precoFipe"]; ?>">
            </span>

            <span class="block-quarter">
                <label for="precoFipe">Preço FIPE</label>
                <input type="text" name="precoFipe" placeholder="R$" maxlength="13" value="<?php if (isset($veiculo["precoFipe"])) echo $veiculo["precoFipe"]; ?>">
            </span>

        </div>

        <div>
            <span class="block-full">
                <label for="codigoRenavan">Código RENAVAN</label>
                <input type="text" class="form-control renavan" id="codigoRenavan" placeholder="RENAVAN do veículo" name="codigoRenavam" value="<?php if (isset($veiculo["codigoRenavam"])) echo $veiculo["codigoRenavam"]; ?>">
            </span>
        </div>

        <h3 class="page-header">Componentes adicionais</h3>

        <div class="row">
            <div class="form-group col-md-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="arCondicionado">
                    <label class="custom-control-label" for="arCondicionado">Ar condicionados</label>
                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="airBag">
                    <label class="custom-control-label" for="airBag">Air Bag</label>
                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="cdPlayer">
                    <label class="custom-control-label" for="cdPlayer">CD Player</label>
                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="direcaoHidraulica">
                    <label class="custom-control-label" for="direcaoHidraulica">Direção hidráulica</label>
                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="vidroEletrico">
                    <label class="custom-control-label" for="vidroEletrico">Vidro elétrico</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="travaEletrica">
                    <label class="custom-control-label" for="travaEletrica">Trava elétrica</label>
                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="cambioAutomatico">
                    <label class="custom-control-label" for="cambioAutomatico">Cambio automático</label>
                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rodasDeLiga">
                    <label class="custom-control-label" for="rodasDeLiga">Rodas de liga</label>
                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="alarme">
                    <label class="custom-control-label" for="alarme">Alarme</label>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <button type="submit" value="submit" name="submit" class="btn btn-primary">Salvar</button>
                <button type="cancel" value="cancel" name="cancel" class="btn btn-secondary">Cancelar</button>
            </div>
        </div>
    </form>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.mask.js"></script>

    <script language="javascript">
        $(".datepicker").datepicker({
            format: "yyyy",
            startView: 2,
            minViewMode: 2,
            maxViewMode: 3,
            language: "pt-BR",
            autoclose: true
        });

        $(document).ready(function() {
            $(".placa").mask("SSS-9999", {
                "translation": {
                    S: {
                        pattern: /[A-Za-z ]/,
                        recursive: true
                    }
                },
                onKeyPress: function(value, event) {
                    event.currentTarget.value = value.toUpperCase();
                }
            });

            $('.dinheiro').mask("#.##0,00", {
                reverse: true
            });

            $('.renavan').mask("00000000000", {
                reverse: true
            });

            $('.km').mask("000000", {
                reverse: true
            });
        });
    </script>

</body>

</html>