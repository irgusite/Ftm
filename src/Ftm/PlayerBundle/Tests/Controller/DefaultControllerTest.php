<?php

namespace Ftm\PlayerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
	private $admin = null;

	public function setUp(){
		$this->admin = static::createClient();
	}

    public function testLogin()
    {
        $crawler = $this->admin->request('GET', '/login');

        $this->admin->request('GET', '/admin/demands');

		$this->assertTrue($this->admin->getResponse()->isSuccessful());
    }

    public function logIn(){
    	$session = $this->admin->getContainer()->get('session');

        $firewall = 'main';
        $token = new UsernamePasswordToken('admin', null, $firewall, array('ROLE_ADMIN'));
        $session->set('_security_'.$firewall, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->admin->getCookieJar()->set($cookie);
    }
}
