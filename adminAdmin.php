<?php 
  $pageName='Liste Admin';
  include_once 'assets/bootstrapAsset.php';
  include_once 'autoload.php';


  $adminRepo=new AdminRepository();


  
  if(isset($_POST['addAdmin'])){

    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];

    $adminRepo->insert(array('username' => $username , 'password' => $password , 'email' => $email , 'super' => 0));
  }



?>

</head>
<body>
  



<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"><h3 style="color:#5FC2BA">Nom d'admin</h3></th>
      <th scope="col"><h3 style="color:#5FC2BA">Email</h3></th>
      <th scope="col"><h3 style="color:#5FC2BA">Mot de passe</h3></th>
      <th scope="col"></th>
      
      
    </tr>

  </thead>
  
  <tbody>
  <?php 
    $admins=$adminRepo->findAll();
  foreach($admins as $admin){ ?>
    <tr class="user__row">
      <td><?php echo $admin['username'] ?></td>
      <td><?php echo $admin['email'] ?></td>
      <td><?php echo $admin['password'] ?></td>
      <td><i class="fas fa-trash delete"></i></td>
    </tr>
    <?php } ?>

   

  </tbody>
   
   
   
  
</table>
<div class="container">

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
                            <span style="--i:13;">A</span>
                            <span style="--i:14;">D</span>
                            <span style="--i:15;">M</span>
                            <span style="--i:16;">I</span>
                            <span style="--i:17;">N</span>

  </div>

  <form>
  <div class="form-group">
      
      <input type="text" name="username" class="form-control"  placeholder="Nom d'utilisateur">
    </div>
    <div class="form-group">
     
      <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer adresse email">
    
    </div>
    <div class="form-group">
      
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mot De Passe">
    </div>
  
    <button type="submit" name="addAdmin" class="btn btn3"><a href="">Submit</a></button>
  </form>

</div>

</div>


<script src="js/admin.js"></script>

</body>

</html>