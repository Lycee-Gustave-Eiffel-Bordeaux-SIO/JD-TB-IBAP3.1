<?php

$_SESSION['listeClubs'] = new Clubs(ClubDAO::tousLesClubs());

if (isset($_GET['menuClub'])) {
    $_SESSION['club'] = $_GET['menuClub'];
} else {
    if (!isset($_SESSION['club'])) {
        $_SESSION['club'] = "0";
    }
}

$menuClub = new Menu("menuClub");

foreach ($_SESSION['listeClubs']->getClubs() as $unClub) {
    $menuClub->ajouterComposant($menuClub->creerItemLien($unClub->getIdClub(), $unClub->getNomClub()));
}

$leMenuClubs = $menuClub->creerMenu($_SESSION['club'], "menuClub");

$clubActif = $_SESSION['listeClubs']->chercheClub($_SESSION['club']);

$formInfosClub = new Formulaire('post', 'index.php', 'formInfoClub', 'formInfosClub');

if(isset($_POST['btnAjouterClub'])){
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel('CREER UN CLUB'));
    $formInfosClub->ajouterComposantTab();
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel('Nom Club: '));
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerInputTexte("nomClubAjout" , "nomClubAjout" ,'',1,"",0),1);
    $formInfosClub->ajouterComposantTab();
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel('Adresse Club: '));
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerInputTexte("adresseClubAjout" , "adresseClubAjout" ,'',1,"",0),1);
    $formInfosClub->ajouterComposantTab();
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel('Nom de la ligue: '));
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerInputTexte("nomLigueClubAjout" , "nomLigueClubAjout" ,'',1,"",0),1);
    $formInfosClub->ajouterComposantTab();
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel('Code Postal: '));
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerInputTexte("codePostalClubAjout" , "codePostalClubAjout" ,'',1,"",0),1);
    $formInfosClub->ajouterComposantTab();
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerInputSubmit('btnEnregisterClubAjout' ,'btnEnregisterClubAjout','Enregistrer le Club'),1);
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerInputSubmit('btnAnnulerClubAjout' ,'btnAnnulerClubAjout','Annuler'),1);
    $formInfosClub->ajouterComposantTab();
}
else if (isset($_POST['btnModifierClub'])){
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel('Modifier le club "'.$clubActif->getNomClub().'"'));
    $formInfosClub->ajouterComposantTab();
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel('Nom Club: '));
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerInputTexte("nomClubModif" , "nomClubModif" ,$clubActif->getNomClub(),1,"",0),1);
    $formInfosClub->ajouterComposantTab();
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel('Adresse Club: '));
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerInputTexte("adresseClubModif" , "adresseClubModif" ,$clubActif->getAdresseClub(),1,"",0),1);
    $formInfosClub->ajouterComposantTab();
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerInputSubmit('btnEnregisterClubModif' ,'btnEnregisterClubModif','Enregistrer le Club'),1);
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerInputSubmit('btnAnnulerClubModif' ,'btnAnnulerClubModif','Annuler'),1);
    $formInfosClub->ajouterComposantTab();
    
}

else{
    if ($_SESSION['club'] != "0") {
    $_SESSION['clubActif']=$clubActif;
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerInputSubmit('btnAjouterClub' ,'btnAjouterClub','Ajouter un Club'),1);
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerInputSubmit('btnModifierClub' ,'btnModifierClub','Modifier le Club'),1); 
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerInputSubmit('btnSupprimerClub' ,'btnSupprimerClub','Supprimer le Club'),1);
    $formInfosClub->ajouterComposantTab();


    $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel('Nom Club: '));
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel($clubActif->getNomClub()));
    $formInfosClub->ajouterComposantTab();
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel('Adresse Club: '));
    $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel($clubActif->getAdresseClub()));
    $formInfosClub->ajouterComposantTab();
    }
    else{
        $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel('Veuillez sélectionner un club'));
        $formInfosClub->ajouterComposantTab();
    }
}

$formInfosClub->creerFormulaire();

include_once 'vue/club/vueClubs.php';