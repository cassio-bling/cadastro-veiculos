<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Inclusão de veículos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
</head>


<body>
    <h3 class="page-header">Veículo - Dados cadastrais</h3>
    <form method='post' action=''>

        <div class="row">
            <div class="form-group col-md-1" <?php if (!isset($veiculo["id"])) echo "hidden" ?> >
                <label for="descricao">Id</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php if (isset($veiculo["id"])) echo $veiculo["id"]; ?>">
            </div>    
        
            <div class="form-group col-md-4">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" maxlength="60" placeholder="Descrição do veículo" name="descricao" value="<?php if (isset($veiculo["descricao"])) echo $veiculo["descricao"]; ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="placa">Placa</label>
                <input type="text" class="form-control placa" id="placa" placeholder="Placa do veículo" name="placa" value="<?php if (isset($veiculo["placa"])) echo $veiculo["placa"]; ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="codigoRenavan">Código RENAVAN</label>
                <input type="text" class="form-control renavan" id="codigoRenavan" placeholder="RENAVAN do veículo" name="codigoRenavam" value="<?php if (isset($veiculo["codigoRenavam"])) echo $veiculo["codigoRenavam"]; ?>">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-2">
                <label for="anoModelo">Ano modelo</label>
                <div class="input-group date datepicker" data-provide="datepicker"  style="top: -3px;">
                    <input type="text" class="form-control" placeholder="Ano do modelo" id="anoModelo" name="anoModelo" value="<?php if (isset($veiculo["anoModelo"])) echo $veiculo["anoModelo"]; ?>">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-2">
                <label for="anoFabricacao">Ano fabricação</label>
                <div class="input-group date datepicker" data-provide="datepicker"  style="top: -3px;">
                    <input type="text" class="form-control" placeholder="Fabricação" id="anoFabricacao" name="anoFabricacao" value="<?php if (isset($veiculo["anoFabricacao"])) echo $veiculo["anoFabricacao"]; ?>">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-2">
                <label for="cor">Cor</label>
                <input type="text" class="form-control" id="cor" maxlength="20" placeholder="Cor do veículo" name="cor" value="<?php if (isset($veiculo["cor"])) echo $veiculo["cor"]; ?>">
            </div>

            <div class="form-group col-md-1">
                <label for="km">KM</label>
                <input type="text" class="form-control km" id="km" placeholder="KM" name="km" value="<?php if (isset($veiculo["km"])) echo $veiculo["km"]; ?>">
            </div>

            <div class="form-group col-md-2">
                <label for="marca">Marca</label>
                <select class="form-control" id="marca" name="marca">
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
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-2">
                <label for="preco">Preço</label>
                <input name="preco" class="form-control dinheiro" placeholder="R$" maxlength="13" value="<?php if (isset($veiculo["preco"])) echo $veiculo["preco"]; ?>">
            </div>

            <div class="form-group col-md-2">
                <label for="precoFipe">Preço FIPE</label>
                <input name="precoFipe" class="form-control dinheiro" placeholder="R$" maxlength="13" value="<?php if (isset($veiculo["precoFipe"])) echo $veiculo["precoFipe"]; ?>">
            </div>

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
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="../../" class="btn btn-default">Cancelar</a>
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