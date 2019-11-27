<head>
    <link rel="stylesheet" type="text/css" href=<?php echo WEBROOT . "styles/style.css" ?>>
</head>

<body>
    <form class="grid" method="post">
        <div>
            <span class="block-half">
                <h1>Cadastro de veículos</h1>
            </span>
            <span class="block-half right">
                <label>Total de registros: <?php echo $count ?></label>
            </span>
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
                        <input type="button" class="delete" value="Excluir" onclick="window.location.href = 'veiculo/delete/<?php echo $row['id'] ?>'">
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
        <p>
            <div class="tooltip">
                <input type="submit" class="pagination" value="<<" id="first" name="first">
                <span class="tooltiptext">Primeira página</span>
            </div>
            <input type="submit" class="pagination" value="<" id="prior" name="prior">

            <?php for ($i = 1; $i <= $numberOfPages; $i++) : ?>
                <input type="submit" class=<?php echo ($page == $i) ? "selected-page" : "pagination"; ?> value=<?php echo $i; ?> id="page" name="page">
            <?php endfor ?>

            <input type="submit" class="pagination" value=">" id="next" name="next">
            <input type="submit" class="pagination" value=">>" id="last" name="last">

            <input type="text" hidden value="<?php echo $offset; ?>" id="offset" name="offset">
        </p>
    </form>
</body>