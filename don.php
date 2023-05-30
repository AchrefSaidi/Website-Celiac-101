<?php 
session_start();
$pageName='Faire Un Don';
include_once 'autoload.php';
include_once 'isAuthentificated.php';

?>


<?php include_once 'assets/mainHead.php' ?>

<link href="css/counter.css" rel="stylesheet">
<link rel="stylesheet" href="css/don.css">
</head>
<body>




<?php include_once 'navbarCo.php'?>


<div class="contenu">

        <div class="container__don counter-section">

          <div class="row text-center">
            <div class="col counter-box">
                <div class="iconbox"><i class="fas fa-piggy-bank"></i></div>
                <p class="counter">10000</p><p>Dt/an</p>
                <p> Don d'argent</p>
            </div>

            <div class="col  counter-box">
                <div class="iconbox"><i class="fas fa-shopping-basket"></i></div>
                <p class="counter">600</p><p>/mois</p>
                <p>Biens matériels</p>
                <p></p>
            </div>

            <div class="col counter-box">
                <div class="iconbox"><i class="fas fa-users"></i></div>
                <p class="counter">1000</p>
                <p>/an</p>
                <p>Donétaires</p>
                <p></p>
            </div>

         </div>

        </div>


        <div class="introDon reveal">
            
            
                <p>Vivre sans gluten est onéreux ! <br>Les produits sans gluten coûtent trop cher pour plusieurs malades.<img src="icons/donation.png" class="imageDonate"><br>
                        Suivre une diète et un régime avec ses produits devient difficile à cause des problèmes financiers.
                        <br>Un petit geste de générosité pour ne pas risquer la santé d'une grande majorité<br>
                    Celiac101 vous offre la possibilité d'aider ceux qui en ont vraiment besoin. Un don = une vie.<br>
                    Faites votre don (d'argent ou de produits) et sauvez une vie!</p>

            

          
        
        </div>

        <div class="formContent">
            <div class="container-Don">
                <div class="donArg">Don D'Argents<i class="fas fa-donate"></i></div>
                
            </div>

            <div class="contenuForm">
                <form class="formDon"  method="post" action="don-checkout.php">
                    </br>
                    <div class="titleForm"><img class="imageDonate" src="icons/donate.png">Faire Un Don</div>
                    </br>
                    <table class="Form">
                        <tr>
                        <td>
                            <h4>Nom :</h4>
                            <div class="input-icon">
                            <i id="iconForm" class="fas fa-user"></i>
                            <input class="inputForm" type="text" placeholder="Nom" name="lastName" required>
                            </div>
                        </td>
                        <td>
                            <h4>Prenom :</h4>
                            <div class="input-icon">
                            <i id="iconForm" class="fas fa-user"></i>
                            <input class="inputForm" type="text" placeholder="Prenom" name="firstName" required>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <h4>Email :</h4>
                            <div class="input-icon">
                            <i id="iconForm" class="fas fa-at"></i>
                            <input class="inputForm" type="email" placeholder="foulen@gmail.com" name="email" required>
                            </div>
                        </td>

                        <td>
                            <h4>Numéro de téléphone :</h4>
                            <div class="input-icon">
                            <i class="bi bi-telephone-fill"></i>
                            <input class="inputForm" type="tel" name="phonenumber" placeholder="Numéro de téléphone"></div>
                        </td>
                        
                        </tr>
                        <tr>
                        
                        
                        </tr>
                        <tr>
                        <td colspan="2">
                        <h4>Montant de Don :</h4>
                            <div class="input-icon">
                            <i id="iconForm" class="fas fa-hand-holding-usd"></i>
                            <input class="inputForm" type="text" name="amount" min="10" required>DT</div>
                        </td>
                        </tr>
                        <tr>
                        
                        </tr>
                        <tr>
                        
                        </tr>
                        
                        
                        
                    </table>
                    
                    <button type="submit" id="submitForm" class="stripe-button btn btn3 don" style="opacity:0" name="submitForm">Faire un Don</button>
                    <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button " 
                data-key="pk_test_51J1SzJE3gsjF0BrLVeytp4haD9b0CDM5IbkhmTDnCVDYrNekt7CXbwdjdgheujajglAOcMr4Y0lMX3j08b2RbXv400PpkHkqjz"
                
                data-currency="inr"
                data-local="center"
                >
                </script>
                </form>
            </div>

        </div>

           
</div>
    <?php include_once 'footer.php' ?>
    <?php include_once 'assets/scripts.php' ?>
    <script src="js/main.js"></script>

    <script type="js/scrollUpBtn.js"></script>
    <script src="js/testnav.js"></script>

    <script src="Js/don.js"></script>
    <script src="js/specialistIndiv.js"></script>
    <script src="js/jquery.counterup.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script>
        jQuery(document).ready(function( $ )
        {
            $('.counter').counterUp({
            delay: 10,
            time: 1500
            });
        })
    </script> 
</body>
</html>