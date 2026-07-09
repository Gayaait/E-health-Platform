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
    $observations = json_decode(file_get_contents("http://localhost/telemedecine/test/API/observation/".$_GET['id']), true);
    $immunisations = json_decode(file_get_contents("http://localhost/telemedecine/test/API/immunisation/".$_GET['id']), true);
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
        <h1>Liste des observations</h1>
    <div>
        <table class="table">
        <tr class=titres>
            <td>Observation</td>
            <td>Date</td>
            <td>Valeur</td>
            <td>Unité</td>
        </tr>

        <?php foreach ($observations as $observation) : ?>
            <tr>
                <td><?= $observation['code']['coding'][0]['display'] ?></td>
                <td><?= $observation['effectiveDateTime'] ?></td>
                <td><?= $observation['valueQuantity']['value'] ?></td>
                <td><?= $observation['valueQuantity']['unit'] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
    </div>
    <h1>Liste des immunisations</h1>
    <div>
        <table class="table">
        <tr class=titres>
            <td>Code du vaccin</td>
            <td>Produit administré</td>
            <td>Numéro de lot</td>
            <td>Date d'expiration</td>
            <td>Zone d'injection</td>
            <td>Quantité</td>
            <td>Date</td>
        </tr>

        <?php foreach ($immunisations as $immunisation) : ?>
            <tr>
                <td><?= $immunisation['vaccineCode']['coding'][0]['code'] ?></td>
                <td><?= $immunisation['vaccineCode']['coding'][0]['display'] ?></td>
                <td><?= $immunisation['lotNumber'] ?></td>
                <td><?= $immunisation['expirationDate'] ?></td>
                <td><?= $immunisation['site']['coding'][0]['display'] ?></td>
                <td><?= $immunisation['doseQuantity']['value'] ?> <?= $immunisation['doseQuantity']['unit'] ?></td>
                <td><?= $immunisation['occurrenceDateTime'] ?></td>


            </tr>
        <?php endforeach; ?>

    </table>
    </div>

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
