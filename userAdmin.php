<?php 

$pageName='Liste Utilisateurs';
  include_once 'assets/bootstrapAsset.php';
  include_once 'autoload.php';
  $userRepo=new UserRepository();
  $users=$userRepo->findAll();



?>

</head>
<body>



<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"><h3 style="color:#5FC2BA">Nom d'utilisateur</h3></th>
      <th scope="col"><h3 style="color:#5FC2BA">Email</h3></th>
      <th scope="col"><h3 style="color:#5FC2BA">Mot de passe</h3></th>
      <th scope="col"></th>
      
      
    </tr>

  </thead>
  <tbody>
  <?php foreach($users as $user){ ?>
    <tr class="user__row">
      <td><?php echo $user['username'] ?></td>
      <td><?php echo $user['email'] ?></td>
      <td><?php echo $user['password'] ?></td>
      <td><i class="fas fa-trash delete"></i></td>
    </tr>
  <?php } ?>

   
   
   
  </tbody>
</table>

<script src="js/admin.js"></script>

</body>

</html>