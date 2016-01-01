<?php
//INSERT
function sendMessage($bdd, $subject, $message, $toID, $accountID, $parentID)
{
	$addMessage = $bdd->prepare("INSERT INTO Caranille_Private_Messages VALUES(
	'', 
	:accountID, 
	:toID, 
	:subject, 
	:message, 
	:parentID, 
	'0')");
	
	$addMessage->execute(array(
	'accountID' => $accountID, 
	'toID' => $toID,
	'subject' => $subject, 
	'message' => $message,
	'parentID' => $parentID));
	$addMessage->closeCursor();
	
	updateMessagePriveStatut($bdd, $parentID, '0');
}

//SELECT
function showListCharacterID($bdd, $characterID)
{
	?>
	<select name="characterID">
	<?php
	foreach($bdd->query("SELECT * FROM Caranille_Characters ORDER BY Character_Last_Name ASC") as $player)
	{
		if($characterID != $player['Character_ID'])
		{
			$playerLastName = stripslashes($player['Character_Last_Name']);
			$playerFirstName = stripslashes($player['Character_First_Name']);
			$playerID = stripslashes($player['Character_ID']); ?>
			<option value="$playerID"><?= $playerLastName; $playerFirstName ?></option>
			<?php
		}
	}
	?>
	</select><br/><br/>
	<?php
}

function showConversation($bdd, $parentID, $accountID)
{
    global  $messageprivate0, $messageprivate1;
    ?>
    
	<br><table class="table">
	<?php
	$MPList = $bdd->prepare("SELECT * FROM Caranille_Private_Messages 
    WHERE Private_Message_Parent_ID = ? 
    ORDER BY Private_Message_ID DESC");
    $MPList->execute([$parentID]);
    
    while ($MP = $MPList->fetch()) 
    {
    	?>
        <tr>
            <th>
                <?= $messageprivate1 ?>
                <?php $transit = newCharacter($bdd, $MP['Private_Message_Transmitter']) ?>
                <?= $transit->getFirstName(); $transit->getLastName() ?>
            </th>
        </tr>
        <tr>
            <td>
                <?= stripslashes($MP['Private_Message_Message']) ?>
            </td>
        </tr>
        <?php
    }
	$MPList = $bdd->prepare("SELECT * FROM Caranille_Private_Messages 
    WHERE Private_Message_ID = ?");
    $MPList->execute([$parentID]);
    
    while ($MP = $MPList->fetch()) 
    {
	    $transitID = $MP['Private_Message_Transmitter'];
	    $recevierID = $MP['Private_Message_Receiver'];
	    $MPID = $MP['Private_Message_ID'];
	    $subject = $MP['Private_Message_Subject'];
	    
	    if($transitID != $accountID)
	    {
	    	updateMessagePriveStatut($bdd, $parentID, '1'); ?>
	    	<input type="hidden" name="characterID" value="<?= $transitID ?>">
	    	<?php
	    }
	    else
	    {
	    	?>
	    	<input type="hidden" name="characterID" value="<?= $recevierID ?>">
	    	<?php
	    }
	    ?>
	    <input type="hidden" name="parentID" value="<?= $parentID ?>">
	    <input type="hidden" name="subject" value="<?= $subject ?>">
        <tr>
            <th>
                <center><?= $messageprivate0; stripslashes($MP['Private_Message_Subject']); ?></center><br/><?= $messageprivate1 ?>
                <?php $transit = newCharacter($bdd, $MP['Private_Message_Transmitter']) ?>
                <?= $transit->getFirstName(); $transit->getLastName(); ?>
            </th>
        </tr>
        <tr>
            <td>
                <?= stripslashes($MP['Private_Message_Message']) ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </table>
    <br /><br />
    <?php
}

function showMessagePrivate($bdd, $accountID)
{
	global $messageprivate0, $messageprivate1, $messageprivate2;
	$MPList = $bdd->prepare("SELECT * FROM Caranille_Private_Messages 
    WHERE (Private_Message_Receiver = ? OR Private_Message_Transmitter = ?) AND Private_Message_Parent_ID = '0'");
    $MPList->execute([$accountID, $accountID]);
    
    while ($MP = $MPList->fetch()) 
    {
    	?>
        <table class="table">
            <tr>
                <th>
                <?php
                	if($MP['Private_Message_Lu'] == '0' && $MP['Private_Message_Transmitter'] != $accountID)
                	{
                		?>
                		<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                		<?php
                	}
                	else
                	{
                		?>
                		<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                		<?php
                	}
	               	$parentID = stripslashes($MP['Private_Message_ID']);
	               	$transit = newCharacter($bdd, $MP['Private_Message_Transmitter']);
                    echo ": " .$transit->getFirstName()." ".$transit->getLastName(); ?>
                    <?= $messageprivate0; stripslashes($MP['Private_Message_Subject']); $messageprivate1; ?>
            		<form method="POST" action="Conversation.php">
			        	<input type="hidden" name="parentID" value="$parentID">
			        	<input type="submit" class="btn btn-info" value="<?= $messageprivate2 ?>">
		        	</form>
                </th>
            </tr>
            <tr>
                <td>
                    <?= stripslashes($MP['Private_Message_Message']) ?>
                </td>
            </tr>
        </table>
        <hr>
        <?php
    }
}