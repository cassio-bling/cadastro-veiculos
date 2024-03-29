<!DOCTYPE html>
<html lang="pt-br">

<head>
    <script src=<?php echo WEBROOT . "templates/veiculo/form.veiculo.js" ?>></script>
</head>

<body>
    <?php include ROOT . "templates/layouts/login.php"; ?>
    <form method="post" id="form">
        <?php include ROOT . "templates/layouts/menu.php"; ?>
        <div>
            <p>
                <label>Cadastro de veículos</label>
                <label class="label-right">Total de registros: <?php echo $count ?></label>
            </p>
        </div>
        <div>
            <button type="button" class="collapsible" name="botaoFiltros">
                <label class="label-filter">Filtros</label>
            </button>
            <div class="content">
                <span class="block-half">
                    <label for="descricao">Descrição</label>
                    <input class="filtro" type="text" id="filtro_descricao" name="filtro_descricao" maxlength="60" placeholder="Descrição do veículo">
                </span>
                <span class="block-quarter">
                    <label for="marca">Marca</label>
                    <select id="filtro_marca" name="filtro_marca" class="filtro select-css">
                        <option disabled selected value> -- marca -- </option>
                        <option value=""></option>
                        <option value="Citroen">Citroen</option>
                        <option value="Chevrolet">Chevrolet</option>
                        <option value="Fiat">Fiat</option>
                        <option value="Ford">Ford</option>
                        <option value="Honda">Honda</option>
                        <option value="Renault">Renault</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Volkswagen">Volkswagen</option>
                    </select>
                </span>
                <span class="block-full">
                    <label class="page-header">Componentes adicionais</label>
                    <hr>
                    <div>
                        <div>
                            <?php foreach ($componentes as $componente) : ?>
                                <span class="block-quarter">
                                    <input type="checkbox" class="filtro-checkbox" name="filtroComponentes[]" id=<?php echo "filtroComponente:" . $componente["id"]; ?> value=<?php echo $componente["id"] ?>>
                                    <label class="label-checkbox" for=<?php echo "filtroComponente:" . $componente["id"]; ?>><?php echo $componente["descricao"]; ?></label>
                                </span>
                            <?php endforeach ?>
                        </div>
                    </div>
                </span>
                <span class="block-quarter">
                    <input type="submit" class="filter" value="Filtrar" id="filter" name="filter" onclick="return saveFilters()">
                    <input type="submit" class="clear" value="Limpar" id="filter" name="filter" onclick="return cleanFilters()">
                </span>
            </div>
        </div>

        <table id="lista_veiculos" class="table table-striped">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th class="action">
                        <input type="button" class="insert" value="Incluir" onclick="window.location.href = 'create'">
                        <input type="button" class="report" value="Relatório" onclick="window.location.href = 'report'">
                    </th>
                </tr>
            </thead>
            <tbody></tbody>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td width="40%"><?php echo $row["descricao"] ?></td>
                    <td width="15%"><?php echo $row["placa"] ?></td>
                    <td width="15%"><?php echo $row["marca"] ?></td>
                    <td width="20%">
                        <input type="button" class="edit" value="Editar" onclick="window.location.href = 'edit/<?php echo $row['id'] ?>'">
                        <a href="delete/<?php echo $row['id'] ?>" onclick="return confirmDelete()">
                            <input type="button" class="delete" value="Excluir">
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
        <?php include ROOT . "templates/layouts/pagination.php"; ?>
    </form>
</body>

<script>
    getFilters();
</script>