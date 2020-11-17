function comprobarEmail() {
    jQuery.ajax({
        url: "disponibilidad.php",
        data: 'email=' + $("#email").val(),
        type: "POST",
        success: function (data) {
            $("#estadoemail").html(data);
        },
        error: function () {}
    });
}

function comprobarUsuario() {
    jQuery.ajax({
        url: "disponibilidad.php",
        data: 'user=' + $("#user").val(),
        type: "POST",
        success: function (data) {
            $("#estadouser").html(data);
        },
        error: function () {}
    });
}
