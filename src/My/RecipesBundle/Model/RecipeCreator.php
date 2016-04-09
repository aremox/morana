<?php
namespace My\RecipesBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;
use My\RecipesBundle\Entity\Recipe;
use Symfony\Component\EventDispatcher\EventDispatcher;
use My\RecipesBundle\Event\RecipesListener;

class RecipeCreator
{

    private $om;

    public function __construct(ObjectManager $om) {
        $this->om = $om;
    }

    public function create(Recipe $recipe)
    {
        $this->om->persist($recipe);
        $this->om->flush();
        $dispatcher = new EventDispatcher();
		$listener = new RecipesListener();
		$dispatcher->addListener('recipe.create', array($listener, 'onRecipeCreate'));
    }
}