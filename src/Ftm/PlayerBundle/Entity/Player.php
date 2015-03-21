<?php

namespace Ftm\PlayerBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ftm\PlayerBundle\Entity\PlayerRepository")
 */
class Player implements UserInterface 
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="connected", type="integer")
     */
    private $connected;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="admin", type="boolean")
     */
    private $admin;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

	/**
	* @ORM\Column(name="password", type="string", length=255)
	*/
	private $password;

	/**
	* @ORM\Column(name="salt", type="string", length=255)
	*/
	private $salt;

	/**
	* @ORM\Column(name="roles", type="array")
	*/
	private $roles;

	public function __construct()
	{
		$this->admin = false;
		$this->roles = array();
	}


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Player
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set connected
     *
     * @param string $username
     * @return Player
     */
    public function setConnected($connected)
    {
        $this->connected = $connected;

        return $this;
    }

    /**
     * Get connected
     *
     * @return string 
     */
    public function getConnected()
    {
        return $this->connected;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Player
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set admin
     *
     * @param boolean $admin
     * @return Player
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin
     *
     * @return boolean 
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Player
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }
	
	public function setPassword($password)
  {
	if($password != null && $password != '')
	{
		$this->password = $password;
	}
    return $this;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setSalt($salt)
  {
    $this->salt = $salt;
    return $this;
  }

  public function getSalt()
  {
    return $this->salt;
  }

  public function setRoles(array $roles)
  {
    $this->roles = $roles;
    return $this;
  }

  public function getRoles()
  {
    return $this->roles;
  }

  public function eraseCredentials()
  {
  }
}
