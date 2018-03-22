<?php
require_once('Conexion.php');
/**
 * Created by PhpStorm.
 * User: Cristtian PC
 * Date: 24/01/2018
 * Time: 18:14
 */
class Img extends Conexion
{

    private $id_Img;
    private $id_peli;
    private $Ruta;

    public function __construct($ImagenData = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($ImagenData)>1){ //
            foreach ($ImagenData as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->id_peli = "";
            $this->id_Img = "";
            $this->Ruta = "";
        }
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }
    /**
     * @return mixed
     */
    public function getIdImg()
    {
        return $this->id_Img;
    }

    /**
     * @param mixed $id_Img
     */
    public function setIdImg($id_Img)
    {
        $this->id_Img = $id_Img;
    }

    /**
     * @return mixed
     */
    public function getIdPeli()
    {
        return $this->id_peli;
    }

    /**
     * @param mixed $id_peli
     */
    public function setIdPeli($id_peli)
    {
        $this->id_peli = $id_peli;
    }

    /**
     * @return mixed
     */
    public function getRuta()
    {
        return $this->Ruta;
    }

    /**
     * @param mixed $Ruta
     */
    public function setRuta($Ruta)
    {
        $this->Ruta = $Ruta;
    }



    protected static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    protected static function buscar($query)
    {
        // TODO: Implement buscar() method.
    }

    protected static function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function insert()
    {
        $this->insertRow("INSERT INTO video_tienda.imagenes VALUES (NULL, ?, ? )", array(
                $this->id_peli,
                $this->Ruta,
            )
        );
        $this->Disconnect();
    }


    protected function editar()
    {
        // TODO: Implement editar() method.
    }


    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
}