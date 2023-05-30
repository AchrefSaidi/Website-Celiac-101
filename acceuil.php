<?php

session_start();

$pageName = 'Acceuil';
include("assets/mainHead.php");
include_once 'autoload.php';

?>

</head>

<body>
    <?php

    //include_once 'preloader.php' 
    ?>
    <?php
    if (isset($_SESSION['user'])) {

        include_once "navbarCo.php";
        include_once 'profileProgress.php';
        $infoCount *= 10;
    ?>
        <ul class="welcome">
            <li>B</li>
            <li>I</li>
            <li>E</li>
            <li>N</li>
            <li>V</li>
            <li>E</li>
            <li>N</li>
            <li>U</li>

        </ul>

    <?php
    } else {
        include "navbarDeco.php";
    }
    ?>


    <div class="poster">
        <div class="posterDetails">

            <div class="c4 sign">
                <h2>CELIAC101</h2>

            </div>
            <p> Votre meilleur guide pour vivre avec la maladie coeliaque </p>
            <p>Celiac 101 vous offre un ensemble de services qui facilitent votre quotidien et vous aident à vous adapter au régime alimentaire sans gluten
            </p>
            <p style="font-weight:bold">Bienvenu au premier site web d'origine tunisienne pour les malades coeliaques. </p>
        </div>
        <div class="pimg"><img class="posterImg" src="images/poster picture.png" alt=""></div>
    </div>
    <div class="posterV">

        <video class="posterVid" playsinline autoplay muted loop>
            <source src="images/poster.mp4" type="video/mp4">
        </video>

        <div class="posterDetails">
            <p> La maladie coeliaque est plus récurrente que vous pensez </p>
            <p>Ce guide répond à tout besoin d'un coeliaque
            </p>
            <p>Naviguez Celiac101 pour découvrir ses multiples services</p>
        </div>
    </div>

    <div class="services">
        <h1 style="font-size:3em; " class="c4 faded">S E R V I C E S</h1>
        <div class="serviceRow row">
            <div class="service col4">
                <img src="images/panier.png">
                <h2 class="faded">Vente des produits</h2>
                <p>Nous offrons un catalogue contenant une grande varieté des produits sans gluten.
                    <br>
                    Visitez notre catalogue et jouissez de la qualité à meilleur prix.
                </p>
                <div class="services__btn"><a href="shopping.php"><button class="btn btn1 btnServ">Catalogue</button></a></div>
            </div>
            <div class="service col4">
                <img src="images/recette.png">
                <h2 class="faded">Recettes</h2>
                <p>Cuisiner sans gluten est l'une des tâches les plus délicates en cuisine.
                    <br>
                    C'est pourquoi Celiac101 vous offre des recettes testées avec leurs démarches simplifiées.
                </p>
                <div class="services__btn"><a href="recette.php"><button class="btn btn2 btnServ">Recettes</button></a></div>
            </div>
            <div class="service col4">
                <img src="images/aliment.png">
                <h2 class="faded">Journal Alimentaire</h2>
                <p>Toujours incertain entre aliments interdits et aliments sans gluten?
                    <br>
                    Notre journal des aliments omettera toute incertitude !
                </p>
                <div class="services__btn"><a href="Journal.php"><button class="btn btn1 btnServ">Journal</button></a></div>
            </div>
            <div class="service col4">
                <img src="images/resto.png">
                <h2 class="faded">Carte</h2>
                <p>Celiac101 vous offre une carte spéciale coeliaque !
                    <br>
                    Découvrez les localisations des restaurants en Tunisie avec des repas sans gluten et plus.
                </p>
                <div class="services__btn"><a href="Restaurant.php"><button class="btn btn2 btnServ">Carte</button></a></div>
            </div>
            <div class="service col4">
                <img src="images/faq.png">
                <h2 class="faded">FAQs</h2>
                <p>Les questions les plus posées par et aux coeliaques.
                    <br>
                    Découvrez maintenant leurs réponses correctes,brèves et faciles à comprendre !
                </p>
                <div class="services__btn"><a href="faq.php"><button class="btn btn1 btnServ">FAQ</button></a></div>
            </div>
            <div class="service col4">
                <img src="images/nutritionist.png">
                <h2 class="faded">Spécialistes</h2>
                <p>Plusieurs médecins et spécialistes sont là pour vous !
                    <br>
                    Vous pouvez les contacter et demander leurs conseils.
                </p>
                <div class="services__btn"><a href="specialistGroup.php"><button class="btn btn2 btnServ">Contacter</button></a></div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col" style="flex: 1.5;">
            <div class="row rowy donation reveal">
                <div class="col9">
                    <h2 class="c4 faded">Faites Un Don !</h2>
                    <p>Vivre sans gluten est couteux voire irréalisable pour certains malades.</p>
                    <p> Faites un dons monétaire ou de produits et sauvez leurs vies!</p>

                    <a href="don.php"><button class="btn btn3">Aidez d'autres!</button></a>
                </div>
                <div class="col3">
                    <img class="imgDon" src="images/dons.png" alt="dons">
                </div>
            </div>

            <div class="row rowy quizz reveal">

                <div class="col3 web">
                    <img class="imgDon" src="images/quizz.png" alt="dons">
                </div>
                <div class="col9">
                    <h2 class="c4 faded">Prenez Notre Quizz!<h2>
                            <p>Vous avez quelques symptômes de la maladie coeliaque ?</p>
                            <p> Prenez un quizz réalisé par des spécialistes pour avoir le meilleur conseil!</p>
                            <a href="quizz.php"><button class="btn btn4">Quizz</button></a>
                </div>
                <div class="col3 phone">
                    <img class="imgDon" src="images/quizz.png" alt="dons">
                </div>
            </div>
        </div>
    </div>

    <div class="last__section reveal">
        <div class="row rowy quizz">
            <div class="col9">
                <?php if (isset($_SESSION['user'])) {
                    $username = $_SESSION['user'];
                    if ($infoCount != 100) {
                        echo "<h2 class='c4 faded' >Bienvenu $username</h2>";
                        echo "<p>Votre Profil est à $infoCount %</p>";
                        echo "<a href='profile.php'><button class='btn btn3'>Complétez Votre Profil<i class='fas fa-arrow-alt-circle-right'></i></button></a>";
                    } else {
                        echo "<h2 class='c4 faded' >Bienvenu $username</h2>";
                    }
                } else {
                    echo "<h2 class='c4 faded'>Rejoignez-nous Pour Bénéficier De Notre Guide CELIAC101 !</h2>";
                    echo "<a href='login_SignUp.php'><button class='btn btn3'>Inscrivez-Vous<i class='fas fa-arrow-alt-circle-right'></i></button></a>";
                } ?>
            </div>
        </div>

        <div class="specialist__section">
            <div class="row">
               <div class="col specialist__section">

                    <div class="suggestionsSpecialist">

                        <h4 class="specialistsText">Vous avez besoin d'un
                            <span class="txt-rotate" data-period="2000" data-rotate='["medécin?","nutritioniste?","gastrologue?"]'></span>
                        </h4>


                    </div>

                </div>



            </div>

            <div class="specialistsAd">
                <div class="swiper-container specialistsContainer">
                    <div class="swiper-wrapper specialistsWrapper">
                        <?php
                        $specialistRepo = new SpecialistRepository();
                        $specialists = $specialistRepo->findAll();

                        foreach ($specialists as $specialist) {
                        ?>
                            <div class="swiper-slide specialistSlide">
                                <div class="specialistAd">
                                    <img src=<?php echo "data:image/jpeg;base64," . base64_encode($specialist['image']) ?> alt="">
                                    <h4><?php echo $specialist['firstName'] . " " . $specialist['lastName'] ?></h4>
                                    <h5><?php echo $specialist['profession'] ?></h5>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include 'footer.php' ?>
    <?php include_once 'assets/scripts.php' ?>
    <script src="js/main.js"></script>

    <script src="js/txtRotation.js"></script>
    <script type="js/scrollUpBtn.js"></script>
    <script src="js/testnav.js"></script>
    <script src="js/specialistIndiv.js"></script>




</body>

</html>