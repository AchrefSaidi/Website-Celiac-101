<?php 

session_start();
$pageName='Votre Profil';
include_once 'autoload.php';
include_once 'isAuthentificated.php';
include_once 'assets/mainHead.php' ;
include_once 'assets/bootstrapAsset.php';



?>

<link rel="stylesheet" href="css/profile.css">

</head>
<body>




<?php 
include_once 'navbarCo.php';

include_once 'profileProgress.php';
?>


  <div class="profile__body">


      <div class="percent__box">
            <div class="percent">
              <svg>
                <circle cx="70" cy="70" r="70"></circle>
                <circle style="--i:<?php echo $infoCount*10 ; ?>;" cx="70" cy="70" r="70"></circle>
              </svg>

              <div class="number">
                <h2><?php echo $infoCount*10 ;?><span>%</span></h2>
              </div>
            </div>

            <h2 class="text">Progress</h2>
      </div>

      <div class="profile__container">

            <div class="leftbox">
              <nav>
                <a class="Icontab <?php 
        if(!isset($_SESSION['contactError']) && !isset($_SESSION['settingError'])){
         
            echo "active";
          
       
        }  ;
        

        ?>">
                <i class="fa fa-user"></i>
                </a>

                <a class="Icontab <?php 
        if(isset($_SESSION['contactError'])){
            echo "active";
          }
      

        ?>">
                  <i class="fas fa-address-book"></i>
                </a>

                <a class="Icontab <?php 
        if(isset($_SESSION['settingError'])){
            
            echo "active";
          }
        


        ?>">
                  <i class="fa fa-cog"></i>
                </a>

               
              </nav>
            </div>

            <div class="rightbox">
              <form method="post" action="profileProcess.php" enctype="multipart/form-data" class="profile tabShow <?php 
    if(isset($_SESSION['settingError']) || isset($_SESSION['contactError'])){
      
        echo "hidden";
      
    } 
    

    ?>">
                <div class="wavy">
                            <span style="--i:1;">M</span>
                            <span style="--i:2;">O</span>
                            <span style="--i:3;">N</span>
                            <span style="--i:4;"></span>
                            <span style="--i:4;">P</span>
                            <span style="--i:5;">R</span>
                            <span style="--i:6;">O</span>
                            <span style="--i:7;">F</span>
                            
                            <span style="--i:8;">I</span>
                            <span style="--i:9;">L</span>
                            <span style="--i:10;">E</span>

                        </div>
                <div class="content">
                  <?php 
                  $username=$_SESSION['user'];
                  $userRepo=new UserRepository();
                  
                  
                  $user=$userRepo->findOneBy(array('username' => $username));
                
                  ?>

                  <div class="info">
                        

                        <h4>Nom</h4>
                        <input class="input" name="lastName" type="text" value="<?php
                        
                        
                        
                        if(!empty($user['lastName'])){
                        
                          echo $user['lastName'];
                        } else ?>" placeholder ="Nom">

                        <h4>Prénom</h4>
                        <input class="input" name="firstName" type="text" value="<?php 
                    
        
                              if (!empty($user['firstName'])){
                            
                              echo $user['firstName'];
                              
                              } else ?>" placeholder="Prénom">

                        

                        <h4>Date de naissance</h4>
                        <input name="birthday" class="input" type="Date" value="<?php 
                                  
                                  
                                  if(!empty($user['birthday'])){
                                    echo $user['birthday'];
                                  }
                                  
                                  
                                ?>"  >

                        <h4>Sexe</h4>
                          <div class="radio__container">
                                            <?php 
                        
                        
                      ?>
                                            <input type="radio" name="sex" value="female" <?php if(!empty($user['sex']) && ($user['sex']=='female')){
                                              echo 'checked';
                          
                        } ?>><span>Femme</span>
                                            <input type="radio" name="sex" value="male" <?php if(!empty($user['sex']) && ($user['sex']=='male')){
                                              echo 'checked';
          
                        } ?>><span>Homme</span>
                                          </div>
                                          <?php 
                          if(isset($_SESSION['profileError'])){

                          
                        ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['profileError']; ?>
                        </div>
                        <?php } unset($_SESSION['profileError']); ?>
                                  </div>

                          
                    
                  <div class="image" >
              
                    
                     <input type="file" name="image" id="image" placeholder="image">
                  
                              <img src=" <?php 
                        
                      
                            if(!empty($user['image'])){
                            
                              echo "data:image/jpeg;base64,".base64_encode($user['image'])."";
                            } else if (!empty($user['sex'])) {
                                if($user['sex']=='female') {
                                  echo 'svg/undraw_female_avatar_w3jk.svg';
                                } else {
                                  echo 'svg/undraw_male_avatar_323b.svg';
                                }
                          } 
                          else echo 'svg/undraw_male_avatar_323b.svg'; ?> " 

                            >
                       
                       
                    
                  </div>   
                
                </div>
                
                
        

                <button typ="submit" class="btn btn3">Modifier</button>

                
              </form>

              <form method="post" action="contactProcess.php" class="contact tabShow <?php 
    if(!isset($_SESSION['contactError'])){
        echo "hidden";
      }
    
    

    ?>">
                <div class="wavy">
                                <span style="--i:1;">C</span>
                                <span style="--i:2;">O</span>
                                <span style="--i:3;">N</span>
                    
                                <span style="--i:4;">T</span>
                                <span style="--i:5;">A</span>
                                <span style="--i:6;">C</span>
                                <span style="--i:7;">T</span>
                              
                              

                    </div>
                <div class="content">
                  <div class="info">
                  
                   

                    <h4>Adresse</h4>
                    <input class="input" name="address" type="adress" value="<?php
        
  
        if(!empty($user['address'])){
          echo $user['address'];
        } else ?>" placeholder="Adresse">

                    <h4>Email</h4>
                    <input class="input" name="email" type="email" value="<?php 
        
       if (!empty($user['email'])){
         echo $user['email'];
       };
         ?>">

                    <h4>Numéro de Téléphone</h4>
                    <input name="phoneNumber" class="input" value="<?php 
    
        if(!empty($user['phoneNumber'])){
          echo $user['phoneNumber'];
        } else ?>" placeholder="+216">

 <?php 
                          if(isset($_SESSION['contactError'])){

                          
                        ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['contactError']; ?>
                        </div>
                        <?php } unset($_SESSION['contactError']); ?>

        
                  </div>

                  <div class="image">
                    <img src="svg/undraw_contact_us_15o2.svg" alt="">
                    
                  </div> 

                  

                </div>
                    
                <button type="submit" class="btn btn3">Modifier</button>
              </form>


              <form method="post" action="infoProcess.php" class="setting tabShow <?php 
    if(!isset($_SESSION['settingError'])){
     
        echo "hidden";
      
    
    } 
    

    ?>">
                <div class="wavy">
                                  <span style="--i:1;">P</span>
                                  <span style="--i:2;">A</span>
                                  <span style="--i:3;">R</span>
                                  <span style="--i:4;">A</span>
                                  <span style="--i:5;">M</span>
                                  <span style="--i:6;">E</span>
                                  <span style="--i:7;">T</span>
                                  <span style="--i:8;">R</span>
                                  
                                  <span style="--i:9;">E</span>
                                  <span style="--i:10;">S</span>
                              

                </div>
                  <div class="content">
                    <div class="info">
        


                        <h4>Ancien mot de passe</h4>
                        <input class="input" name="password" type="password" placeholder="<?php 
        echo $user['password'];

        ?>">
                      <h4>Nouveau mot de passe</h4>
                      <input class="input" name="password" type="password" placeholder="Mot de passe">

                        <h4>Confirmer nouveau mot de passe</h4>
                        <input class="input" name="passwordConfirmed" type="password">

                        <?php 
                          if(isset($_SESSION['settingError'])){

                          
                        ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['settingError']; ?>
                        </div>
                        <?php } unset($_SESSION['settingError']); ?>
                    </div>

                    <div class="image">
                    <img src="svg/undraw_accept_terms_4in8.svg" alt="">
                    
                  </div> 
                  </div>
               

                <button type="submit" class="btn btn3">Modifier</button>
              </form>

              

            </div>

            
      </div>

 </div>
  
  


  <?php include_once('footer.php'); ?>
  <script src="js/testnav.js"></script>
  <script src="js/profile.js"></script>
 


   

   
</body>
<html>