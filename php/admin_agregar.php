<?php
    session_start();
    if($_SESSION["usuario"] != "root"){
        header("Location: ../lost.html");
    }else{
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
        //$conexion = mysqli_connect("localhost", "root", "", "sem20241");
        include("conexion.php");
        // Verificamos el numero de registros por horario para buscar cupo
    
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
    
        if(!$resultado){
            echo "Error";
        }else{
            echo "El alumno quedó registrado a las $horario am en el Laboratorio $laboratorio";
        }
    }
?>