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