<?php
namespace My\RecipesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use My\RecipesBundle\Form\Type\ElementoType;

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
            $em = $this->getDoctrine()->getManager();
            $em->persist($elemento);
            $em->flush();
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
            $this->getDoctrine()->getManager()->flush();
            return $this->redirect($this->generateUrl('my_recipes_elemento_ver_id', array('elemento_id' => $elemento->getId())));
        }
        return array(
            'form' => $form->createView(),
            'elemento' => $elemento);
    }
}