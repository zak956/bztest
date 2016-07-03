<?php
/**
 * Created by PhpStorm.
 * User: zak956
 * Date: 03.07.16
 * Time: 17:07
 */

namespace CarsBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CarControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/car/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertCount(5, json_decode($client->getResponse()->getContent()));
    }
}