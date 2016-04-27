<?php
namespace My\RecipesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use My\RecipesBundle\Form\Type\CaracteristicaType;

use My\RecipesBundle\Entity\Caracteristica;

class CaracteristicaController extends Controller
{
	/**
     * @Template()
     */
    public function createAction(Request $request)
    {
        $caracteristica = new Caracteristica;
        $validator = $this->get('validator');
        $errors = $validator->validate($caracteristica);
        $form = $this->createForm(new CaracteristicaType, $caracteristica);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $caracteristica->setRuta($caracteristica->getNombre());
            $em = $this->getDoctrine()->getManager();
            $em->persist($caracteristica);
            $em->flush();
            return $this->redirect($this->generateUrl('my_recipes_caracteristica_ver_id', 
                array('caracteristica_id' => $caracteristica->getId())));
        }
        return array('form' => $form->createView());
    }

    public function showIdAction($caracteristica_id, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Caracteristica');
        $caracteristica = $repository->find($caracteristica_id);
        return $this->render('MyRecipesBundle:Caracteristica:show.html.twig', array(
            'caracteristica' => $caracteristica));
             
    }

     public function showRutaAction($caracteristica_ruta, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Caracteristica');
        $caracteristica = $repository->findOneByRuta($caracteristica_ruta);
        return $this->render('MyRecipesBundle:Caracteristica:show.html.twig', array(
            'caracteristica' => $caracteristica));
             
    }

    /**
     * @Template()
     */
    public function editAction(Caracteristica $caracteristica, Request $request)
    {
        $form = $this->createForm(new CaracteristicaType, $caracteristica);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirect($this->generateUrl('my_recipes_caracteristica_ver_id', array('caracteristica_id' => $caracteristica->getId())));
        }
        return array(
            'form' => $form->createView(),
            'caracteristica' => $caracteristica);
    }

    public function showAllAction( $formato, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Caracteristica');
        $caracteristicas = $repository->findAll();

        switch ($formato) {
        case "bloques":
            return $this->render('MyRecipesBundle:Caracteristica:showAll.html.twig', array(
                'caracteristicas' => $caracteristicas));
            break;
        case "lista":
            return $this->render('MyRecipesBundle:Caracteristica:showAllList.html.twig', array(
                'caracteristicas' => $caracteristicas));
            break;
        default:
            return $this->render('MyRecipesBundle:Caracteristica:showAll.html.twig', array(
                'caracteristicas' => $caracteristicas));
        
        }         
    }
}