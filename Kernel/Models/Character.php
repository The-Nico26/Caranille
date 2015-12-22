<?php

class Character
{
    private $ID;
    private $accountId;
    private $picture;
    private $lastName;
    private $firstName;
    private $level;
    private $hp;
    private $hpMax;
    private $mp;
    private $mpMax;
    private $strength;
    private $magic;
    private $agility;
    private $defense;
    private $wisdom;
    private $experience;
    private $skillPoint;
    private $gold;
    private $townId;
    private $chapter;

    public function __construct(
        $ID,
        $accountID,
        $picture,
        $lastName,
        $firstName,
        $level,
        $hp,
        $hpMax,
        $mp,
        $mpMax,
        $strength,
        $magic,
        $agility,
        $defense,
        $wisdom,
        $experience,
        $skillPoint,
        $gold,
        $townId,
        $chapter
    ) {
        $this->ID = $ID;
        $this->accountID = $accountID;
        $this->picture = $picture;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->level = $level;
        $this->hp = $hp;
        $this->hpMax = $hpMax;
        $this->mp = $mp;
        $this->mpMax = $mpMax;
        $this->strength = $strength;
        $this->magic = $magic;
        $this->agility = $agility;
        $this->defense = $defense;
        $this->wisdom = $wisdom;
        $this->experience = $experience;
        $this->skillPoint = $skillPoint;
        $this->gold = $gold;
        $this->townId = $townId;
        $this->chapter = $chapter;
    }

    //GETTERS
    public function getID()
    {
        return $this->ID;
    }

    public function getAccountID()
    {
        return $this->accountID;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function getHpMax()
    {
        return $this->hpMax;
    }

    public function getMp()
    {
        return $this->mp;
    }

    public function getMpMax()
    {
        return $this->mpMax;
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
    
    public function getWisdom()
    {
        return $this->wisdom;
    }

    public function getExperience()
    {
        return $this->experience;
    }
    
    public function getSkillPoint()
    {
        return $this->skillPoint;
    }

    public function getGold()
    {
        return $this->gold;
    }

    public function getTownId()
    {
        return $this->townId;
    }

    public function getChapter()
    {
        return $this->chapter;
    }

    //SETTERS
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function setAccountID($accountID)
    {
        $this->accountID = $accountID;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function setHp($hp)
    {
        $this->hp = $hp;
    }

    public function setHpMax($hpMax)
    {
        $this->hpMax = $hpMax;
    }

    public function setMp($mp)
    {
        $this->mp = $mp;
    }

    public function setMpMax($mpMax)
    {
        $this->mpMax = $mpMax;
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
    
    public function setWisdom($wisdom)
    {
        $this->wisdom = $wisdom;
    }

    public function setExperience($experience)
    {
        $this->experience = $experience;
    }
    
    public function setSkillPoint($skillPoint)
    {
        $this->skillPoint = $skillPoint;
    }

    public function setGold($gold)
    {
        $this->gold = $gold;
    }

    public function setTownId($townId)
    {
        $this->townId = $townId;
    }

    public function setChapter($chapter)
    {
        $this->chapter = $chapter;
    }
}
