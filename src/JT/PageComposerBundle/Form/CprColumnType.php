<?php

namespace JT\PageComposerBundle\Form;

use JT\PageComposerBundle\Form\CprColumnBlockType;

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

class CprColumnType extends AbstractType
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
			->add('colXs', IntegerType::class, ['required' => false])
			->add('colSm', IntegerType::class, ['required' => false])
			->add('colMd', IntegerType::class, ['required' => false])
			->add('colLg', IntegerType::class, ['required' => false])
			->add('paddingTop', IntegerType::class, ['required' => false])
			->add('paddingLeft', IntegerType::class, ['required' => false])
			->add('paddingBottom', IntegerType::class, ['required' => false])
			->add('paddingRight', IntegerType::class, ['required' => false])
			->add('borderStyle', ChoiceType::class, [ 'choices' => $borderStyle, 'required' => false])
			->add('borderColor', TextType::class, ['required' => false])
			->add('borderSize', IntegerType::class, ['required' => false])
			->add('borderRadius', IntegerType::class, ['required' => false])
			->add('bgColor', TextType::class, ['required' => false])
			->add('bgImg', EntityType::class, [
					'class' => 'JTFileBundle:File',
					'choice_label' => 'nameCrypt',
					'required' => false])
			->add('pageOrder', IntegerType::class, ['required' => false])
			->add('block', CollectionType::class, [
					'allow_delete' => true,
					'allow_add' => true,
					'entry_type' => CprColumnBlockType::class,
					'required' => false
				]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JT\PageComposerBundle\Entity\CprColumn'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jt_pagecomposerbundle_cprcolumn';
    }


}
