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

	

    public function indexAction($name, Request $request, $_locale )
    {
        $session = $request->getSession();
        $request = $this->getRequest();
        if( $request->getLocale()){
            $request->setLocale($_locale);
            $session->getFlashBag()->add(
                'Locale',
                $request->getLocale()
            );
        }
        

        $usr= $this->get('security.context')->getToken()->getUser();
        if( $usr != "anon."){
            $name = $usr->getNombre();
        }
        

    	$translated = $this->get('translator')->trans('Hola %name%', array('%name%' => $name ));

    	return $this->render('MyRecipesBundle:Default:base.html.twig', 
            array(
            'bienvenida' => $translated
            )
            );
    	//return $this->render('MyRecipesBundle:Default:base.html.twig');
        //return $this->render('MyRecipesBundle:Default:index.html.twig');
    }
}
