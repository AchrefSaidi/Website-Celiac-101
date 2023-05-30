<?php

include_once 'assets/bootstrapAsset.php';

session_start();

include_once 'autoload.php';
include_once 'isAdmin.php';

if(isset($_POST['addRest'])){

  $name=$_POST['name'];
  $address=$_POST['address'];
  $phoneNumber=$_POST['phoneNumber'];
  $fbPage=$_POST['fbPage'];

  $restaurant=new RestaurantRepository();

  $restaurant->insert(array('name' => $name,'address' => $address,'phone' => $phoneNumber, 'fbPage' => $fbPage));

  
}


?>

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
                              <span style="--i:11;"></span>
                              <span style="--i:12;"></span>
                              <span style="--i:13;">R</span>
                              <span style="--i:14;">E</span>
                              <span style="--i:15;">S</span>
                              <span style="--i:16;">T</span>
                              <span style="--i:17;">A</span>
                              <span style="--i:18;">U</span>
                              <span style="--i:19;">R</span>
                              <span style="--i:20;">A</span>
                              <span style="--i:21;">N</span>
                              <span style="--i:22;">T</span>
                              

    </div>

    <form method="post"  action="addRestaurant.php" enctype="multipart/form-data">
      <div class="form-group">
        
        <input type="text" class="form-control" name="name" placeholder="Nom Restaurant">
      
      </div>

      <div class="form-group">

        <input type="text" class="form-control" name="address" placeholder="Adresse">
      
      </div>


      

      <div class="form-group">
      
        <input type="file" class="form-control" name="image" placeholder="Image">
      
      </div>

      <div class="form-group">
        
        <input type="text" class="form-control" name="phoneNumber" placeholder="Numéro De Téléphone">
      
      </div>
      <div class="form-group">
        
        <input type="text" class="form-control" name="fbPage" placeholder="Fb">
      
      </div>
      
    
      <button type="submit" name="addRest" class="btn btn3">Submit</button>
    </form>

  </div>

</div>


<script src="js/admin.js"></script>

</body>

</html>