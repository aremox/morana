<?php

namespace My\RecipesBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

class ElementosCategoria
{
    private $repository;

    public function __construct(ObjectManager $om) {
        $this->repositoryElementos = $om->getRepository('MyRecipesBundle:Elemento');
        $this->repositoryCategorias = $om->getRepository('MyRecipesBundle:Categoria');
    }

    public function filtarCategoria( $categoria)
    {
        if($categoria == 'all'){
            return $this->repositoryElementos->findAll();
        }else{
            return $this->repositoryElementos->findCategoria($categoria);
        }
        
    }

    public function obtenerCategoria( $categoria)
    {
        if($categoria == 'all'){
            return $this->repositoryCategorias->findAll();
        }else{
            return $categoria;
        }
        
    }
}