<?php

// src/AppBundle/Validator/Constraints/UniquePairValidator.php
namespace Tuto\DoctrineTutoBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManager;

class UniquePairValidator extends ConstraintValidator
{
	private $em;

	public function __construct(EntityManager $entityManager) 
	{
		$this->em = $entityManager;
	}

    public function validate($person, Constraint $constraint)
    {
        $personRepo = $this->em->getRepository('TutoDoctrineTutoBundle:Person');
        $isUnique = $personRepo->checkUnique($person);

        if ($isUnique) {
            $violation = $this->context->buildViolation($constraint->message);
            $violation->setParameter('%nom%', $person->getName());
            $violation->setParameter('%genre%', $person->getGender());
            $violation->addViolation();
            
            return false;
        }
        return true;
    }
}