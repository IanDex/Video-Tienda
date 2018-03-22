<?php require ("../Modelo/Peliculas.php")?>
<?php require ("../Modelo/Img.php")?>
<?php require ("../Modelo/conn.php")?>

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
    <link href="css/v-blog.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

</head>

<body>

<!--Header-->
<?php  require_once ("snippers/header.php")?>
<!--End Header-->
<?php  require_once ("snippers/modal.php")?>
<div id="container">

    <div class="v-page-wrap no-bottom-spacing">

        <div class="row fw-row">
            <div class="v-blog-widget col-sm-12">
                <div class="v-blog-wrap">
                    <div class="v-blog-items-wrap v-blog-masonry-fw ">
                        <ul class="v-blog-items row masonry-items first-load clearfix" id="blogGrid" style="padding-left: 30px; padding-right: 30px">

                            <?php
                            $Peliculas = Peliculas::getAll();

                            foreach ($Peliculas as $datosp){
                                ?>
                                <li class="v-blog-item col-sm-3">
                                    <div class="v-blog-masonry-item">
                                        <figure class="overlay-alt">
                                            <?php
                                            $var = $datosp->getIdPeli();
                                            $result = mysql_query("SELECT * FROM imagenes WHERE $var = imagenes.id_peli");
                                            while($row=mysql_fetch_assoc($result))
                                            {?>
                                            <img src="<?php echo $row['Ruta'] ?>" />
                                            <?php $var=null; }?>
                                            <a href="blog-standard-post.html" class="link-to-post"></a>

                                        </figure>
                                        <div class="v-blog-item-info">
                                            <h4><a href="blog-standard-post.html"><?php echo $datosp->getNombre(); ?></a></h4>
                                            <div class="v-blog-item-details"><small>Codigo: </small><?php echo $datosp->getCodigo(); ?></div>
                                            <div class="excerpt">
                                                <p>
                                                    <small>Descripcion:</small>
                                                    <br>
                                                    <?php echo $datosp->getDescripcion(); ?>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </li>

                                <?php
                            }
                            ?>



                        </ul>
                    </div>
                </div>
            </div>
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
