<?php

	namespace My\RecipesBundle\Twig;

	use My\RecipesBundle\Entity\Recipe;

	class RecipesExtension extends \Twig_Extension { 
		public function getFilters()
		{ 
			return array(
				new \Twig_SimpleFilter('cssClass',array($this,'cssClass'))
				);
		}

		public function cssClass($recipe)
		{
			$dificultad = $recipe->getDifficulty();
			if($dificultad == 'easy'){
				return 'easy';
			}

			if($dificultad == 'normal'){
				return 'normal';
			}

			if($dificultad == 'hard'){
				return 'hard';
			}

			return 'unknown';
		}

		public function getName()
		{
			return 'my_recipes_extension';
		}

		
	}