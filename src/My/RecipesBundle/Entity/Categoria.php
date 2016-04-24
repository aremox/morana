<?php

namespace My\RecipesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Categoria
 */
class Categoria
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
    private $foto;

    private $fotoReal;

    /**
     * @var string
     */
    private $descripcion;

    protected $elementos;


      public function __construct()
    {
       $this->elementos = new ArrayCollection;
    }

    public function getElementos()
    {
        return $this->elementos;
    }

    public function isValid()
    {
        if($this->fotoReal){
            $foto = str_replace(" ","_",$this->fotoReal->getClientOriginalName());
        return $foto != 'CARTEL_RUTA_octubre_9-12.jpg';
        }

        return true;
        
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
     * @return Categoria
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
     * Set foto
     *
     * @param string $foto
     * @return Categoria
     */
    public function setFoto($foto)
    {   
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Categoria
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
     * Set ruta
     *
     * @param string $ruta
     * @return Categoria
     */
    public function setRuta($ruta)
    {
        $this->ruta = str_replace(" ","_",$ruta);

        return $this;
    }

    /**
     * Get ruta
     *
     * @return string 
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    public function getFotoReal()
    {
        return $this->fotoReal;
    }

    public function setFotoReal($fotoReal)
    {
        $this->fotoReal = $fotoReal;

        return $this;
    }
}
