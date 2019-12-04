function create() {
    refresh();
    return 'create';
}

// function report() {
//     form = document.getElementById("form");
//     // document.getElementById("filtro_marca").submit();
//     form.setAttribute('filtro_marca', 'Ford');
//     // form.setAttribute('action', 'someURL');
//     //refresh();
//     //form.submit();
//     return '';
// }

function redirect() {
    return "window.location.href = '<?php echo WEBROOT . 'veiculo/index';?>'";
}

function load() {
    document.getElementById("descricao").value = "<?php if (isset($veiculo['id'])) echo $veiculo['id']; ?>";
}