<?php

/**
 * Created by PhpStorm.
 * User: Cristtian PC
 * Date: 23/01/2018
 * Time: 18:12
 */
require_once('Conexion.php');

class Peliculas extends Conexion
{

    private $id_peli;
    private $Codigo;
    private $Nombre;
    private $Descripcion;

    public function __construct($Peliculas_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Peliculas_data)>1){ //
            foreach ($Peliculas_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->id_peli = "";
            $this->Nombre = "";
            $this->Descripcion = "";
        }
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    public static function buscarForId($id)
    {
        $Especial = new Especialidad();
        if ($id > 0){
            $getrow = $Especial->getRow("SELECT * FROM especialidad WHERE idEspecialidad =?", array($id));
            $Especial->idEspecialidad = $getrow['idEspecialidad'];
            $Especial->Nombre = $getrow['Nombre'];
            $Especial->Estado = $getrow['Estado'];
            $Especial->Disconnect();
            return $Especial;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $PeliculasD = array();
        $tmp = new Peliculas();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $pdatos = new Peliculas();
            $pdatos->id_peli = $valor['id_peli'];
            $pdatos->Nombre = $valor['Nombre'];
            $pdatos->Codigo = $valor['Codigo'];
            $pdatos->Descripcion = $valor['Descripcion'];
            array_push($PeliculasD, $pdatos);
        }
        $tmp->Disconnect();
        return $PeliculasD;
    }

    public static function getAll()
    {

        return Peliculas::buscar("SELECT * FROM peliculas");
    }


    public function insert()
    {
        $this->insertRow("INSERT INTO video_tienda.peliculas VALUES (NULL, ?, ?, ?)", array(
                $this->Codigo,
                $this->Nombre,
                $this->Descripcion,
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE mypet.especialidad SET Nombre = ?, Estado = ? WHERE idEspecialidad = ?", array(
            $this->Nombre,
            $this->Estado,
            $this->idEspecialidad,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
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
    public function getCodigo()
    {
        return $this->Codigo;
    }

    /**
     * @param mixed $Codigo
     */
    public function setCodigo($Codigo)
    {
        $this->Codigo = $Codigo;
    }



    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param string $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * @param mixed $Descripcion
     */
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }





}

