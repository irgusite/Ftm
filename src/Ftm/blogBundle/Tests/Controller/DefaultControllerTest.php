<?php

namespace Ftm\blogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("Twitter")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("News")')->count() > 0);

        $client->request('GET', '/admin/demands');
		$this->assertFalse($user->getResponse()->isSuccessful());
    }
}
