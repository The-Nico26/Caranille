<?php
function showNews($bdd)
{
	global $main0, $main1;
    $newsList = $bdd->query('SELECT * FROM Caranille_News ORDER BY News_ID desc');
    while ($news = $newsList->fetch()) 
    {
    	?>
        <br><div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $main0. '' .stripslashes($news['News_Date']). ' ' .$main1. ' ' .stripslashes($news['News_Account_Pseudo']); ?></h3>
            </div>
            <div class="panel-body">
                <h4><?= stripslashes($news['News_Title']) ?></h4>
                <?= stripslashes(nl2br($news['News_Message'])) ?>
            </div>
        </div>
        <?php
    }
    $newsList->closeCursor();
}