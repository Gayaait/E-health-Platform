<?php
// Connexion à la base de données
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

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $date = $_POST["date"];
    $heure = $_POST["heure"];
    $motif = $_POST["motif"];
    $medecin = $_POST["medecin"];

    // Vérifier si la date et l'heure sont déjà prises
    $sql = "SELECT * FROM rdv_db WHERE date = '$date' AND heure = '$heure'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Date et heure déjà prises
        echo "Désolé, ce créneau horaire est déjà réservé. Veuillez choisir un autre créneau.";
    } else {
        // Vérifier si la date est un samedi ou dimanche
        $jourSemaine = date('N', strtotime($date));

        if ($jourSemaine >= 6) {
            // Jour non autorisé (samedi ou dimanche)
            echo "Désolé, veuillez choisir un autre jour que le samedi ou le dimanche.";
        } else {
            // Vérifier l'espacement de 15 minutes minimum
            $heureDebut = date('H:i:s', strtotime('-15 minutes', strtotime($heure)));
            $heureFin = date('H:i:s', strtotime('+15 minutes', strtotime($heure)));

            // Vérifier si l'heure est entre 9h et 18h
            if (strtotime($heure) >= strtotime('09:00:00') && strtotime($heure) <= strtotime('18:00:00')) {
                // Vérifier si d'autres rendez-vous existent dans l'espacement de 15 minutes
                $sql = "SELECT * FROM rdv_db WHERE date = '$date' AND heure >= '$heureDebut' AND heure <= '$heureFin'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Espacement minimum non respecté
                    echo "Désolé, veuillez choisir un créneau avec un espacement minimum de 15 minutes.";
                } else {
                    // Insérer le rendez-vous dans la base de données
                    $sql = "INSERT INTO rdv_db (id_pract,nom, prenom, email, telephone, date, heure, motif) VALUES ($medecin,'$nom', '$prenom', '$email','$telephone', '$date', '$heure','$motif')";
                    if ($conn->query($sql) === TRUE) {
                        echo "Votre rendez-vous a été pris avec succès !";
                    } else {
                        echo "Erreur lors de la prise de rendez-vous : " . $conn->error;
                    }
                }
            } else {
                // Heure en dehors des plages autorisées
                echo "Désolé, veuillez choisir un créneau entre 9h et 18h.";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de prise de rendez-vous</title>
    <link rel="stylesheet" href="css/style_medecin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
        background: linear-gradient(to bottom, #ffffff, #f9e5f0);
        }

        h1 {
        font-family: "Montserrat";
        font-weight: 800;
        font-size: 3rem;
        line-height: 1.5;
        margin-bottom: 2%;
        text-align: center;
        color: #c43d41;
        }

        form {
        max-width: 500px;
        margin: 30px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        }

        label {
        display: block;
        margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="time"],
        textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 10px;
        }

        select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 10px;
        }

        textarea {
        height: 100px;
        }

        input[type="submit"] {
        background-color: #c43d41;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        }

        input[type="submit"]:hover {
        background-color: #45a049;
        }

        .error {
        color: red;
        margin-bottom: 10px;
        }
</style>

</head>
<body>
    <h1>Formulaire de prise de rendez-vous</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" required><br>

        <label for="email">Email :</label>
        <input type="email" name="email" required><br>

        <label for="telephone">Numéro de téléphone :</label>
        <input type="text" name="telephone" id="telephone">
        <br>

        <label for="date">Date :</label>
        <input type="date" name="date" required><br>

        <label for="heure">Heure :</label>
        <input type="time" name="heure" required><br>

        <label for="medecin">Médecin :</label>
        <select name="medecin" id="medecin">
        <option value="">Sélectionnez un médecin</option> 
        <?php foreach ($medecins as $medecin) : ?>
            <option value="<?php echo $medecin['id_pract']; ?>"><?php echo 'Docteur '.$medecin['surname']; ?></option>
        <?php endforeach; ?>
        </select>
        <br>

        <label for="motif">Motif :</label>
        <textarea name="motif" id="motif" rows="4" cols="50"></textarea>
        <br>

        <input type="submit" value="Prendre rendez-vous">
    </form>
</body>
</html>