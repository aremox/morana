<?php

namespace My\RecipesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use My\RecipesBundle\Entity\Recipe;

class RecipeController extends Controller
{
    public function listAction($page)
    {
        return new Response('<html><body><p>No hay recetas</p></body></html>');
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
        $recipe = Recipe();
        $recipe->setName('Pollo al pil-pil');
        $recipe->setDescription('...');

        $em = $this->getDoctrine()->getManager();
        $em->persist($recipe);
        $em->flush();

        return new Response('Creada receta con id '.$recipe->getId());
    }
}
