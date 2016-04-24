<?php
namespace My\RecipesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use My\RecipesBundle\Form\Type\CategoriaType;

use My\RecipesBundle\Entity\Categoria;

class CategoriaController extends Controller
{
	/**
     * @Template()
     */
    public function createAction(Request $request)
    {
        $categoria = new Categoria;
        $validator = $this->get('validator');
        $errors = $validator->validate($categoria);
        $form = $this->createForm(new CategoriaType, $categoria);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $categoria->setRuta($categoria->getNombre());
             if($categoria->getFotoReal()){
                $foto = $categoria->getFotoReal();
                $fileName = str_replace(" ","_",$foto->getClientOriginalName());
                $fotoDir = $this->container->getParameter('kernel.root_dir').'/../web/images/categorias';
                $foto->move($fotoDir, $fileName);
                $categoria->setFoto($fileName);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($categoria);
            $em->flush();
            return $this->redirect($this->generateUrl('my_recipes_categoria_ver_id', array('categoria_id' => $categoria->getId())));
        }
        return array('form' => $form->createView());
    }

    public function showIdAction($categoria_id, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Categoria');
        $categoria = $repository->find($categoria_id);
        return $this->render('MyRecipesBundle:Categoria:show.html.twig', array(
            'categoria' => $categoria));
             
    }

     public function showRutaAction($categoria_ruta, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Categoria');
        $categoria = $repository->findOneByRuta($categoria_ruta);
        return $this->render('MyRecipesBundle:Categoria:show.html.twig', array(
            'categoria' => $categoria));
             
    }

    /**
     * @Template()
     */
    public function editAction(Categoria $categoria, Request $request)
    {
        $form = $this->createForm(new CategoriaType, $categoria);
        $form->handleRequest($request);

        if ($form->isValid()) {
            if($categoria->getFotoReal()){
                $foto = $categoria->getFotoReal();
                $fileName = str_replace(" ","_",$foto->getClientOriginalName());
                $fotoDir = $this->container->getParameter('kernel.root_dir').'/../web/images/categorias';
                $foto->move($fotoDir, $fileName);
                $categoria->setFoto($fileName);
            }

            


            $this->getDoctrine()->getManager()->flush();
            return $this->redirect($this->generateUrl('my_recipes_categoria_ver_id', array('categoria_id' => $categoria->getId())));
        }
        return array(
            'form' => $form->createView(),
            'categoria' => $categoria);
    }

    public function showAllAction( $formato, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Categoria');
        $categorias = $repository->findAll();

        switch ($formato) {
        case "bloques":
            return $this->render('MyRecipesBundle:Categoria:showAll.html.twig', array(
                'categorias' => $categorias));
            break;
        case "lista":
            return $this->render('MyRecipesBundle:Categoria:showAllList.html.twig', array(
                'categorias' => $categorias));
            break;
        default:
            return $this->render('MyRecipesBundle:Categoria:showAll.html.twig', array(
                'categorias' => $categorias));
        
        }         
    }
}