<?php
    if(!empty($_POST["curp"])){
        include("conexion.php");

        $curp = $_POST["curp"];

        $query = "DELETE FROM alumnos WHERE curp = '$curp'";

        $resultado = mysqli_query($conexion, $query);

        if(!$resultado){
            die("Error de consulta".mysqli_error($conexion));
        }else{
            echo "Se eliminó el registro";
        }
    }else{
        header("Location: ../lost.html");
    }
?>