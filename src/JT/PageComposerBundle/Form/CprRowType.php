<?php

namespace JT\PageComposerBundle\Form;

use JT\PageComposerBundle\Form\CprColumnType;

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

class CprRowType extends AbstractType
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
			->add('paddingTop', IntegerType::class)
			->add('paddingLeft', IntegerType::class)
			->add('paddingBottom', IntegerType::class)
			->add('paddingRight', IntegerType::class)
			->add('borderStyle', ChoiceType::class, [ 'choices' => $borderStyle])
			->add('borderColor', TextType::class)
			->add('borderSize', IntegerType::class)
			->add('borderRadius', IntegerType::class)
			->add('bgColor', TextType::class)
			->add('bgImg', EntityType::class, [
					'class' => 'JTFileBundle:File',
					'choice_label' => 'nameCrypt',
					'required' => false])
			->add('pageOrder', IntegerType::class)
			->add('column', CollectionType::class, [
					'allow_delete' => true,
					'allow_add' => true,
					'entry_type' => CprColumnType::class
				]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JT\PageComposerBundle\Entity\CprRow'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jt_pagecomposerbundle_cprrow';
    }


}
