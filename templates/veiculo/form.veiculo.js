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
    console.log(allValid);
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
        }
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

    $('.ano').mask("X00", {
        // "translation": {
        //     ZZZZ: {
        //         pattern: /^(?:19(?:2[0-9])|20[0-9][0-9])$/,
        //         recursive: true
        //     },
        // }
        translation: {
            // SSSS: {
            //     pattern: /"^([0-1]|1[0-2])$"/,
            //     recursive: false
            // },
            X: {
                pattern: /([1~9]|[2~0])/,
                recursive: false
            },
            S: {
                pattern: /[09]/,
                recursive: true
            }
        }
    });

    $('.yearpicker').yearpicker({
        startYear: 1900,
        endYear: 2099,
        year: null,
    });

});