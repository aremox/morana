<?php

namespace My\RecipesBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoriaControllerTest extends WebTestCase
{
    public function testShowAllBloque()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/categorias/bloques');

        $link = $crawler->filter('a:contains("Leer más")')->eq(1)->link();

        $crawler = $client->click($link);

        //echo $client->getResponse()->getContent();

        $link = $crawler->filter('a:contains("Leer más")')->eq(0)->link();

        $crawler = $client->click($link);

        $this->assertContains('titulo-elemento', $client->getResponse()->getContent());
    }
}
