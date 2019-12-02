function validateForm() {
    var allValid =
        validField("descricao") &
        validField("placa") &
        validField("codigoRenavam") &
        validField("anoModelo") &
        validField("anoFabricacao") &
        validField("cor") &
        validField("km") &
        validField("marca") &
        validField("preco") &
        validField("precoFipe");
    return allValid == 1;
}

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