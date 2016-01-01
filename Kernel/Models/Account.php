<?php

class Account
{
    private $ID;
    private $pseudo;
    private $email;
    private $password;
    private $access;
    private $lastConnection;
    private $lastIp;
    private $status;
    private $reason;

    public function __construct(
        $ID,
        $pseudo,
        $email,
        $password,
        $access,
        $lastConnection,
        $lastIp,
        $status,
        $reason
    ) {
        $this->ID = $ID;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->password = $password;
        $this->access = $access;
        $this->lastConnection = $lastConnection;
        $this->lastIp = $lastIp;
        $this->status = $status;
        $this->reason = $reason;
    }

    //GETTERS
    public function getID()
    {
        return $this->ID;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAccess()
    {
        return $this->access;
    }

    public function getLastConnection()
    {
        return $this->lastConnection;
    }

    public function getLastIp()
    {
        return $this->lastIp;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getReason()
    {
        return $this->reason;
    }

    //SETTERS
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setAccess($access)
    {
        $this->access = $access;
    }

    public function setLastConnection($lastConnection)
    {
        $this->lastConnection = $lastConnection;
    }

    public function setLastIp($lastIp)
    {
        $this->lastIp = $lastIp;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setReason($reason)
    {
        $this->reason = $reason;
    }
}
