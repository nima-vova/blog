<?php
/**
 * Created by PhpStorm.
 * User: nima
 * Date: 25.12.16
 * Time: 14:35.
 */

namespace AppBundle\Form;

use AppBundle\Entity\Category\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class PostCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('name')
            //->add('save', SubmitType::class)
            ->add('name', TextType::class, [
                'required' => false,
                'label' => 'name',
                'attr' => ['class' => 'test col-xs-6'],
            ])
            ->add('description', TextType::class, [
                'required' => false,
                'label' => 'description',
                'attr' => ['class' => 'test col-xs-6'],
            ])
          ->add('body', TextType::class, [
            'required' => false,
            'label' => 'body',
            'attr' => ['class' => 'test col-xs-3'],
        ])
            ->add('tags', EntityType::class, array(
                'class' => 'AppBundle\\Entity\\Tag\\Tag',
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ))



            ->add('category', EntityType::class, array(
                       'class' => 'AppBundle\\Entity\\Category\\Category',
                       'choice_label' => 'name',
                    ))




        /*->add('enabled', TextType::class, [
        'required' => false,
        'label' => 'enabled',
        'attr' => ['class' => 'test col-xs-6'],
         ]) */

    ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Post\Post',
            'em' => null,
        ));
        $resolver->addAllowedTypes('em', [ObjectManager::class]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_post_create';
    }
}
