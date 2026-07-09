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
        body {
            font-family: "Montserrat", sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #ffffff, #f9e5f0);
        }

        .background {
            height: 100%;
        }

        #container {
            display: flex;
            max-width: 800px;
            margin: 0 auto;
        }

        #camera-container {
            flex: 1;
            margin-right: 20px;
        }

        .camera {
            margin-bottom: 30px;
            max-width: 300px;
        }

        video {
            width: 100%;
            height: auto;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        #chat-container {
            flex: 1;
        }

        #chat-messages {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            max-height: 300px;
            overflow-y: auto;
        }

        .message {
            margin-bottom: 5px;
            font-style: italic;
            color: #888;
        }

        h1 {
            margin: 0;
            font-family: "Ubuntu", sans-serif;
            font-size: 2.5rem;
            font-weight: 400;
            margin-bottom: 20px;
            color: #c43d41;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


    <script>
        function sendMessage() {
            var messageInput = document.getElementById('message-input');
            var chatMessages = document.getElementById('chat-messages');

            // Contenu du message
            var message = messageInput.value;

            if (message.trim() !== '') {
                // Identifiant de l'utilisateur
                var userId = getUserId();

                // Nouveau message
                var newMessage = document.createElement('div');
                newMessage.textContent = getCurrentDateTime() + ' - ' + userId + ': ' + message;
                newMessage.classList.add('message');

                // Ajout du message à la liste
                chatMessages.appendChild(newMessage);

                // Vider la zone de texte
                messageInput.value = '';
            }
        }

        function getCurrentDateTime() {
            var now = new Date();
            var date = now.toLocaleDateString();
            var time = now.toLocaleTimeString();
            return date + ' ' + time;
        }

        function getUserId() {
            return 'medecin';
        }
    </script>
</head>



<body>
    <div class=background>
    <h1 class="title">Téléconsultation en cours</h1>
<div id="container">
    
        <div id="camera-container">
            <div class="camera">
                <h1>Caméra Médecin</h1>
                <video id="cameraMedecin" autoplay></video>
            </div>
            <div class="camera">
                <h1>Caméra Patient</h1>
                <video id="cameraPatient" autoplay></video>
            </div>
        </div>
        <div id="chat-container">
            <h1>Chat</h1>
            <div id="chat-messages"></div>
            <input type="text" id="message-input" placeholder="Écrire un message">
            <button onclick="sendMessage()">Envoyer</button>
        </div>
    </div>

    <script>
        // Accéder aux caméras via JavaScript
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function(stream) {
                // Afficher le flux vidéo de la caméra médecin
                var videoMedecin = document.getElementById('cameraMedecin');
                videoMedecin.srcObject = stream;

                // Afficher le flux vidéo de la caméra patient
                var videoPatient = document.getElementById('cameraPatient');
                videoPatient.srcObject = stream;
            })
            .catch(function(error) {
                console.log('Une erreur s\'est produite : ' + error.message);
            });
    </script>
    </div>
</body>
</html>