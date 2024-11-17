<?php

// On instancie une variable session contenant la liste de toutes les ligues.
require_once 'modele/dto/Ligues.php';
require_once 'modele/dao/LigueDAO.php';
require_once 'modele/dto/Ligue.php';
require_once 'modele/dao/clubDAO.php';
require_once 'modele/dao/ligueDAO.php';


$_SESSION['listeLigues'] = new Ligues(LigueDAO::lesLigues());

// On conserve la ligue sélectionnée sous forme d'objet dans la variable session.
if (isset($_GET['menuLigue'])) {
    $_SESSION['ligue'] = $_GET['menuLigue'];
} else {
    if (!isset($_SESSION['ligue'])) {
        $_SESSION['ligue'] = "0";
    }
}

// On crée un menu à partir des ligues de la BDD.
$menuLigue = new Menu("menuLigue");

foreach ($_SESSION['listeLigues']->getLigues() as $uneLigue) {
    $menuLigue->ajouterComposant($menuLigue->creerItemLien($uneLigue->getIdLigue(), $uneLigue->getNomLigue()));
}

$leMenuLigues = $menuLigue->creerMenu($_SESSION['ligue'], "menuLigue");

// Récupération de la ligue active (sélectionnée)
$ligueActive = $_SESSION['listeLigues']->chercheLigue($_SESSION['ligue']);

// On crée un formulaire qui va contenir les informations de la ligue sélectionnée.
$formInfosLigue = new Formulaire('post', 'index.php', 'formInfoLigue', 'formInfosLigues');
$formInfosClub = new Formulaire('post', 'index.php', 'formInfoClub', 'formInfosClub');


if(isset($_SESSION['identification'])  && LigueDAO::estSecretaire($_SESSION['identification'])){ //si la personne est secretaire
    if ($_SESSION['ligue'] != "0") { // Si une ligue est sélectionnée
        //pour les Ligues
        if(isset($_POST['btnAjouter'])){
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('CREER UNE LIGUE'));
            $formInfosLigue->ajouterComposantTab();
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Nom: '));
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerInputTexte("nomLigueAjout" , "nomLigueAjout" ,'',1,"",0),1);
            $formInfosLigue->ajouterComposantTab();
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Site: '));
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerInputTexte("siteLigueAjout" , "siteLigueAjout" ,'',1,"",0),1);
            $formInfosLigue->ajouterComposantTab();
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Descriptif: '));
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerInputTexte("descriptifLigueAjout" , "descriptifLigueAjout" ,'',1,"",0),1);
            $formInfosLigue->ajouterComposantTab();
    
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerInputSubmit('btnEnregisterAjout' ,'btnEnregisterAjout','Enregistrer'),1);
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerInputSubmit('btnAnnulerAjout' ,'btnAnnulerAjout','Annuler'),1);
            $formInfosLigue->ajouterComposantTab();
    
            
        }
        elseif(isset($_POST['btnModifier'])){
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Modifier la ligue "'.$ligueActive->getNomLigue().'"'));
            $formInfosLigue->ajouterComposantTab();
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Nom: '));
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerInputTexte("nomLigueModif" , "nomLigueModif" ,$ligueActive->getNomLigue(),1,"",0),1);
            $formInfosLigue->ajouterComposantTab();
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Site: '));
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerInputTexte("siteLigueModif" , "siteLigueModif" ,$ligueActive->getSiteLigue(),1,"",0),1);
            $formInfosLigue->ajouterComposantTab();
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Descriptif: '));
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerInputTexte("descriptifLigueModif" , "descriptifLigueModif" ,$ligueActive->getNomLigue(),1,"",0),1);
            $formInfosLigue->ajouterComposantTab();
    
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerInputSubmit('btnEnregistrerModification' ,'btnEnregistrerModification','Enregistrer'),1);
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerInputSubmit('btnAnnulerModif' ,'btnAnnulerModif','Annuler'),1);
            $formInfosLigue->ajouterComposantTab();
    
        }
        else{
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Nom: '));
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel($ligueActive->getNomLigue()));
            $formInfosLigue->ajouterComposantTab();
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Lien du site: '));
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel($ligueActive->getSiteLigue()));
            $formInfosLigue->ajouterComposantTab();
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Descriptif: '));
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel($ligueActive->getDescriptifLigue()));
            $formInfosLigue->ajouterComposantTab();
        
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerInputSubmit('btnAjouter' ,'btnAjouter','Ajouter une Ligue'),1);
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerInputSubmit('btnModifier' ,'btnModifier','Modifier la Ligue'),1); 
            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerInputSubmit('btnSupprimer' ,'btnSupprimer','Supprimer la Ligue'),1);
            $formInfosLigue->ajouterComposantTab();
            
            
        
            //pour les Clubs
            $_SESSION['idLigueActive'] = $ligueActive->getIdLigue();
            $_SESSION['listeClubs'] = new Clubs(ClubDAO::lesClubs($_SESSION['idLigueActive']));

            $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Clubs: '));
            $formInfosLigue->ajouterComposantTab();
        
            foreach ($_SESSION['listeClubs']->getClubs() as $unClub) {
                $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel('_'));
                $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel($unClub->getNomClub()));
                $formInfosClub->ajouterComposantTab();
                $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel('Adresse: '));
                $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel($unClub->getAdresseClub()));
                $formInfosClub->ajouterComposantTab();
            }
        }
    } 
    else {
        // Si aucune ligue n'est sélectionnée
        $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Veuillez sélectionner une ligue'));
        $formInfosLigue->ajouterComposantTab();
    }
}
else{//si la personne n'est pas secrétaire
    
    if ($_SESSION['ligue'] != "0") {
        $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Nom: '));
        $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel($ligueActive->getNomLigue()));
        $formInfosLigue->ajouterComposantTab();
        $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Lien du site: '));
        $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel($ligueActive->getSiteLigue()));
        $formInfosLigue->ajouterComposantTab();
        $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Descriptif: '));
        $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel($ligueActive->getDescriptifLigue()));
        $formInfosLigue->ajouterComposantTab();

        //Pour les clubs

        $_SESSION['idLigueActive'] = $ligueActive->getIdLigue();
            $_SESSION['listeClubs'] = new Clubs(ClubDAO::lesClubs($_SESSION['idLigueActive']));
        
            foreach ($_SESSION['listeClubs']->getClubs() as $unClub) {
                $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel('_'));
                $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel($unClub->getNomClub()));
                $formInfosClub->ajouterComposantTab();
                $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel('Adresse: '));
                $formInfosClub->ajouterComposantLigne($formInfosClub->creerLabel($unClub->getAdresseClub()));
                $formInfosClub->ajouterComposantTab();
            }
    }
    else {
        // Si aucune ligue n'est sélectionnée
        $formInfosLigue->ajouterComposantLigne($formInfosLigue->creerLabel('Veuillez sélectionner une ligue'));
        $formInfosLigue->ajouterComposantTab();
    }
}


$formInfosLigue->creerFormulaire();
$formInfosClub->creerFormulaire();

// Inclusion de la vue
include_once 'vue/ligue/vueLigues.php';
