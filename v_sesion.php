<?php


include('../../controlador/verificar_mensaje.php');




?>



<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- STYLES CSS -->


        <link rel="stylesheet" href="../css/styles-uslog.css">
        <link rel="stylesheet" href="../css/styles2-uslog.css">
        <link rel="stylesheet" href="../css/styles.css">

        <!-- BOX ICONS CSS-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <title>Sidebar menu</title>
    </head>
    <body id="body">
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
                        <a href="mi_cuenta.php" class="nav__enlace">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__textoo">Mi cuenta</span>
                        </a>                
                    </ul>
                </div>
                <a href="sesion.php" class="nav__enlace">           
                    <i class='bx bx-log-out-circle nav__icon'></i>
                    <span class="nav__textoo">Cerrar Sesión</span>
                </a>
            </nav>
        </div>
        <div class="division2">
            <div class="conta">
            <h2 class="my-4">Bandeja de Entrada</h2>

             <?php  foreach($estudiante as $dato){ 

                if($dato['estado']=="espera"){




              ?>
                <div id="mensjase">
                    <?php echo "ESTAS EN ESPERA"; }else ?>
                </div>



                    <?php    if($dato['estado']=="admitido"){ ?>


                    <div id="mensjase">


                                <?php  echo "HAS SIDO ADMITIDO. PUEDES PASAR AL EXAMEN"; }else{?>
                   
                </div>



                    <?php


                    $sql="SELECT mensaje FROM usuario WHERE id=$id";
                    $sql=$conexion->query($sql);
                    $sql=$sql->fetchAll(PDO::FETCH_ASSOC);





                     ?>

                  <div id="mensjase">

                    <?php 


                    foreach($sql as $dato){

                        echo $dato['mensaje'];
                        
                    }

                    } ?>
                              
                   
                </div>


            <?php  }?>



            <div id="inbox" class="list-group">
                <!-- Los mensajes se insertarán aquí -->
            </div>
        </div>
        </div>
    </body>








    <!-- MAIN JS -->
    <script src="../js/main-uslog.js"></script>
    <script src="../js/script-uslog.js"></script>
    <script src="../js/app.js"></script>
 


</html>