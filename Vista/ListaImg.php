<?php require ("../Modelo/Peliculas.php")?>
<!DOCTYPE html>
<html>
    <head>
        <title>Video - Tienda</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" />
        <link href="css/v-nav-menu.css" rel="stylesheet" />
        <link href="css/v-shortcodes.css" rel="stylesheet" />
        <link href="css/v-form-element.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/custom.css">

    </head>

    <body>

    <!--Header-->
    <?php  require_once ("snippers/header.php")?>
    <!--End Header-->
    <?php  require_once ("snippers/modal.php")?>
    <div id="container">

        <div class="v-page-wrap no-top-spacing padding-50 body-sign">

            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="v-heading-v2">
                            <h3>Listado de Peliculas</h3>
                        </div>
                        <div>
                            <h4>Haga Clic en el Nombre para agragar imagenes.</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php
                $Peliculas = Peliculas::getAll();
                foreach ($Peliculas as $datosp){
                ?>
                    <div class="col-sm-4">
                        <ul class="v-list-v2">
                    <li><i class="fa fa-film"></i><a href="#<?php echo $datosp->getIdPeli(); ?> " data-toggle="modal"><?php echo $datosp->getNombre(); ?></a></li>
                        </ul>
                    </div>
                    <div id="<?php echo $datosp->getIdPeli(); ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <h3 id="modal-label">Elija las imagenes para: <small><?php echo " ".$datosp->getNombre(); ?></small></h3>
                                </div>
                                <div class="modal-body">
                                    <form action="../Controlador/ImgCtlr.php?action=crear" method="post" enctype="multipart/form-data">
                                    <input type="text" name="idpeli" id="idpeli" value="<?php echo $datosp->getIdPeli(); ?>" hidden>
                                    <input type="text" name="nombre" id="nombre" value="<?php echo $datosp->getNombre(); ?>" hidden>
                                    <input type="file" name="archivo[]" multiple required >
                                        <div class="ian">
                                            <button type="submit" class="btn v-btn  v-small-button v-second-dark">Ok</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                </div>

        </div>

    </div>

    <!--// BACK TO TOP //-->
    <div id="back-to-top" class="animate-top"><i class="fa fa-angle-up"></i></div>

    <!-- Libs -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validaciones.js"></script>

    </body>

    </html>
