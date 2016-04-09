<?php

namespace My\RecipesBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use My\RecipesBundle\Entity\Recipe;

class RecipeEvent extends Event
{

    protected $recipe;

    public function __construct(Recipe $recipe)
    {
        $this->recipe = $recipe;
    }

    public function getRecipe()
    {
        return $this->recipe;
    }
}