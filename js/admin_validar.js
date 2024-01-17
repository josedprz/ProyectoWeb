window.onload = function () {
    // Variables para la validacion
    const formulario = document.forms['formulario'];
    const inputs = document.querySelectorAll('#formulario input');
    const fcha = document.getElementById('fecha');

    // Expresiones regulares
    const expresiones = {
        boleta: /^((PP{1}|PE{1}|[0-9]{2})+[0-9]{8})$/,
        nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
        apellidoP: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
        apellidoM: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
        fecha: /\d/,
        curp: /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
        calle: /^[a-zA-Z0-9À-ÿ\s]{1,40}$/,
        numeroe: /^[0-9]{1,3}$/,
        numeroi: /^[0-9]{1,3}$/,
        colonia: /^[a-zA-Z0-9À-ÿ\s]{1,40}$/,
        estado: /^[a-zA-Z0-9À-ÿ\s]{1,40}$/,
        cp: /^[0-9]{5}$/,
        tel: /^[0-9]{10}$/,
        correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]+$/,
        promedio: /^[0-9]+(\.[0-9]{0,2})?$/,
    }
    // Lista para saber que todo se ha validado
    const campos = {
        boleta: false,
        nombre: false,
        apellidoP: false,
        apellidoM: false,
        fecha: false,
        curp: false,
        calle: false,
        numeroe: false,
        numeroi: false,
        colonia: false,
        estado: false,
        cp: false,
        tel: false,
        correo: false,
        promedio: false,
    }

    const escuelas = {
        'CECyT 1 "Gonzalo Vázquez Vela"' : 1,
        'CECyT 2 "Miguel Bernard"' : 2,
        'CECyT 3 "Estanislao Ramírez Ruiz"' : 3,
        'CECyT 4 "Lázaro Cárdenas"' : 4,
        'CECyT 5 "Benito Juárez García"' : 5,
        'CECyT 6 "Miguel Othón de Mendizábal"' : 6,
        'CECyT 7 "Cuauhtémoc"' : 7,
        'CECyT 8 "Narciso Bassols García"' : 8,
        'CECyT 9 "Juan de Dios Bátiz"' : 9,
        'CECyT 10 "Carlos Vallejo Márquez"' : 10,
        'CECyT 11 "Wilfrido Massieu Pérez"' : 11,
        'CECyT 12 "José María Morelos"' : 12,
        'CECyT 13 "Ricardo Flores Magón"' : 13,
        'CECyT 14 "Luis Enrique Erro Soler"' : 14,
        'CECyT 15 "Diódoro Antúnez Echegaray"' : 15,
        'CECyT 16 "Hidalgo"' : 16,
        'CECyT 17 "León Guanajuato"' : 17,
        'CECyT 19 "Leona Vicario"' : 18,
        'CET 1 "Walter Cross Buchanan"' : 19,
    }

    const alcaldias = {
        'Azcapotzalco' : 1,
        'Alvaro Obregon' : 2,
        'Benito Juárez' : 3,
        'Coyoacán' : 4,
        'Cuajimalpa de Morelos' : 5,
        'Cuautémoc' : 6,
        'Gustavo A.Madero' : 7,
        'Iztacalco' : 8,
        'Iztapalapa' : 9,
        'La Magdalena Contreras' : 10,
        'Miguel Hidalgo' : 11,
        'Milpa Alta' : 12,
        'Tláhuac' : 13,
        'Tlalpan' : 14,
        'Venustiano Carranza' : 15,
        'Xochimilco' : 16,
    }

    const entidades = {
        'Aguascalientes' : 1,
        'Baja California' : 2,
        'Baja California Sur' : 3,
        'Campeche' : 4,
        'Chiapas' : 5,
        'Chihuahua' : 6,
        'Ciudad de México' : 7,
        'Coahuila de Zaragoza' : 8,
        'Colima' : 9,
        'Durango' : 10,
        'Estado de México' : 11,
        'Guanajuato' : 12,
        'Guerrero' : 13,
        'Hidalgo' : 14,
        'Jalisco' : 15,
        'Michoacán' : 16,
        'Morelos' : 17,
        'Nayarit' : 18,
        'Nuevo León' : 19,
        'Oaxaca' : 20,
        'Puebla' : 21,
        'Querétaro' : 22,
        'Quintana Roo' : 23,
        'San Luis Potosí' : 24,
        'Sinaloa' : 25,
        'Sonora' : 26,
        'Tabasco' : 27,
        'Tamaulipas' : 28,
        'Tlaxcala' : 29,
        'Veracruz' : 30,
        'Yucatán' : 31,
        'Zacatecas' : 32,
    }

    const discapacidades = {
        'Con discapacidad auditiva' : 1,
        'Con discapacidad motriz usuaria de silla de ruedas' : 2,
        'Con discapacidad motriz usuaria de muletas' : 3,
        'Con discapacidad motriz usuaria de bastón' : 4,
        'Con discapacidad visual' : 5,
    }                                

    // Funcion validar formulario
    // Que lleva el switch para validar según el campo
    const validarFormulario = (event) => {
        switch (event.target.name) {
            case "boleta":
                validardato(expresiones.boleta, event.target, event.target.name);
            break;
            case "nombre":
                validardato(expresiones.nombre, event.target, event.target.name);
            break;
            case "apellidoP":
                validardato(expresiones.apellidoP, event.target, event.target.name);
            break;
            case "apellidoM":
                validardato(expresiones.apellidoM, event.target, event.target.name);
            break;
            case "curp":
                validardato(expresiones.curp, event.target, event.target.name);
            break;
            case "calle":
                validardato(expresiones.calle, event.target, event.target.name);
            break;
            case "numeroe":
                validardato(expresiones.numeroe, event.target, event.target.name);
            break;
            case "numeroi":
                validardato(expresiones.numeroi, event.target, event.target.name);
            break;
            case "colonia":
                validardato(expresiones.colonia, event.target, event.target.name);
            break;
            case "estado":
                validardato(expresiones.estado, event.target, event.target.name);
            break;
            case "cp":
                validardato(expresiones.cp, event.target, event.target.name);
            break;
            case "tel":
                validardato(expresiones.tel, event.target, event.target.name);
            break;
            case "correo":
                validardato(expresiones.correo, event.target, event.target.name);
            break;
            case "promedio":
                validardato(expresiones.promedio, event.target, event.target.name);
            break;
        }
    };
    // Funcion validar dato que ejecutará la validación correspondiente a la entrada de su parámetro (nombre del campo)
    // Y hará los cambios de estilo correspondientes
    const validardato = (expresion, target, nombre) => {
        // Validamos cualquier campo que no sea promedio
        if(nombre != "promedio"){
            if(expresion.test(target.value)){
                document.getElementById(nombre).classList.add('is-valid');
                document.getElementById(nombre).classList.remove('is-invalid');

                campos[nombre] = true;
            }else{
                document.getElementById(nombre).classList.add('is-invalid');
                document.getElementById(nombre).classList.remove('is-valid');
                campos[nombre] = false;
            }
        }else{
            // En este if se valida el promedio, si devuelve true entonces procedemos a comprobar rango
            if(expresion.test(target.value)){
                // Si se validó que sea un número con máximo 2 dígitos pero además está entre 6 y 10
                if(target.value <= 10 && target.value >= 6){
                    document.getElementById(nombre).classList.add('is-valid');
                    document.getElementById(nombre).classList.remove('is-invalid');
                    document.getElementById('prom_valid').style.display = 'none';
                    campos[nombre] = true;
                // Si no está entre 6 y 10, entonces:
                }else{
                    document.getElementById(nombre).classList.add('is-invalid');
                    document.getElementById(nombre).classList.remove('is-valid');
                    document.getElementById('prom_valid').style.display = 'block';
                    campos[nombre] = false;
                }
            // Si no se ha validado, entonces:
            }else{
                document.getElementById(nombre).classList.add('is-invalid');
                document.getElementById(nombre).classList.remove('is-valid');
                document.getElementById('prom_valid').style.display = 'block';
                campos[nombre] = false;
            }
        }
    };
    // No recuerdo porqué valdidamos fecha por separado pero creo que en el switch no me dejaba
    // O quizá solo fue experimento y así lo dejé
    const validarfecha = (event) => {
        switch (event.target.name) {
            case "fecha":
                validardato(expresiones.fecha, event.target, event.target.name);
            break;
        }
    };
    // Mandamos validar cada campo cada que se levanta una tecla o se da click fuera del input
    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    });

    // Validamos fecha por separado porque es solo cuando se presiona fuera
    fcha.addEventListener('blur', validarfecha);
    // Cuando se presiona editar, se valida todo el formulario

    $('#cancelar').click(function () {
        $('#formulario').trigger('reset');
        $('#curp').prop('disabled', true);
        inputs.forEach((campo) => {
            document.getElementById(campo.name).classList.remove('is-valid');
            document.getElementById(campo.name).classList.remove('is-invalid');
        });
    });
    // Se inicializa modificar en 0
    // Para saber después a cuál php mandarlo
    let modificar = 0;

    $(document).on('click', '.editar', function () {
        modificar = 1;
        let element = $(this)[0].parentElement.parentElement;
        let curp = $(element).attr('ClaveCurp');
        // Se rellena el formulario con los datos de la BD
        $.post('php/modificar_registro.php', {curp}, function (response) {
            let registro = JSON.parse(response);
            $('#boleta').val(registro.boleta);
            $('#nombre').val(registro.nombre);
            $('#apellidoP').val(registro.apellidoP);
            $('#apellidoM').val(registro.apellidoM);
            $('#fecha').val(registro.fecha);
            $('#genero').val(registro.genero);
            $('#curp').val(registro.curp);
            // Disabled
            $('#curp').prop('disabled', true);
            $('#calle').val(registro.calle);
            $('#numeroe').val(registro.numeroe);
            $('#numeroi').val(registro.numeroi);
            $('#colonia').val(registro.colonia);
            $('#alcaldia').val(alcaldias[registro.alcaldia]);
            $('#estado').val(registro.estado);
            $('#cp').val(registro.cp);
            $('#tel').val(registro.tel);
            $('#correo').val(registro.correo);
            // Si la escuela registrada no se encuentra en la lista, se selecciona otra
            // Se toma el valor y se asigna a OTRA y se muestra
            if(!escuelas[registro.escuela]){
                $('#escuela').val(20);
                $('.otra_escuela').show();
                $('#otra_esc').val(registro.escuela);
            }else{
                $('#escuela').val(escuelas[registro.escuela]);
            }
            // Entidad toma el valor que corresponde al string en la BD
            $('#entidad').val(entidades[registro.entidad]);
            $('#promedio').val(registro.promedio);
            // Lo mismo de arriba para discapacidad
            if(!discapacidades[registro.discapacidad]){
                $('#discapacidad').val(6);
                $('.otra_discapacidad').show();
                $('#otra_disc').val(registro.discapacidad);
            }else{
                $('#discapacidad').val(discapacidades[registro.discapacidad]);
            }
            // Dependiendo de la opcion, se establece el checked al checkbox correspondiende
            if(registro.opcion == "1ra"){
                $('.1raop').prop('checked', true);
            }else if(registro.opcion == "2da"){
                $('.2daop').prop('checked', true);
            }else{
                $('.3raop').prop('checked', true);
            }
            // Se oculta lo necesario y se muestra el form lleno
            $('#TablaRegistros').hide();
            $('.add').show();
            document.getElementById('AgrCabecera').innerHTML = "Modificar Alumno";
            $('#cancelar').show();
            $('#agregar').hide();
            $('.barra_buscar').hide();
            // Se validan todos para no tener que pasar uno por uno
            inputs.forEach((campo) => {
                if (campo.name == "boleta" || campo.name == "nombre" || campo.name == "apellidoP" || campo.name == "apellidoM" || campo.name == "fecha" || campo.name == "curp" || campo.name == "calle" || campo.name == "numeroe" || campo.name == "numeroi" || campo.name == "colonia" || campo.name == "estado" || campo.name == "cp" || campo.name == "tel" || campo.name == "correo" || campo.name == "promedio"){
                    validardato(expresiones[campo.name], campo, campo.name);
                }
            });
        })
    })
    // Por defecto cuando se da click en agregar, se deja modificar en 0
    $('#agregar').click(function () {
        modificar = 0;
    });

    formulario.addEventListener('submit', function(event){
        // El submit se desactiva hasta nuevo aviso
        event.preventDefault();
        // Checkboxes palomeadas. Aqui no importa que mande llamar las de todo el documento porque
        // Solo tenemos 3 :D
        const chk = document.querySelectorAll('#formulario input:checked');
        // Check valid es en sí el mensaje de error
        const chk_v = document.getElementById('chk_valid');
        // Quiero validar si las listas no se han dejado en "Select" porque claro, pasarán la validación
        // de expresión regular, pero no quiero que dejen sin seleccionar
        const gnro = document.getElementById('genero');
        const entid = document.getElementById('entidad');
        const alcald = document.getElementById('alcaldia');

        if(campos.boleta && campos.nombre && campos.apellidoP && campos.apellidoM && campos.fecha && campos.curp && campos.calle && campos.numeroe && campos.numeroi && campos.colonia &&campos.estado && campos.cp && campos.tel && campos.correo && campos.promedio){
            // Si hay más de una checkbox palomeada
            if(chk.length != 1){
                chk_v.innerHTML = `Selecciona una y solo una opción`;
            }else if((gnro.value == "Seleccionar") || (entid.value == "Seleccionar") || (alcald.value == "Seleccionar")){
                alert("Faltan campos por llenar");
            }else{
                //formulario.submit();
                const postData = {
                    boleta : $('#boleta').val(),
                    nombre : $('#nombre').val(),
                    apellidoP : $('#apellidoP').val(),
                    apellidoM : $('#apellidoM').val(),
                    fecha : $('#fecha').val(),
                    genero : $('#genero').val(),
                    curp : $('#curp').val(),
                    calle : $('#calle').val(),
                    numeroe : $('#numeroe').val(),
                    numeroi : $('#numeroi').val(),
                    colonia : $('#colonia').val(),
                    alcaldia : $('#alcaldia').val(),
                    estado : $('#estado').val(),
                    cp : $('#cp').val(),
                    tel : $('#tel').val(),
                    correo : $('#correo').val(),
                    escuela : $('#escuela').val(),
                    entidad : $('#entidad').val(),
                    promedio : $('#promedio').val(),
                    opcion : $('#opcion').val(),
                    discapacidad : $('#discapacidad').val(),
                    otra_esc : $('#otra_esc').val(),
                    otra_disc : $('#otra_disc').val()
                };
                let archivo;
                if(modificar == 1){
                    archivo = 'php/guardar_modificado.php';
                }else{
                    archivo = 'php/admin_agregar.php';
                }
                $.post(archivo, postData, function(response){
                    alert(response);
                    $('#cancelar').click();
                    //$('#formulario').trigger('reset');
                });
            }
        }else{
            alert("Faltan campos por llenar");
        }
    });
}