<?php
namespace My\RecipesBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


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
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Contraseña', 'required'=> false),
                'second_options' => array('label' => 'Repita contraseña', 'required'=> false),'label' => 'Contraseña', 'required'=> false
            ))
            ->add('telefono', 'text', array('label' => 'Teléfono'))
            ->add('direccion', 'text', array('label' => 'Dirección'))
            ->add('localidad', 'text')
            ->add('codigoPostal', 'text', array('label' => 'Codigo postal'))
            ->add('nota', TextareaType::class, array(
    'attr' => array('class' => 'tinymce'),'label' => 'Nota'
))
            ->add('roles_obj', 'entity', array(
    'class' => 'MyRecipesBundle:Rol', 'multiple' => 'true', 'expanded' => true,
    'choice_label' => 'denominacion', 'label' => 'Roles'
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