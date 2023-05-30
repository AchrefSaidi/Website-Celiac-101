<?php 
session_start();
$pageName='Acceuil';
include_once 'assets/mainHead.php' ;



if (isset($_SESSION['user'])) {

    include_once "navbarCo.php";
   
} else {
    include_once "navbarDeco.php";
}
?>
<title>FAQs</title>
<link rel="stylesheet" href="css/faq.css">

</head>
<body>


<?php //include_once 'preloader.php' ?>





<div class="faq__container">

    <div class="enteteFaq">
        
        <p class="titre">FAQ</p>
        <p class="soustitre"> Tout ce que vous voulez savoir sur  </p>
        <p class="soustitre">la maladie coeliaque</p>
        
    </div>

    <div style="margin:50px" id="effect" class="wavy titreJournal">
        <span style="--i:1;">M</span>
        <span style="--i:2;">O</span>
        <span style="--i:3;">s</span>
        <span style="--i:4;">T</span>
        <span style="--i:5;"> </span>
        <span style="--i:6;"> </span>
        <span style="--i:7;">F</span>
        <span style="--i:8;">R</span>
        <span style="--i:9;">E</span>
        <span style="--i:10;">Q</span>
        <span style="--i:11;">U</span>
        <span style="--i:12;">N</span>
        <span style="--i:13;">T</span>
        <span style="--i:14;">L</span>
        <span style="--i:15;">Y</span>
        <span style="--i:16;"> </span>
        <span style="--i:17;"> </span>
        <span style="--i:18;">A</span>
        <span style="--i:19;">S</span>
        <span style="--i:20;">K</span>
        <span style="--i:21;">E</span>
        <span style="--i:22;">D</span>
        <span style="--i:23;"> </span>
        <span style="--i:24;"> </span>
        <span style="--i:25;">Q</span>
        <span style="--i:26;">U</span>
        <span style="--i:27;">E</span>
        <span style="--i:28;">S</span>
        <span style="--i:29;">T</span>
        <span style="--i:30;">I</span>
        <span style="--i:31;">O</span>
        <span style="--i:32;">N</span>
        <span style="--i:33;">S</span>
      </div>
    <div class="faq">
        <div class="faqContenu">
            <div class="faqQues">
                Quels sont les symptômes de la maladie coeliaque ?
            </div>
            <div class="faqResp">
                <div class="faqRespContent">
                <p>Les symptômes de la maladie cœliaque se manifestent par des diarrhées, une perte de poids, de la fatigue, des ballonnements, des maux de ventre, des nausées et, chez les enfants, par des troubles de la croissance.</p>
                </div>
            </div>
        </div>
        <div class="faqContenu">
        <div class="faqQues">
        Quels produits sans gluten peut-on consommer ?
        </div>
        <div class="faqResp">
            <div class="faqRespContent">
            <p>On peut consommer tous les produits qui ne contiennent pas les céréales déjà citées. En plus le riz, les pommes de terre, les légumes, les fruits, les légumineuses, les fruits secs, le poisson, la viande, le fromage sont des produits sans gluten. Cependant, il faudrait bien faire attention à la composition de ces produits et bien lire les étiquettes vu les risques des contaminations au gluten.</p>
            </div>
        </div>
        </div>

        <div class="faqContenu">
        <div class="faqQues">
        Est-il facile de trouver les produits sans gluten ?
        </div>
        <div class="faqResp">
            <div class="faqRespContent">
            <p>Aujourd’hui la maladie cœliaque trouve plus d’intérêt chez les producteurs des produits alimentaires et les nutrionnistes. Juste à côté de chez vous dans les grandes surfaces, dans les supermarchés bios, vous trouvez tout un rayon sans gluten, encore dans les pharmacies et les magasins diététiques. Avec un simple clic, vous en trouvez sur des sites Internet, vous pouvez savourez des délices sucrées et salées en parcourant ces sites.</p>
            </div>
        </div>
        </div>

        <div class="faqContenu">
        <div class="faqQues">
        Comment  savoir si nous sommes atteints de la maladie cœliaque ?
        </div>
        <div class="faqResp">
            <div class="faqRespContent">
            <p>Vous ne pouvez savoir si vous êtes atteint de cette maladie qu’après avoir fait le diagnostic chez un médecin. Certains symptômes peuvent aider à le savoir tels que   les maux de ventre, des problèmes digestifs comme la constipation et la diarrhée, des migraines intenses, des malaises, des carences alimentaires, des tremblements, une fatigue intense.</p>
            </div>
        </div>
        </div>

        <div class="faqContenu">
        <div class="faqQues">
        Comment diagnostiquer la maladie cœliaque ?
        </div>
        <div class="faqResp">
            <div class="faqRespContent">
            <p>Les autotests ne donnent pas toujours  des résultats fiables. Seuls les examens chez les médecins : une prise de sang, une gastro-endoscopie avec biopsie duodénale peuvent vous donner des résultats fiables.</p>
            </div>
        </div>
        </div>

        <div class="faqContenu">
        <div class="faqQues">
        Quelles céréales riches en gluten  faut-il éviter ?
        </div>
        <div class="faqResp">
            <div class="faqRespContent">
            <p>Le seigle, le blé, l'orge, le triticale et le malt. Quant à l’avoine, quoiqu’il ne contienne pas de gluten, certains cœliaques ont des réactions face à cette céréale.</p>
            </div>
        </div>
        </div>
   </div>


</div>

    <?php include_once 'footer.php'?>
    <script src="js/testnav.js"></script>
    <script src="Js/faq.js"></script>
    <?php include_once 'assets/scripts.php' ?>
   

</body>
</html>