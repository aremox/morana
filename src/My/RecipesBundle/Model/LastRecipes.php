<?php

namespace My\RecipesBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

class LastRecipes
{
    private $repository;

    public function __construct(ObjectManager $om) {
        $this->repository = $om->getRepository('MyRecipesBundle:Recipe');
    }

    public function findFrom(\DateTime $from_date)
    {
        return $this->repository->findPublishedAfter();
        //return $this->repository->findAll();
    }
}