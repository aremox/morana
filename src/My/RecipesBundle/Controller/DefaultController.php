<?php

namespace My\RecipesBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use My\RecipesBundle\Entity\Recipe;
use My\RecipesBundle\Entity\Author;
use My\RecipesBundle\Entity\Ingredient;
use My\RecipesBundle\Repository\RecipeRepository;

class DefaultController extends Controller
{

	

    public function indexAction()
    {
    	
    	return $this->render('MyRecipesBundle:Default:base.html.twig');
        //return $this->render('MyRecipesBundle:Default:index.html.twig');
    }
    /*
    * @Template("mMyRecipesBundle:Default:lastRecipes.html.twig")
    */
    public function lastRecipesAction(Request $request)
    {
    	$date = new \DateTime('-10 days');
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Recipe');
        $session = $request->getSession();
        $session->getFlashBag()->add(
            'array',
            'aaaa');
        //$recipes = $repository->findPublishedAfter();
        $recipes = $repository->findAll();
        return $this->render('MyRecipesBundle:Default:lastRecipes.html.twig', array('recipes' => $recipes));
        //return new Response('<html><body><p>'.print_r($recipes).'</p></body></html>');
        //return (array('recipes' => $recipes));
    	
    }
}
