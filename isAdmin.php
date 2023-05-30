<?php
if (!isset($_SESSION['user'])) {
    header('location:login_SignUp.php');
}
else if($_SESSION['role']!='admin'){

    header('location:acceuil.php');
}


?>