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
    });

    $('.collapsible').ready(function() {
        var coll = document.getElementsByClassName("collapsible");

        for (var i = 0; i < coll.length; i++) {
            coll[i].nextElementSibling.style.display = (getCookie(String(coll[i].name)) == "true") ? "block" : "none";
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                    setCookie(this.name, "", -1);
                } else {
                    content.style.display = "block";
                    setCookie(this.name, "true", 1);
                }
            });
        }
    });

    $('.required').ready(function() {
        var col = document.getElementsByClassName("required");

        for (var i = 0; i < col.length; i++) {
            col[i].nextElementSibling.style.display = (getCookie(String(coll[i].name)) == "true") ? "block" : "none";
            col[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                    setCookie(this.name, "", -1);
                } else {
                    content.style.display = "block";
                    setCookie(this.name, "true", 1);
                }
            });
        }
    });
});

function validateForm() {
    var col = document.getElementById("form").querySelectorAll("[required]");
    var valid = true;

    for (var i = 0; i < col.length; i++) {
        valid &= validField(col[i].name);
    }

    return valid;
}

/*
if (valid) {
    alert("Registro criado com sucesso.");
}*/

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

function confirmDelete() {
    return confirm("Confirmar exclusão do registro?");
}

function cleanFilters() {
    var col = document.getElementsByClassName("filtro");

    for (var i = 0; i < col.length; i++) {
        col[i].value = "";
        setCookie(col[i].name, "", -1);
    };
}

function saveFilters() {
    var col = document.getElementsByClassName("filtro");

    for (var i = 0; i < col.length; i++) {
        setCookie(col[i].name, col[i].value, 1);
    };
}

function getFilters() {
    var col = document.getElementsByClassName("filtro");

    for (var i = 0; i < col.length; i++) {
        col[i].value = getCookie(col[i].name);
    };
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function setOffset() {
    setCookie("veiculoOffset", document.getElementById("offset").value, 1);
}

function getOffset() {
    document.getElementById("offset").value = getCookie("veiculoOffset");
}

function refresh() {
    setCookie("refresh", "true", 1);
}

function init() {
    if (getCookie("refresh") == "true") {
        document.getElementById("form").submit();
        setCookie("refresh", "false", 1);
    } else {
        setCookie("refresh", "false", -1);
    }
}