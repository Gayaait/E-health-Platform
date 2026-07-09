<?php
// session_start();
// if (isset($_SESSION['id_pract'])) {
//    $medecin_name = $_SESSION['id_pract'];
// } else {
//    header('Location: prout.php');
//    exit();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr Raji</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/style_medecin.css">

    <style>
    h1 {
        font-family: "Montserrat";
        font-weight: 800;
        font-size: 3rem;
        line-height: 1.5;
        margin-bottom: 2%;
        text-align: center;
    }
    .titres{
        font-weight: 800;
    }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    $patients = json_decode(file_get_contents("http://localhost/telemedecine/test/API/praticien/".$_GET['id']), true);
    // print_r($patients);
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
                <a class="icon-link" href="logout.php">
                <i class="fa fa-user-o"></i> Se déconnecter</a>
            </li>
            </ul>
        </div>
        </nav>
    </div>
    <div class=background>
    <center>
        <h1>Liste de vos patients</h1>
    <div>
        <table class="table">
        <tr class=titres>
            <td>Id</td>
            <td>Prénom</td>
            <td>Nom</td>
            <td>Genre</td>
            <td>Date de Naissance</td>
            <td>Téléphone</td>
            <td>Email</td>
        </tr>

        <?php foreach ($patients as $patient) : ?>
            <tr onclick="location.href='obs_imm.php?id=<?= $patient['id'] ?>'">
                <td><?= $patient['id'] ?></td>
                <td><?= $patient['name'][0]['given'][0] ?></td>
                <td><?= $patient['name'][0]['family'] ?></td>
                <td><?= $patient['gender'] ?></td>
                <td><?= $patient['birthDate'] ?></td>
                <td><?= $patient['telecom'][0]['value']?></td>
                <td><?= $patient['telecom'][1]['value'] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
    </div>
    <a href="teleconsultation.php"><h1>Accéder à une téléconsultation</h1></a>

    </center>
    
    </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


  <footer id="footer">

    <p>© Copyright 2023 Dr RAJI</p>

  </footer>


</body>

</html>
