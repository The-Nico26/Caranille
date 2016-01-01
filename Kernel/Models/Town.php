<?php

class Town
{
    private $ID;
    private $picture;
    private $name;
    private $description;
    private $priceInn;
    private $chapter;

    public function __construct(
        $ID,
        $picture,
        $name,
        $description,
        $priceInn,
        $chapter
    ) {
        $this->ID = $ID;
        $this->picture = $picture;
        $this->name = $name;
        $this->description = $description;
        $this->priceInn = $priceInn;
        $this->chapter = $chapter;
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

    public function getPriceInn()
    {
        return $this->priceInn;
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

    public function setPriceInn($priceInn)
    {
        $this->priceInn = $priceInn;
    }

    public function setChapter($chapter)
    {
        $this->chapter = $chapter;
    }
}
