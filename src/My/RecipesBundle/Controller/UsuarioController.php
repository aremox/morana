<?php
namespace My\RecipesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use My\RecipesBundle\Form\Type\UsuarioType;
use My\RecipesBundle\Form\Type\RegisterType;

use My\RecipesBundle\Entity\Usuario;

class UsuarioController extends Controller
{
	/**
     * @Template()
     */
    public function createAction(Request $request)
    {
        $usuario = new Usuario;
        $validator = $this->get('validator');
        $errors = $validator->validate($usuario);
        $form = $this->createForm(new UsuarioType, $usuario);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();
            return $this->redirect($this->generateUrl('my_recipes_usuario_ver_id', 
                array('usuario_id' => $usuario->getId())));
        }
        return array('form' => $form->createView());
    }

    public function showIdAction($usuario_id, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Usuario');
        $usuario = $repository->find($usuario_id);
        return $this->render('MyRecipesBundle:Usuario:show.html.twig', array(
            'usuario' => $usuario));
             
    }

     public function showRutaAction($usuario_ruta, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Usuario');
        $usuario = $repository->findOneByRuta($usuario_ruta);
        return $this->render('MyRecipesBundle:Usuario:show.html.twig', array(
            'usuario' => $usuario));
             
    }

    /**
     * @Template()
     */
    public function editAction(Usuario $usuario, Request $request)
    {
        $form = $this->createForm(new UsuarioType, $usuario);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirect($this->generateUrl('my_recipes_usuario_ver_id', array('usuario_id' => $usuario->getId())));
        }
        return array(
            'form' => $form->createView(),
            'usuario' => $usuario);
    }

    /**
     * @Template()
     */
    public function registerAction(Request $request)
    {
        $usuario = new Usuario;
        $validator = $this->get('validator');
        $errors = $validator->validate($usuario);
        $form = $this->createForm(new RegisterType, $usuario);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $usuario->setRuta($usuario->getMail());
            $password = $this->get('security.password_encoder')
                ->encodePassword($usuario, $usuario->getPlainPassword());
            $usuario->setPassword($password);
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();
            return $this->redirect($this->generateUrl('my_recipes_usuario_ver_id_registro', 
                array('usuario_id' => $usuario->getId())));
        }
        return array('form' => $form->createView());
    }
}