<?php

namespace My\RecipesBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use My\RecipesBundle\Entity\Recipe;
use My\RecipesBundle\Entity\Author;
use My\RecipesBundle\Entity\Ingredient;
use My\RecipesBundle\Form\Type\RecipeType;
use My\RecipesBundle\Event\RecipeEvent;

class RecipeController extends Controller
{
    public function listAction($page)
    {
        return new Response('<html><body><p>No hay recetas</p></body></html>');
    }

    public function showIdAction($recipe_id, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Recipe');
        $recipe = $repository->find($recipe_id);
        $recipe->setName($this->get('translator')->trans($recipe->getName()));
        $session = $request->getSession();
        $session->set('clave','valor');
        $session->get('clave');
        $session->getFlashBag()->add(
            'notice',
            'Has publicado una nueva receta');
        //return new Response('<html><body><p>'.print_r($recipe).'</p></body></html>');
        return $this->render('MyRecipesBundle:Recipe:show.html.twig', array(
            'recipe' => $recipe));
             
    }

    public function showAction($recipe_name, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Recipe');
        $recipe = $repository->findOneByName($recipe_name);
        $session = $request->getSession();
        $session->set('clave','valor');
        $session->get('clave');
        $session->getFlashBag()->add(
        	'notice',
        	'Has publicado una nueva receta');
        return new Response('<html><body><p>...</p></body></html>');
		/*return $this->render('MyRecipesBundle:Recipe:show.html.twig', array(
			'recipe' => $recipe));
            */  
    }

    /**
     * @Template()
     */
    public function createAction(Request $request)
    {
        $recipe = new Recipe();
        $form = $this->createForm(new RecipeType, $recipe);
        $form->add('save', 'submit');
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->get('my_recipes.recipe_creator')->create($recipe);
            $recipeEvent = new RecipeEvent($recipe);
            $this->get('event_dispatcher')->dispatch('recipe.create', $recipeEvent);
            return $this->redirect($this->generateUrl('recipes_show_id', array('recipe_id' => $recipe->getId() )));
        }
        return array('form' => $form->createView());

    }
    /**
    * @Template()
    */
    public function topChefsAction()
    {
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Author');
        $chefs = $repository->findTopChefs();
        return array('chefs' => $chefs);
        //return new Response('<html><body><p>'.print_r($chefs).'</p></body></html>');
    }
    /*
    * @Template("mMyRecipesBundle:Default:lastRecipes.html.twig")
    */
    public function lastRecipesAction(Request $request)
    {
        $date = new \DateTime('-10 days');
       
        return $this->render('MyRecipesBundle:Default:lastRecipes.html.twig', 
            array(
            'recipes' => $this->get('my_recipes.last_recipes')->findFrom($date)
            )
            );
        //return new Response('<html><body><p>'.print_r($recipes).'</p></body></html>');
        //return (array('recipes' => $recipes));
        
    }

    /**
     * @Template()
     */
    public function editAction(Recipe $recipe, Request $request)
    {
        $form = $this->createForm(new RecipeType, $recipe);
        $form->add('save', 'submit');
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirect($this->generateUrl('recipes_show_id', array('recipe_id' => $recipe->getId())));
        }
        return array(
            'form' => $form->createView(),
            'recipe' => $recipe);
    }
}
