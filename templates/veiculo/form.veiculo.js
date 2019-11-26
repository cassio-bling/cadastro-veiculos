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

function validField(fieldName) {
    var field = document.getElementById(fieldName);
    if (!field.value) {
        field.classList.add("error");
        setTimeout(function() {
            field.classList.remove("error");
        }, 300);
        return false;
    } else {
        return true;
    }
}

$(document).ready(function() {
    $(".placa").mask("SSS-9999", {
        "translation": {
            S: {
                pattern: /[A-Za-z]/,
                recursive: true
            }
        },
        onKeyPress: function(value, event) {
            event.currentTarget.value = value.toUpperCase();
        },
    });

    $('.dinheiro').mask("#.##0,00", {
        reverse: true
    });

    $('.renavam').mask("00000000000", {
        reverse: true
    });

    $('.km').mask("000000", {
        reverse: true
    });

    $('.ano').mask("0000", {
        "translation": {
            0: {
                pattern: /(0-9])/,
            },
        },
    });

    $('.yearpicker').yearpicker({
        year: null,
        startYear: 1920,
        endYear: 2099,
        // }).on('input', function(event) {
        //     this.value = RegExp(/(19[0-8][0-9]|199[0-9]|20[0-8][0-9]|209[0-9])/, this.value);
    });
});