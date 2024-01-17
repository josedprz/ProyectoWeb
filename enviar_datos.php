<?php
    if(!empty($_POST["nombre"])){
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
        // Conexion a base de datos
        $conexion = mysqli_connect("localhost", "root", "", "sem20241");
        // Verificamos el numero de registros para poder asignar un horario
        
        //$query_total = "SELECT * FROM
        //                alumnos";   
        //$result = mysqli_query($conexion, $query_total);
        //$id = mysqli_num_rows($result) + 1;

        // Corroboramos si hay disponibilidad en el horario
        $horario1 = "SELECT *
                        FROM alumnos
                            WHERE horario = '8:00:00'
                            AND laboratorio = '1'";
        $horario2 = "SELECT *
                        FROM alumnos
                            WHERE horario = '8:00:00'
                            AND laboratorio = '2'";
        $horario3 = "SELECT *
                        FROM alumnos
                            WHERE horario = '8:00:00'
                            AND laboratorio = '3'";
        $horario4 = "SELECT *
                        FROM alumnos
                            WHERE horario = '8:00:00'
                            AND laboratorio = '4'";
        $horario5 = "SELECT *
                        FROM alumnos
                            WHERE horario = '8:00:00'
                            AND laboratorio = '5'";
        $horario6 = "SELECT *
                        FROM alumnos
                            WHERE horario = '8:00:00'
                            AND laboratorio = '6'";
        $horario7 = "SELECT *
                        FROM alumnos
                            WHERE horario = '9:45:00'
                            AND laboratorio = '1'";
        $horario8 = "SELECT *
                        FROM alumnos
                            WHERE horario = '9:45:00'
                            AND laboratorio = '2'";
        $horario9 = "SELECT *
                        FROM alumnos
                            WHERE horario = '9:45:00'
                            AND laboratorio = '3'";
        $horario10 = "SELECT *
                        FROM alumnos
                            WHERE horario = '9:45:00'
                            AND laboratorio = '4'";
        
        if(mysqli_num_rows(mysqli_query($conexion, $horario1)) < 30){
            $laboratorio = 1;
            $horario = "8:00";
        }elseif(mysqli_num_rows(mysqli_query($conexion, $horario2)) < 30){
            $laboratorio = 2;
            $horario = "8:00";
        }elseif(mysqli_num_rows(mysqli_query($conexion, $horario3)) < 30){
            $laboratorio = 3;
            $horario = "8:00";
        }elseif(mysqli_num_rows(mysqli_query($conexion, $horario4)) < 30){
            $laboratorio = 4;
            $horario = "8:00";
        }elseif(mysqli_num_rows(mysqli_query($conexion, $horario5)) < 30){
            $laboratorio = 5;
            $horario = "8:00";
        }elseif(mysqli_num_rows(mysqli_query($conexion, $horario6)) < 30){
            $laboratorio = 6;
            $horario = "8:00";
        }elseif(mysqli_num_rows(mysqli_query($conexion, $horario7)) < 30){
            $laboratorio = 1;
            $horario = "9:45";
        }elseif(mysqli_num_rows(mysqli_query($conexion, $horario8)) < 30){
            $laboratorio = 2;
            $horario = "9:45";
        }elseif(mysqli_num_rows(mysqli_query($conexion, $horario9)) < 30){
            $laboratorio = 3;
            $horario = "9:45";
        }elseif(mysqli_num_rows(mysqli_query($conexion, $horario10)) < 30){
            $laboratorio = 4;
            $horario = "9:45";
        }
        /*
        if($id <= 30){
            $laboratorio = 1;
            $horario = "8:00";
        }elseif($id <=60){
            $laboratorio = 2;
            $horario = "8:00";
        }elseif($id <= 90){
            $laboratorio = 3;
            $horario = "8:00";
        }elseif($id <= 120){
            $laboratorio = 4;
            $horario = "8:00";
        }elseif($id <= 150){
            $laboratorio = 5;
            $horario = "8:00";
        }elseif($id <= 180){
            $laboratorio = 6;
            $horario = "8:00";
        }elseif($id <= 210){
            $laboratorio = 1;
            $horario = "9:45";
        }elseif($id <= 240){
            $laboratorio = 2;
            $horario = "9:45";
        }elseif($id <= 270){
            $laboratorio = 3;
            $horario = "9:45";
        }elseif($id <= 300){
            $laboratorio = 4;
            $horario = "9:45";
        }*/
    
        $esc = $escuelas[$_POST["escuela"]];
        $disc = $discapacidades[$_POST["discapacidad"]];
        $ent = $entidades[$_POST["entidad"]];
        $alc = $alcaldias[$_POST["alcaldia"]];
        // Establecemos como dato al alternativo o si no puso nada, como NA
        if($esc == "Otra"){
            if($_POST["otra_esc"] == ""){
                $esc = "NA";
            }else{
                $esc = $_POST["otra_esc"];
            }
        }elseif($esc == "Seleccionar"){
            $esc = "NA";
        }
        if($disc == "Otra"){
            if($_POST["otra_disc"] == ""){
                $disc = "NA";
            }else{
                $disc = $_POST["otra_disc"];
            }
        }elseif($disc == "Seleccionar"){
            $disc = "NA";
        }
    
        $boleta = trim($_POST["boleta"]);
        $nombre = trim($_POST["nombre"]);
        $apellido_paterno = trim($_POST["apellidoP"]);
        $apellido_materno = trim($_POST["apellidoM"]);
        $fecha = trim($_POST["fecha"]);
        $genero = trim($_POST["genero"]);
        $curp = trim($_POST["curp"]);
        $calle = trim($_POST["calle"]);
        $exterior = trim($_POST["numeroe"]);
        $interior = trim($_POST["numeroi"]);
        $colonia = trim($_POST["colonia"]);
        $alcaldia = trim($alc);
        $estado = trim($_POST["estado"]);
        $cp = trim($_POST["cp"]);
        $telefono = trim($_POST["tel"]);
        $correo = trim($_POST["correo"]);
        $escuela = trim($esc);
        $entidad = trim($ent);
        $promedio = trim($_POST["promedio"]);
        $opcion = trim($_POST["opcion"]);
        $discapacidad = trim($disc);
    
        $query = "INSERT INTO alumnos(boleta, nombre, apellido_paterno, apellido_materno, fecha, genero, curp, calle, exterior, interior, colonia, alcaldia, estado, cp, telefono, correo, escuela, entidad, promedio, opcion, discapacidad, horario, laboratorio) 
        VALUES ('$boleta', '$nombre', '$apellido_paterno', '$apellido_materno', '$fecha', '$genero', '$curp', '$calle', '$exterior', '$interior', '$colonia', '$alcaldia', '$estado', '$cp', '$telefono', '$correo', '$escuela', '$entidad', '$promedio', '$opcion', '$discapacidad', '$horario', '$laboratorio')";
    
        $resultado = mysqli_query($conexion, $query);
    }else{
        header("Location: lost.html");
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Enviados</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="styles/enviados.css">
        <script src="js/jquery-3.7.1.js"></script>
    </head>
    <body>
    <script src="bootstrap/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <div class="inicio">
                <a href="index.php" style="width: 100%;"><h4 style="width: 100%;" class="col-12 inicio_texto">Inicio</h4></a>
        </div>
        <div class="container" id="contt">
            <div class="row justify-content-center" id="todo">
                <div class="col-6 recuadro">
                        <?php
                        if($resultado){
                        ?>
                        <img src="img/sign_up.png" height="200" id="img_reg" alt="img_registro">
                        <h1 class="letras" id="first_message">¡<?php echo "$nombre"; ?> te has inscrito correctamente!</h1>
                        
                        <div id="seg_recuadro">
                            <h2 class="letras">Y tu horario es <span id="dia_horario">Lunes 12 Febrero <?php echo "$horario"; ?>am</span> en laboratorio <span id="num_lab">nº <?php echo "$laboratorio"; ?></span></h2>
                        </div>
                        <form id="primer_pdf" action="recupera.php" target="_blank" method="post">
                        <input class="form_pdf" type="text" name="boleta" id="boleta" value="<?php echo "$boleta"; ?>">
                        <input class="form_pdf" type="text" name="curp" id="curp" value="<?php echo "$curp"; ?>">
                        <button class="btn btn-light" type="submit" name="generar" id="generar">Generar PDF</button>
                        </form>

                        <?php
                            }else{
                        ?>

                            <h3 class="bad">¡Ups ha ocurrido un error!</h3>

                        <?php
                            }
                        ?>
                </div>
            </div>
        </div>
        <script src="js/generar_pdf.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
    </body>
</html>