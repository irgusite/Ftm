<?php

namespace Ftm\PlayerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\BrowserKit\Cookie;

class DefaultControllerTest extends WebTestCase
{
	private $admin = null;

	public function setUp(){
		$this->admin = static::createClient();
	}

    public function testLogin()
    {
        fwrite(STDERR, print_r("\nLogin tests ", TRUE));

        $this->admin->request('GET', '/login');
    	$this->assertTrue($this->admin->getResponse()->isSuccessful(), "Login page not available");

        $this->admin->request('GET', '/admin/demands');

		$this->assertFalse($this->admin->getResponse()->isSuccessful(), "Access to admin section without login");

        $this->logIn();

        $this->admin->request('GET', '/admin/demands');

		$this->assertTrue($this->admin->getResponse()->isSuccessful(), "Login failed");
    }

    public function logIn(){
    	$session = $this->admin->getContainer()->get('session');

        $firewall = 'main';
        $token = new UsernamePasswordToken('admin', 'ourson', $firewall, array('ROLE_ADMIN'));
        $session->set('_security_'.$firewall, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->admin->getCookieJar()->set($cookie);
    }

    public function testInscription(){
    	$this->logIn();

    	$crawler = $this->admin->request('GET', '/inscription/cdm');

    	
    }
}
