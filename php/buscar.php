<?php

    if(isset($_POST["search"])){
        include("conexion.php");

        $search = $_POST["search"];

        if(!empty($search)){
            $query = "SELECT * FROM alumnos WHERE nombre LIKE '$search%'";
            $result = mysqli_query($conexion, $query);

            if(!$result){
                die("Error de consulta".mysqli_error($conexion));
            }

            $json = array();
            while($row = mysqli_fetch_array($result)){
                $json[] = array(
                    "boleta" => $row["boleta"],
                    "nombre" => $row["nombre"],
                    "apellidoP" => $row["apellido_paterno"],
                    "apellidoM" => $row["apellido_materno"],
                    "fecha" => $row["fecha"],
                    "genero" => $row["genero"],
                    "curp" => $row["curp"],
                    "calle" => $row["calle"],
                    "numeroe" => $row["exterior"],
                    "numeroi" => $row["interior"],
                    "colonia" => $row["colonia"],
                    "alcaldia" => $row["alcaldia"],
                    "estado" => $row["estado"],
                    "cp" => $row["cp"],
                    "tel" => $row["telefono"],
                    "correo" => $row["correo"],
                    "escuela" => $row["escuela"],
                    "entidad" => $row["entidad"],
                    "promedio" => $row["promedio"],
                    "opcion" => $row["opcion"],
                    "discapacidad" => $row["discapacidad"],
                    "horario" => $row["horario"],
                    "laboratorio" => $row["laboratorio"]
                );
            }
            $jsonstring = json_encode($json, JSON_UNESCAPED_UNICODE);
            echo $jsonstring;
        }
    }else{
        header("Location: ../lost.html");
    }
?>