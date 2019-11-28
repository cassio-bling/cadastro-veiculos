<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include(ROOT . "templates/layouts/head.php"); ?>
    <script src=<?php echo WEBROOT . "templates/veiculo/form.veiculo.js" ?>></script>
</head>

<body>
    <form class="grid" method="post">
        <div>
            <span class="block-half">
                <h1>Cadastro de veículos <? echo $filtro["filtro_marca"] ?></h1>
            </span>
            <span class="block-half right">
                <label>Total de registros: <?php echo $count ?></label>
            </span>
        </div>

        <div>
            <button type="button" class="collapsible">
                <label class="label-filter">Filtros</label>
            </button>
            <div class="content">
                <span class="block-half">
                    <label for="descricao">Descrição</label>
                    <input type="text" id="filtro_descricao" name="filtro_descricao" maxlength="60" placeholder="Descrição do veículo" value="<?php if (isset($veiculo["filtro_descricao"])) echo $veiculo["filtro_descricao"]; ?>">
                </span>
                <span class="block-quarter">
                    <label for="marca">Marca</label>
                    <select id="filtro_marca" name="filtro_marca" class="select-css">
                        <option disabled selected value> -- marca -- </option>
                        <option value="Citroen" <?php if (isset($filtro["filtro_marca"]) && $filtro["filtro_marca"] == "Citroen") echo "selected"; ?>>Citroen</option>
                        <option value="Chevrolet" <?php if (isset($filtro["filtro_marca"]) && $filtro["filtro_marca"] == "Chevrolet") echo "selected"; ?>>Chevrolet</option>
                        <option value="Fiat" <?php if (isset($filtro["filtro_marca"]) && $filtro["filtro_marca"] == "Fiat") echo "selected"; ?>>Fiat</option>
                        <option value="Ford" <?php if (isset($filtro["filtro_marca"]) && $filtro["filtro_marca"] == "Ford") echo "selected"; ?>>Ford</option>
                        <option value="Honda" <?php if (isset($filtro["filtro_marca"]) && $filtro["filtro_marca"] == "Honda") echo "selected"; ?>>Honda</option>
                        <option value="Renault" <?php if (isset($filtro["filtro_marca"]) && $filtro["filtro_marca"] == "Renault") echo "selected"; ?>>Renault</option>
                        <option value="Toyota" <?php if (isset($filtro["filtro_marca"]) && $filtro["filtro_marca"] == "Toyota") echo "selected"; ?>>Toyota</option>
                        <option value="Volkswagen" <?php if (isset($filtro["filtro_marca"]) && $filtro["filtro_marca"] == "Volkswagen") echo "selected"; ?>>Volkswagen</option>
                    </select>
                </span>
                <span class="block-quarter">
                    <input type="submit" class="filter" value="Filtrar" id="filter" name="filter">
                </span>
            </div>
        </div>

        <table class="table table-striped custab">
            <thead>
                <tr>
                    <th class="text-center">Descrição</th>
                    <th class="text-center">Placa</th>
                    <th class="text-center">Marca</th>
                    <th class="action">
                        <input type="button" class="insert" value="Incluir" onclick="window.location.href = 'veiculo/create'">
                    </th>
                </tr>
            </thead>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td width="40%"><?php echo $row["descricao"] ?></td>
                    <td width="15%"><?php echo $row["placa"] ?></td>
                    <td width="15%"><?php echo $row["marca"] ?></td>
                    <td width="20%" class='text-center'>
                        <input type="button" class="edit" value="Editar" onclick="window.location.href = 'veiculo/edit/<?php echo $row['id'] ?>'">
                        <a href="veiculo/delete/<?php echo $row['id'] ?>" onclick="return confirmDelete()">
                            <input type="button" class="delete" value="Excluir">
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
        <?php include(ROOT . "templates/layouts/pagination.php"); ?>
    </form>
</body>