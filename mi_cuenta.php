<?php 
include '../../dao/conexion.php';


session_start();

if(isset($_SESSION['id'])){


$id=$_SESSION['id'];



$dsn = 'mysql:host=localhost;dbname=registro_estudiantes';
$usuario = 'root';
$contrasena = '';
$opciones = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

try {
    $conexion = new PDO($dsn, $usuario, $contrasena, $opciones);

$sql="SELECT * FROM usuario WHERE id = $id ";
$estudiante=$conexion->query($sql);
$estudiante=$estudiante->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}

        

}else{
    header('location: ../vista/views/sesion.php');
}


?>
<!DOCTYPE html>

<html lang="es">


<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificación de Datos del Alumno</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
            padding: 20px;
        }
        .container {
            background-color: white;
            border: 1px solid blue;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="v_sesion.php"><button type="button" class="btn btn-primary btn-volver" style="margin-left: 95%;">Volver</button></a>
        <h2 class="mb-4">Perfil del alumno</h2>

        <?php  foreach($estudiante as $dato){

  ?>
        <form method="POST" action="../../controlador/c_actualizarDatosEstudiante.php" enctype= "multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $dato['nombre']; ?>" >
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="number">Contacto personal</label>
                        <input type="text" class="form-control" name="contacto_personal" value="<?php echo $dato['contacto_personal']; ?>" >
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $dato['apellidos']; ?>" >
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contactoFamiliar">Contacto de un familiar o Tutor</label>
                        <input type="text" class="form-control" id="apellidos" name="contacto_tutor" value="<?php echo $dato['contacto_tutor']; ?>" >
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="curso">Curso</label>
                        <input type="text" class="form-control" name="curso" value="<?php echo $dato['curso']; ?>" >
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="edad">Edad</label>
                        <input type="text" class="form-control" id="apellidos" name="edad" value="<?php echo $dato['edad']; ?>" >
                    </div>
                    
                </div>
        
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidos">Domicilio</label>
                        <input type="text" class="form-control" name="domicilio" value="<?php echo $dato['domicilio']; ?>"   >
                    </div>
                   
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidos">Nombre de usuario</label>
                        <input type="text" class="form-control" id="apellidos" name="usuario" value="<?php echo $dato['nombre_usuario']; ?>" >
                    </div>
                   
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidos">Contraseña</label>
                        <input type="text" class="form-control" id="apellidos" name="contrasena" value="<?php echo $dato['contrasena']; ?>" >
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" id="apellidos" name="correo" value="<?php echo $dato['correo'];
                         ?>" >
                    </div>          
                </div>
                <input type="text" name="id" value="<?php echo $dato['id'];
                         ?>" hidden>
          </div>
           <a href=""><input type="submit" class="btn btn-primary" style="margin-left: 80%;" value="Actualizar">
        </form>
            <?php  }?>
    </div>
</body>
</html>
