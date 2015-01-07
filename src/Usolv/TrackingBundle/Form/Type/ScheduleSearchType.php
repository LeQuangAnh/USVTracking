<?php

namespace Usolv\TrackingBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Usolv\TrackingBundle\Form\Model\Schedule;

class ScheduleSearchType extends AbstractType
{
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'Usolv\TrackingBundle\Form\Model\ScheduleSearch',
		));
	}

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('project', 'entity', array(
					'class' => 'UsolvTrackingBundle:Project',
					'property' => 'name'))
			->add('module', 'entity', array(
					'class' => 'UsolvTrackingBundle:Module',
					'property' => 'name'))
			->add('user', 'entity', array(
					'class' => 'UsolvTrackingBundle:User',
					'property' => 'name'));
	}
	
	public function getName()
	{
		return 'schedulesearchtype';
	}
}
