<?php

$id=$_GET['idEstudiante'];
// Parámetros de conexión
$dsn = 'mysql:host=localhost;dbname=registro_estudiantes';
$usuario = 'root';
$contrasena = '';
$opciones = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

// Crear una instancia de la clase PDO para manejar la conexión
try {
    $conexion = new PDO($dsn, $usuario, $contrasena, $opciones);

$sql="SELECT * FROM usuario WHERE id = $id ";
$estudiante=$conexion->query($sql);
$estudiante=$estudiante->fetchAll(PDO::FETCH_ASSOC);

    // Aquí puedes realizar consultas a la base de datos utilizando $conexion
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f2f2;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border: 1px solid #cccccc;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <a href="../index.php"><button type="button" class="btn btn-primary btn-volver" style="margin-left: 95%;">Volver</button></a>


    <div class="container">
        <h2 class="mb-4">Gestión de Alumnos</h2>

        <?php foreach($estudiante as $dato){?>
        <form method="POST" action="../controlador/c_aceptar_rechazar.php" enctype= "multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $dato['nombre'] ?>" >
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contacto personal">Contaco Personal</label>
                        <input type="text" class="form-control" name="contacto_personal" value="<?php echo $dato['contacto_personal'] ?>" >
                    </div>
                
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" value="<?php echo $dato['apellidos'] ?>" >
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidos">Contacto de un Familiar o Tutor</label>
                        <input type="text" class="form-control" id="apellidos" name="contacto_tutor" value="<?php echo $dato['contacto_tutor'] ?>" >
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="curso">curso</label>
                        <input type="text" class="form-control" id="apellidos" name="curso" value="<?php echo $dato['curso'] ?>" >
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidos">Foto Carnet</label>
                        <input type="file" class="form-control" name="foto_carnet" value="<?php echo $dato['foto_carnet'] ?>">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidos">Edad</label>
                        <input type="text" class="form-control" name="edad" value="<?php echo $dato['edad'] ?>">
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidos">Partida de Bautismo</label>
                        <input type="file" class="form-control" id="apellidos" name="fotoautismo" value="<?php echo $dato['partida_bautismo'] ?>">
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="domicilio">Domicilio</label>
                        <input type="text" class="form-control" name="domicilio" value="<?php echo $dato['domicilio'] ?>">
                    </div>
                   
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="usuario">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="apellidos" name="nombre_usuario" value="<?php echo $dato['nombre_usuario'] ?>">
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidos">Traslado Foto</label>
                        <input type="file" class="form-control" name="traslado_foto" value="<?php echo $dato['traslado_foto'] ?>">
                    </div>
                    
                </div>
                <div class="col-md-6" hidden>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" name="contrasena" class="form-control" value="<?php echo $dato['nombre'] ?>">
                    </div>
                     
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Correo</label>
                        <input type="email" class="form-control" id="nombre" name="correo" value="<?php echo $dato['correo'] ?>">

                        <input type="text" class="form-control" id="nombre" name="id" value="<?php echo $dato['id'] ?>" hidden>
                    </div>
                    
                </div>    
            </div>

            <div class="btn-group-center mt-4" style="margin-left: 45%;">
            <textarea name="mensaje" style="margin-left: 0%;"></textarea><br>
            <input type="submit" class="btn btn-danger mr-2" name="rechazar" value="RECHAZAR">
            <input type="submit" class="btn btn-success mr-2" name="aceptar" value="ACEPTAR">
        </div>
        </form>

    <?php  }?>
        
    </div>
</body>
</html>
