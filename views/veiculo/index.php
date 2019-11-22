<h1>Veículos</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
            <a href="veiculo/create" class="btn btn-primary btn-xs pull-right">Incluir</a>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Placa</th>
                <th>Marca</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <?php foreach ($veiculos as $veiculo) : ?>
            <tr>
                <td><?php echo $veiculo["id"] ?></td>
                <td><?php echo $veiculo["descricao"] ?></td>
                <td><?php echo $veiculo["placa"] ?></td>
                <td><?php echo $veiculo["marca"] ?></td>
                <td class='text-center'>
                    <a href='veiculo/edit/<?php echo $veiculo["id"] ?>' class='btn btn-info btn-xs'>
                        <span class='glyphicon glyphicon-edit'></span>Alterar</a>
                    <a href='veiculo/delete/<?php echo $veiculo["id"] ?>' class='btn btn-danger btn-xs'>
                        <span class='glyphicon glyphicon-remove'></span>Excluir</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>