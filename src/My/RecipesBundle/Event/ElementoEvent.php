<?php
namespace My\RecipesBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use My\RecipesBundle\Entity\Elemento;

class ElementoEvent extends Event
{

    private $elemento;

    public function __construct(Elemento $elemento)
    {
        $this->elemento = $elemento;
    }

    public function getElemento()
    {
        return $this->elemento;
    }
}