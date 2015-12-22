<?php
//SELECT
function showWarning($bdd, $accountID)
{
	global $warning0, $warning1;
	
	echo '<br /><table class="table">';
		echo '<tr>';
            echo '<th>';
                echo $warning0;
            echo '</th>';
            echo '<th>';
                echo $warning1;
            echo '</th>';
        echo '</tr>';
    $showWarningList = $bdd->prepare("SELECT * FROM Caranille_Warnings WHERE Warning_Receiver = ? ORDER BY Warning_ID ASC");
    $showWarningList->execute([$accountID]);
    while($warning = $showWarningList->fetch())
    {
            echo '<tr>';
                echo '<th>';
                	echo $warning['Warning_Type'];
                echo '</th>';
                echo '<th>';
	                echo $warning['Warning_Message'];
                echo '</th>';
            echo '</tr>';
    }
    echo '</table>';
}