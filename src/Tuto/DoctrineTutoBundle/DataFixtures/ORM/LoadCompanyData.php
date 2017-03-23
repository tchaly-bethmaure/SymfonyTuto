<?php

namespace Tuto\DoctrineTutoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Tuto\DoctrineTutoBundle\Entity\Company;

class LoadCompanyData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
    	// recup de data
    	$jsonData = json_decode(file_get_contents(realpath(__DIR__.'/data/Company.json')), 1);

    	// itérer sur les datas
    	foreach ($jsonData as $companyData) {
	        
	        // Créer et instancier une entité
	        $company = new Company();
			$company->setName($companyData);
	        $manager->persist($company);

	        // Reference
        	$this->addReference('company_'.$companyData, $company);
    	}

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}