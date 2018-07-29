<?php

namespace JT\FormComposerBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\BooleanType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use JT\FormComposerBundle\Form\CprFormFieldType;
use JT\FormComposerBundle\Form\CprFormResponseType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CprFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('name', TextType::class, ['required' => true])
			->add('countElem', IntegerType::class, ['required' => false])
			->add('fields', CollectionType::class, [
				'allow_add' => true,
				'allow_delete' => true,
				'entry_type' => CprFormFieldType::class,
				'prototype' => true,
				'required' => false
				])
			->add('response', CollectionType::class, [
				'allow_add' => true,
				'allow_delete' => true,
				'entry_type' => CprFormResponseType::class,
				'prototype' => true,
				'required' => false
				])
			->add('Enregistrer',SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JT\FormComposerBundle\Entity\CprForm',
			'attr' => ['id' => 'formComposer_formulaire'],
			'method' => 'POST'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jt_formcomposerbundle_cprform';
    }


}
