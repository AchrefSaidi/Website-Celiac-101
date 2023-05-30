<?php
session_start();
$pageName="Ajouter Aliment";
include_once 'assets/bootstrapAsset.php';
include_once 'autoload.php';
if($_SESSION['role']=='user'){
header('Location:404page.php');
}

$categoryRepo=new FoodCategoryRepository();

if(isset($_POST['addFood'])){

  $name=$_POST['name'];
  $cat=$_POST['category'];
  $allowed=$_POST['permission'];

  $catResult=$categoryRepo->findOneBy(array('name' => $cat)) ;

  $foodRepo=new FoodAlimentRepository();
  $foodRepo->insert(array('name' => $name , 'permission' => $allowed , 'catgeoryId' => $catResult['id'] ));
  
}


?>

</head>
<body>



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
                              <span style="--i:11;"></span>
                              <span style="--i:12;"></span>
                              <span style="--i:13;">E</span>
                              <span style="--i:14;">L</span>
                              <span style="--i:15;">E</span>
                              <span style="--i:16;">M</span>
                              <span style="--i:17;">E</span>
                              <span style="--i:18;">N</span>
                              <span style="--i:19;">T</span>
                              

    </div>

    <form method="post" action="addFoodElement.php">
      <div class="form-group">
        
        <input type="text" class="form-control" name="name" placeholder="Nom Aliment">
      
      </div>

      <div class="form-group">
      
      <h6>Catégorie</h6>

      <select name="category" id="">
      <?php 
        
        $categorys=$categoryRepo->findAll();
        foreach($categorys as $cat){
      ?>
        <option value="<?php echo $cat['name'] ?>"><?php echo $cat['name'] ?></option>

       <?php } ?>
      </select>

    
    </div>
    <input type="radio" name="permission" value="1" style="margin:0 10px 0 10px"><span>Autorisé</span>

    <input type="radio" name="permission" value="0" style="margin:0 10px 0 10px"><span>Non Autorisé</span>
    <br><br>
      
    
      <button type="submit" name="addFood" class="btn btn3">Submit</button>
    </form>

  </div>

</div>


<script src="js/admin.js"></script>

</body>

</html>