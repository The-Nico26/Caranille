<?php

class Mission
{
    private $ID;
    private $town;
    private $number;
    private $name;
    private $introduction;
    private $victory;
    private $defeate;
    private $monster;

    public function __construct(
        $ID,
        $town,
        $number,
        $name,
        $introduction,
        $victory,
        $defeate,
        $monster
    ) {
        $this->ID = $ID;
        $this->town = $town;
        $this->number = $number;
        $this->name = $name;
        $this->introduction = $introduction;
        $this->victory = $victory;
        $this->defeate = $defeate;
        $this->monster = $monster;
    }

//GETTERS
    public function getID()
    {
        return $this->ID;
    }

    public function getTown()
    {
        return $this->town;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIntroduction()
    {
        return $this->introduction;
    }

    public function getVictory()
    {
        return $this->victory;
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

    public function setTown($town)
    {
        $this->town = $town;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;
    }

    public function setVictory($victory)
    {
        $this->victory = $victory;
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
