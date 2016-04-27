<?php
namespace My\RecipesBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class CaracteristicaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->setMethod('PUT')
            ->add('nombre', 'text')
            ->add('descripcion', TextareaType::class, array(
    'attr' => array('class' => 'tinymce'),'label' => 'Descripción'
))
            ->add('Guardar', 'submit');
    }

    public function getNombre()
    {
        return 'caracteristica';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'My\RecipesBundle\Entity\Caracteristica',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention'       => 'caracteristica_item',
        ));
    }
}