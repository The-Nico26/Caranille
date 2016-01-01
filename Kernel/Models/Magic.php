<?php

class Magic
{
	private $ID;
	private $picture;
	private $name;
	private $description;
	private $type;
	private $effect;
	private $MPCost;
	private $price;
	
	public function __construct($ID, $picture, $name, $description, $type, $effect, $MPCost, $price)
	{
		$this->ID = $ID;
		$this->picture = $picture;
		$this->name = $name;
		$this->description = $description;
		$this->type = $type;
		$this->effect = $effect;
		$this->MPCost = $MPCost;
		$this->price = $price;
	}
	
	//GETTERS
    public function getID()
    {
        return $this->ID;
    }
    
    public function getpicture()
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
    
    public function getType()
    {
        return $this->type;
    }
    
    public function getEffect()
    {
        return $this->effect;
    }
    
    public function getMPCost()
    {
        return $this->MPCost;
    }
    
    public function getPrice()
    {
        return $this->price;
    }
}