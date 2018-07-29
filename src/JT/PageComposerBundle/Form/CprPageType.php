<?php

namespace JT\PageComposerBundle\Form;

use JT\PageComposerBundle\Form\CprRowType;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CprPageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('title', TextType::class, ['required' => false])
			->add('keyword', TextareaType::class, ['required' => false])
			->add('description', TextareaType::class, ['required' => false])
			->add('tag', TextType::class, ['required' => false])
			->add('tagAuto', TextType::class, ['required' => false])
			->add('published', CheckboxType::class, ['required' => false])
			->add('countElem', IntegerType::class, ['required' => false])
			->add('row', CollectionType::class, [
				'allow_add' => true,
				'allow_delete' => true,
				'entry_type' => CprRowType::class,
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
            'data_class' => 'JT\PageComposerBundle\Entity\CprPage',
			'attr' => ['id' => 'pageComposer_formulaire'],
			'method' => 'POST'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jt_pagecomposerbundle_cprpage';
    }


}
