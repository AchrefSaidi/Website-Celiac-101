<?php
session_start();

if (isset($_SESSION['user'])) {
    header('location:acceuil.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/login_SignUpStyle.css">
 

  <title>Se Connecter</title>
</head>

<body>
  



  <div class="container <?php 
    if(isset($_SESSION['page'])){
      if($_SESSION['page']=='inscription'){
        echo "sign-up-mode";
      }
    }
    unset($_SESSION['page']);
    ?>">

    <div class="forms__container">

      <div class="signin-signup">

        <form action="loginProcess.php" method="post" class="sign-in-form">
            

          <h2 class="title">Se Connecter</h2>
          <div class="input__field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Nom d'utilisateur">
          </div>
          <div class="input__field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Mot de passe"> 
          </div>
          <?php if (isset($_SESSION['IncorrectFieldsError'])) { ?>
                <div class="alert alert-danger" class="close">
                  
                  <?= $_SESSION['IncorrectFieldsError'] ?>
                  <a><i class="fas fa-times"></i></a>
                
                </div>
              
            <?php }
            unset($_SESSION['IncorrectFieldsError']);
            ?>

          

          <input type="submit" value="Se Connecter" class="btn solid">
          
          
        </form>



        <form action="inscriptionProcess.php" method="post" class="sign-up-form">
          <h2 class="title">S'inscrire</h2>
          <div class="input__field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Nom d'utilisateur">
          </div>
          <div class="input__field">
            <i class="fas fa-envelope"></i>
            <input type="text" name="email" placeholder="Email">
          </div>
          <div class="input__field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Mot de passe">
          </div>

          <div class="input__field">
            <i class="fas fa-lock"></i>
            <input type="password" name="confirmedPassword" placeholder="Confirmer votre mot de passe">
          </div>

          <?php 
            if(isset($_SESSION['inscriptionError'])){ ?>

              <div class="alert alert-danger" class="close">
                  
                  <?= $_SESSION['inscriptionError'] ?>
                  <a><i class="fas fa-times"></i></a>
                
                </div>
              
            <?php }
            unset($_SESSION['inscriptionError']);
            ?>

          
          

          <input type="submit" value="S'inscrire" class="btn solid">
          
        </form>

  
        
      </div>


      <div class="panels__container">

        <div class="panel panel__left">
          <div class="content">
            <h3>Vous Etes Nouveau ?</h3>
            <p>Rejoignez-Nous Pour Bénéficier De Notre Guide CELIAC101 !</p>
            <button class="btn transparent" id=sign-up-btn>S'inscrire</button>
          </div>

          <img src="svg/undraw_healthy_options_sdo3.svg" class="image" alt="">
        </div>

        <div class="panel panel__right">
          <div class="content">
            <h3>Vous Etes parmi nous ?</h3>
            <p>Pour Rester Connecté Avec Nous, Veuillez Remplir Vos Informations Personnelles.</p>
            <button class="btn transparent" id=sign-in-btn>Se Connecter</button>
          </div>

          <img src="svg/undraw_welcome_cats_thqn.svg" class="image" alt="">
        </div>

      </div>

    </div>

    
  </div>
 
  <script src="js/scriptLogin.js"></script>

</body>
</html>