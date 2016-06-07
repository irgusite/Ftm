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
        fwrite(STDERR, print_r("\nTesting page: ".$url, TRUE));

        $this->assertTrue($client->getResponse()->isSuccessful());

        fwrite(STDERR, print_r(" OK", TRUE));
        
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

    	fwrite(STDERR, print_r("\nTwitter", TRUE));
        $this->assertTrue($crawler->filter('html:contains("Twitter")')->count() > 0);

        fwrite(STDERR, print_r("\nNews", TRUE));
        $this->assertTrue($crawler->filter('html:contains("News")')->count() > 0);
    }
}
