<?php

namespace Ftm\MinecraftBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    public function testServercontroll()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/serverControll');

        return true;
    }

}
