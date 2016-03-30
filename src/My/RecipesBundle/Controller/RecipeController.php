<?php

namespace My\RecipesBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use My\RecipesBundle\Entity\Recipe;
use My\RecipesBundle\Entity\Author;
use My\RecipesBundle\Entity\Ingredient;

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

    public function createAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $autor = new Author('Karlos', 'Arguiñano');
       // $em->persist($autor);

        $ingredient = new Ingredient('Pollo');
        //$em->persist($ingredient);

        $recipe = new Recipe($autor, 'Pollo al pil-pil', 'Deliciosa y economica receta.', 'facil');
        $em->persist($recipe);

        $recipe->add($ingredient);

        $em->flush();

        return $this->redirect($this->generateUrl('recipes_show_id', array('recipe_id' => $recipe->getId() )));
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
}
