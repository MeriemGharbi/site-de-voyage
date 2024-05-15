<?php 
session_start();
require('../../model/model-forum/forum/afficherQuestionActionAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../../controller/head.php'; ?>
<body>
   
<?/*php include 'controller/navbar.php'; */?>
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
    <button id="speakQuestion" class="btn btn-info mt-2">Lire la question</button>
    <hr>
    <small><?=$question_pseudo_author. '  ' .$question_publication_date;?></small>


    </section>
    
    <?php
}
?>


</div>
<script>
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
    var selectedVoice = voices.find(voice => voice.name === 'Google UK English Female'); // Remplacez 'Google français' par le nom de la voix souhaitée

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