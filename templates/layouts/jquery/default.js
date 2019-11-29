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

    $('.collapsible').ready(function() {
        var coll = document.getElementsByClassName("collapsible");

        for (var i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    });

});

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

    var coll = document.getElementsByClassName("collapsible");

    for (var i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
}


function confirmDelete() {
    return confirm("Confirmar exclusão do registro?");
}

function cleanFilters() {
    var coll = document.getElementsByClassName("filtro");

    for (var i = 0; i < coll.length; i++) {
        coll[i].value = "";
    };
}