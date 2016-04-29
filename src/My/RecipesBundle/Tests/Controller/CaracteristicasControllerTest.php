<?php

namespace My\RecipesBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CaracteristicasControllerTest extends WebTestCase
{
    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/secured/caracteristica/create');

        $this->assertContains('Redirecting', $client->getResponse()->getContent());
    }
}
