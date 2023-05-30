<?php 
session_start();
$pageName='Journal Alimentaire';
include_once 'assets/mainHead.php';


include_once 'autoload.php';


if (isset($_SESSION['user'])) {

  include_once "navbarCo.php";
 
} else {
  include_once "navbarDeco.php";
}


?>

<link rel="stylesheet" href="css/journal.css">
<link rel="stylesheet" href="css/shopping.css">
</head>
<body>




<div id="effect" class="wavy titreJournal">

        <span style="--i:1;">J</span>
        <span style="--i:2;">O</span>
        <span style="--i:3;">U</span>
        <span style="--i:4;">R</span>
        <span style="--i:5;">N</span>
        <span style="--i:6;">A</span>
        <span style="--i:7;">L</span>
        <span style="--i:8;"> </span>
        <span style="--i:9;"> </span>
        <span style="--i:10;">A</span>
        <span style="--i:11;">L</span>
        <span style="--i:12;">I</span>
        <span style="--i:13;">M</span>
        <span style="--i:14;">E</span>
        <span style="--i:15;">N</span>
        <span style="--i:16;">T</span>
        <span style="--i:17;">A</span>
        <span style="--i:18;">I</span>
        <span style="--i:19;">R</span>
        <span style="--i:20;">E</span>
</div>



<div class="journal_container">

    <div class="row">

    <?php 

    $foodCatgeoryRepo=new FoodCategoryRepository();
    $foodCat=$foodCatgeoryRepo->findAll();
    
    foreach($foodCat as $cat ){ ?>

      <div class="card cardJournal col">
        <div class="card-body">
            <h4 class="card-title"><?php echo $cat['name']?></h4>
            <div class="imgJournal"><img src="<?php echo "data:image/jpeg;base64,".base64_encode($cat['image'])."" ?>"></div>
            <h6 class="faded">Celiac 101</h6>
            <p class="card-text">Cliquez ici pour voir ce que vous est permis et ce que vous est interdit </p>
            <a href="journalIndiv.php?catId=<?php echo $cat['id'] ?>" class="card-link"><button class="btn btn4">Voir Journal</button></a>
        </div>
      </div>

    <?php } ?>


    </div>

</div>
<?php include_once 'footer.php'?>

<?php include_once 'assets/scripts.php' ?>
<script src="js/main.js"></script>
   
    <script type="js/scrollUpBtn.js"></script>
    <script src="js/testnav.js"></script>
</body>
</html>