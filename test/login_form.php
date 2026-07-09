<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $mail = mysqli_real_escape_string($conn, $_POST['mail']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE mail = '$mail' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

         $_SESSION['name'] = $row['name'];
         header('location:medecin_login.html');
      }
     
   else{
      $error[] = "L'email ou le mot de passe est incorrect. Veuillez réessayer.";
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