<?php require_once 'lib/autoLoader.php';
require_once 'modele/dao/dBConnex.php';
require_once 'modele/dao/param.php'; 
require_once 'modele/dao/formationDao.php'; 
require_once 'lib/hydrate.php'; 
require_once 'modele/dto/formationDto.php';
require_once 'modele/dto/Club.php';
require_once 'modele/dto/Clubs.php';
require_once 'modele/dto/Ligue.php';
require_once 'modele/dto/Ligues.php';


 session_start();
 ini_set("display_errors","1");?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>Maison des Ligues de Lorraine</title>
		<style type="text/css">
			@import url(styles/m2l.css);
		</style>
	
	</head>
	<body>
		<?php
			require_once 'controleur/controleurPrincipal.php';	
		?>
	</body>
</html>
