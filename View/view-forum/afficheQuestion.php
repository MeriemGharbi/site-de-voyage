<?php 
session_start();
require('../../model/model-forum/forum/afficherQuestionAction.php');
require('../../model/model-forum/forum/publierReponseAction.php');
require('../../model/model-forum/forum/afficherReponseAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../../controller/head.php'; ?>
<body>
   
<?php include '../../controller/navbar.php'; ?>
<br><br>

<div class="container">

<?php
if(isset($errorMsg)){echo $errorMsg;}


if(isset($question_publication_date)){
    ?>
    <section class="show-content">
    <h3><?=$question_title;?></h3>
    <hr>
    <p><?=$question_content;?></p>
    <button id="speakQuestion" class="btn btn-primary mt-2">Lire la question</button>
    <hr>
    <small><?=$question_pseudo_author. '  ' .$question_publication_date;?></small>

    </section>
    <br>
    <section class="show-answers">

<form class="form-group" method="POST">
<div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Réponse :</label>
<div class="input-group">
    <textarea name="answer" class="form-control" id="answer"></textarea>
    <button id="start_recording_answer" class="btn btn-warning" type="button">Start Recording</button>
    <button id="stop_recording_answer" class="btn btn-danger" type="button" style="display:none;">Stop Recording</button>

</div>
<small id="answerError" class="text-danger"></small> <!-- Message d'erreur pour la réponse -->
<br>
<button id="clear_answer" class="btn btn-danger" type="button">Effacer</button>
<button class="btn btn-primary" type="submit" name="validate" >Répondre</button>
</div>
</form>
<?php 
  while($answer=$getAllAnswers->fetch()){
    ?>
<div class="card">
  <div class="card-header" style="background-color: #48D1CC; color: #fff;"> <!-- Header avec une couleur de fond bleue -->
      <?=$answer['pseudo_auteur']; ?>
  </div>
  <div class="card-body">
    <?=$answer['contenu']; ?>
  </div>
</div>
<br>
        <?php

      }
    
    ?>
    </section>
    <?php
}
?>

</div>
<script>
// Fonction pour compter les mots dans une chaîne de caractères
function countWords(str) {
    return str.split(/\s+/).length;
}

// Fonction de validation pour le formulaire
document.querySelector('form').addEventListener('submit', function(event) {
    const answer = document.getElementById('answer').value;

    // Vérifier si la longueur des mots dépasse la limite
    if (countWords(answer) > 10) {
        event.preventDefault(); // Empêcher l'envoi du formulaire
        document.getElementById('answerError').textContent = 'La réponse ne doit pas dépasser 10 mots.';
    }

    // Vérifier si la réponse ne contient que des chiffres
    if (/^\d+$/.test(answer)) {
        event.preventDefault();
        document.getElementById('answerError').textContent = 'La réponse ne doit pas contenir uniquement des chiffres.';
    }

    // Vérifier si la réponse est vide
    if (answer.trim() === '') {
        event.preventDefault();
        document.getElementById('answerError').textContent = 'La réponse ne doit pas être vide.';
    }
});

// Fonction pour traduire la voix en texte pour la case de réponse
const recognition_answer = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
recognition_answer.interimResults = true;

let listening_answer = false;

recognition_answer.addEventListener('result', e => {
    let transcript = Array.from(e.results)
        .map(result => result[0])
        .map(result => result.transcript)
        .join('');

    // Vérifier si le résultat est final avant de mettre à jour le texte
    if (e.results[0].isFinal) {
        // Récupérer le texte existant dans la case de réponse
        const existingText = document.getElementById("answer").value;

        // Ajouter le texte converti au texte existant
        document.getElementById("answer").value = existingText + ' ' + transcript;
        console.log(transcript);
    }
});

document.getElementById('start_recording_answer').addEventListener('click', function() {
    recognition_answer.start();
    document.getElementById('start_recording_answer').style.display = 'none';
    document.getElementById('stop_recording_answer').style.display = 'block';
    listening_answer = true;
    console.log("Recording started for answer");
});

document.getElementById('stop_recording_answer').addEventListener('click', function() {
    recognition_answer.stop();
    document.getElementById('start_recording_answer').style.display = 'block';
    document.getElementById('stop_recording_answer').style.display = 'none';
    listening_answer = false;
    console.log("Recording stopped for answer");
});

document.getElementById('clear_answer').addEventListener('click', function() {
    document.getElementById('answer').value = '';
});

recognition_answer.addEventListener('end', () => {
    if (listening_answer) {
        console.log("Restarting recognition for answer");
        recognition_answer.start();
    }
});

// Fonction pour lire la question en utilisant la synthèse vocale
window.speechSynthesis.onvoiceschanged = function() {
    var voices = window.speechSynthesis.getVoices();
    voices.forEach(function(voice) {
        console.log(voice.name);
    });
};  
document.getElementById('speakQuestion').addEventListener('click', function() {
    var questionContent = "<?=$question_content;?>"; // Récupérer le contenu de la question
    var speech = new SpeechSynthesisUtterance(questionContent);

    // Sélectionner une voix avec une meilleure qualité sonore
    var voices = window.speechSynthesis.getVoices();
    var selectedVoice = voices.find(voice => voice.name === 'Google UK English Male'); // Remplacez 'Google français' par le nom de la voix souhaitée

    // Vérifier si la voix a été trouvée
    if(selectedVoice) {
        speech.voice = selectedVoice;

        // Ajuster la vitesse de la parole
        speech.rate = 1.0; // Valeur par défaut : 1.0, ajustez au besoin

        // Ajuster le volume du son
        speech.volume = 1.0; // Valeur par défaut : 1.0, ajustez au besoin

        window.speechSynthesis.speak(speech); // Vocaliser le contenu de la question
    } else {
        console.error('Voix non trouvée');
    }
});

</script>
</body>
</html>
