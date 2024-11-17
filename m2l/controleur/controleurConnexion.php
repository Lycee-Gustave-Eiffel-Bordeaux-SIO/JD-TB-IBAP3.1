<?php
if(isset($_POST['login']) && isset($_POST['mdp'])){
	$utilisateur = authentification($_POST['login'],$_POST['mdp']);
	if($utilisateur != false){
		$_SESSION['identification'] = $utilisateur['idUser'];
		require_once 'vue/vueAccueil.php' ;
	}
}

if(estPasConnecte()){
	$formulaireConnexion = createFormConnexion();
	$formulaireConnexion->creerFormulaire();
	require_once 'vue/vueConnexion.php' ;
	
}
else{
	$_SESSION['identification']=$utilisateur['idUser'];
	$_SESSION['m2lMP']="accueil";
	header('location: index.php');
}



function estPasConnecte() {
	return !isset($_SESSION['identification']) || !$_SESSION['identification'];
}

function createFormConnexion() {
	$formulaireConnexion = new Formulaire('POST', 'index.php', 'fConnexion', 'fConnexion');
	
	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel('Identifiant :'));
	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('login', 'login', '', 1, 'Entrez votre identifiant', ''));
	$formulaireConnexion->ajouterComposantTab();

	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel('Mot de Passe :'));
	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMdp('mdp', 'mdp',  1, 'Entrez votre mot de passe', ''));
	$formulaireConnexion->ajouterComposantTab();

	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion-> creerInputSubmit('submitConnex', 'submitConnex', 'Valider'));
	$formulaireConnexion->ajouterComposantTab();
	
	$formulaireConnexion->ajouterComposantTab();
	
	return $formulaireConnexion;

}

function authentification($login, $password){

	$pdo = DBConnex::getInstance();

    $sql = "SELECT * FROM utilisateur WHERE login = :lo AND mdp = :mdp";
    $stmt = $pdo->prepare($sql);
	$data = array('lo' => $login,'mdp' => $password);	

    $stmt->execute($data);
    $utilisateur = $stmt->fetch();
	return $utilisateur;
}