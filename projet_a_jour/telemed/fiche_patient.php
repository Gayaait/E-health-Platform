
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dr Raji</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;900&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="css/style_fiche_patient.css">
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="index.js"></script>
</head>

<body>
  <?php
  $patients = json_decode(file_get_contents("http://localhost/telemedecine/test/API/patient/".$_GET['id']), true);
  ob_start();
  ?>
  
  <section id="title">
  
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

    <!-- Title -->
<div class=donnees>
<center>

<h1>Vos données personnelles</h1>
    <div class="card">
        <div class="header">
            <div class="header">
                <div class="left">
                    <img src="https://i.pinimg.com/474x/01/6a/80/016a8077b311d3ece44fa4f5138c652d.jpg" alt="Nom de la personne">
                </div>
                <div class="right">
                    <h2>(<?= $patients[0]['gender'] ?>) <?= $patients[0]['name'][0]['family'] ?> <?= $patients[0]['name'][0]['given'][0] ?></h2>
                    <p><?= $patients[0]['birthDate']?></p>
                </div>
            </div>
		</div>
		<div class="contact">
            <row class="infos">
                <column><i class="fa fa-envelope-o" aria-hidden="true"></i> <?= $patients[0]['telecom'][1]['value'] ?></column>
                <column><i class="fa fa-phone" aria-hidden="true"></i> <?= $patients[0]['telecom'][0]['value']?></column>
                <!-- <column><i class="fa fa-user-md" aria-hidden="true"></i> Dr RAJI Omayma</column> -->
            </row>
		</div>
    </div>
    <a href="teleconsultation.php"><h2>Accéder à une téléconsultation</h2></a>
    <a href="rdv.php"><h2>Prendre un rendez-vous</h2></a>
</center>
    </div>
  </section>

  <!-- Footer -->

  <footer id="footer">

    <p>© Copyright 2023 Dr RAJI</p>

  </footer>


</body>

</html>
