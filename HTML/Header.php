<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Caranille</title>
		<link href="<?= $_SESSION['Link_Root'].'/Design/css/bootstrap.min.css' ?>" rel="stylesheet">
		<link href="<?= $_SESSION['Link_Root'].'/Design/css/navbar.css' ?>" rel="stylesheet">
	</head>
	
	<body>
	
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Caranille</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $header26 ?><span class="caret"></span></a>
							<ul class="dropdown-menu">
							<?php if (isset($_SESSION['Account_ID']))
							{
								?>
								<li><a href="<?= $_SESSION['Link_Root'].'/Modules/Main/index.php' ?>"><?= $header0 ?></a></li>
								<li><a href="<?= $_SESSION['Link_Root'].'/Modules/Story/index.php'; ?>"><?= $header1; ?></a></li>
								<?php if ($townID == 0) 
								{
									?>
									<li><a href="<?= $_SESSION['Link_Root'].'/Modules/Map/index.php' ?>"><?= $header2 ?></a></li>
									<?php
								}
								else
								{
									?>
									<li><a href="<?= $_SESSION['Link_Root'].'/Modules/Town/index.php' ?>"><?= $header2 ?></a></li>
									<?php
								}
							}
							else
							{
								?>
								<li><a href="<?= $_SESSION['Link_Root'].'/Modules/Main/index.php' ?>"><?= $header13 ?></a></li>
								<li><a href="<?= $_SESSION['Link_Root'].'/Modules/Presentation/index.php' ?>"><?= $header14 ?></a></li>
								<li><a href="<?= $_SESSION['Link_Root'].'/Modules/About/index.php' ?>"><?= $header20 ?></a></li>
								<?php
							}
							?>
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $header3 ?><span class="caret"></span></a>
							<ul class="dropdown-menu">
							<?php if (isset($_SESSION['Account_ID'])) 
							{
								?>
								<li><a href="<?= $_SESSION['Link_Root'].'/Modules/Character/index.php' ?>"><?= $header4 ?></a></li>
								<li><a href="<?= $_SESSION['Link_Root'].'/Modules/SkillPoint/index.php' ?>"><?= $header21 ?></a></li>
								<li><a href="<?= $_SESSION['Link_Root'].'/Modules/Inventory/index.php' ?>"><?= $header5 ?></a></li>
								<li><a href="<?= $_SESSION['Link_Root'].'/Modules/Logout/index.php' ?>"><?= $header10 ?></a></li>
								<?php
							}
							else
							{
								?>
								<li><a href="<?= $_SESSION['Link_Root'].'/Modules/Register/index.php' ?>"><?= $header16 ?></a></li>
								<li><a href="<?= $_SESSION['Link_Root'].'/Modules/Login/index.php' ?>"><?= $header17 ?></a></li>
								<li><a href="<?= $_SESSION['Link_Root'].'/Modules/DeleteAccount/index.php' ?>"><?= $header19 ?></a></li>
								<?php
							}
							?>
							</ul>
						</li>
						<?php if (isset($_SESSION['Account_ID'])) 
						{
							?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $header22 ?><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="<?= $_SESSION['Link_Root'].'/Modules/PrivateMessage/index.php' ?>"><?= $header23 ?></a></li>
									<li><a href="<?= $_SESSION['Link_Root'].'/Modules/Chat/index.php' ?>"><?= $header9; ?></a></li>
									<li><a href="<?= $_SESSION['Link_Root'].'/Modules/Top/index.php' ?>"><?= $header7 ?></a></li>
								</ul>
							</li>
							<?php
						}
						?>
					</ul>
						<ul class="nav navbar-nav navbar-right">
  						<?php if (isset($_SESSION['Account_ID'])) 
						{
							if ($accountAccess == 1)
							{
								?>
								<li><a href="<?php echo $_SESSION['Link_Root'] ."/Moderator/index.php"; ?>"><?= $header24 ?></a></li>
								<?php
							}
							if ($accountAccess == 2)
							{
								?>
								<li><a href="<?php echo $_SESSION['Link_Root'] ."/Moderator/index.php"; ?>"><?= $header24 ?></a></li>
								<li><a href="<?php echo $_SESSION['Link_Root'] ."/Admin/index.php"; ?>"><?= $header25 ?></a></li>
								<?php
							}	
						}
						?>
	            		</ul>
					<ul class="nav navbar-nav navbar-right">

					</ul>
				</div>
			</div>
		</nav>
		<div class="jumbotron">