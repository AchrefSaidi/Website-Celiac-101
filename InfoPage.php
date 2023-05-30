<?php 
session_start();
$pageName='Maladie Coeliaque';
  include_once 'assets/mainHead.php';

  
?>

</head>

<body>





<?php 
  
    if (isset($_SESSION['user'])){
       include("navbarCo.php"); 
    } else include_once 'navbarDeco.php'?>

<?php include_once 'preloader.php' ?>
<div class="container">

  <div class="info__container">
    <div class="intro__wrapper">

      <div class="intro__header">
        <h2>Tout ce qu'il faut savoir sur la maladie coeliaque</h2>
      </div>

      <div class="intro__phrase">
        La maladie cœliaque est une maladie chronique et auto-immune qui se développe chez les personnes génétiquement prédisposées. L’ingestion d’aliments contenant du gluten par un individu cœliaque provoque une réponse anormale et disproportionnée de son système immunitaire.
      </div>

      <div class="quizzBtn">
        <a href="quizz.php">Vous avez quelques symptomes de la maladie coeliaque? Prenez notre Quizz<i class="fas fa-arrow-alt-circle-right"></i></a>
      </div>

      <div class="intro__parag">
        <div class="item">
          <p>Dans des conditions normales, les mécanismes de défense de l’organisme sont capables de reconnaître leurs propres tissus et molécules. Cependant, il arrive que le système immunitaire perde sa capacité de distinguer le soi (ami) du non-soi (ennemi). Dans de tels cas, les globules blancs envoyés par notre système immunitaire dans le but d’éliminer les agents considérés étrangers se défendent également contre les tissus propres à l’individu.</p>
        
          <img src="icons/info3.jpg" alt="">
        </div>

        <div class="item second">
        <img src="icons/info4.jpg" alt="">
          <p>C’est ce qui se produit chez les personnes cœliaques. Le corps se défend contre le gluten et cette réaction entraîne une inflammation de la paroi intestinale causant ainsi des lésions à divers degrés. Les villosités intestinales, des structures ressemblant à des doigts, deviennent atrophiées (endommagées) et immatures. En conséquence, elles ne possèdent plus toutes les qualités requises pour absorber efficacement les éléments nutritifs provenant des aliments digérés.
        </p>
        
        </div>
        
        
      </div>

      <div class="intro__final--phrase">
        <p>La maladie cœliaque touche les personnes de tous âges, les enfants comme les adultes. Lorsqu’une personne est atteinte de la maladie coeliaque, le risque pour les autres membres de sa famille au premier degré (parents, enfants, fratrie) d’en souffrir également est estimé entre 4 et 16%.<br><br>Par ailleurs, la maladie cœliaque est plus fréquente chez les patients atteints de diabète de type I, de maladies thyroïdiennes auto-immunes, d’arthrite rhumatoïde juvénile ainsi que de maladies auto-immunes du foie.
        </p>

      </div>

      <div class="scrollDown">
          <div class="chevron"></div>
          <div class="chevron"></div>
          <div class="chevron"></div>
          <a href="#statistic" class="text">Pour plus de détails</a>
        
        </div>

      


      
    </div>

    <div id="symptomes" class="symptom__wrapper">
      <div class="symptom__header">
        
        <h2>Les Symptomes</h2>
        <img src="icons/conditions.png" alt="">
      </div>
      
      <div class="symptom__cards">

          <div  class="symptom__card--item">
            <div class="symptom__content">
              <div class="card__face card__face--front">
                <h3>Systèmes gastro-intestinaux</h3>
                <img src="icons/stomach.png" alt="">
              </div>

              <div class="card__face card__face--back">
                <img src="icons/symptoms.png" alt="">
                <ul>
                  <li>Diarrhé</li>
                  <li>Constipation</li>
                  <li>Douleurs abdominales</li>
                  <li>Dyspepsie(reflux gastro-œsophagien) réfractaire</li>
                  <li>Ballonement</li>
                  <li>Selles pâles/nauséabondes</li>
                </ul>
              </div>
              
            </div>
          </div>
            
                    

            

          <div class="symptom__card--item">
            <div class="symptom__content">
              <div class="card__face card__face--front">
                <h3>Manifestations hépatiques</h3>
                <img src="icons/liver.png" alt="">
              </div>

              <div class="card__face card__face--back">
              <img src="icons/symptoms.png" alt="">
                <ul>
                  <li>Élévation inexpliquée des enzymes hépatiques</li>
                  <li>Les maladies hépatiques.</li>
                  <li>La cholangite biliaire  primitive</li>
                  <li>la cholangite sclérosante primitive</li>
                  <li>Hépatites auto-immunes chroniques</li>
                </ul>
              </div>

            </div>
            
          </div>
          

          <div class="symptom__card--item">

            <div class="symptom__content">

              <div class="card__face card__face--front">
                <h3>Manifestations du système nerveux</h3>
                <img src="icons/nervous-system.png" alt="">
              </div>

              <div class="card__face card__face--back">
                <img src="icons/symptoms.png" alt="">
                <ul>
                  <li>Neuropathie périphérique</li>
                  <li>Ataxie inexpliquée</li>
                  <li>Migraines/maux de tête</li>
                  <li>Troubles psychiatriques (dépression,anxiété)</li>
                  <li>Problèmes de mémoire</li>
                  <li>Difficultés d’apprentissage</li>
                </ul>
              </div>
            </div>

          </div>

          <div class="symptom__card--item">
            <div class="symptom__content">
            <div class="card__face card__face--front">
                <h3>Manifestations bucco-dentaires</h3>
                <img src="icons/dental-checkup.png" alt="">
              </div>

              <div class="card__face card__face--back">
              <img src="icons/symptoms.png" alt="">
              <ul>
                  <li>Décoloration des dents</li>
                  <li>Perte d’émail</li>
                  <li>Délai de l’éruption dentaire</li>
                  <li>Stomatite aphteuse récidivante</li>
                  <li>Carie dentaire</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="symptom__card--item">
            <div class="symptom__content">
              <div class="card__face card__face--front">
                <h3>Fertilité et anomalies gynéco-obstétricales</h3>
                <img src="icons/pregnant.png" alt="">
              </div>

              <div class="card__face card__face--back">
              <img src="icons/symptoms.png" alt="">
              <ul>
                  <li>Troubles de la fertilité</li>
                  <li>Complications durant la grossesse</li>
                  <li>Fausses couches à répétition</li>
                  <li>Infertilité inexpliquée </li>
                  
                </ul>
              </div>
            </div>
          </div>

          <div class="symptom__card--item">
            <div class="symptom__content">
              <div class="card__face card__face--front">
                <h3>Manifestations musculo-squelettiques</h3>
                <img src="icons/pain.png" alt="">
              </div>

              <div class="card__face card__face--back">
              <img src="icons/symptoms.png" alt="">
              <ul>
                  <li>Atrophie musculaire</li>
                  <li>Douleurs ostéo-articulaires</li>
                  <li>Ostéopénie</li>
                  <li>Ostéoporose précoce</li>
                </ul>
              </div>
            </div>
          </div>



      </div>

    </div>

    <div id="effect" class="wavy">
        <span style="--i:1;">E</span>
        <span style="--i:2;">F</span>
        <span style="--i:3;">F</span>
        <span style="--i:4;">E</span>
        <span style="--i:5;">T</span>
        <span style="--i:6;">S</span>
        <span style="--i:7;">&</span>
        
        <span style="--i:8;">T</span>
        <span style="--i:9;">R</span>
        <span style="--i:10;">A</span>
        <span style="--i:11;">I</span>
        <span style="--i:12;">T</span>
        <span style="--i:13;">E</span>
        <span style="--i:14;">M</span>
        <span style="--i:15;">E</span>
        <span style="--i:16;">N</span>
        <span style="--i:17;">T</span>
        <span style="--i:18;">S</span>
      </div>

    <div class="effect__wrapper">

      <div class="effect__item">
        <h2>Effets à long terme</h2>
        <p>Les personnes atteintes de la maladie coeliaque ont un risque 2 fois plus élevé de développer une maladie coronarienne, et un risque 4 fois plus élevé de développer de petits cancers de l’intestin.
          <br><br>
          La maladie coeliaque non traitée peut mener au développement d’autres troubles auto-immuns comme le diabète de type I et la sclérose en plaques (SP), et de nombreuses autres affections, y compris l’herpétiformie de dermatite (éruption cutanée qui démange), l’anémie, l’ostéoporose, l’infertilité et la fausse couche, les affections neurologiques comme l’épilepsie et les migraines, la petite taille, les maladies cardiaques et les cancers intestinaux.
        </p>
      </div>

      <div class="effect__item">
        <h2>Traitement</h2>
        <p>Actuellement, le seul traitement pour la maladie coeliaque est l’adhésion à vie à un régime strict sans gluten. Les personnes vivant sans gluten doivent éviter les aliments avec du blé, du seigle et de l’orge, comme le pain et la bière.<br>
      <div class="effect__section-Btn">
        <a href="recette.php">CELIAC101 vous offre une variété de recettes sans-gluten<i class="fas fa-arrow-alt-circle-right"></i></a> 
        </div>
      <p>
        L’ingestion de petites quantités de gluten, comme la chapelure d’une planche à découper ou d’un grille-pain, peut causer des dommages à l’intestin grêle..
        <br><br>
        Les personnes atteintes de la maladie cœliaque doivent vérifier attentivement les étiquettes apposées sur les aliments préparés afin de repérer la présence de gluten.
        
        <div class="effect__section-Btn">
        <a href="journal.php">Profitez d'un journal alimentaire pour une vie saine et sans gluten<i class="fas fa-arrow-alt-circle-right"></i></a>
        </div>
      </p>
      </div>
    

    </div>

    <div class="intro__wrapper last">

        <div class="intro__header">
          <h2>Maladie coeliaques chez les enfants</h2>
        </div>

        <div class="intro__parag">
          <div class="item">
            <p>
              La maladie coeliaque peut se développer à tout moment après l’introduction du blé ou d’autres aliments contenant du gluten dans l’alimentation, généralement après l’âge de 6 à 9 mois. On ne sait pas pourquoi certains enfants tombent malades tôt dans la vie et d’autres ne tombent malades qu’après des années d’exposition. Il est très important de tester votre enfant aux premiers signes, ou si la maladie coeliaque se présente dans votre famille. Les parents au premier degré (parent, frère ou sœur, enfant) ont 1 chance sur 10 de développer eux-mêmes la maladie coeliaque.</p>
            <img src="icons/kids.jpg" alt="">
          
            
          </div>

          <div class="item second">
              <p>
            Beaucoup d’enfants ont des symptômes bénins qui sont faciles à manquer, comme avoir des gaz excessifs, des douleurs abdominales ou de la constipation. D’autres enfants ont des symptômes plus graves qui peuvent entraîner un diagnostic plus précoce, y compris l’incapacité de prospérer, la perte de poids et les vomissements.

            Heureusement, les enfants et les adolescents réagissent généralement bien au traitement avec le régime sans gluten. La plupart des enfants se sentent sensiblement mieux après deux semaines sur le régime et atteignent la taille normale, le poids, et la santé d’os.
            </p>
          
          </div>
          
          
        </div>


    </div>

  </div>

  

 

    <div class="info__parag">
        <p>Pensez-vous  être dans le risque de la maladie coeliaque? <br>

      <a href="#symptomes">Consulter les symptomes<i class="fas fa-arrow-alt-circle-right"></i></a>
        </p>
    </div>

 

      <div id="statistic" class="wavy">
        <span style="--i:1;">M</span>
        <span style="--i:2;">A</span>
        <span style="--i:3;">L</span>
        <span style="--i:4;">A</span>
        <span style="--i:5;">D</span>
        <span style="--i:6;">I</span>
        <span style="--i:7;">E</span>
        
        <span style="--i:8;">C</span>
        <span style="--i:9;">O</span>
        <span style="--i:10;">U</span>
        <span style="--i:11;">R</span>
        <span style="--i:12;">A</span>
        <span style="--i:13;">N</span>
        <span style="--i:14;">T</span>
        <span style="--i:15;">E</span>
        <span style="--i:16;">?</span>
      </div>

      <div  class="card__container">
         

          <div class="info__card">
            <div class="circle">
              <h2>1 sur 100</h2>
            </div>
            <div class="content">
              <p>Nombre de personnes dans le monde touchées par la maladie coeliaque.</p>
              <img src="icons/increasing-bar-graph.png" alt="">
            </div>
          </div>

          <div class="info__card">
            <div class="circle">
              <h2>30%</h2>
            </div>
            <div class="content">
              <p>Patients diagnostiqués qui signalent encore des symptômes pendant qu’ils suivent un régime sans gluten.</p>
              <img src="icons/gluten-free.png" alt="">
            </div>
          </div>

        <div class="info__card">
          <div class="circle">
            <h2>1 sur 10</h2>
          </div>
          <div class="content">
            <p>Membres de la famille apparentés qui ont également la maladie coeliaque</p>
            <img src="icons/family.png" alt="">
          </div>
        </div>
        <div class="info__card">
          <div class="circle">
            <h2>2x/4x</h2>
          </div>
          <div class="content">
            <p>Risque accru de maladie coronarienne/petits cancers de l’intestin</p>
            <img src="icons/cancer-cell.png" alt="">
          </div>
        </div>



  </div>



</div>


  <?php include 'footer.php' ?>
  
  <script src="js/testnav.js"></script>
<script src="js/cardTilt.js"></script>


    <script src="js/main.js"></script>

    <script type="js/scrollUpBtn.js"></script>
   

<script type="text/javascript" src="js/vanilla-tilt.js"></script>

<script type="text/javascript">
	VanillaTilt.init(document.querySelectorAll(".symptom__card--item"), {
		max: 25,
		speed: 400
	});
</script>




</body>
</html>
