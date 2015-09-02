<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('name', 'text')
	        ->add('price', 'number')
	        ->add('description', 'textarea')
	        //->add('duoDate', 'date', array('widget' => 'single_text', 'label'  => 'Due Date'))
	        ->add('dueDate', null, array('widget' => 'single_text'))
	        ->add('save', 'submit', array('label' => 'New Product'))
	        ->add('saveAndAdd', 'submit', array('label' => 'Save and Add'))
        ;
	}

	public function getName()
	{
		return 'product';
	}
}