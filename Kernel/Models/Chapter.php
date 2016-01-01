<?php

class Chapter
{
    private $ID;
    private $number;
    private $name;
    private $opening;
    private $ending;
    private $defeate;
    private $monster;

    public function __construct(
        $ID,
        $number,
        $name,
        $opening,
        $ending,
        $defeate,
        $monster
    ) {
        $this->ID = $ID;
        $this->number = $number;
        $this->name = $name;
        $this->opening = $opening;
        $this->ending = $ending;
        $this->defeate = $defeate;
        $this->monster = $monster;
    }

//GETTERS
    public function getID()
    {
        return $this->ID;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getOpening()
    {
        return $this->opening;
    }

    public function getEnding()
    {
        return $this->ending;
    }

    public function getDefeate()
    {
        return $this->defeate;
    }

	public function getMonster()
    {
        return $this->monster;
    }
    
//SETTERS
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setOpening($opening)
    {
        $this->opening = $opening;
    }

    public function setEnding($ending)
    {
        $this->ending = $ending;
    }

    public function setDefeate($defeate)
    {
        $this->defeate = $defeate;
    }

    public function setMonster($monster)
    {
        $this->monster = $monster;
    }
}
