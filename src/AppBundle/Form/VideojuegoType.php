<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class VideojuegoType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('nombrejuego', TextType::class, array(
                    'label' => 'Nombre del Video Juego',
                    'attr' => array(
                        'class' => 'form-control',
                        'requiered' => true
                    )
                ))
                ->add('lenguajes', TextType::class, array(
                    'label' => 'Lenguaje',
                    'attr' => array(
                        'class' => 'form-control',
                        'requiered' => true
                    )
                ))
//                       ->add('lenguajes', ChoiceType::class, array(
//                    'choices' => array(
//                        'Ingles' => 'en',
//                        'Español' => 'es',
//                        'Aleman' => 'muppets',
//                        'Chino' => 'arr',
//                    )
//                ))
                ->add('sipnosis', TextareaType::class, array(
                    'label' => 'Sinopsis',
                    'attr' => array(
                        'class' => 'form-control',
                        'requiered' => true
                    )
                ))
                ->add('imagen')
                ->add('precioventa')
                ->add('idclasificacion')
                ->add('idclasificaciondetipo');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\Videojuego'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'backendbundle_videojuego';
    }

}
