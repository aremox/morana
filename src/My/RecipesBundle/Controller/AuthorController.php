<?php
namespace My\RecipesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use My\RecipesBundle\Form\Type\AuthorType;

use My\RecipesBundle\Entity\Author;

class AuthorController extends Controller
{

    /**
     * @Template()
     */
/*    public function createAction(Request $request)
    {
        $author = new Author('nombre','apellido');
        $form = $this->createFormBuilder($author)
            ->add('name', 'text')
            ->add('surname', 'text')
            ->add('save', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();
            return $this->redirect($this->generateUrl('my_recipes_author_show', array('id' => $author->getId())));
        }
        return array('form' => $form->createView());
    }
*/
    public function createAction(Request $request)
    {
        $author = new Author();
        $validator = $this->get('validator');
        $errors = $validator->validate($author);
        $form = $this->createForm(new AuthorType, $author,
            array(
                'action' => $this->generateUrl('my_recipes_author_create'),
                'method' => 'PUT',
        ));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();
            return $this->redirect($this->generateUrl('my_recipes_author_show', array('author_id' => $author->getId())));
        }
        return array('form' => $form->createView());
    }

    public function showIdAction($author_id, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Author');
        $author = $repository->find($author_id);
        return $this->render('MyRecipesBundle:Author:show.html.twig', array(
            'author' => $author));
             
    }

}