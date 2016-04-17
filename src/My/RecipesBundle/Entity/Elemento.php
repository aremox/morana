<?php

namespace My\RecipesBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Elemento
{
    private $id;
    protected $nombre;
    protected $logotipo;
    protected $galeria;
    protected $telefono;
    protected $gps_latitud;
    protected $gps_longitud;
    protected $mail;
    protected $direccion;
    protected $localidad;
    protected $codigo_postal;
    protected $descripcion;
    protected $ruta;
    protected $usuario;
    protected $categoria;
    protected $caracteristicas;


    public function __construct()
    {
        $this->caracteristicas = new ArrayCollection();
    }

    public function add(Caracteristica $caracteristica)
    {
        $this->caracteristicas[] = $caracteristica;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Elemento
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set logotipo
     *
     * @param string $logotipo
     * @return Elemento
     */
    public function setLogotipo($logotipo)
    {
        $this->logotipo = $logotipo;

        return $this;
    }

    /**
     * Get logotipo
     *
     * @return string 
     */
    public function getLogotipo()
    {
        return $this->logotipo;
    }

    /**
     * Set galeria
     *
     * @param string $galeria
     * @return Elemento
     */
    public function setGaleria($galeria)
    {
        $this->galeria = $galeria;

        return $this;
    }

    /**
     * Get galeria
     *
     * @return string 
     */
    public function getGaleria()
    {
        return $this->galeria;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     * @return Elemento
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set gps_latitud
     *
     * @param float $gpsLatitud
     * @return Elemento
     */
    public function setGpsLatitud($gpsLatitud)
    {
        $this->gps_latitud = $gpsLatitud;

        return $this;
    }

    /**
     * Get gps_latitud
     *
     * @return float 
     */
    public function getGpsLatitud()
    {
        return $this->gps_latitud;
    }

    /**
     * Set gps_longitud
     *
     * @param float $gpsLongitud
     * @return Elemento
     */
    public function setGpsLongitud($gpsLongitud)
    {
        $this->gps_longitud = $gpsLongitud;

        return $this;
    }

    /**
     * Get gps_longitud
     *
     * @return float 
     */
    public function getGpsLongitud()
    {
        return $this->gps_longitud;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Elemento
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Elemento
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set localidad
     *
     * @param string $localidad
     * @return Elemento
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return string 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Elemento
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

     /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Caracteristicas
     */
    public function setRuta($ruta)
    {
        $this->ruta = str_replace(" ","_",$ruta);

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getRuta()
    {
        return $this->ruta;
    }
}
