<?php

namespace Ftm\PlayerBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ftm\PlayerBundle\Entity\InscriptionRepository")
 */
class Inscription
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
     * @ORM\Column(name="server", type="integer")
     */
    private $server;
	
	/**
     * @var string
     *
     * @ORM\Column(name="uniqid", type="string", length=255)
     */
	private $uniqid;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=255)
     */
    private $pseudo; 

    /**
     * @var string
     *
     * @ORM\Column(name="motivation", type="text")
     */
    private $motivation;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var boolean
     *
     * @ORM\Column(name="premod", type="boolean")
     */
    private $premod;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="mail_valid", type="boolean")
     */
    private $mail_valid;

    /**
    * @ORM\Column(name="password", type="string", length=255)
    */
    private $password;

    /**
    * @ORM\Column(name="salt", type="string", length=255)
    */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;


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
     * Set pseudo
     *
     * @param string $pseudo
     * @return Inscription
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string 
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set server
     *
     * @param string $server
     * @return Inscription
     */
    public function setServer($server)
    {
        $this->server = $server;

        return $this;
    }

    /**
     * Get server
     *
     * @return string 
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Set motivation
     *
     * @param string $motivation
     * @return Inscription
     */
    public function setMotivation($motivation)
    {
        $this->motivation = $motivation;

        return $this;
    }

    /**
     * Get motivation
     *
     * @return string 
     */
    public function getMotivation()
    {
        return $this->motivation;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Inscription
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

    /**
     * Set premod
     *
     * @param boolean $premod
     * @return Inscription
     */
    public function setPremod($premod)
    {
        $this->premod = $premod;

        return $this;
    }

    /**
     * Get Valid
     *
     * @return boolean 
     */
    public function getMail_valid()
    {
        return $this->mail_valid;
    }
	
	/**
     * Set valid
     *
     * @param boolean $premod
     * @return Inscription
     */
    public function setMail_valid($valid)
    {
        $this->mail_valid = $valid;

        return $this;
    }

    /**
     * Get premod
     *
     * @return boolean 
     */
    public function getPremod()
    {
        return $this->premod;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Inscription
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
     * Set uniqid
     *
     * @param string $uniqid
     * @return Inscription
     */
    public function setUniqid($uniqid)
    {
        $this->uniqid = $uniqid;

        return $this;
    }

    /**
     * Get uniqid
     *
     * @return string 
     */
    public function getUniqid()
    {
        return $this->uniqid;
    }
}
