<?php
// src/My/RecipesBundle/Model/ElementoCreator.php
namespace My\RecipesBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;
use My\RecipesBundle\Entity\Elemento;
use Symfony\Component\EventDispatcher\EventDispatcher;
use My\RecipesBundle\Event\RecipesListener;

class ElementoCreator
{

    private $om;

    public function __construct(ObjectManager $om) {
        $this->om = $om;
    }

    public function create(Elemento $elemento)
    {
        $this->om->persist($elemento);
        $this->om->flush();
        $dispatcher = new EventDispatcher();
		$listener = new RecipesListener();
		$dispatcher->addListener('elemento.create', array($listener, 'onElementoCreate'));
    }
}