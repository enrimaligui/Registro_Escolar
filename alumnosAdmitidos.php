

<?php
 

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

$sql="SELECT * FROM usuario WHERE estado ='admitido'";
$estudiante=$conexion->query($sql);
$estudiante=$estudiante->fetchAll(PDO::FETCH_ASSOC);

    // Aquí puedes realizar consultas a la base de datos utilizando $conexion
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../lib/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles-uslog.css">
    <link rel="stylesheet" href="css/styles2-uslog.css">
    <link rel="stylesheet" href="css/tabla-estilos.css">
</head>

<body style="margin:auto;">
<div class="l-navbar" id="navbar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav__logo">
                        <span class="nav__logo-text" style="color: yellow">|||X-Advanced</span>
                    </a>
    
                    <div class="nav__palanca" id="nav-palanca">
                        <i class='bx bx-chevron-right'></i>
                    </div>
    
                    <ul class="nav__lista">
                        <a href="#" class="nav__enlace active">
                            <i class='bx bx-grid-alt nav__icon'></i>
                            <span class="nav__textoo">Inicio</span>
                        </a>
                        <a href="../index.php" class="nav__enlace active">
                            <i class='bx bx-grid-alt nav__icon'></i>
                            <span class="nav__textoo">Lista General</span>
                        </a>
                        <a href="alumnosAdmitidos.<?php  ?>" class="nav__enlace active">
                            <i class='bx bx-grid-alt nav__icon'></i>
                            <span class="nav__textoo">Admitidos</span>
                        </a>
                        <a href="alumnosRechazados.<?php  ?>" class="nav__enlace active">
                            <i class='bx bx-grid-alt nav__icon'></i>
                            <span class="nav__textoo">Rechazados</span>
                        </a>
                        <a href="mi_cuenta.html" class="nav__enlace">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__textoo">Mi cuenta</span>
                        </a>                
                    </ul>
                </div>
                <a href="index.html" class="nav__enlace">           
                    <i class='bx bx-log-out-circle nav__icon'></i>
                    <span class="nav__textoo">Cerrar Sesión</span>
                </a>
            </nav>
        </div>
        <div class="division2">
        <div class="container mt-3">
        <h3>Lista de Alumnos Rechazados</h3>



        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Foto carnet</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Domicilio</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
           
            <tbody>
                 <?php foreach ($estudiante as $fila){ ?>
                <tr id="tabla">
                <td><?php echo $fila['id']; ?></td>
                <td>
                    <?php if ($fila['foto_carnet'] != '') { ?>
                        <img width=40px heigth=40px src="<?php echo $fila['foto_carnet']; ?>" alt="" class="avatar">
                    <?php } else { ?>
                        <div class="avatar"></div>
                    <?php } ?>
                </td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['apellidos']; ?></td>
                <td><?php echo $fila['correo']; ?></td>
                <td><?php echo $fila['domicilio']; ?></td>
                <td><?php echo $fila['edad']; ?></td>
                <td>
                    <a href="vista/gestion_alumnos.html"><button type="button" class="btn btn-primary btn-sm">Más</button></a>
                </td>
                </tr>
                <?php   }?>

            </tbody>
                    </table>
    </div>

    <div id="ventana-informacion" style="display: none;">
        <!-- Aquí se mostrará toda la información del alumno -->
    </div>
        </div>

    

    <script src="../lib/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/main-uslog.js"></script>
    <script src="js/script-uslog.js"></script>
    </script>
</body>

</html>
