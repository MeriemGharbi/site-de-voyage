<?php 
require('../../model/model-forum/forum/createAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../../controller/head.php'; ?>
<body>
    <?php include '../../controller/navbar.php'; ?>
    <br><br>
    <form class="container" method="POST" enctype="multipart/form-data">
        <?php
        if(isset($errorMsg)){
            echo'<p>'.$errorMsg.'</p>';
        } elseif(isset($successMsg)){
            echo'<p>'.$successMsg.'</p>';
        }
        ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titre question (doit contenir ? ou !)</label>
            <div class="input-group">
                <input type="text" class="form-control" name="title" id="title" required>
                <button class="btn btn-danger" type="button" onclick="clearField('title')">Effacer</button>
            </div>
            <small id="titleError" class="text-danger"></small> <!-- Message d'erreur pour le titre -->
            <button id="start_recording_title" class="btn btn-warning mt-2" type="button">Start Recording</button>
            <button id="stop_recording_title" class="btn btn-danger mt-2" type="button" style="display:none;">Stop Recording</button>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description question</label>
            <div class="input-group">
                <textarea class="form-control" name="description" id="convert_text" required></textarea>
                <button class="btn btn-danger" type="button" onclick="clearField('convert_text')">Effacer</button>
            </div>
            <small id="descriptionError" class="text-danger"></small> <!-- Message d'erreur pour la description -->
            <button id="start_recording" class="btn btn-warning mt-2" type="button">Start Recording</button>
            <button id="stop_recording" class="btn btn-danger mt-2" type="button" style="display:none;">Stop Recording</button>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contenu question</label>
            <div class="input-group">
                <textarea type="text" class="form-control" name="content" id="convert_text2" required></textarea>
                <button class="btn btn-danger" type="button" onclick="clearField('convert_text2')">Effacer</button>
            </div>
            <small id="contentError" class="text-danger"></small> <!-- Message d'erreur pour le contenu -->
            <button id="start_recording2" class="btn btn-warning mt-2" type="button">Start Recording</button>
            <button id="stop_recording2" class="btn btn-danger mt-2" type="button" style="display:none;">Stop Recording</button>
        </div>

        <button type="submit" class="btn btn-info" name="validate">Publier</button>
    </form> 
    <script>
        function clearField(fieldId) {
            document.getElementById(fieldId).value = '';
        }
        const recognition_title = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition_title.interimResults = true;

        let listening_title = false;

        recognition_title.addEventListener('result', e => {
            let transcript = Array.from(e.results)
                .map(result => result[0])
                .map(result => result.transcript)
                .join('');

            // Vérifier si le résultat est final avant de mettre à jour le texte
            if (e.results[0].isFinal) {
                // Récupérer le texte existant dans le champ de titre
                const existingText = document.getElementById("title").value;

                // Ajouter le texte converti au texte existant
                document.getElementById("title").value = existingText + ' ' + transcript;
                console.log(transcript);
            }
        });

        document.getElementById('start_recording_title').addEventListener('click', function() {
            recognition_title.start();
            document.getElementById('start_recording_title').style.display = 'none';
            document.getElementById('stop_recording_title').style.display = 'block';
            listening_title = true;
            console.log("Recording started for title");
        });

        document.getElementById('stop_recording_title').addEventListener('click', function() {
            recognition_title.stop();
            document.getElementById('start_recording_title').style.display = 'block';
            document.getElementById('stop_recording_title').style.display = 'none';
            listening_title = false;
            console.log("Recording stopped for title");
        });

        recognition_title.addEventListener('end', () => {
            if (listening_title) {
                console.log("Restarting recognition for title");
                recognition_title.start();
            }
        });

        const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition.interimResults = true;

        let listening = false;

        recognition.addEventListener('result', e => {
            let transcript = Array.from(e.results)
                .map(result => result[0])
                .map(result => result.transcript)
                .join('');

            // Vérifier si le résultat est final avant de mettre à jour le texte
            if (e.results[0].isFinal) {
                // Récupérer le texte existant dans le champ de description
                const existingText = document.getElementById("convert_text").value;

                // Ajouter le texte converti au texte existant
                document.getElementById("convert_text").value = existingText + ' ' + transcript;
                console.log(transcript);
            }
        });

        document.getElementById('start_recording').addEventListener('click', function() {
            recognition.start();
            document.getElementById('start_recording').style.display = 'none';
            document.getElementById('stop_recording').style.display = 'block';
            listening = true;
            console.log("Recording started for convert_text");
        });

        document.getElementById('stop_recording').addEventListener('click', function() {
            recognition.stop();
            document.getElementById('start_recording').style.display = 'block';
            document.getElementById('stop_recording').style.display = 'none';
            listening = false;
            console.log("Recording stopped for convert_text");
        });

        recognition.addEventListener('end', () => {
            if (listening) {
                console.log("Restarting recognition for convert_text");
                recognition.start();
            }
        });

        const recognition2 = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition2.interimResults = true;

        let listening2 = false;

        recognition2.addEventListener('result', e => {
            let transcript = Array.from(e.results)
                .map(result => result[0])
                .map(result => result.transcript)
                .join('');

            // Vérifier si le résultat est final avant de mettre à jour le texte
            if (e.results[0].isFinal) {
                // Récupérer le texte existant dans le champ de contenu
                const existingText = document.getElementById("convert_text2").value;

                // Ajouter le texte converti au texte existant
                document.getElementById("convert_text2").value = existingText + ' ' + transcript;
                console.log(transcript);
            }
        });

        document.getElementById('start_recording2').addEventListener('click', function() {
            recognition2.start();
            document.getElementById('start_recording2').style.display = 'none';
            document.getElementById('stop_recording2').style.display = 'block';
            listening2 = true;
            console.log("Recording started for convert_text2");
        });

        document.getElementById('stop_recording2').addEventListener('click', function() {
            recognition2.stop();
            document.getElementById('start_recording2').style.display = 'block';
            document.getElementById('stop_recording2').style.display = 'none';
            listening2 = false;
            console.log("Recording stopped for convert_text2");
        });

        recognition2.addEventListener('end', () => {
            if (listening2) {
                console.log("Restarting recognition for convert_text2");
                recognition2.start();
            }
        });
        function clearField(fieldId) {
            document.getElementById(fieldId).value = '';
        }

        // Fonction pour compter les mots dans une chaîne de caractères
        function countWords(str) {
            return str.split(/\s+/).length;
        }

        // Fonction de validation pour le formulaire
        document.querySelector('form').addEventListener('submit', function(event) {
            const title = document.getElementById('title').value;
            const description = document.getElementById('convert_text').value;
            const content = document.getElementById('convert_text2').value;

            // Vérifier si la longueur des mots dépasse les limites
            if (countWords(title) > 10) {
                event.preventDefault(); // Empêcher l'envoi du formulaire
                document.getElementById('titleError').textContent = 'Le titre ne doit pas dépasser 10 mots.';
            }

            if (countWords(description) > 20) {
                event.preventDefault();
                document.getElementById('descriptionError').textContent = 'La description ne doit pas dépasser 20 mots.';
            }

            if (countWords(content) > 20) {
                event.preventDefault();
                document.getElementById('contentError').textContent = 'Le contenu ne doit pas dépasser 20 mots.';
            }

            // Vérifier si le titre contient uniquement des chiffres
            if (/^\d+$/.test(title)) {
                event.preventDefault();
                document.getElementById('titleError').textContent = 'Le titre ne doit pas contenir uniquement des chiffres.';
            }

            // Vérifier si la description contient uniquement des chiffres
            if (/^\d+$/.test(description)) {
                event.preventDefault();
                document.getElementById('descriptionError').textContent = 'La description ne doit pas contenir uniquement des chiffres.';
            }

            // Vérifier si le contenu contient uniquement des chiffres
            if (/^\d+$/.test(content)) {
                event.preventDefault();
                document.getElementById('contentError').textContent = 'Le contenu ne doit pas contenir uniquement des chiffres.';
            }
        });
    </script>
</body>
</html>





