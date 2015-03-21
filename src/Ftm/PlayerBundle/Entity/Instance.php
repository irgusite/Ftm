<?php
namespace Ftm\PlayerBundle\Entity;

class Instance{
	protected $version;

	protected $map;

	public function getVersion()
	{
		return $this->version;
	}

	public function setVersion($version)
	{
		$this->version = $version;
	}

	public function getMap()
	{
		return $this->map;
	}

	public function setMap($map)
	{
		$this->map = $map;
	}
}