<?php

namespace My\RecipesBundle\Event;

use My\RecipesBundle\Entity\Elemento;
use Symfony\Component\HttpKernel\Log\LoggerInterface;
use Monolog\Logger;

class ElementoListener
{
    private $logger;

    public function __construct( $logger )
    {
        $this->logger = $logger;
    }

    public function onElementoCreate(ElementoEvent $event)
    {
        $elemento = $event->getElemento();
        $this->notifyToAdmins($elemento);
    }


    private function notifyToAdmins(Elemento $elemento)
    {
        //$logger = $this->get('logger');
        //$logger->info('Se inserta un nuevo elemento');
        //$logger->err('An error occurred');
        $this->logger->info('Se inserta un nuevo elemento '.$elemento->getId()." ".$elemento->getNombre());
    }
}