<?php
    session_start();
    if(isset($_SESSION["usuario"])){}else{
        $_SESSION["usuario"] = "alumno";
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/index.css">
    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/index.js"></script>
</head>
<body>
    <div class="container justify-content-center">
        <div class="row justify-content-center present_card">
            <img class="col-lg-2 col-md-4 col-sm-4 hdr_img" src="img/escom.png" alt="ESCOM">
            <div class="col-lg-6 col-md-4 col-sm-4"></div>
            <img class="col-lg-2 col-md-4 col-sm-4 hdr_img" src="img/Logo.png" alt="IPN">
        </div>
        <div class="row justify-content-center">
            <h1 class="col-lg-8" id="bienvenido">Bienvenido 
                <?php
                    if($_SESSION["usuario"] == "root"){
                        echo "¡ <span id=\"letras_adm\">Administrador</span> !";
                    }else{
                        echo "al Registro de datos Generales para alumnos de nuevo ingreso";
                    }
                ?>
            </h1>
        </div>
        <div class="row buttons justify-content-center">
            <div class="row col-8 justify-content-center">
                <?php
                    if($_SESSION["usuario"] == "root"){
                ?>        
                        <div class="col col-lg-3 col-md-4 col-sm-12 mt-3">
                            <a class="botones btnpanel" href="admin.php">Panel de Control</a>
                        </div>
                <?php
                    }else{
                ?>
                    <div class="col col-lg-3 col-md-4 col-sm-12 mt-3">
                        <a class="botones btnadm" id="adminbtn">Administrador</a>
                    </div>
                <?php
                    }
                ?>
                <?php
                    if($_SESSION["usuario"] == "root"){
                ?>
                        <div class="col col-lg-3 col-md-4 col-sm-12 mt-3">
                            <a class="botones btnsalir">Cerrar Sesión</a>
                        </div>
                <?php
                    }else{
                ?>
                        <div class="col col-lg-3 col-md-4 col-sm-12 mt-3">
                            <a class="botones btnreg" href="form.html">Registrarse</a>
                        </div>
                <?php
                    }
                ?>

                <div class="col col-lg-3 col-md-4 col-sm-12 mt-3">
                    <a class="botones btnpdf">Recuperar PDF</a>
                </div>
            </div>
        </div>
        <div class="row logg justify-content-center">
            <div class="row col-8 login justify-content-center">
                <form class="row col-8 justify-content-center" id="formulario" novalidate>
                    <div class="row usuario_row">
                        <label class="col-lg-4 col-md-6 col-sm-12" for="usuario">Usuario: </label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input class="form-control" type="text" id="usuario" name="usuario" placeholder="Usuario" required>
                        </div>
                    </div>

                    <div class="row contra_row mt-4 mb-3">
                        <label class="col-lg-4 col-md-6 col-sm-12" for="contra">Contraseña: </label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input class="form-control" type="password" id="contra" name="contra" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div class="col-8 mt-4 mb-3 err_cred">Datos incorrectos</div>
                    <button class="col-lg-5 col-md-5 col-sm-12 mt-3 btn btn-primary" type="button" id="login">Iniciar Sesión</button>
                    <div class="col"></div>
                    <button class="col-ld-5 col-md-5 col-sm-12 mt-3 btn btn-outline-light back" type="button"><i class="bi bi-arrow-left-circle flecha"></i> Regresar</button>
                </form>

                
                <form class="row col-8 justify-content-center" id="form_recupera" method="post" target="_blank" action="recupera.php" novalidate>
                    <div class="row usuario_row">
                        <label class="col-lg-4 col-md-6 col-sm-12 lbl" for="boleta">Boleta: </label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input class="form-control" type="text" id="boleta" name="boleta" placeholder="Boleta" required>
                        </div>
                    </div>

                    <div class="row contra_row mt-4 mb-3">
                        <label class="col-lg-4 col-md-6 col-sm-12 lbl" for="curp">CURP: </label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input class="form-control" type="text" id="curp" name="curp" placeholder="CURP" required>
                        </div>
                    </div>
                    <button class="col-lg-5 col-md-5 col-sm-12 mt-3 btn btn-success" type="submit" id="recuperar">Recuperar PDF</button>
                    <div class="col"></div>
                    <button class="col-ld-5 col-md-5 col-sm-12 mt-3 btn btn-dark back" type="button"><i class="bi bi-arrow-left-circle flecha"></i> Regresar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

