<?php

namespace My\RecipesBundle\Repository;

use Doctrine\ORM\EntityRepository;

 class RecipeRepository extends EntityRepository {

 	public function findPublishedAfter() {
 		return $this->getEntityManager()->createQuery('
 			SELECT r
 			 			FROM MyRecipesBundle:Recipe r
 			 			ORDER BY r.name 
 			')->setMaxResults(6)
 		->getResult();
 	}

 }