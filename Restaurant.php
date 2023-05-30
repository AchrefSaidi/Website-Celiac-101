<?php
session_start();
$pageName='Restaurants';
include_once 'isAuthentificated.php';
include_once 'assets/mainHead.php';
include_once 'autoload.php';






?>
<link rel="stylesheet" href="css/resto.css">
<link rel="stylesheet" href="css/map.css">

<body>
<?php include "navbarCo.php" ?>
    <?php include_once 'preloader.php' ?>
    
    <div class="container_resto">
        <div class="services">
            <h1 class="c4 faded">Les Restaurants Coeliaques</h1>
            <br>
            <br>
            <div class="serviceRow row">
                <div class="service col4">
                    <img src="images/T.jpg" class="service__img">
                    <h2 class="fbpage"><a href="https://www.facebook.com/celiacsafesansgluten/" target="_blank">Celiac Safe</a></h2>
                    <p>Adresse: 4 Reu de Moscou, Tunis 1089<br>
                        Heure De Travail: Ouvre à 12h<br>
                        Téléphone: 24 101 401<br>
                        <button class="btn btn4" id="mybtn1"><a href="#Local"> Location</a></button>
                    </p>

                </div>

                <div class="service col4">
                    <img src="images/T2.jpg" class="service__img">
                    <h2 class="fbpage"><a href="https://www.facebook.com/laseine.tn/" target="_blank">La Seine Pâtisserie</a></h2>
                    <p>Adresse: 2 Rue Tahar Memmi, Ariana 2091<br>
                        Heure: Ouvre à 8h<br>
                        Téléphone: 52 516 415 <br>
                        <button class="btn btn4" id="mybtn3"><a href="#Local"> Location</a></button>
                    </p>

                </div>
                <div class="service col4">
                    <img src="images/T3.jpg" class="service__img">
                    <h2 class="fbpage"><a href="https://www.facebook.com/Romanescatunis" target="_blank">Restaurant La Romanesca</a></h2>
                    <p> Adresse: Ariana<br>
                        Heure: Ouvre à 12PM<br>
                        Téléphone: 71 753 241 <br>
                        <button class="btn btn4" id="mybtn2"><a href="#Local"> Location</a></button>
                    </p>

                </div>
                <div class="service col4">
                    <img src="images/T4.jpg" class="service__img">
                    <h2 class="fbpage"><a href="https://www.facebook.com/ilVongole/?ref=page_internal" target="_blank">il Vongole</a></h2>
                    <p>Adresse: Rue des Lac de Mazurie, Les Berges Du Lac, Tunis 1053<br>

                        Téléphone: 71 960 207 <br>
                        <button class="btn btn4" id="mybtn4"><a href="#Local"> Location</a></button>
                    </p>

                </div>
                <div class="service col4">
                    <img src="images/T5.jpg" class="service__img">
                    <h2 class="fbpage"><a href="https://www.facebook.com/breizhbistrottunisie/" target="_blank">Breizh Bistrot</a></h2>
                    <p>Adresse: Passage du la Malawi, Tunis<br>
                        Heure: Ouvre à 11h<br>
                        Téléphone: 71 960 155 <br>
                        <button class="btn btn4" id="mybtn5"><a href="#Local"> Location</a></button>
                    </p>
                </div>
                <div class="service col4">
                    <img src="images/T6.jpg" class="service__img">
                    <h2 class="fbpage"><a href="https://www.facebook.com/lasuitedufarfalle/" target="_blank">Le Farfalle</a></h2>
                    <p>Adresse: Rue du Lac Biwa, Tunis 1053<br>
                        Heure: Ouvre à 12h<br>
                        Téléphone: 71 960 128 <br>
                        <button class="btn btn4" id="mybtn6"><a href="#Local"> Location</a></button>
                    </p>

                </div>
            </div>
        </div>
    </div>
    <div id="Local"></div>
    <br>
    <br>
    <div id="effect" class="wavy restolocation">
        <span style="--i:1;">L</span>
        <span style="--i:2;">O</span>
        <span style="--i:3;">C</span>
        <span style="--i:4;">A</span>
        <span style="--i:5;">L</span>
        <span style="--i:6;">I</span>
        <span style="--i:7;">S</span>
        <span style="--i:8;">A</span>
        <span style="--i:9;">S</span>
        <span style="--i:10;">I</span>
        <span style="--i:11;">O</span>
        <span style="--i:12;">N</span>
        <span style="--i:13;"> </span>
        <span style="--i:14;"> </span>
        <span style="--i:15;">D</span>
        <span style="--i:16;">U</span>
        <span style="--i:17;"> </span>
        <span style="--i:18;"> </span>
        <span style="--i:19;">R</span>
        <span style="--i:20;">E</span>
        <span style="--i:21;">S</span>
        <span style="--i:22;">T</span>
        <span style="--i:23;">A</span>
        <span style="--i:24;">U</span>
        <span style="--i:25;">R</span>
        <span style="--i:26;">A</span>
        <span style="--i:27;">N</span>
        <span style="--i:28;">T</span>
    </div>
    <!--The div element for the map -->
    <div id="map"></div>

    <?php include("footer.php"); ?>
    <!--script pour map-->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQpw0VdM_Cpj50OfKTRMJbP1SK7wzYcAE&callback=initMap" type="text/javascript">
    </script>
    <script src="Js/map.js"></script>
    <script src="js/testnav.js"></script>



</body>

</html>