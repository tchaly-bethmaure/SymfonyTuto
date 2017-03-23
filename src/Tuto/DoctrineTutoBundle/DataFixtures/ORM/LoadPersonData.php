<?php

// src/AppBundle/DataFixtures/ORM/LoadPersonData.php

namespace Tuto\DoctrineTutoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Tuto\DoctrineTutoBundle\Entity\Person;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
    	// recup de data
    	$jsonData = json_decode(file_get_contents(realpath(__DIR__.'/data/Person.json')), 1);

    	// itérer sur les datas
    	foreach ($jsonData as $personData) {

    		// Créer et instancier une entité
	        $person = new Person();
			$person->setName($personData['name']);
			$person->setGender($personData['gender']);
			$person->setAge($personData['age']);
			$person->setEyeColor($personData['eyeColor']);
			$person->setCompany($this->getReference('company_'.$personData['company'])); // Recup de la reference
			$person->setEmail($personData['email']);
			$person->setPhone($personData['phone']);
	        $manager->persist($person);
    	}

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}