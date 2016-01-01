<?php

class Invocation
{
	private $ID;
	private $picture;
	private $name;
	private $description;
	private $damage;
	private $price;
	
	public function __construct($ID, $picture, $name, $description, $damage, $price)
	{
		$this->ID = $ID;
		$this->picture = $picture;
		$this->name = $name;
		$this->description = $description;
		$this->damage = $damage;
		$this->price = $price;
	}
	
	//GETTERS
    public function getID()
    {
        return $this->ID;
    }
    
    public function getPicture()
    {
        return $this->picture;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function getDamage()
    {
        return $this->damage;
    }
    
    public function getPrice()
    {
        return $this->price;
    }
}