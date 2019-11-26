<head>
    <link rel="stylesheet" type="text/css" href=<?php echo WEBROOT . "styles/style.css" ?>>
</head>

<body>
    <form class="grid" method="post">
        <h1>Cadastro de veículos</h1>
        <div class="row col-md-12 centered">
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
                <?php foreach ($veiculos as $veiculo) : ?>
                    <tr>
                        <td width="40%"><?php echo $veiculo["descricao"] ?></td>
                        <td width="15%"><?php echo $veiculo["placa"] ?></td>
                        <td width="15%"><?php echo $veiculo["marca"] ?></td>
                        <td width="20%" class='text-center'>
                            <input type="button" class="edit" value="Editar" onclick="window.location.href = 'veiculo/edit/<?php echo $veiculo['id'] ?>'">
                            <input type="button" class="delete" value="Excluir" onclick="window.location.href = 'veiculo/delete/<?php echo $veiculo['id'] ?>'">
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
            <p>
            <input type="submit" class="pagination" value="<<" id="first" name="first">
            <input type="submit" class="pagination" value="<" id="prior" name="prior">
            <input type="submit" class="pagination" value=">" id="next" name="next">
            <input type="submit" class="pagination" value=">>" id="last" name="last">
            <input type="text" value="<?php echo $offset;?>" id="offset" name="offset">
        </div>
    </form>
</body>