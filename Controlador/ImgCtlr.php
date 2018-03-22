<?php

/**
 * Created by PhpStorm.
 * User: Cristtian PC
 * Date: 24/01/2018
 * Time: 18:18
 */

require_once (__DIR__.'/../Modelo/Img.php');

if(!empty($_GET['action'])){
    ImgCtlr::main($_GET['action']);
}else{
    echo "Ninguna Accion";
}
class ImgCtlr
{

    static function main($action){
        if ($action == "crear"){
            ImgCtlr::crear();
        }
    }

    static public function crear (){
        try {

            $imgs = array();
            $imgs['id_peli'] = $_POST['idpeli'];
            $nompeli = $_POST['nombre'];


            $carpetaDestino="../Vista/img/";

            # si hay algun archivo que subir
            if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0])
            {

                # recorremos todos los arhivos que se han subido
                for($i=0;$i<count($_FILES["archivo"]["name"]);$i++)
                {

                    # si es un formato de imagen
                    if($_FILES["archivo"]["type"][$i]=="image/jpeg" || $_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"][$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png")
                    {

                        if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                        {
                            $origen=$_FILES["archivo"]["tmp_name"][$i];
                            $destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];

                            if(@move_uploaded_file($origen, $destino))
                            {
                                echo "<br>".$_FILES["archivo"]["name"][$i]." movido correctamente";
                               // $nom = substr(strrchr($_FILES["archivo"]["name"][$i],"."),1);
                                $imgs['Ruta'] = "img/".$_FILES["archivo"]["name"][$i];
                                $Img = new Img($imgs);
                                $Img->insert();
                                header("Location: ../Vista/ListaImg.php?000");
                            }else{
                                echo "<br>No se ha podido mover el archivo: ".$_FILES["archivo"]["name"][$i];
                            }
                        }else{
                            echo "<br>No se ha podido crear la carpeta: ".$carpetaDestino;
                        }
                    }else{
                        echo "<br>".$_FILES["archivo"]["name"][$i]." - NO es imagen jpg, png o gif";
                    }
                }
            }else{
                header("Location: ../Vista/ListaImg.php?000");
            }







        } catch (Exception $e) {
            header("Location: ../Vista/ListaImg.php?noo");
        }
    }

}