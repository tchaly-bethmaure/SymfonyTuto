<?php

namespace Tuto\DoctrineTutoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PersonControllerTest extends WebTestCase
{
    
    public function testCompleteScenario1()
    {
        // Recuperer le container
        // Recuper les company


        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/tuto/doctrine/person/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /person/");
        $crawler = $client->click($crawler->selectLink('Create a new person')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'tuto_doctrinetutobundle_person[name]'  => 'Brittney Vance',
            'tuto_doctrinetutobundle_person[gender]'  => 'female',
            'tuto_doctrinetutobundle_person[age]'  => '31',
            'tuto_doctrinetutobundle_person[eyeColor]'  => 'green',
            'tuto_doctrinetutobundle_person[email]'  => 'brittneyvance@eventage.com',
            'tuto_doctrinetutobundle_person[phone]'  => '+1 (809) 556-2454',
            'tuto_doctrinetutobundle_person[company]'  => '23',
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('td:contains("Brittney Vance")')->count(), 'Missing element td:contains("Brittney Vance")');

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Edit')->form(array(
            'tuto_doctrinetutobundle_person[name]'  => 'ranesca Broery',
            'tuto_doctrinetutobundle_person[gender]'  => 'feale',
            'tuto_doctrinetutobundle_person[age]'  => '47',
            'tuto_doctrinetutobundle_person[eyeColor]'  => 'brown',
            'tuto_doctrinetutobundle_person[email]'  => 'francescadaugherty@kidgrease.com',
            'tuto_doctrinetutobundle_person[phone]'  => '+1 (895) 507-3045',
            'tuto_doctrinetutobundle_person[company]'  => '23',
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('[value="ranesca Broery"]')->count(), 'Missing element [value="ranesca Broery"]');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Francesca Brothery/', $client->getResponse()->getContent());
    }
    
    public function testCompleteScenario2()
    {
        // Recuperer le container
        // Recuper les company


        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/tuto/doctrine/person/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /person/");
        $crawler = $client->click($crawler->selectLink('Create a new person')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'tuto_doctrinetutobundle_person[name]'  => 'Fraesca Daghety',
            'tuto_doctrinetutobundle_person[gender]'  => 'feale',
            'tuto_doctrinetutobundle_person[age]'  => '47',
            'tuto_doctrinetutobundle_person[eyeColor]'  => 'brown',
            'tuto_doctrinetutobundle_person[email]'  => 'francescadaugherty@hotmail.com',
            'tuto_doctrinetutobundle_person[phone]'  => '+1 (895) 507-3045',
            'tuto_doctrinetutobundle_person[company]'  => '23',
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('td:contains("Fraesca Daghety")')->count(), 'Missing element td:contains("Test")');

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Edit')->form(array(
            'tuto_doctrinetutobundle_person[name]'  => 'ranesca Broery',
            'tuto_doctrinetutobundle_person[gender]'  => 'feale',
            'tuto_doctrinetutobundle_person[age]'  => '47',
            'tuto_doctrinetutobundle_person[eyeColor]'  => 'brown',
            'tuto_doctrinetutobundle_person[email]'  => 'francescadaugherty@hotmail.com',
            'tuto_doctrinetutobundle_person[phone]'  => '+1 (895) 507-3045',
            'tuto_doctrinetutobundle_person[company]'  => '23',
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('[value="ranesca Broery"]')->count(), 'Missing element [value="Foo"]');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Francesca Brothery/', $client->getResponse()->getContent());
    }
}
