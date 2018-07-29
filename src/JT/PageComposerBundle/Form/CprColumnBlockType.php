<?php

namespace JT\PageComposerBundle\Form;

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

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CprColumnBlockType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$borderStyle = [
					'' => '', 
					'Uni' => 'solid', 
					'Tiret' => 'dashed', 
					'Disc' => 'dotted', 
					'Double' => 'double', 
					'3D' => 'groove',
					'3D (inverse)' => 'ridge', 
					'Bicolor' => 'inset',
					'Bicolor (inverse)' => 'outset',
					'3D' => 'groove',
					'Caché' => 'hidden'
					];
		
        $builder
			->add('paddingTop', IntegerType::class, ['required' => false])
			->add('paddingLeft', IntegerType::class, ['required' => false])
			->add('paddingBottom', IntegerType::class, ['required' => false])
			->add('paddingRight', IntegerType::class, ['required' => false])
			->add('borderStyle', ChoiceType::class, [ 'choices' => $borderStyle, 'required' => false])
			->add('borderColor', TextType::class, ['required' => false])
			->add('borderSize', IntegerType::class, ['required' => false])
			->add('borderRadius', IntegerType::class, ['required' => false])
			->add('bgColor', TextType::class, ['required' => false])
			->add('color', TextType::class, ['required' => false])
			->add('align', TextType::class, ['required' => false])
			->add('bgImg', EntityType::class, [
					'class' => 'JTFileBundle:File',
					'choice_label' => 'nameCrypt',
					'required' => false])
			->add('pageOrder', IntegerType::class, ['required' => false])
			->add('contentText', TextareaType::class, ['required' => false])
			->add('contentHtml', TextareaType::class, ['required' => false])
			->add('htmlClass', TextType::class, ['required' => false])
			->add('contentImg', EntityType::class, [
					'class' => 'JTFileBundle:File',
					'choice_label' => 'nameCrypt',
					'required' => false])
			->add('otherInfo', IntegerType::class, ['required' => false])
			->add('block', EntityType::class, [
					'class' => 'JTPageComposerBundle:CprBlock',
					'choice_label' => 'name',
					'required' => false])
			->add('form', EntityType::class, [
					'class' => 'JTFormComposerBundle:CprForm',
					'choice_label' => 'name',
					'required' => false]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JT\PageComposerBundle\Entity\CprColumnBlock'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jt_pagecomposerbundle_cprcolumnblock';
    }


}
