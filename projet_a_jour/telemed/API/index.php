<?php
require_once("./test_json.php");
//localhost/praticiens -> liste de tous les praticiens
//localhost/patients -> liste de tous les patients
//localhost/immunisation/:id -> fiche immunisation du patient avec l'id
//localhost/observation/:id -> fiche observation du patient avec l'id
//localhost/patient/:id -> fiche du patient avec l'id
//localhost/immunisation/:id -> fiche immunisation du patient avec l'id
//localhost/praticien/:id -> liste des patients du praticien avec l'id

try{
    if(!empty($_GET['demande'])){
        $url = explode("/", filter_var($_GET['demande'],FILTER_SANITIZE_URL));
        switch($url[0]){

            case "praticiens" : // affiche la liste de tous les praticiens : DONE
                getPraticiens();
            break;

            case "patients" : // affiche la liste de tous les patients : DONE
                getPatients();
            break;

            case "immunisation" : // affiche la fiche immunisation du patient numero :id : DONE
                if(!empty($url[1])){
                    getImmunisationById($url[1]); //by id du patient
                    } else {
                        throw new Exception ("Vous n'avez pas renseigné le numéro du patient");
                    }
            break;

            case "observation" : // affiche la fiche observation du patient numero :id
                if(!empty($url[1])){
                    getObservationById($url[1]); //by id du patient
                    } else {
                        throw new Exception ("Vous n'avez pas renseigné le numéro du patient");
                    }
            break;

            case "patient" : // affiche les données du patient numero :id
                if(!empty($url[1])){
                    getPatientById($url[1]);
                    } else {
                        throw new Exception ("Vous n'avez pas renseigné le numéro du patient");
                    }
            break;

            case "praticien" : // affiche la liste des patients du praticien numero :id : DONE
                if(!empty($url[1])){
                    getPatientsByPraticienId($url[1]);
                    } else {
                        throw new Exception ("Vous n'avez pas renseigné le numéro du praticien");
                    }
            break;



            default : throw new Exception ("La demande n'est pas valide, vérifiez l'url");
        }
    } else {
        throw new Exception ("Problème de récupération de données.");
    }

// récupérer les erreurs
} catch(Exception $e){
    $erreur =[
        "message" => $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}
