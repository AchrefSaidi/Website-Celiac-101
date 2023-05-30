<?php

include_once 'autoload.php';
$pageName='Ajouter Recette';
include_once 'assets/bootstrapAsset.php';
session_start();
include_once 'isAdmin.php';

if (isset($_POST['addRecipe'])) {
$title = $_POST['title'];
$description = $_POST['description'];
$difficulty = $_POST['difficulty'];
$time= $_POST['time'];

$categories = [];
$images=[];
$ingredients =[];
$quantities= [];

foreach (array_slice($_POST, 4) as $key => $post) {
  if (!(strpos($key, "category") === false)) {
    array_push($categories, $post);
  }
}
$recipe = new RecipeRepository();

$recipeImage = new RecipePictureRepository();

$recipeIngredient = new IngredientRepository();
$recipeIngredientRel = new RecipeIngredientRelRepository();

$recipeCategory = new RecipeCategoryRepository();
$recipeCategoryRel = new RecipeCategoryRelRepository();

foreach ($_FILES as $key => $file) {
  if (!(strpos($key, "image") === false)) {
    array_push($images, $file);
  }
}

foreach ($_POST as $key => $post) {
  if (!(strpos($key, "ingredient") === false)) {
    array_push($ingredients, $post);
    
  }
  if (!(strpos($key, "quantity") === false)) {
    array_push($quantities, $post);
    
  }
}

var_dump($_POST,$categories,$ingredients,$quantities);
  
  $recipe->insertRecipe(array($title, $description, $time, $difficulty));

  $myRecipe = $recipe->findOneBy(array("title" => $title));
 
  foreach ($categories as $category) {
    $result = $recipeCategory->findOneBy(array('name' => $category));
    if ($result) {
      $recipeCategoryRel->insert(array("categoryId" => $result['id'], 'recipeId' => $myRecipe['id']));
    } else {
      $recipeCategory->insert(array("name" => $category));
      $myCategory = $recipeCategory->findOneBy(array('name' => $category));
      $recipeCategoryRel->insert(array("categoryId" => $myCategory['id'], 'recipeId' => $myRecipe['id']));
    };
  }
  foreach ($images as $image) {
    $img_blob = file_get_contents($image['tmp_name']);
    
    $recipeImage->insert(array("image"=>$img_blob,"recipeId"=>$myRecipe['id']) );

  }

  for($i=0;$i<count($ingredients);$i++) {

      $recipeIngredientRel->insert(array("categoryId" => $ingredients[$i]['id'],'quantity' => $quantities[$i], 'recipeId' => $myRecipe['id']));
    

  }
}
?>

</head>
<body>

<div class="container">
  
</div>

<div class="container add">
  
  <div class="add__admin">
    <div class="wavy">
                              <span style="--i:1;">A</span>
                              <span style="--i:2;">J</span>
                              <span style="--i:3;">O</span>
                              <span style="--i:4;">U</span>
                              <span style="--i:4;">T</span>
                              <span style="--i:5;">E</span>
                              <span style="--i:6;">R</span>
                              <span style="--i:7;"></span>
                              
                              <span style="--i:8;"></span>
                              <span style="--i:9;">U</span>
                              <span style="--i:10;">N</span>
                              <span style="--i:11;">E</span>
                              <span style="--i:12;"></span>
                              <span style="--i:13;"></span>
                              <span style="--i:14;">R</span>
                              <span style="--i:15;">E</span>
                              <span style="--i:16;">C</span>
                              <span style="--i:17;">E</span>
                              <span style="--i:18;">T</span>
                              <span style="--i:19;">T</span>
                              <span style="--i:20;">E</span>
                             

    </div>

    <form method="post"  method="addRecipe.php" enctype="multipart/form-data">

      <div class="addForm">
      <div class="form-group">
        
        <input type="text" name="title" class="form-control" name="title" placeholder="Titre Recette">
      
      </div>

      <div class="form-group">

        <input type="text" name="description" class="form-control" name="description" placeholder="Description">
      
      </div>


      <div class="form-group">
      
        <input type="text" name="time" class="form-control" name="time" placeholder="Durée">
      
      </div>

      <div class="form-group">
      
        <h6>Difficulté</h6>

        <select name="difficulty" id="">
          <option value="facile">Facile</option>
          <option value="moyenne">Moyenne</option>
          <option value="difficile">Difficile</option>
        </select>

      
      </div>

     

      <div class="multiple ingre">
          <div class="form-group">
              
              <input type="text"  name="ingredient" class="form-control" placeholder="Entrer Ingrédient" style="margin-right:10px">

              <input  type="text" name="quantity"  class="form-control" placeholder="Entrer Quantité">

              <i class="fas fa-plus plusIcon" style="margin:10px 0 0 10px; cursor:pointer"></i>
              <i class="fas fa-minus minus" style="margin:10px 0 0 10px; cursor:pointer"></i>

      
              </div>


      </div>
          
      

     
    <div class="multiple img">
        <div class="form-group ">
          
          <input class="form-control" name="recipeImg" id="formFile" type="file"  >

          <i class="fas fa-plus plusIcon" style="margin:10px 0 0 10px; cursor:pointer"></i>
          <i class="fas fa-minus minus" style="margin:10px 0 0 10px; cursor:pointer"></i>

        </div>
    
    </div>


    <div class="multiple cat">
      <div class="form-group">
          <input type="text" name="category" class="form-control" placeholder="Entrer Catégorie" style="margin-right:10px">

          <i class="fas fa-plus plusIcon" style="margin:10px 0 0 10px; cursor:pointer"></i>
          <i class="fas fa-minus minus" style="margin:10px 0 0 10px; cursor:pointer"></i>

        </div>

    </div>  

      

      </div>
      


     
    
      <button type="submit" name="addRecipe" class="btn btn3">Submit</button>
    </form>

  </div>

</div>


<script src="js/admin.js"></script>

</body>

</html>