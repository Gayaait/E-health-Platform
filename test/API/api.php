<?php 
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));

function getPraticiens(){
    $pdo = getConnexion();
    $req = "SELECT p.id_pract, p.name, p.surname, p.qualifications, p.telecom, p.address, p.gender, p.communication, p.mail, p.tel from practitioner_db p";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $praticiens = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($praticiens);
    $stmt->closeCursor();
    // sendJSON($praticiens);
}

function getPraticienById($id){
    // $pdo = getConnexion();
    // $req = "SELECT p.id_pract, p.name, p.surname, p.qualifications, p.telecom, p.address, p.gender, p.communication, p.mail, p.tel from practitioner_db p where p.id_pract = :id";
    // $stmt = $pdo->prepare($req);
    // $stmt->bindValue(":id",$id,PDO::PARAM_INT);
    // $stmt->execute();
    // $praticiens = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $stmt->closeCursor();
    // sendJSON($praticiens);
}

function getPatients(){
    echo "Voici la liste de tous les patients";
}

function getImmunisationById($id){
    echo "Voici la fiche immunisation du patient numero $id";
}

function getObservationById($id){
    echo "Voici la fiche observation du patient numero $id";
}

function getPatientById($id){
    echo "Voici les données du patient numero $id";
}

function getConnexion(){
    return new PDO("mysql:host=localhost;dbname=user_db;charset=utf8","root","");
}

function sendJSON($infos){
    header("Access-Control-Allow-Origin: *"); // se renseigner pour choisir les accès!! voir cours fullStack du youtubeur
    header("Content-Type: application/json");
    echo json_encode($infos,JSON_UNESCAPED_UNICODE);
}