<?php
namespace My\RecipesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use My\RecipesBundle\Form\Type\ElementoType;
use My\RecipesBundle\Event\ElementoEvent;

use My\RecipesBundle\Entity\Elemento;

class ElementoController extends Controller
{
	/**
     * @Template()
     */
    public function createAction(Request $request)
    {
        $elemento = new Elemento;
        $validator = $this->get('validator');
        $errors = $validator->validate($elemento);
        $form = $this->createForm(new ElementoType, $elemento);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $elemento->setRuta($elemento->getNombre());
            $this->get('my_recipes.elemento_creator')->create($elemento);
            $elementoEvent = new ElementoEvent($elemento);
            $this->get('event_dispatcher')->dispatch('elemento.create', $elementoEvent);
            
            return $this->redirect($this->generateUrl('my_recipes_elemento_ver_id', 
                array('elemento_id' => $elemento->getId())));
        }
        return array('form' => $form->createView());
    }

    public function showIdAction($elemento_id, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Elemento');
        $elemento = $repository->find($elemento_id);
        return $this->render('MyRecipesBundle:Elemento:show.html.twig', array(
            'elemento' => $elemento));
             
    }

     public function showRutaAction($elemento_ruta, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Elemento');
        $elemento = $repository->findOneByRuta($elemento_ruta);
        return $this->render('MyRecipesBundle:Elemento:show.html.twig', array(
            'elemento' => $elemento));
             
    }

    /**
     * @Template()
     */
    public function editAction(Elemento $elemento, Request $request)
    {
        $form = $this->createForm(new ElementoType, $elemento);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $elemento->setRuta($elemento->getNombre());
            $this->getDoctrine()->getManager()->flush();
            return $this->redirect($this->generateUrl('my_recipes_elemento_ver_id', array('elemento_id' => $elemento->getId())));
        }
        return array(
            'form' => $form->createView(),
            'elemento' => $elemento);
    }

    public function showAllAction( $formato, $categoria, Request $request)
    {
         $elementos = $this->get('my_recipes.Elementos_Categoria')->filtarCategoria($categoria);
         $categorias = $this->get('my_recipes.Elementos_Categoria')->obtenerCategoria($categoria);
        
        switch ($formato) {
        case "bloques":
            return $this->render('MyRecipesBundle:Elemento:showAll.html.twig', array(
                'elementos' => $elementos, 'categorias' => $categorias));
            break;
        case "lista":
            return $this->render('MyRecipesBundle:Elemento:showAllList.html.twig', array(
                'elementos' => $elementos));
            break;
        case "portada":
            return $this->render('MyRecipesBundle:Elemento:showPortada.html.twig', array(
                'elementos' => $elementos));
            break;
        default:
            return $this->render('MyRecipesBundle:Elemento:showAll.html.twig', array(
                'elementos' => $elementos));
        
        }         
    }
}