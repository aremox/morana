<?php

namespace My\RecipesBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ElementoRepository extends EntityRepository {

    public function findCategoria($ruta) {
        return $this->getEntityManager()
            ->createQuery('SELECT a
                           FROM MyRecipesBundle:Elemento a
                           JOIN a.categoria r
                           WHERE r.ruta = :ruta')
            ->setParameter('ruta', $ruta)
            ->getResult();
    }

}