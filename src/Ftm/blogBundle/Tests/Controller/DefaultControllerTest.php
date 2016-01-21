<?php

namespace Ftm\blogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
	/**
	* @dataProvider urlProvider
	*/
    public function testPageAccess($url)
    {
        $client = static::createClient();

        $crawler = $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());

        
    }

    public function urlProvider(){
    	return array(
    		array('/'),
    		array('/irc'), 
    		array('/mumble'),
    		array('/server'),
    		array('/contact'),
    		array('/dynmap'),
    		);
    }

    public function testPageContent(){
    	$client = static::createClient();

        $crawler = $client->request('GET', '/');

    	echo "Twitter\n";
        $this->assertTrue($crawler->filter('html:contains("Twitter")')->count() > 0);

        echo "News\n";
        $this->assertTrue($crawler->filter('html:contains("News")')->count() > 0);
    }
}
