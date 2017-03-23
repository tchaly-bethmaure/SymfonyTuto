<?php

// src/AppBundle/Validator/Constraints/ContainsAlphanumeric.php
namespace Tuto\DoctrineTutoBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class UniquePair extends Constraint
{
    public $message = 'Le couple "%nom%"/"%genre%" existe déja.';

	public function getTargets()
	{
	    return self::CLASS_CONSTRAINT;
	}

	public function validatedBy()
	{
		return get_class($this).'Validator'; 
	}
}