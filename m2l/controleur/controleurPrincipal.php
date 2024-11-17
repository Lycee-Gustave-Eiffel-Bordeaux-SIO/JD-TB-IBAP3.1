<?php
if(isset($_GET['m2lMP'])){
	$_SESSION['m2lMP']= $_GET['m2lMP'];
}
else
{
	if(!isset($_SESSION['m2lMP'])){
		$_SESSION['m2lMP']="accueil";
	}
}

$idUser = $_SESSION['identification'];

//Tester la connexion 
$m2lMP = new Menu("m2lMP");

$m2lMP->ajouterComposant($m2lMP->creerItemLien("accueil", "Accueil"));
$m2lMP->ajouterComposant($m2lMP->creerItemLien("services", "Services"));
$m2lMP->ajouterComposant($m2lMP->creerItemLien("locaux", "Locaux"));
$m2lMP->ajouterComposant($m2lMP->creerItemLien("ligues", "Ligues"));

if(!isset($_SESSION['identification'])){
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("connexion", "Se connecter"));

} else if(FormationDAO::getStatu($idUser) == "admin"){
    $m2lMP->ajouterComposant($m2lMP->creerItemLien("salarie", "Salarié"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("benevole", "Bénévole"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("formation", "Formation"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("MesFormations", "Mes Formations"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("formationAdmin", "Gestion Formation"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("deconnexion", "Se déconnecter"));

} else if(FormationDAO::getStatu($idUser) == "Secretaire"){ //modif
    $m2lMP->ajouterComposant($m2lMP->creerItemLien("clubs", "Clubs"));
    $m2lMP->ajouterComposant($m2lMP->creerItemLien("deconnexion", "Se déconnecter"));
    if(isset($_POST['btnEnregisterAjout'])){
        LigueDAO::createLigue($_POST['nomLigueAjout'], $_POST['siteLigueAjout'], $_POST['descriptifLigueAjout']);
        header("Location: index.php");
        exit;
    }
    
    if(isset($_POST['btnEnregistrerModification'])){
        LigueDAO::updateLigue($_SESSION['idLigueActive'], $_POST['nomLigueModif'], $_POST['siteLigueModif'], $_POST['descriptifLigueModif']);
        header("Location: index.php");
        exit;
    }
    
    if(isset($_POST['btnSupprimer'])){
        LigueDAO::deleteLigue($_SESSION['idLigueActive']);
        $_SESSION['ligue'] = "0"; // Réinitialiser la sélection de ligue
        header("Location: index.php");
        exit;
    }
    if(isset($_POST['btnEnregisterClubAjout'])){
        ClubDAO::createClub($_POST['nomClubAjout'],$_POST['adresseClubAjout'],$_POST['nomLigueClubAjout'],$_POST['codePostalClubAjout']);
    }
    if(isset($_POST['btnEnregisterClubModif'])){
            ClubDAO::updateClub($_SESSION['clubActif']->getIdClub(),$_POST['nomClubModif'],$_POST['adresseClubModif']);
            header("Location: index.php");
    }
    if(isset($_POST['btnSupprimerClub'])){
        ClubDAO::deleteClub($_SESSION['clubActif']->getIdClub());
        $_SESSION['club'] = "0";
        header("Location: index.php");
        exit;
    }
    
}
else {
    $m2lMP->ajouterComposant($m2lMP->creerItemLien("ligues", "Ligues"));
    $m2lMP->ajouterComposant($m2lMP->creerItemLien("salarie", "Salarié"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("benevole", "Bénévole"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("formation", "Formation"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("MesFormations", "Mes Formations"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("deconnexion", "Se déconnecter"));
}


$menuPrincipalM2L = $m2lMP->creerMenu($_SESSION['m2lMP'],'m2lMP');

if (isset($_GET['m2lMP'])) {
    $action = $_GET['m2lMP'];
    
    switch ($action) {
        case 'ajouter_formation':
            include_once 'controleur/controleurAjouter_formation.php';
            break;

        case 'supprimer_formation':
            include_once 'controleur/controleurSupprimer_formation.php';
            break;

		case 'modifier_formation':
            include_once 'controleur/controleurModifier_formation.php';
            break;

		case 'accepte_formation':
            include_once 'controleur/controleurAccepte_formation.php';
            break;
			
		case 'refus_formation':
            include_once 'controleur/controleurRefus_formation.php';
            break;
    }
}

include_once dispatcher::dispatch($_SESSION['m2lMP']);