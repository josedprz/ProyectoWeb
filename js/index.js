$(document).ready(() => {
    // Se inicia ocultando los recuadros de log-in y mostrando los botones
    $('.buttons').show();
    $('.err_cred').hide();
    $('#formulario').hide();
    $('#form_recupera').hide();
    // Click en Regresar y se oculta el formulario
    $('.back').click(() => {
        $('.buttons').show();
        $('#formulario').hide();
        $('#form_recupera').hide();
    });
    // Click en Administrados y se muestra el formulario
    $('#adminbtn').click(() => {
        $('.buttons').hide();
        $('#formulario').show();
    });
    // Click en Recuperar y se muestra el formulario
    $('.btnpdf').click(() => {
        $('.buttons').hide();
        $('#form_recupera').show();
    });
    // Click en Ingresar y se inicia sesión con Ajax
    $('#login').click(() => {
        if ($('#usuario').val() === 'root' && $('#contra').val() === 'root') {
            $.post('php/sesiones.php', {usuario : 'root'}, function (response) {
                alert(response);
                window.location.href = 'index.php';
            })
        // Si los datos son incorrectos se muestra mensaje de error
        }else{
            $('.err_cred').show();
        }
    });
    // Click en Recuperar y se mandan datos a la generación del PDF
    $('#recuperar').click((e) => {
        e.preventDefault();
        let boleta = $('#boleta').val();
        let curp = $('#curp').val();
        $.post('recupera.php', {boleta : boleta, curp : curp}, function (response) {
            if (response == 'Error') {
                alert('No se encontró el registro');
            }else{
                $('#form_recupera').submit();
            }
        })
    });
    // Botón de Cerrar Sesión que manda al mismo archivo pero cambio de usuario
    $('.btnsalir').click(() => {
        $.post('php/sesiones.php', {usuario : 'alumno'}, function (response) {
            alert(response);
            window.location.href = 'index.php';
        })
    });
});
