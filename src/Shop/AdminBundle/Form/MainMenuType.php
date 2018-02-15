<?php

namespace Shop\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MainMenuType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,
                array(
                    'label'=>'Nazwa: ',
                    'attr'=> array(
                        'class' => 'form-control',
                        'style' => 'margin-bottom:15px'
                    )))
            ->add('save', SubmitType::class,
                array(
                    'label' => 'Zapisz',
                    'attr' => array(
                        'class' => 'btn btn-primary',
                        'style' => 'margin-bottom:15px,
                        style="text-align:center"'
                    )));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Shop\AdminBundle\Entity\MainMenu'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'shop_adminbundle_mainmenu';
    }


}
