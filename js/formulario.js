window.onload = function () {
    // Variables para la validacion
    const formulario = document.forms['formulario'];
    const inputs = document.querySelectorAll('#formulario input');
    const fcha = document.getElementById('fecha');
    // Variables necesarias para cambiar de secciones
    const primera_seccion = document.getElementById('fsection');
    const segunda_seccion = document.getElementById('ssection');
    const tercera_seccion = document.getElementById('tsection');
    // Displays iniciales
    primera_seccion.style.display = 'block';
    segunda_seccion.style.display = 'none';
    tercera_seccion.style.display = 'none';
    // Botones de cada seccion
    const boton_primero = document.getElementById('fbtn');
    const sboton_siguiente = document.getElementById('sbtn_siguiente');
    const sboton_anterior = document.getElementById('sbtn_anterior');
    const tboton_anterior = document.getElementById('tbtn_anterior');

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

    const validardato = (expresion, target, nombre) => {
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
            if(expresion.test(target.value)){
                if(target.value <= 10 && target.value >= 6){
                    document.getElementById(nombre).classList.add('is-valid');
                    document.getElementById(nombre).classList.remove('is-invalid');
                    document.getElementById('prom_valid').style.display = 'none';
                    campos[nombre] = true;
                }else{
                    document.getElementById(nombre).classList.add('is-invalid');
                    document.getElementById(nombre).classList.remove('is-valid');
                    document.getElementById('prom_valid').style.display = 'block';
                    campos[nombre] = false;
                }
            }else{
                document.getElementById(nombre).classList.add('is-invalid');
                document.getElementById(nombre).classList.remove('is-valid');
                document.getElementById('prom_valid').style.display = 'block';
                campos[nombre] = false;
            }
        }
    };

    const validarfecha = (event) => {
        switch (event.target.name) {
            case "fecha":
                validardato(expresiones.fecha, event.target, event.target.name);
            break;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    });

    // Funcion para validar fecha

    fcha.addEventListener('blur', validarfecha);

    // Botones para cambiar de secciones
    // No se cambia de seccion a menos que se haya llenado todo
    // Excepto por las listas

    boton_primero.addEventListener('click', function(event){
        event.preventDefault();
        if(campos.boleta && campos.nombre && campos.apellidoP && campos.apellidoM && campos.fecha && campos.curp){
            primera_seccion.style.display = 'none';
            segunda_seccion.style.display = 'block';
        }else{
            alert("Faltan campos por llenar");
        }
    });

    sboton_anterior.addEventListener('click', function(event){
        event.preventDefault();
        primera_seccion.style.display = 'block';
        segunda_seccion.style.display = 'none';
    });

    sboton_siguiente.addEventListener('click', function(event){
        event.preventDefault();
        if(campos.calle && campos.numeroe && campos.numeroi && campos.colonia && campos.estado && campos.cp && campos.tel && campos.correo){
            segunda_seccion.style.display = 'none';
            tercera_seccion.style.display = 'block';
        }else{
            alert("Faltan campos por llenar");
        }
    });

    tboton_anterior.addEventListener('click', function(event){
        event.preventDefault();
        segunda_seccion.style.display = 'block';
        tercera_seccion.style.display = 'none';
    });
    // Aqui modifico la clase de las secciones porque cada que se muestran los campos ocultos
    // se pierden las proporciones de la seccion, entonces debo modificar su altura a " auto"
    // Fuera de eso quiero que siempre las secciones tengan exactamente la misma altura por 
    // cuestiones de estética
    const disc_otra = document.getElementById('discapacidad');

    disc_otra.addEventListener('change', function(event){
        if(event.target.value == 6){
            tercera_seccion.classList.remove('fields');
            tercera_seccion.classList.add('fields_extendido');
        }else{
            tercera_seccion.classList.add('fields');
            tercera_seccion.classList.remove('fields_extendido');
        }
    });

    formulario.addEventListener('submit', function(event){
        // El submit se desactiva hasta nuevo aviso
        event.preventDefault();
        // Checkboxes palomeadas
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
            // Si se deja en Selected
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
$(document).ready(()=>{
    $(".otra_escuela").hide();
    $(".otra_discapacidad").hide();
    $("#escuela").change(function(){
        if($("#escuela").val() == 20){
            $(".otra_escuela").show();
        }else{
            $(".otra_escuela").hide();
        }
    });
    $("#discapacidad").change(function(){
        if($("#discapacidad").val() == 6){
            $(".otra_discapacidad").show();
        }else{
            $(".otra_discapacidad").hide();
        }
    });
});