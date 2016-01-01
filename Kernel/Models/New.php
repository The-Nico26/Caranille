<?php

class News
{
    private $ID;
    private $title;
    private $message;
    private $accountPseudo;
    private $date;

    public function __construct(
        $ID,
        $title,
        $message,
        $accountPseudo,
        $date
    ) {
        $this->ID = $ID;
        $this->title = $title;
        $this->message = $message;
        $this->accountPseudo = $accountPseudo;
        $this->date = $date;
    }

//GETTERS
    public function getID()
    {
        return $this->ID;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getAccountPseudo()
    {
        return $this->accountPseudo;
    }

    public function getDate()
    {
        return $this->date;
    }

//SETTERS
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setAccountPseudo($accountPseudo)
    {
        $this->accountPseudo = $accountPseudo;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
}
