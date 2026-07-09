<?php

@include 'config.php';

session_start();

$conn = mysqli_connect('localhost','root','','user_db');

if(isset($_POST['submit'])){

   $mail = mysqli_real_escape_string($conn, $_POST['mail']);
   $pass = md5($_POST['password']);
   $role = $_POST['user_type'];


   if ($role === 'medecin') {
      // Connexion à la base de données des médecins
      $select = " SELECT * FROM practitioner_db WHERE mail = '$mail' && password = '$pass' ";
      $result = mysqli_query($conn, $select);
      
      if (mysqli_num_rows($result) == 0) {
         $message1 = "L'adresse email ou le mot de passe n'est pas correct chez les médecins";
         echo '<script type="text/javascript">window.alert("'.$message1.'");</script>';
      }else{
         $row = mysqli_fetch_assoc($result);
         $num_pract = $row['id_pract'];
      }
      
     
    } elseif ($role === 'patient') {
      // Connexion à la base de données des patients
      $select = " SELECT * FROM user_form WHERE mail = '$mail' && password = '$pass' ";
      $result = mysqli_query($conn, $select);

      if (mysqli_num_rows($result) == 0) {
         $message1 = "L'adresse email ou le mot de passe n'est pas correct chez les patients";
         echo '<script type="text/javascript">window.alert("'.$message1.'");</script>';
      }else{
         $row = mysqli_fetch_assoc($result);
         $num_patient = $row['id_patient'];
      }

   
   } elseif ($role === 'secretaire') {
      // Connexion à la base de données des secrétaires
      $select = " SELECT * FROM secretaire_db WHERE mail = '$mail' && password = '$pass' ";
      $result = mysqli_query($conn, $select);

      if (mysqli_num_rows($result) == 0) {
         $message1 = "L'adresse email ou le mot de passe n'est pas correct chez les secrétaires";
         echo '<script type="text/javascript">window.alert("'.$message1.'");</script>';
      }

   }

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if ($role === 'medecin') {

         $_SESSION['id_pract'] = $row['id_pract'];
         header('location:http://localhost/telemedecine/test/patientsPraticiens.php?id='.$num_pract);

      } elseif ($role === 'patient') {

         $_SESSION['name'] = $row['name'];
         header('location:http://localhost/telemedecine/test/fiche_patient.php?id='.$num_patient);

      } elseif ($role === 'secretaire') {

         $_SESSION['id_secretaire'] = $row['id_secretaire'];
         header('location:secretaire.php');
      
      }
   }
};
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Se connecter</h3>
      <input type="email" name="mail" required placeholder="Entrez votre email">
      <input type="password" name="password" required placeholder="Entrez votre mot de passe">
      
      <div class="user-type-container">
      <input type="radio" id="patient" name="user_type" value="patient" checked>
      <label for="patient">Patient</label>
      <input type="radio" id="medecin" name="user_type" value="medecin">
      <label for="medecin">Médecin</label>
      <input type="radio" id="secretaire" name="user_type" value="secretaire">
      <label for="medecin">Secrétaire</label>
      </div>

      <input type="submit" name="submit" value="Se connecter" class="form-btn">

      <p>Vous n'avez pas de compte ? <a href="register_form.php">S'inscrire</a></p>
   </form>

</div>

</body>
</html>