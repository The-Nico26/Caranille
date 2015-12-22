<?php

class Item
{
    private $ID;
    private $picture;
    private $type;
    private $level;
    private $name;
    private $description;
    private $hp;
    private $mp;
    private $strength;
    private $magic;
    private $agility;
    private $defense;
    private $sagesse;
    private $purchase;
    private $sale;

    public function __construct(
        $ID,
        $picture,
        $type,
        $level,
        $name,
        $description,
        $hp,
        $mp,
        $strength,
        $magic,
        $agility,
        $defense,
        $sagesse,
        $purchase,
        $sale
    ) {
        $this->ID = $ID;
        $this->picture = $picture;
        $this->type = $type;
        $this->level = $level;
        $this->name = $name;
        $this->description = $description;
        $this->hp = $hp;
        $this->mp = $mp;
        $this->strength = $strength;
        $this->magic = $magic;
        $this->agility = $agility;
        $this->defense = $defense;
        $this->sagesse = $sagesse;
        $this->purchase = $purchase;
        $this->sale = $sale;
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

    public function getType()
    {
        return $this->type;
    }
	
    public function getLevel()
    {
        return $this->level;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function getMp()
    {
        return $this->mp;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function getMagic()
    {
        return $this->magic;
    }

    public function getAgility()
    {
        return $this->agility;
    }

    public function getDefense()
    {
        return $this->defense;
    }

    public function getSagesse()
    {
        return $this->sagesse;
    }

    public function getPurchase()
    {
        return $this->purchase;
    }

    public function getSale()
    {
        return $this->sale;
    }

    //SETTERS
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setHp($hp)
    {
        $this->hp = $hp;
    }

    public function setMp($mp)
    {
        $this->mp = $mp;
    }

    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    public function setMagic($magic)
    {
        $this->magic = $magic;
    }

    public function setAgility($agility)
    {
        $this->agility = $agility;
    }

    public function setDefense($defense)
    {
        $this->defense = $defense;
    }

    public function setSagesse($sagesse)
    {
        $this->sagesse = $sagesse;
    }

    public function setPurchase($purchase)
    {
        $this->purchase = $purchase;
    }

    public function setSale($sale)
    {
        $this->sale = $sale;
    }
}
