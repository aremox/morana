<?php

namespace My\RecipesBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use My\RecipesBundle\Entity\Rol;


/**
 * Usuario
 */
class Usuario implements UserInterface
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
    private $apellido1;

    /**
     * @var string
     */
    private $apellido2;

    /**
     * @var int
     */
    private $telefono;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var string
     */
    private $localidad;

    /**
     * @var int
     */
    private $codigoPostal;

    /**
     * @var string
     */
    private $nota;

    /**
     * @var string
     */
    private $ruta;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $salt;

    
    protected $rolesObj;

    protected $elementos;

  public function __construct()
    {
       $this->elementos = new ArrayCollection;
       $this->rolesObj = new ArrayCollection;
       $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);

    }

    public function getElementos()
    {
        return $this->elementos;
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
     * @return Usuario
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
     * Set apellido1
     *
     * @param string $apellido1
     * @return Usuario
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * Get apellido1
     *
     * @return string 
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set apellido2
     *
     * @param string $apellido2
     * @return Usuario
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * Get apellido2
     *
     * @return string 
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Set movil
     *
     * @param integer $movil
     * @return Usuario
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get movil
     *
     * @return integer 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * Set codigoPostal
     *
     * @param integer $codigoPostal
     * @return Usuario
     */
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get codigoPostal
     *
     * @return integer 
     */
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    /**
     * Set nota
     *
     * @param string $nota
     * @return Usuario
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return string 
     */
    public function getNota()
    {
        return $this->nota;
    }

     /**
     * Set ruta
     *
     * @param string $ruta
     * @return Usuario
     */
    public function setRuta($mail)
    {
        $this->ruta = str_replace(" ","_",$mail);

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

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

     /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {   
        $this->password = $password;
        
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Usuario
     */
    public function setSalt($salt)
    {
        $this->$salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set Roles_obj
     *
     * @param string $Roles_obj
     * @return Usuario
     */
    public function setRolesObj($rolesObj)
    {
        $this->$rolesObj = $rolesObj;

        return $this;
    }

    /**
     * Get Roles_obj
     *
     * @return string 
     */
    public function getRolesObj()
    {
        return $this->rolesObj;
    }


    /**
     * Get roles
     *
     * @return string 
     */
    public function getRoles()
    {
        $roles_array = array('ROLE_USER');

        foreach ($this->rolesObj as $roles) {
                $roles_array[] = $roles->getRol();
                
            }
        return $roles_array;
    }

    public function eraseCredentials()
    {
    }

    public function getUsername()
    {
        return $this->mail;
    }
}
