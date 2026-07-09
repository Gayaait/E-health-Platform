<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

$sql2 = "SELECT * FROM practitioner_db";
$result2 = $conn->query($sql2);

$medecins = array();
   if ($result2->num_rows > 0) {
      while ($row = $result2->fetch_assoc()) {
         $medecins[] = $row;
      }
   }

@include 'config.php';

if(isset($_POST['submit'])){

   $gender = mysqli_real_escape_string($conn, $_POST['gender']);
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $surname = mysqli_real_escape_string($conn, $_POST['surname']);
   $birth = mysqli_real_escape_string($conn, $_POST['birth']);
   $mail = mysqli_real_escape_string($conn, $_POST['mail']);
   $tel = mysqli_real_escape_string($conn, $_POST['tel']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $id_pract = $_POST["medecin"];

   $select = " SELECT * FROM user_form WHERE mail = '$mail' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = "L'utilisateur existe déjà";

   }else{

      if($pass != $cpass){
         $error[] = 'Les mots de passe ne correspondent pas';
      }else{
         $insert = "INSERT INTO user_form(id_pract, gender, nom, prenom, birth, tel, mail, password) VALUES('$id_pract','$gender','$surname','$name','$birth','$tel','$mail','$pass')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
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
   <title>S'inscrire</title>
   <style>
      .password-container {
        position: relative;
      }
      
      .password-toggle {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        cursor: pointer;
      }

      .contact-container {
      display: flex;
      flex-direction: row;
      align-items: center;
      width: fit-content;
      margin: auto;
      }

      .contact-container label {
         margin: 0px 10px 0px 10px;
      }

      .contact-container input[type="radio"] {
         transform: scale(1.2);
         margin: 0px 18px 0px 18px;
      }
      #medecin{
         display: flex;
         flex-direction: row;
         align-items: center;
         width: 100%;
         margin: auto;
      }
   </style>
   <link rel="preconnect" href="https://fonts.gstatic.com">


   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;900&display=swap" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- custom css file link  -->
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="stylesheet" href="css/style2.css">
   
</head>
<body>
<!-- Nav Bar -->
  
<div class="container-fluid no1">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="">Dr RAJI</a>

        <div class="collapse navbar-collapse" id=navbarTogglerDemo01>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="icon-link" href="#">
                <i class="fa fa-question"></i> Aide</a>
            </li>
            <li class="nav-item">
              <a class="icon-link" href="register_form.php">
                <i class="fa fa-user-o"></i> Se connecter / S'inscrire</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>


<div class="form-container">

   <form action="" method="post">
      <h3>S'inscrire</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      
      <div class="contact-container">
      <input type="radio" name="gender" value="male" checked>
      <label for="male">H</label>
      <input type="radio" name="gender" value="female">
      <label for="female">F</label>
      </div>
      <input type="text" name="name" required placeholder="Entrez votre prénom">
      <input type="text" name="surname" required placeholder="Entrez votre nom">
      <input type="date" name="birth" required placeholder="Entrez votre date de naissance">
      <input type="email" name="mail" required placeholder="Entrez votre email">
      <input type="tel" name="tel" required placeholder="Entrez votre numéro de téléphone">

      <div class="password-container">
         <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+]).{8,}" required placeholder="Entrez votre mot de passe" title="Le mot de passe doit contenir au moins 8 caractères dont au moins 1 chiffre, une lettre majuscule et une minuscule, et un caractère spécial (!@#$%^&*()_+)" required>
         <i class="fa fa-eye password-toggle" aria-hidden="true"></i>
      </div>

      <input type="password" id="password" name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+]).{8,}" required placeholder="Confirmez le mot de passe" title="Le mot de passe doit contenir au moins 8 caractères dont au moins 1 chiffre, une lettre majuscule et une minuscule, et un caractère spécial (!@#$%^&*()_+)" required>
   
      <label for="medecin">Médecin :</label>
      <select name="medecin" id="medecin">
        <option value="">Sélectionnez un médecin</option> 
        <?php foreach ($medecins as $medecin) : ?>
            <option value="<?php echo $medecin['id_pract']; ?>"><?php echo 'Docteur '.$medecin['surname']; ?></option>
        <?php endforeach; ?>
      </select><br>

      Confirmer mon inscription par :

      <div class="contact-container">
      <input type="radio" id="email" name="contact" value="email" checked>
      <label for="email">Email</label>
      <input type="radio" id="telephone" name="contact" value="telephone">
      <label for="telephone">Téléphone</label>
      </div>

      <input type="submit" name="submit" value="S'inscrire" class="form-btn">
      <p>Vous avez déja un compte ? <a href="login_form.php">Se connecter</a></p>
      <p></p>
      <a style="text-decoration: underline;" href="#">Mot de passe oublié ?</a>
   </form>

</div>

<script>
const passwordInput = document.getElementById('password');
const passwordToggle = document.querySelector('.password-toggle');

passwordToggle.addEventListener('click', function() {
  const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordInput.setAttribute('type', type);
  this.classList.toggle('fa-eye-slash');
});
</script>

</body>
</html>