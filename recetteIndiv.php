<?php 
session_start();
include_once 'autoload.php';



$recettes=new RecipeRepository();
if( isset($_GET['recipeId']) ){
  $recipeId=$_GET['recipeId'];
}
$recette=$recettes->findOneBy(array('id'=> $recipeId));


// 4 images de la recette
$images=new recipePictureRepository();
$recipeImg=$images->findBy(array('recipeId'=> $recipeId));



$ingredientRecipeRepo=new RecipeIngredientRelRepository();
$ingredientRecipe=$ingredientRecipeRepo->findBy(array('recipeId'=> $recipeId ));




$stepRepo=new RecipeStepsRepository();
$steps=$stepRepo->findBy(array('idRecipe'=> $recipeId ));

$pageName=$recette['title'];
include_once "assets/mainHead.php"; 
?>

<link rel="stylesheet" href="css/recipeIndivStyle.css">


</head>
<body>
  


  <?php include("navbarCo.php"); ?>
  

<div class="path__link">
  <a href="#">Recette</a>
  >
  <a href="#"><?php echo $recette['title'] ?></a>
  
</div>

<div class="main__container">
  
  <h1 class="main__header"><?php echo $recette['title']?></h1>

 

  <div class="recipe__container">
    <div class="slider">
      <div class="slides">
        <!--radio button start-->
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
        <!--radio button end-->
   
        <!--slide image start-->

        <?php 
        
        for ($i = 0; $i < count($recipeImg); $i++){
          $keys = array_keys( $recipeImg );

          ?>
            <div class="slide <?php if($i==0) {echo "first" ;} ?>">
            <img  src=<?php echo "data:image/jpeg;base64," . base64_encode($recipeImg[$keys[$i]]['picture']) ?> alt="">
          </div>
         
         <?php } ?>
         
       
         
   
        <!--slide image end -->
   
        <!--autonavigation start-->
        <div class="navigation__auto">
          <div class="auto__btn1"></div>
          <div class="auto__btn2"></div>
          <div class="auto__btn3"></div>
          <div class="auto__btn4"></div>
        </div>
        <!--autonaviqgation end-->
      </div>
   
      <!--manual navigation start-->
      <div class="navigation__manual">
        <label for="radio1" class="manual__btn"></label>
        <label for="radio2" class="manual__btn"></label>
        <label for="radio3" class="manual__btn"></label>
        <label for="radio4" class="manual__btn"></label>
      </div>
      <!--manual navigation end-->
    </div>
    <!--image slider end-->


      <div class="first__details">

        <div class="detail">
          <img src="icons/clock.png" alt="">
          <span><?php echo $recette['time'] ?> Minutes</span>
        </div>
  
        <div class="detail">
          <img src="icons/chef.png" alt="">
          <span><?php echo $recette['difficulty'] ?></span>
        </div>
  
  
      </div>

    
    

   <div class="detail__wrapper">
    

    <div class="ingredient__container">
      <div class="ingredient__header">
        <h2>Ingrédients</h2>
        <img src="icons/recipe-book.png" class="step__ingredient--img" alt="">
      </div>
      
      <div class="item__wrapper">
        <div class="mini__card--wrapper">


        <?php 

        $ingredients=new IngredientRepository();

          foreach($ingredientRecipe as $ingredientRecipeItem ){
            $ingredient=$ingredients->findBy(array('id'=> $ingredientRecipeItem['ingredientId']));
            foreach($ingredient as $ingredientItem){

        ?>
          <div class="mini__card">
          
            <img src="<?php echo "data:image/jpeg;base64,".base64_encode($ingredientItem['image'])."" ?>" alt="">
           
            <h3><?php echo $ingredientRecipeItem['quantity'] ?></h3>
            <h4><?php echo $ingredientItem['nom'] ?></h4>
  
          </div>
  
        
  
          <?php } }?>
        </div>

      </div>
      


    </div>

    <div class="step__container">
      <div class="header__container">
        
        <h2 class="step__header">
        
          Préparations
        </h2>
        <img class="step__ingredient--img" src="icons/cooking.png" alt="">
      </div>
      

      <div class="step__summary">
        <div class="step__summary--header"><strong
        >Temps Total: </strong><?php echo $recette['time']?>min</div>
       
        <div class="step__summary--container">
          <div class="step__summary--content">
            <h4>Péparation:</h4>
            <div><?php echo $recette['time']?> min</div>
          </div>

          <div class="step__summary--content">
            <h4>Repos:</h4>
            <div>-</div>
          </div>

          <div class="step__summary--content">
            <h4>Cuisson:</h4>
            <div>15 min</div>
          </div>
          
        </div>
      </div>
      <ul>
      <?php foreach($steps as $step){?>
        <li>
          <h3>Etape<?php echo $step['order']?></h3>
          <span><?php echo $step['description'] ?></span>
        </li>
        <?php } ?>
      </ul>

      
    </div>


   </div> 
    
  </div>

 
</div>

  
 



<script src="Js/starHover.js"></script>
<script src="testnav.js"></script>
<script src="Js/slide.js"></script>
<?php include 'footer.php' ?>

<script src="js/main.js"></script>
   
    <script type="js/scrollUpBtn.js"></script>
    <script src="js/testnav.js"></script>
</body>
</html>