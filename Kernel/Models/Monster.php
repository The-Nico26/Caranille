<?php

class Monster
{
    private $ID;
    private $picture;
    private $name;
    private $description;
    private $level;
    private $hp;
    private $mp;
    private $strength;
    private $magic;
    private $agility;
    private $defense;
    private $experience;
    private $gold;

    public function __construct(
        $ID,
        $picture,
        $name,
        $description,
        $level,
        $hp,
        $mp,
        $strength,
        $magic,
        $agility,
        $defense,
        $experience,
        $gold
    ) {
        $this->ID = $ID;
        $this->picture = $picture;
        $this->name = $name;
        $this->description = $description;
        $this->level = $level;
        $this->hp = $hp;
        $this->mp = $mp;
        $this->strength = $strength;
        $this->magic = $magic;
        $this->agility = $agility;
        $this->defense = $defense;
        $this->experience = $experience;
        $this->gold = $gold;
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

    public function getLevel()
    {
        return $this->level;
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

    public function getExperience()
    {
        return $this->experience;
    }

    public function getGold()
    {
        return $this->gold;
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

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setLevel($level)
    {
        $this->level = $level;
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

    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    public function setGold($gold)
    {
        $this->gold = $gold;
    }
}
