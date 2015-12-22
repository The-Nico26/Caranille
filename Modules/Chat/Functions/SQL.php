<?php
//DELETE
function deleteMessage($bdd, $accountAccess, $messageID)
{
	global $chat6;
	if ($accountAccess = 2)
	{
		$Delete_Message = $bdd->prepare("DELETE FROM Caranille_Chat 
		WHERE Chat_Message_ID = :messageID");
		$Delete_Message->execute(array('messageID' => $messageID));
		echo "$chat6";
	}
}

function clearAllMessages($bdd, $accountAccess)
{
	global $chat7;
	if ($accountAccess == 2)
	{
		$bdd->exec("DELETE FROM Caranille_Chat");
		echo "$Chat_7";
	}
}

//INSERT
function addMessage($bdd, $characterID, $Message)
{
	$addMessage = $bdd->prepare("INSERT INTO Caranille_Chat VALUES('', :characterID, :Message)");
	$addMessage->execute(array('characterID' => $characterID, 'Message' => $Message));
	$addMessage->closeCursor();
}

//SELECT
function showAllMessages($bdd, $accountAccess)
{
	global $chat0, $chat1, $chat2;
	
	?>
	<center><?= $chat0 ?></center>
	<hr>
		<table class="table">
			<tr>
				<td> <?= $chat1 ?> </td>
				<td> <?= $chat2 ?> </td>
				
				<?php
				if ($accountAccess == 2)
				{
					echo '<td> Action </td>';
				}
			echo '</tr>';
		$Messages_Query = $bdd->query("SELECT * FROM Caranille_Chat, Caranille_Characters 
		WHERE Chat_Character_ID = Character_ID
		ORDER BY Chat_Message_ID DESC
		LIMIT 0, 10");
		while ($Messages = $Messages_Query->fetch())
		{
			echo '<tr>';
			$character = stripslashes($Messages['Character_Last_Name']). " " .stripslashes($Messages['Character_First_Name']);
			$messageId = stripslashes($Messages['Chat_Message_ID']);
				echo "<td> <div class=\"important\">$character</div> </td>";
				echo "<td>". stripslashes($Messages['Chat_Message'])."</td>";
			if ($accountAccess == "2")
			{
				?>
				<td>
					<form method="POST" action="Delete.php">
						<input type="hidden" name="messageID" value="$messageID">
						<input type="submit" class="btn btn-danger btn-small" name="Delete" value="X">
					</form>
				</td>
				<?php
			}
			echo '</tr>';
		}
		$Messages_Query->closeCursor();
	echo '</table>';
echo '<hr>';
}
	