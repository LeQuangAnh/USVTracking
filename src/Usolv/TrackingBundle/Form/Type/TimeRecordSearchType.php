<?php

namespace Usolv\TrackingBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Usolv\TrackingBundle\Form\Model\TimeRecordSearch;

class TimeRecordSearchType extends AbstractType
{
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'Usolv\TrackingBundle\Form\Model\TimeRecordSearch',
		));
	}

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('type', 'choice', array('choices' => array('m' => 'Male', 'f' => 'Female')))
			->add('search', 'submit', array('label' => 'Search'));
	}
	
	public function getName()
	{
		return 'project';
	}
}
