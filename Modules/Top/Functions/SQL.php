<?php
//SELECT
function showAllPlayers($bdd)
{
	global $top0, $top1, $top2, $top3, $top4, $top5, $top6, $top7, $top8, $top9; 
	?>
	
    <?= $top0 ?>
    <table class="table table-striped table-hover">
   	<tr>
   	
    <th class="success">
    <?= $top1 ?>
    </th>

    <th>
    <?= $top2 ?>
    </th>
    
    <th>
   	<?= $top3 ?>
    </th>

    </tr>
    
    <?php
    $accountQuery = $bdd->query('SELECT * FROM Caranille_Characters
    ORDER BY Character_Level DESC
    LIMIT 0, 99');

    while ($account = $accountQuery->fetch()) 
    {
        $accountID = stripslashes($account['Character_ID']); ?>

  		<tr>
			<td class="success">
				<?= stripslashes($account['Character_Level']) ?>
			</td>
			
			<td>
				<?= stripslashes($account['Character_Last_Name']) ?>
			</td>
			
			<td>
				<?= stripslashes($account['Character_First_Name']) ?>
			</td>
    	</tr>
    	<?php
    }
    $accountQuery->closeCursor(); 
    ?>
    </table>
    <?php
}