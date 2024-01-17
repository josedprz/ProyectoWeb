<?php
    $escuelas = [
        "Seleccionar" => "Seleccionar",
        1 => "CECyT 1 \"Gonzalo Vázquez Vela\"",
        2 => "CECyT 2 \"Miguel Bernard\"",
        3 => "CECyT 3 \"Estanislao Ramírez Ruiz\"",
        4 => "CECyT 4 \"Lázaro Cárdenas\"",
        5 => "CECyT 5 \"Benito Juárez García\"",
        6 => "CECyT 6 \"Miguel Othón de Mendizábal\"",
        7 => "CECyT 7 \"Cuauhtémoc\"",
        8 => "CECyT 8 \"Narciso Bassols García\"",
        9 => "CECyT 9 \"Juan de Dios Bátiz\"",
        10 => "CECyT 10 \"Carlos Vallejo Márquez\"",
        11 => "CECyT 11 \"Wilfrido Massieu Pérez\"",
        12 => "CECyT 12 \"José María Morelos\"",
        13 => "CECyT 13 \"Ricardo Flores Magón\"",
        14 => "CECyT 14 \"Luis Enrique Erro Soler\"",
        15 => "CECyT 15 \"Diódoro Antúnez Echegaray\"",
        16 => "CECyT 16 \"Hidalgo\"",
        17 => "CECyT 17 \"León Guanajuato\"",
        18 => "CECyT 19 \"Leona Vicario\"",
        19 => "CET 1 \"Walter Cross Buchanan\"",
        20 => "Otra",
    ];

    $alcaldias = [
        "Seleccionar" => "Seleccionar",
        1 => "Azcapotzalco",
        2 => "Alvaro Obregon",
        3 => "Benito Juárez",
        4 => "Coyoacán",
        5 => "Cuajimalpa de Morelos",
        6 => "Cuautémoc",
        7 => "Gustavo A.Madero",
        8 => "Iztacalco",
        9 => "Iztapalapa",
        10 => "La Magdalena Contreras",
        11 => "Miguel Hidalgo",
        12 => "Milpa Alta",
        13 => "Tláhuac",
        14 => "Tlalpan",
        15 => "Venustiano Carranza",
        16 => "Xochimilco",
    ];

    $entidades = [
        1 => "Aguascalientes",
        2 => "Baja California",
        3 => "Baja California Sur",
        4 => "Campeche",
        5 => "Chiapas",
        6 => "Chihuahua",
        7 => "Ciudad de México",
        8 => "Coahuila de Zaragoza",
        9 => "Colima",
        10 => "Durango",
        11 => "Estado de México",
        12 => "Guanajuato",
        13 => "Guerrero",
        14 => "Hidalgo",
        15 => "Jalisco",
        16 => "Michoacán",
        17 => "Morelos",
        18 => "Nayarit",
        19 => "Nuevo León",
        20 => "Oaxaca",
        21 => "Puebla",
        22 => "Querétaro",
        23 => "Quintana Roo",
        24 => "San Luis Potosí",
        25 => "Sinaloa",
        26 => "Sonora",
        27 => "Tabasco",
        28 => "Tamaulipas",
        29 => "Tlaxcala",
        30 => "Veracruz",
        31 => "Yucatán",
        32 => "Zacatecas",
    ];

    $discapacidades = [
        "Seleccionar" => "Seleccionar",
        1 => "Con discapacidad auditiva",
        2 => "Con discapacidad motriz usuaria de silla de ruedas",
        3 => "Con discapacidad motriz usuaria de muletas",
        4 => "Con discapacidad motriz usuaria de bastón",
        5 => "Con discapacidad visual",
        6 => "Otra",
    ];

    if (!empty($_POST["nombre"])) {
        // Si es "Otra", establecemos mejor como "" y la que tomaremos es el segundo input
        if($_POST["discapacidad"] != 6){
            $_POST["otra_disc"] = "";
        }
        if($_POST["escuela"] != 20){
            $_POST["otra_esc"] = "";
        }
        // Aqui se guardan los datos recibidos del formulario
        $variables = [
            "Boleta" => $_POST["boleta"],
            "Nombre" => $_POST["nombre"],
            "Apellido Paterno" => $_POST["apellidoP"],
            "Apellido Materno" => $_POST["apellidoM"],
            "Fecha" => $_POST["fecha"],
            "Genero" => $_POST["genero"],
            "Curp" => $_POST["curp"],
            "Calle" => $_POST["calle"],
            "Numero Exterior" => $_POST["numeroe"],
            "Numero Interior" => $_POST["numeroi"],
            "Colonia" => $_POST["colonia"],
            "Alcaldia" => $alcaldias[$_POST["alcaldia"]],
            "Estado" => $_POST["estado"],
            "CP" => $_POST["cp"],
            "Telefono" => $_POST["tel"],
            "Correo" => $_POST["correo"],
            "Escuela" => $escuelas[$_POST["escuela"]],
            "Otra Escuela" => $_POST["otra_esc"],
            "Entidad" => $entidades[$_POST["entidad"]],
            "Promedio" => $_POST["promedio"],
            "Opcion" => $_POST["opcion"],
            "Discapacidad" => $discapacidades[$_POST["discapacidad"]],
            "Otra discapacidad" => $_POST["otra_disc"],
        ];
    }else{
        header("Location: lost.html");
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Modificar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link type="text/css" rel="stylesheet" href="styles/modificar.css">
        <script src="js/jquery-3.7.1.js"></script>

        <script>
            $(document).ready(()=>{
                // Se inicia con tabla mostrada y formulario escondido
                $(".elementos_tabla").show();
                $("#formulario").hide();
                // Al momento de que se clickee editar
                $("#edit").click(()=>{
                    // Se esconde la tabla
                    $(".elementos_tabla").hide();
                    // Se muestra el formulario
                    $("#formulario").show();
                    // Se oculta el icono
                    $("#edit").hide();
                    // Y se muestran los "Otros" campos
                    if($("#escuela").val() == 20){
                        $(".otra_escuela").show();
                    }
                    if($("#discapacidad").val() == 6){
                        $(".otra_discapacidad").show();
                    }
                });
                // Se inicia con campos ocultos
                $(".otra_escuela").hide();
                $(".otra_discapacidad").hide();
                // Se muestran solo si se coloca opción "Otra"
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
        </script>
    </head>
    <body>
    
        <div class="inicio">
            <a href="index.php" style="width: 100%;"><h4 style="width: 100%;" class="col-12 inicio_texto">Inicio</h4></a>
        </div>
        
        <div class="container" id="tabla">
            <div class="row col-lg-8 col-md-8 col-sm-8 justify-content-center" id="datos">
                <table class="row col-12 table elementos_tabla" id="tablaa">
                    <div class="row justify-content-center col-8">
                        <h1 class="col-lg-10 col-md-12 col-sm-12" id="hdr">Resumen de tus datos</h1>
                        <div class="col-lg-2 col-md-12 col-sm-12 edit_blanco" id="edit"></div>
                    </div>
                    <?php
                        if(!empty($_POST["nombre"])){
                            foreach ($variables as $nombre_variable => $valor_variable) {
                                if ($valor_variable != "") { 
                                    echo "<tbody>";
                                    echo "<tr class=\"row justify-content-center\">";
                                    echo "<th class=\"form_header col-lg-4\" scope=\"row\">$nombre_variable: </th>";
                                    echo "<td class=\"rubros col-lg-4\">";
                                    if (($nombre_variable == "Escuela" || $nombre_variable == "Discapacidad") && ($valor_variable == "Seleccionar")) {
                                        echo "No especificado";
                                    }elseif ($nombre_variable == "Escuela" && $valor_variable == "Otra" && $_POST["otra_esc"] == "") {
                                        echo "No especificado";
                                    }elseif ($nombre_variable == "Discapacidad" && $valor_variable == "Otra" && $_POST["otra_disc"] == "") {
                                        echo "No especificado";
                                    }else{
                                        echo "$valor_variable";
                                    }
                                    echo "</td>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                }
                            }
                        }
                    ?>
                <table>
                
                <div class="row justify-content-center elementos_tabla" id="botones">  
                    <button class="col-5 btn btn-primary" id="enviar" name="enviar">Enviar</button>
                </div>
            </div>
            <div class="row justify-content-center" id="formulario">
                <form class="row justify-content-center" method="post" id="form_oculto" action="modificar.php" novalidate>
                    <div class="row col-8 justify-content-center">

                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="boleta">No. de boleta:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <input class="form-control" type="text" name="boleta" id="boleta" placeholder="No. de boleta" value="<?php echo "{$variables["Boleta"]}";?>" required>
                            </div>
                        <?php    
                            }
                        ?>

                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="nombre">Nombre (s):</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre (s)" value="<?php echo "{$variables["Nombre"]}";?>" required>
                            </div>
                        <?php
                            }
                        ?>
                        
                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="apellidoP">Apellido Paterno:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <input class="form-control" type="text" name="apellidoP" id="apellidoP" placeholder="Apellido Paterno" value="<?php echo "{$variables["Apellido Paterno"]}";?>" required>
                            </div>
                        <?php
                            }
                        ?>
                        
                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="apellidoM">Apellido Materno:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <input class="form-control" type="text" name="apellidoM" id="apellidoM" placeholder="Apellido Materno" value="<?php echo "{$variables["Apellido Materno"]}";?>" required>
                            </div>
                        <?php
                            }
                        ?>
                        
                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="fecha">Fecha de nacimiento:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <input class="form-control" type="date" name="fecha" id="fecha" max="2008-12-31" min="1950-01-01" value="<?php echo "{$variables["Fecha"]}";?>" required>
                            </div>
                        <?php
                            }
                        ?>

                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="genero">Género:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <select class="form-control" name="genero" id="genero" required>
                                    <option selected>Seleccionar</option>
                                    <?php
                                        if($variables["Genero"] == "Hombre"){
                                        ?>  <option value="Hombre" selected>Hombre</option>
                                            <option value="Mujer">Mujer</option>
                                        <?php
                                        }else{
                                        ?>  <option value="Hombre">Hombre</option>
                                            <option value="Mujer" selected>Mujer</option>
                                        <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        <?php
                            }
                        ?>

                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="curp">CURP:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <input class="form-control" type="text" name="curp" id="curp" placeholder="CURP" value="<?php echo "{$variables["Curp"]}";?>" required>
                            </div>
                        <?php
                            }
                        ?>
                        
                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="calle">Calle:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <input class="form-control" type="text" name="calle" id="calle" placeholder="Calle" value="<?php echo "{$variables["Calle"]}";?>" required>
                            </div>
                        <?php
                            }
                        ?>
            
                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="numeroe">Ext:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <input class="form-control" type="number" name="numeroe" id="numeroe" placeholder="No. Ext" value="<?php echo "{$variables["Numero Exterior"]}";?>" required>
                            </div>
                        <?php
                            }
                        ?>
            
                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" id="int" for="numeroi">Int:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <input class="form-control" type="number" name="numeroi" id="numeroi" placeholder="No. Int" value="<?php echo "{$variables["Numero Interior"]}";?>" required>
                            </div>
                        <?php
                            }
                        ?>
            
                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="colonia">Colonia:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <input class="form-control" type="text"  name="colonia" id="colonia" placeholder="Colonia" value="<?php echo "{$variables["Colonia"]}";?>" required>
                            </div>
                        <?php
                            }
                        ?>
                        
                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="alcaldia">Alcaldía / Municipio:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>
                            <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <select class="form-control" name="alcaldia" id="alcaldia" required>
                                    <?php
                                        foreach ($alcaldias as $id_alcaldia => $nombre_alcaldia) {
                                            if ($nombre_alcaldia == $variables["Alcaldia"]) {
                                            ?>  
                                                <option value="<?php echo "$id_alcaldia"; ?>" selected><?php echo "$nombre_alcaldia"; ?></option>
                                            <?php
                                            }else{
                                            ?>  
                                                <option value="<?php echo "$id_alcaldia"; ?>"><?php echo "$nombre_alcaldia"; ?></option>
                                            <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        <?php
                            }
                        ?>

                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="estado">Estado:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <input class="form-control" type="text" name="estado" id="estado" placeholder="Estado" value="<?php echo "{$variables["Estado"]}";?>" required>
                            </div>
                        <?php
                            }
                        ?>
            
                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="cp">Codigo Postal:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <input class="form-control" type="CP" name="cp" id="cp" placeholder="C.P." value="<?php echo "{$variables["CP"]}";?>" required>
                            </div>
                        <?php
                            }
                        ?>
            
                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="tel">Teléfono:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <input class="form-control"  type="tel" name="tel" id="tel" placeholder="Teléfono" value="<?php echo "{$variables["Telefono"]}";?>" required>
                            </div>
                        <?php
                            }
                        ?>
            
                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="correo">Correo:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <input class="form-control" type="email" name="correo" id="correo" placeholder="Correo" value="<?php echo "{$variables["Correo"]}";?>" required>
                            </div>
                        <?php
                            }
                        ?>

                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="escuela">Escuela de procedencia:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                            ?> <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                    <select class="form-control" name="escuela" id="escuela" required>
                                        <?php
                                            foreach ($escuelas as $id_escuela => $nombre_escuela) {
                                                if ($nombre_escuela == $variables["Escuela"]) {
                                                ?>  
                                                    <option value="<?php echo "$id_escuela"; ?>" selected><?php echo "$nombre_escuela"; ?></option>
                                                <?php
                                                }else{
                                                ?>  
                                                    <option value="<?php echo "$id_escuela"; ?>"><?php echo "$nombre_escuela"; ?></option>
                                                <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            <?php
                            }
                        ?>
                        
                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12 otra_escuela" for="otra_esc">Nombre:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12 otra_escuela">
                                <input class="form-control otra_escuela" type="text" name="otra_esc" id="otra_esc" placeholder="Nombre" value="<?php echo "{$variables["Otra Escuela"]}"; ?>">
                            </div>
                        <?php
                            }
                        ?>
                        
                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="entidad">Entidad:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <select class="form-control" name="entidad" id="entidad" required>
                                    <?php
                                        foreach ($entidades as $id_entidad => $nombre_entidad) {
                                            if ($nombre_entidad == $variables["Entidad"]) {
                                            ?>  
                                                <option value="<?php echo "$id_entidad"; ?>" selected><?php echo "$nombre_entidad"; ?></option>
                                            <?php
                                            }else{
                                            ?>  
                                                <option value="<?php echo "$id_entidad"; ?>"><?php echo "$nombre_entidad"; ?></option>
                                            <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        <?php
                            }
                        ?>

                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" for="promedio">Promedio:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>  <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                <input class="form-control" type="text" name="promedio" id="promedio" placeholder="Promedio" value="<?php echo "{$variables["Promedio"]}";?>" required>
                            </div>
                        <?php
                            }
                        ?>

                        <div class="mt-1 col-12" id="prom_valid">El promedio debe ser entre 6-10 y debe tener máximo 2 decimales</div>
                        
                        <label class="mt-1 col-6" for="opcion">Opción:</label>
                        <?php
                            $opciones = [
                                "1ra" => "1º",
                                "2da" => "2º",
                                "3ra" => "3º",
                            ];
                            foreach ($opciones as $valor => $etiqueta) {
                                if ($valor == $variables["Opcion"]) {
                                ?> <div class="mt-1 col-2 chk"><input type="checkbox" name="opcion" id="opcion" value="<?php echo "$valor"; ?>" checked><?php echo "{$etiqueta}"; ?></div>
                                <?php
                                }else{
                                ?> <div class="mt-1 col-2 chk"><input type="checkbox" name="opcion" id="opcion" value="<?php echo "$valor"; ?>"><?php echo "{$etiqueta}"; ?></div>
                                <?php
                                }
                            }
                        ?>

                        <div id="chk_valid" style="text-align: center; color: rgb(254, 69, 69);"></div>
                    
                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12" id="disc_text" for="discapacidad">Discapacidad:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>
                                <div class="mt-1 col-lg-7 col-md-12 col-sm-12">
                                    <select class="form-control" name="discapacidad" id="discapacidad" required>
                        <?php
                                foreach ($discapacidades as $id_discapacidad => $nombre_discapacidad) {
                                    if ($nombre_discapacidad == $variables["Discapacidad"]) {
                        ?>
                                        <option value="<?php echo "$id_discapacidad"; ?>" selected><?php echo "$nombre_discapacidad"; ?></option>
                        <?php
                                    }else{
                        ?>
                                        <option value="<?php echo "$id_discapacidad"; ?>"><?php echo "$nombre_discapacidad"; ?></option>
                        <?php
                                    }
                                }
                        ?>
                                    </select>
                                </div>
                        <?php
                            }
                        ?>

                        <label class="mt-1 col-lg-5 col-md-12 col-sm-12 otra_discapacidad" for="otra_disc">¿Cuál?:</label>
                        <?php
                            if(!empty($_POST["nombre"])){
                        ?>
                            <div class="mt-1 col-lg-7 col-md-12 col-sm-12 otra_discapacidad">
                                <input class="form-control otra_discapacidad" type="text" name="otra_disc" id="otra_disc" value="<?php echo "{$variables["Otra discapacidad"]}"; ?>">
                            </div>
                        <?php  
                            }
                        ?>

                        <div class="row mt-3 justify-content-center">
                            <button class="col-5 btn btn-primary" id="guardar" type="submit">Guardar</button>
                        </div>

                    </div>
                </form> 
            </div>  
        </div>
        <script src="js/modificar.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
    </body>
</html>