<?php
namespace My\RecipesBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->setMethod('PUT')
            ->add('nombre', 'text')
            ->add('apellido1', 'text', array('label' => 'Primer Apellido'))
            ->add('apellido2', 'text', array('label' => 'Segundo Apellido'))
            ->add('mail', 'text')
             ->add('ruta', 'text')
            ->add('telefono', 'text', array('label' => 'Teléfono'))
            ->add('direccion', 'text', array('label' => 'Dirección'))
            ->add('localidad', 'text')
            ->add('codigoPostal', 'text', array('label' => 'Codigo postal'))
            ->add('nota', TextareaType::class, array(
    'attr' => array('class' => 'tinymce'),'label' => 'Nota'
))
            ->add('Guardar', 'submit');
    }

    public function getUsuario()
    {
        return 'usuario';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'My\RecipesBundle\Entity\Usuario',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention'       => 'usuario_item',
        ));
    }
}