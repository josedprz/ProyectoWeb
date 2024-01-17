window.onload = function () {
    // Variables para la validacion
    const formulario = document.forms['form_oculto'];
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
            default:
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
    let editar = document.getElementById('edit');
    editar.addEventListener('click', function(){
        campos.promedio = true;
        inputs.forEach((campo) => {
            validardato(expresiones[campo.name], campo, campo.name);
        });
    });
    
    let boton = document.getElementById("enviar");

    boton.addEventListener("click", function(){
        formulario.action = "enviar_datos.php";
        formulario.submit();
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

        if(campos.boleta && campos.nombre && campos.apellidoP && campos.apellidoM && campos.fecha && campos.curp && campos.calle && campos.numeroe && campos.numeroi && campos.colonia && campos.estado && campos.cp && campos.tel && campos.correo && campos.promedio){
            // Si hay más de una checkbox palomeada
            if(chk.length != 1){
                chk_v.innerHTML = `Selecciona una y solo una opción`;
            }else if((gnro.value == "Seleccionar") || (entid.value == "Seleccionar") || (alcald.value == "Seleccionar")){
                alert("Faltan campos por llenar");
            }else{
                formulario.submit();
            }
        }else{
            alert("Faltan campos por llenar");
        }
    });
}