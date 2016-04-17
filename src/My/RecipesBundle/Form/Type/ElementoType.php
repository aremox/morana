<?php
namespace My\RecipesBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class ElementoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->setMethod('PUT')
            ->add('nombre', 'text')
            ->add('ruta', 'text')
            ->add('logotipo', 'text')
            ->add('categoria', 'entity', array(
    'class' => 'MyRecipesBundle:Categoria',
    'choice_label' => 'nombre', 'label' => 'Categoria'
))
            ->add('descripcion', TextareaType::class, array(
    'attr' => array('class' => 'tinymce'),'label' => 'Descripción'
))
            ->add('Guardar', 'submit');
    }

    public function getNombre()
    {
        return 'elemento';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention'       => 'elemento_item',
        ));
    }
}