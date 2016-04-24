<?php

namespace My\RecipesBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

class ElementosCategoria
{
    private $repository;

    public function __construct(ObjectManager $om) {
        $this->repository = $om->getRepository('MyRecipesBundle:Elemento');
    }

    public function filtarCategoria( $categoria)
    {
        if($categoria == 'all'){
            return $this->repository->findAll();
        }else{
            return $this->repository->findCategoria($categoria);
        }
        
    }
}