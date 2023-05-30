<?php
session_start();

include_once 'autoload.php';
$foodCat=new FoodCategoryRepository();

if( isset($_GET['catId']) ){
  $catId=$_GET['catId'];
}
$food=$foodCat->findOneBy(array('id'=> $catId));



$foodAliments=new FoodAlimentRepository();
$foodOK=$foodAliments->findBy(array('catgeoryId'=> $catId,'permission' => 1));
$foodNOK=$foodAliments->findBy(array('catgeoryId'=> $catId,'permission' => 0));

$pageName=$food['name'];
include_once 'assets/mainHead.php';

if (isset($_SESSION['user'])) {

    include_once "navbarCo.php";
   
  } else {
    include_once "navbarDeco.php";
  }
  


?>

<link rel="stylesheet" href="css/journalIndiv.css">
</head>
<body>



<?php include_once 'preloader.php' ?>


<body>
      </div>
            <br>
            <h1 class="c4 faded">Produits Laitiers </h1>
            <div class="imgJournal"><img src="<?php echo "data:image/jpeg;base64,".base64_encode($food['image'])."" ?>"></div>
        <div class="rowJournalIndiv">
        <div class="allowed">
            <div class="journalTitre">
                <h4>
                    A privilégier
                    <img src="icons/winking.png">
                </h4>
            </div>
            <ul>
            <?php 
                foreach($foodOK as $okfood){
            ?>
                <li>
                   <?php echo $okfood['name']?>
                </li>
                <?php } ?>
            </ul>
            
        </div>
     
        <div class="forbidden">
        <div class="journalTitre">
            <h4>
                A interdire
                <img src="icons/angry.png">
            </h4>
        </div>
        <ul>
            <?php 
                foreach($foodNOK as $nokfood){
            ?>
                <li>
                   <?php echo $nokfood['name']?>
                </li>
            <?php } ?>
                
            </ul>
        </div>
    </div>
    </div>
    <?php include_once 'footer.php'?>

    <?php include_once 'assets/scripts.php' ?>
    <script src="js/main.js"></script>
   
    <script type="js/scrollUpBtn.js"></script>
    <script src="js/testnav.js"></script>

</body>
</html>