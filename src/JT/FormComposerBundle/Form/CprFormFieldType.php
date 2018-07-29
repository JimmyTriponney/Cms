<?php

namespace JT\FormComposerBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\BooleanType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use JT\FormComposerBundle\Form\CprFormFieldOptionType;
use JT\FormComposerBundle\Form\CprFormConditionGroupType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CprFormFieldType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('name', TextType::class, ['required' => false])
			->add('formOrder', IntegerType::class, ['required' => false])
			->add('slug', TextType::class, ['required' => false])
			->add('colMd', IntegerType::class, ['required' => false])
			->add('fieldFormat', TextType::class, ['required' => false])
			->add('fieldValue', TextType::class, ['required' => false])
			->add('htmlClass', TextType::class, ['required' => false])
			->add('htmlId', TextType::class, ['required' => false])
			->add('fieldRequired', TextType::class, ['required' => false])
			->add('fieldType', EntityType::class, [
					'class' => 'JTFormComposerBundle:CprFormFieldList',
					'choice_label' => 'name',
					'required' => false
				])			
			->add('fieldOptions', CollectionType::class, [
				'allow_add' => true,
				'allow_delete' => true,
				'entry_type' => CprFormFieldOptionType::class,
				'prototype' => true,
				'required' => false
				])
			->add('fieldConditionGroup', CollectionType::class, [
				'allow_add' => true,
				'allow_delete' => true,
				'entry_type' => CprFormConditionGroupType::class,
				'prototype' => true,
				'required' => false
				]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JT\FormComposerBundle\Entity\CprFormField'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jt_formcomposerbundle_cprformfield';
    }


}
