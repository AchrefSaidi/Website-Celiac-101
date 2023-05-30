<?php

$pageName = "Acceuil Admin";
session_start();
$pageName='Acceuil Admin';
include_once 'assets/bootstrapAsset.php';
if ($_SESSION['role'] == 'user') {
  header('Location:404page.php');
}
?>
<link rel="stylesheet" href="css/adminMain.css">;

<<<<<<< HEAD

=======
>>>>>>> 059e22331ec45ece7c78c5de430db75cd1b7c8c7
</head>

<body>


  <h1 class="welcomeAdmin">Bienvenu <?= $_SESSION['user'] ?></h1>
  <div class="admin">
    <div class="adminPoster ">
      <img src="images/mainAdmin.jpg" alt="">
    </div>
    <div class="admin__fonctions">

      <div class="section__admin">
        <div class="services__btn default"><button class="btn btn1 btnServ">Gérer Les Comptes</button></div>

        <div class="hidden__options">

          <div class="services__btn"><a href="userAdmin.php"><button class="btn btn3 don">Utilisateur</button></a></div>
          <div class="services__btn"><a href="adminAdmin.php"><button class="btn btn3 don">Admin</button></a></div>


        </div>

      </div>

      <div class="section__admin">
        <div class="services__btn default"><button class="btn btn1 btnServ">Gérer Les Ventes</button></div>


        <div class="hidden__options">
          <div class="services__btn"><a href="shopping.php"><button class="btn btn3 don">Catalogue</button></a></div>
          <div class="services__btn"><a href="addProduct.php"><button class="btn btn3 don">Ajouter Produit</button></a></div>
          <div class="services__btn"><a href="cart.php"><button class="btn btn3 don">Commandes</button></a></div>

        </div>


      </div>

      <div class="section__admin">
        <div class="services__btn default"><button class="btn btn1 btnServ">Gérer Les Recette</button></div>

        <div class="hidden__options">

          <div class="services__btn"><a href="addRecipe.php"><button class="btn btn3 don">Ajouter Recette</button></a></div>

        </div>

      </div>

      <div class="section__admin">
        <div class="services__btn default"><button class="btn btn1 btnServ">Gérer Les Spécialistes</button></div>

        <div class="hidden__options">
          <div class="services__btn"><a href="specialistGroup.php"><button class="btn btn3 don">Liste </button></a></div>
          <div class="services__btn"><a href="addSpecialist.php"><button class="btn btn3 don">Ajouter</button></a></div>

        </div>

      </div>


      <div class="section__admin">
        <div class="services__btn default"><button class="btn btn1 btnServ">Gérer Le Journal</button></div>

        <div class="hidden__options">
         
          <div class="services__btn"><a href="addFoodElement.php"><button class="btn btn3 don">Ajouter Aliment</button></a></div>

        </div>

      </div>

      <div class="services__btn"><a href="logout.php"><button class="btn btn1 btnServ">Se Déconnecter</button></a></div>

    </div>




  </div>
  </div>


  <script src="js/mainAdmin.js"></script>

</body>

</html>