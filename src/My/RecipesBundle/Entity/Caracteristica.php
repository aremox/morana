<?php

namespace My\RecipesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caracteristicas
 */
class Caracteristica
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $ruta;

    /**
     * @var string
     */
    private $descripcion;

    public function __construct()
    {
       
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
     * @return Caracteristicas
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Caracteristicas
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
