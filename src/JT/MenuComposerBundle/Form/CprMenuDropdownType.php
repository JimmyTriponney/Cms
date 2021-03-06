<?php

namespace JT\MenuComposerBundle\Form;

use JT\MenuComposerBundle\Form\CprMenuSubDropdown;

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

class CprMenuDropdownType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('label', TextType::class, ['required' => false])
			->add('link', TextType::class, ['required' => false])
			->add('icon', TextType::class, ['required' => false])
			->add('description', TextareaType::class, ['required' => false])
			->add('page', EntityType::class, [
					'class' => 'JTPageComposerBundle:CprPage',
					'choice_label' => 'title',
					'required' => false])
			->add('img', EntityType::class, [
					'class' => 'JTFileBundle:File',
					'choice_label' => 'nameCrypt',
					'required' => false])
			->add('subDropdown', CollectionType::class, [
					'allow_delete' => true,
					'allow_add' => true,
					'entry_type' => CprMenuSubDropdownType::class,
					'required' => false
				]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JT\MenuComposerBundle\Entity\CprMenuDropdown'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jt_menucomposerbundle_cprmenudropdown';
    }


}
