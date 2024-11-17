<?php 

$_SESSION['inscription']=FormationDao::desinscriptionFormation( $_SESSION['identification'], $_POST['idForma']);

header("Location: index.php?m2lMP=formation");
exit();