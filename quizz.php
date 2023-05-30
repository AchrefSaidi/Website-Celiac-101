<?php

session_start();
$pageName='QUIZZ';
include_once 'isAuthentificated.php';
include_once 'assets/bootstrapAsset.php';
include_once 'assets/mainHead.php'
?>

<body>

<?php include_once 'navbarCo.php' ;?>



  

  <div class="quizz__container">

      <div class="progress__container">


            <h4>Début</h4>

            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
              
              </div>
            </div>
            
            <h4>Fin</h4>
      </div>
      
      
      <div class="quizz__layout">

        <div class="wrapper introduce">
          <h2>Outil d’évaluation des symptômes</h2>
          <img src="images/quizz.png" alt="">
          <p>La maladie coeliaque est une maladie génétique auto-immune dans laquelle la consommation de gluten (une protéine présente dans le blé, le seigle et l’orge) cause des dommages à l’intestin grêle.Si vous avez des symptômes inexpliqués ou si vous avez un membre de votre famille atteint de la maladie coeliaque, complétez l’outil d’évaluation des symptômes pour voir si vous avez un risque accru de maladie coeliaque.</p>

          <button class="btn btn3" id="startBtn" >COMMENCER<i id="right" class="fas fa-arrow-alt-circle-right"></i></button>
        </div>

      
        <div id="question1" class="wrapper question hidden">
          <h2>Membres de la famille<img src="icons/family.png" alt=""></h2>
    
          <p>Avez-vous un membre directe de la famille (parent, frère ou sœur, enfant) atteint de la maladie coeliaque?</p>
          <div class="answers one__choice--question" >
            <button id="answerBtn" class="answerBtn">OUI</button>
            <button id="answerBtn" class="answerBtn">NON</button>
            
          </div>

          <button class="btn btn3"  disabled='disabled' style="cursor:not-allowed" id="nextQuestionBtn">Question Suivante<i id="right" class="fas fa-arrow-alt-circle-right"></i></button>
          <button class="btn btn3" id="previousQuestionBtn" ><i id="left" class="fas fa-arrow-alt-circle-left"></i>Retour</button>
            
        </div>

        <div id="question2" class="wrapper question hidden">
          <h2>Régime Alimentaire<img src="icons/diet.png" alt=""></h2>
          <p>Suivez-vous un régime strict sans gluten (pas d’ingestion de blé, de seigle ou d’orge)?</p>
          
          <div class="answers one__choice--question" >
            <button id="answerBtn" class="answerBtn">OUI</button>
            <button id="answerBtn" class="answerBtn">NON</button>
            
          </div>

          <button class="btn btn3" disabled="disabled" style="cursor:not-allowed" id="nextQuestionBtn">Question Suivante<i id="right" class="fas fa-arrow-alt-circle-right"></i></button>
          <button class="btn btn3" id="previousQuestionBtn" ><i id="left" class="fas fa-arrow-alt-circle-left"></i>Question Précédente</button>
            
        </div>

        <div id="question3" class="wrapper question hidden">
          <h2>Symptomes générales<img src="icons/symptoms.png" alt=""></h2>
          
          <p>Veuillez sélectionner les conditions.</p>
          <div class="answers" >
            <button id="answerBtn" class="answerBtn valid">Anémie Inéxpliquée</button>
            <button id="answerBtn" class="answerBtn valid">Malnutrition ou carence de vitamine</button>
            <button id="answerBtn" class="answerBtn valid">Fatigue ou syndrome de fatigue chronique</button>
            <button id="answerBtn" class="answerBtn valid" >Carence en IgA</button>
            <button id="answerBtn" class="answerBtn none__btn">Rien de ce qui précède</button>
          </div>

          <button class="btn btn3" id="nextQuestionBtn" style="cursor:not-allowed" disabled='disabled'>Question Suivante<i id="right" class="fas fa-arrow-alt-circle-right"></i></button>
          <button class="btn btn3" id="previousQuestionBtn" ><i id="left" class="fas fa-arrow-alt-circle-left"></i>Question Précédente</button>
            
        </div>

        <div id="question4" class="wrapper question hidden">
          <h2>Conditions gastro-intestinales<img src="icons/stomach.png" alt=""></h2>
          <p>Veuillez sélectionner les conditions.</p>
          <div class="answers" >
            <button id="answerBtn" class="answerBtn valid">Doubleurs Abdominales</button>
            <button id="answerBtn" class="answerBtn valid">Ballonnements</button>
            <button id="answerBtn" class="answerBtn valid">Intolérance au lactose</button>
            <button id="answerBtn" class="answerBtn valid">Constipation</button>
            <button id="answerBtn" class="answerBtn none__btn">Rien de ce qui précède</button>
          </div>

          <button class="btn btn3" id="nextQuestionBtn" style="cursor:not-allowed" disabled='disabled'>Question Suivante<i id="right" class="fas fa-arrow-alt-circle-right"></i></button>
          <button class="btn btn3" id="previousQuestionBtn" ><i id="left" class="fas fa-arrow-alt-circle-left"></i>Question Précédente</button>
            
        </div>

        <div id="question5" class="wrapper question hidden">
          <h2>Conditions squelettiques musculaires<img src="icons/x-ray.png" alt=""></h2>
          <p>Veuillez sélectionner toutes les conditions</p>
          <div class="answers " >
            <button id="answerBtn " class="answerBtn valid">Ostéopénie ou ostéoporose</button>
            <button id="answerBtn" class="answerBtn valid">Douleurs osseuses ou articulaires </button>
            <button id="answerBtn" class="answerBtn valid">Engourdissement ou douleur dans les mains et les pieds (neuropathie périphérique)</button>
            <button id="answerBtn" class="answerBtn none__btn">Rien de ce qui précède</button>
          </div>

          <button class="btn btn3" id="nextQuestionBtn" style="cursor:not-allowed" disabled='disabled'>Question Suivante<i id="right" class="fas fa-arrow-alt-circle-right"></i></button>
          <button class="btn btn3" id="previousQuestionBtn" ><i id="left" class="fas fa-arrow-alt-circle-left"></i>Question Précédente</button>
            
        </div>

        <div id="question6" class="wrapper question hidden">
          <h2>Troubles de reproduction<img src="icons/pregnant.png" alt=""></h2>
          <p>Veuillez sélectionner toutes les conditions</p>
          <div class="answers " >
           
            <button id="answerBtn" class="answerBtn valid">Infertilité</button>
            <button id="answerBtn" class="answerBtn valid">Fausses couches</button>
            <button id="answerBtn" class="answerBtn valid">Irrégularités menstruelles</button>
            <button id="answerBtn" class="answerBtn none__btn">Rien de ce qui précède</button>

          </div>

          <button class="btn btn3" id="nextQuestionBtn" style="cursor:not-allowed" disabled='disabled'>Question Suivante<i id="right" class="fas fa-arrow-alt-circle-right"></i></button>
          <button class="btn btn3" id="previousQuestionBtn" ><i id="left" class="fas fa-arrow-alt-circle-left"></i>Question Précédente</button>
            
        </div>

        <div id="question7" class="wrapper question hidden">
          <h2>Symptomes Cutanées et Dentaires<img src="icons/dental-care.png" alt=""></h2>
          <p>sélectionner toutes les conditions</p>
          <div class="answers" >
            <button id="answerBtn " class="answerBtn valid">Dents décolorées ou perte d’émail</button>
            <button id="answerBtn" class="answerBtn valid">Éruption cutanée démangeaisons (herpétiformie de la dermatite)</button>
            <button id="answerBtn" class="answerBtn none__btn">Rien de ce qui précède</button>
          </div>

          <button class="btn btn3" id="nextQuestionBtn" style="cursor:not-allowed" disabled='disabled'>Question Suivante<i id="right" class="fas fa-arrow-alt-circle-right"></i></button>
          <button class="btn btn3" id="previousQuestionBtn" ><i id="left" class="fas fa-arrow-alt-circle-left"></i>Question Précédente</button>
        </div>

        <div id="question8" class="wrapper question hidden">
          <h2>Symptomes du système nerveux<img src="icons/brain.png" alt=""></h2>
          <p>sélectionner toutes les conditions</p>
          <div class="answers" >
            <button id="answerBtn" class="answerBtn valid">Dépression</button>
            <button id="answerBtn" class="answerBtn valid">Maux de tête ou migraine</button>
            <button id="answerBtn" class="answerBtn valid">Brouillard de cerveau ou esprit brumeux</button>
            <button id="answerBtn" class="answerBtn valid">TDAH</button>
            <button id="answerBtn" class="answerBtn none__btn">Rien de ce qui précède</button>
          </div>

          <button class="btn btn3" id="nextQuestionBtn" style="cursor:not-allowed" disabled='disabled'>Résultat<i id="right" class="fas fa-arrow-alt-circle-right"></i></button>
          <button class="btn btn3" id="previousQuestionBtn" ><i id="left" class="fas fa-arrow-alt-circle-left"></i>Question Précédente</button>
            
        </div>

        <div id="result" class="wrapper question result hidden">
          <h2>Merci d’avoir terminé l’outil d’évaluation des symptômes</h2>

          <div class="result__header">
          <img src="" alt="">
            <h4>
              
              
            </h4>
            
            
          </div>

          <div class="result__content">
            <p>
          
            </p>
           
            <a href="" class="btn btn3"></a>
          </div>
            
        </div>


      </div>

  </div>
    

      



  <?php include_once('footer.php'); ?>
  <?php include_once 'assets/scripts.php' ?>

  <script src="js/quizzScript.js"></script>
  <script src="js/main.js"></script>
   
    <script type="js/scrollUpBtn.js"></script>
    <script src="js/testnav.js"></script>
</body>
<html>
