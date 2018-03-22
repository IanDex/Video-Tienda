<?php

/**
 * Created by PhpStorm.
 * User: Cristtian PC
 * Date: 23/01/2018
 * Time: 18:12
 */

require_once (__DIR__.'/../Modelo/Peliculas.php');

if(!empty($_GET['action'])){
    PeliculasCtlr::main($_GET['action']);
}else{
    echo "Ninguna Accion";
}
class PeliculasCtlr
{

    static function main($action){
        if ($action == "crear"){
            PeliculasCtlr::crear();
        }
    }

    static public function crear (){
        try {
            $arrayPelicula = array();
            $arrayPelicula['Codigo'] = $_POST['Codigo'];
            $arrayPelicula['Nombre'] = $_POST['Nombre'];
            $arrayPelicula['Descripcion'] = $_POST['Descripcion'];
            $Pelicula = new Peliculas($arrayPelicula);
            $Pelicula->insert();
            header("Location: ../Vista/index.php?000");
        } catch (Exception $e) {
            header("Location: ../Vista/index.php?noo");
        }
    }

    public function buscarAll (){
        try {
            return Peliculas::getAll();
        } catch (Exception $e) {
            header("Location: ../ListaImg.php?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return Peliculas::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../ListaImg.php?respuesta=error");
        }
    }
}
?>