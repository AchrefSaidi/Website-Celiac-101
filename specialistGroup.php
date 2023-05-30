<?php 
session_start();

$pageName='Nos Spécialistes';
  include 'assets/bootstrapAsset.php';
 


  

include_once 'autoload.php';


if (isset($_SESSION['user'])) {

  include_once "navbarCo.php";
 
} else {
  include_once "navbarDeco.php";
}
?>


<link rel="stylesheet" href="css/specialistGroup.css">
</head>
<body>





<div class="specialist__container">

    <div class="poster">
            <div class="posterDetails">
                <div class="c4 sign faded" >
                    <span style="font-size:2em; font-weigh:bold">Celiac101</span>
                </div>
                
            </div>
            <div class="pimg"><img class="posterImg" src="images/doctor-poster.png" alt=""></div>
    </div>

   <div id="effect" class="wavy">
        <span><img src="images/doctor.png" class="wavy__icon" alt=""></span>
        <span style="--i:1;">N</span>
        <span style="--i:2;">O</span>
        <span style="--i:3;">S</span>
        <span style="--i:3;"></span>
        <span style="--i:3;"></span>
        <span style="--i:4;">S</span>
        <span style="--i:5;">P</span>
        <span style="--i:6;">E</span>
        <span style="--i:7;">C</span>
        <span style="--i:8;">I</span>
        <span style="--i:9;">A</span>
        <span style="--i:10;">L</span>
        <span style="--i:11;">I</span>
        <span style="--i:12;">S</span>
        <span style="--i:13;">T</span>
        <span style="--i:14;">E</span>
        <span style="--i:15;">S</span>
        <span><img src="images/doctor.png" class="wavy__icon" alt=""></span>
       
   </div>



  
   <div class="card__wrapper">
   <?php 
   $spRep=new SpecialistRepository();
   $specialists=$spRep->findAll();
    foreach($specialists as $specialist){
  ?>
    <div class="card">
     
      <div class="card__body">
        <img src=<?php echo "data:image/jpeg;base64," . base64_encode($specialist['image']) ?> class="card__img spec">
        
        <h2 class="card__title spec"><?php echo ($specialist['lastName'] ." ". $specialist['firstName'])?></h2>

        <div class="card__detail">
    
          </div>

        <p class="card__description spec">
        <?php echo $specialist['profession']?>
        </p>

        <div class="card__options">
          <a href="specialistProfile.php?id=<?php echo $specialist['id']?> "  class="btn btn1 don" >Voir Profil</a>
        </div>
      </div>

    

    </div>
    <?php } ?>
    
  
  </div>






</div>








<?php include_once 'footer.php' ?>

<?php include_once 'assets/scripts.php' ?>

<script src="js/main.js"></script>
   
    <script type="js/scrollUpBtn.js"></script>
    <script src="js/testnav.js"></script>

</body>
<html>