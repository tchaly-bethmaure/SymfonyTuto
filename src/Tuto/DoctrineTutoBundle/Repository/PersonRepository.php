<?php

namespace Tuto\DoctrineTutoBundle\Repository;

/**
 * PersonRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PersonRepository extends \Doctrine\ORM\EntityRepository
{
	public function findAll()
	{
		return $this->findBy([], ['name' => 'ASC']);
	}

	public function checkUnique($person)
	{
		$qb = $this->createQueryBuilder('person');
		$qb->where('person.name = :name');
		$qb->andWhere('person.gender = :gender');
		if ($person->getId()) {
			$qb->andWhere('person.id != :id');
			$qb->setParameter(':id', $person->getId());
		}
		$qb->setParameter(':name', $person->getName());
		$qb->setParameter(':gender', $person->getGender());
		$qb->setMaxResults(1);

		$result = $qb->getQuery()->getResult();

		return (bool) $result;
	}
}