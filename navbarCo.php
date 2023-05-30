<?php 

include_once 'assets/mainHead.php';
include_once 'autoload.php'; 
?>
<link rel="stylesheet" href="css/testnav.css">
<link rel="stylesheet" href="css/navbar.css">

</head>


<header>


<div class="logo__container">
  <img class="logopic" src="images/logo1.png" alt="Logo">
  <a href="acceuil.php"><span class="logoname">Celiac101</span></a>
</div>


<nav>

    <div class="nav__links">
          <div class="link__item">
            <a href="acceuil.php">Acceuil</a>
        
          </div>

          <div class="link__item">
            <a id="dropService">Services</a>
            <div class="hidden__services">

              <div class="service__hidden">
                <a href="shopping.php">Catalogue des produits</a>
                <a href="journal.php">Journal des aliments</a>
              </div>
              
          
          <div class="service__hidden">
             <a href="Restaurant.php">Localisations</a>
              <a href="specialistGroup.php">Contacter un specialiste</a>
          </div>
              
          
          <div class="service__hidden">
          <a href="faq.php">FAQ</a>
              <a href="recette.php">Recettes</a>
          </div>
              
            </div>
            
            
        
          </div>
          <div class="link__item"><a href="InfoPage.php">Maladie Coeliaque</a></li>
    </div>

    
    

    
  </nav>

  <div class="right__nav__links">
      
         <a href="don.php"> <i title="Dons" class="fas fa-donate"></i><a>
        <a href="cart.php"> <i title="Chariot" class="fas fa-shopping-cart"></i><a>
        <a id="dropProfilIcon"> <i title="profil" style="color:#fff" class="fas fa-user"></i></a>
        <a class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>

        <div class="profile__hidden">
          

          <img src="<?php 
          
          $users=new UserRepository();
          $user=$users->findOneBy(array('username' => $_SESSION['user']));

          if($user['image']){
            echo "data:image/jpeg;base64,".base64_encode($user['image'])."";
          } else  {
            echo "svg/undraw_male_avatar_323b.svg";
          }
           ?>"alt="">
          
          <a href="profile.php"><i class="fas fa-cogs"></i>Modifier Profil</a>
          <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Se Deconnecter</a>
          
          
        </div>
        
    </div>

    
    

  


  
</header>
  
  

  




