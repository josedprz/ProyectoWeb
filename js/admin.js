$(document).ready(() => {
        $('.add').hide();
        $('#TablaRegistros').show();
        $('#cancelar').hide();

    $('.otra_discapacidad').hide();
    $('.otra_escuela').hide();
    
    $('#agregar').click(function () {
        $('#TablaRegistros').hide();
        $('.add').show();
        $('#cancelar').show();
        $('#agregar').hide();
        $('#curp').prop('disabled', false);
        $('.barra_buscar').hide();
    });

    $('#cancelar').click(function () {
        $('#TablaRegistros').show();
        $('.add').hide();
        $('#cancelar').hide();
        $('#agregar').show();
        $('.otra_discapacidad').hide();
        $('.otra_escuela').hide();
        $('.barra_buscar').show();
        $('#search').val('');
        listarTodas();
    });

    $('#discapacidad').change(function () {
        if($('#discapacidad').val() == 6){
            $('.otra_discapacidad').show();
        }else{
            $('.otra_discapacidad').hide();
        }
    });

    $('#escuela').change(function () {
        if($('#escuela').val() == 20){
            $('.otra_escuela').show();
        }else{
            $('.otra_escuela').hide();
        }
    });

    listarTodas();

    function listarTodas(){
        $.ajax({
            url : 'php/admin_listar_todos.php',
            type : 'GET',
            success : function(response){
                let registros = JSON.parse(response);
                let template = '';
                let total = 0;
                registros.forEach(registro => {
                    total++;
                    template += `
                                <tr ClaveCurp="${registro.curp}" NombreAlumno="${registro.nombre}" BoletaAlumno="${registro.boleta}">
                                    <th scope="row" class="align-middle editar_eliminar">
                                        <button class="btn btn-outline-primary editar"><i class="bi bi-pencil"></i></button>
                                        <button class="btn btn-outline-danger mx-2 eliminar"><i class="bi bi-trash3"></i></button>
                                    </th>
                                    <td class="align-middle">${registro.boleta}</td>
                                    <td class="align-middle">${registro.nombre}</td>
                                    <td class="align-middle">${registro.apellidoP}</td>
                                    <td class="align-middle">${registro.apellidoM}</td>
                                    <td class="align-middle">${registro.fecha}</td>
                                    <td class="align-middle">${registro.genero}</td>
                                    <td class="align-middle">${registro.curp}</td>
                                    <td class="align-middle">${registro.calle}</td>
                                    <td class="align-middle">${registro.numeroe}</td>
                                    <td class="align-middle">${registro.numeroi}</td>
                                    <td class="align-middle">${registro.colonia}</td>
                                    <td class="align-middle">${registro.alcaldia}</td>
                                    <td class="align-middle">${registro.estado}</td>
                                    <td class="align-middle">${registro.cp}</td>
                                    <td class="align-middle">${registro.tel}</td>
                                    <td class="align-middle">${registro.correo}</td>
                                    <td class="align-middle">${registro.escuela}</td>
                                    <td class="align-middle">${registro.entidad}</td>
                                    <td class="align-middle">${registro.promedio}</td>
                                    <td class="align-middle">${registro.opcion}</td>
                                    <td class="align-middle">${registro.discapacidad}</td>
                                    <td class="align-middle">${registro.horario}</td>
                                    <td class="align-middle">${registro.laboratorio}</td>
                                </tr>
                                `
                });
                $('#registros').html(template);
                $('#total_users').html(total);
                $('#matches').html("Todos los Usuarios: ");
            }
        });
    }

    $('#search').keyup(function(){
        if($('#search').val() == ""){
            listarTodas();
        }
        let search = $('#search').val();
        let total = 0;
        if($("#search").val()){
            $.ajax({
                url: 'php/buscar.php',
                type: 'POST',
                data: {search},
                success: function(response){
                    let registros = JSON.parse(response);
                    let template = '';
                    registros.forEach(registro => {
                        total++;
                        template += `
                                    <tr ClaveCurp="${registro.curp}" NombreAlumno="${registro.nombre}" BoletaAlumno="${registro.boleta}">
                                        <th scope="row" class="align-middle editar_eliminar">
                                            <button class="btn btn-outline-primary editar"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-outline-danger mx-2 eliminar"><i class="bi bi-trash3"></i></button>
                                        </th>
                                        <td class="align-middle">${registro.boleta}</td>
                                        <td class="align-middle">${registro.nombre}</td>
                                        <td class="align-middle">${registro.apellidoP}</td>
                                        <td class="align-middle">${registro.apellidoM}</td>
                                        <td class="align-middle">${registro.fecha}</td>
                                        <td class="align-middle">${registro.genero}</td>
                                        <td class="align-middle">${registro.curp}</td>
                                        <td class="align-middle">${registro.calle}</td>
                                        <td class="align-middle">${registro.numeroe}</td>
                                        <td class="align-middle">${registro.numeroi}</td>
                                        <td class="align-middle">${registro.colonia}</td>
                                        <td class="align-middle">${registro.alcaldia}</td>
                                        <td class="align-middle">${registro.estado}</td>
                                        <td class="align-middle">${registro.cp}</td>
                                        <td class="align-middle">${registro.tel}</td>
                                        <td class="align-middle">${registro.correo}</td>
                                        <td class="align-middle">${registro.escuela}</td>
                                        <td class="align-middle">${registro.entidad}</td>
                                        <td class="align-middle">${registro.promedio}</td>
                                        <td class="align-middle">${registro.opcion}</td>
                                        <td class="align-middle">${registro.discapacidad}</td>
                                        <td class="align-middle">${registro.horario}</td>
                                        <td class="align-middle">${registro.laboratorio}</td>
                                    </tr>
                                    `
                    });
                    $('#registros').html(template);
                    $('#total_users').html(total);
                    $('#matches').html("Coincidencias: ");
                }
            });
        }
    });

    $(document).on('click', '.eliminar', function () {
        let element = $(this)[0].parentElement.parentElement;
        let curp = $(element).attr('ClaveCurp');
        let nombre = $(element).attr('NombreAlumno');
        let boleta = $(element).attr('BoletaAlumno');
        if(confirm('Estas seguro de eliminar a ' + nombre + '\ncon Boleta = ' + boleta + ' ?')){
            $.post('php/eliminar_registro.php', {curp}, function (response) {
                alert(response);
                listarTodas();
            })
        }
    })

});