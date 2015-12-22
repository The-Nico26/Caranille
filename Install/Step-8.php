<?php
   session_start();
   require_once '../Kernel/Config/Server.php';
   require_once '../Kernel/Config/SQL.php';
   require_once '../Kernel/Functions/Security.php';
   require_once '../Kernel/Functions/BDD.php';

   $language = $_SESSION['Language'];
   require_once "../Kernel/Locales/{$language}/Words.php";
	include_once "header.php";
?>
    <div class="important"><?= $install38 ?></div>
    <br><br>
    <?php
    $mmorpgName = htmlspecialchars(addslashes($_POST['MMORPG_Name']));
    $presentation = htmlspecialchars(addslashes($_POST['Presentation']));
    $pseudo = htmlspecialchars(addslashes($_POST['Pseudo']));
    $email = htmlspecialchars(addslashes($_POST['Email']));

    if (isset($_POST['MMORPG_Name']) && ($_POST['Presentation']) && ($_POST['Pseudo']) && ($_POST['Password']) && ($_POST['Email'])) :
        $password = htmlspecialchars(addslashes($_POST['Password']));
        $passwordConfirm = htmlspecialchars(addslashes($_POST['Password_Confirm']));
        if ($password == $passwordConfirm) :
        	$date = date('Y-m-d H:i:s');
	        $ip = $_SERVER['REMOTE_ADDR'];
	        $password = CryptMDP($password, $pseudo);

	        $addAccount = $bdd->prepare("INSERT INTO Caranille_Accounts VALUES(
	        '',
	        :Pseudo,
	        :Email,
	        :Password,
	        '2',
	        :Date,
	        :IP,
	        'Authorized' ,
	        'None')");

	        $addAccount->execute([
	        'Pseudo' => $pseudo,
	        'Email' => $email,
	        'Password' => $password,
	        'Date' => $date,
	        'IP' => $ip,]);

	        $addCharacter = $bdd->exec("INSERT INTO Caranille_Characters VALUES(
	        '1', 
	        '1', 
	        'http://localhost', 
	        'Admin', 
	        'Admin', 
	        '1', 
	        '120', 
	        '120', 
	        '0', 
	        '0', 
	        '0', 
	        '120', 
	        '20', 
	        '20', 
	        '0', 
	        '0', 
	        '0', 
	        '20', 
	        '10', 
	        '0', 
	        '0', 
	        '0', 
	        '10', 
	        '10', 
	        '0', 
	        '0', 
	        '0', 
	        '10', 
	        '10', 
	        '0', 
	        '0', 
	        '0', 
	        '10', 
	        '10', 
	        '0', 
	        '0', 
	        '0', 
	        '10', 
	        '0', 
	        '0', 
	        '0', 
	        '0', 
	        '0', 
	        '0', 
	        '0', 
	        '0', 
	        '0', 
	        '1')");
	
	        $mmorpg = $bdd->prepare("UPDATE Caranille_Configuration
	        SET Configuration_MMORPG_Name = :mmorpgName,
	        Configuration_Presentation = :presentation
	        ");
	
	        $mmorpg->execute([
	        'mmorpgName' => $mmorpgName,
	        'presentation' => $presentation]);
	        $bdd->exec("INSERT INTO Caranille_News VALUES(
		    '',
		    'Installation de Caranille',
		    'Félicitation Caranille est bien installé, vous pouvez éditer cette news ou la supprimer',
		    '$pseudo',
		    '$date')");
	        ?>
	        
            <?= $install39 ?>
            <form method="POST" action="../index.php">
                <input type="submit" class="btn btn-success" name="accueil" value="<?= $install40 ?>">
            </form>
            
	    <?php else : ?>
	    
	    <?= $install41 ?>
	    <form method="POST" action="../Step-7.php">
	        <input type="submit" class="btn btn-success" name="Finish" value="<?= $install42 ?>">
	    </form>
	    
	    <?php endif ?>
	    
   	<?php else : ?>
    <?= $install43 ?>
    <form method="POST" action="../Step-7.php">
        <input type="submit" class="btn btn-success" name="Finish" value="<?= $install44 ?>">
    </form>
    <?php endif ?>  
    
<?php include_once "footer.php"; ?>
