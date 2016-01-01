<?php
function hasAdmin($accountAccess)
{
	if ($accountAccess != 2)
	{
		exit(0);
	}
}

function hasModerator($accountAccess)
{
	if ($accountAccess < 1)
	{
		exit(0);
	}
}

function initialiseConnection($fileRoot, $linkRoot)
{
    $_SESSION['File_Root'] = $fileRoot;
    $_SESSION['Link_Root'] = $linkRoot;

    if (dirname($_SERVER['PHP_SELF']) == '\\') 
    {
        if ($_SERVER['HTTP_HOST'] == 'localhost') 
        {
            $link = 'http://localhost';
        } 
        else 
        {
            $link = 'http://'.$_SERVER['HTTP_HOST'];
        }
    } 
    else 
    {
        if ($_SERVER['HTTP_HOST'] == 'localhost') 
        {
            $link = 'http://localhost'.dirname($_SERVER['PHP_SELF']);
        } 
        else 
        {
            $link = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
        }
    }
    if ($link != $_SESSION['Link_Root'])
    {
        $linkRoot = $_SESSION['Link_Root'];
		exit(header("Location: $linkRoot/index.php"));
    } 
    else 
    {
        require_once $_SESSION['File_Root'].'/Kernel/Include.php';
        exit(header("Location: $linkRoot/Modules/Main/index.php"));
    }
}

function redirectToBattle($verifyBattle, $linkRoot)
{
    if ($verifyBattle > 0) 
    {
    	exit(header("Location: $linkRoot/Modules/Battle/index.php"));
    }
}

function redirectToLogin($accountID, $linkRoot)
{
    if (empty($accountID)) 
    {
    	exit(header("Location: $linkRoot/Modules/Login/index.php"));
    }
}

function DeCryptMDP($password, $passwordCrypt)
{
    return crypt(sha1(md5($password)), $passwordCrypt) == $passwordCrypt;
}

function CryptMDP($password, $pseudo)
{
    $mdp = sha1(md5($password));
    $salt = uniqid($pseudo, true);
    $algo = '6';
    $rounds = 'rounds=6219';
    $cryptSalt = '$'.$algo.'$'.$rounds.'$'.$salt.'$';
    $cryptMdp = crypt($mdp, $cryptSalt);
    return $cryptMdp;
}