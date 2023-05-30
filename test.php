
  <?php
    include_once 'autoload.php';
    $recipeCatRelRepo = new RecipeCategoryRelRepository();
    $rels = $recipeCatRelRepo->recipeByCat(1);
    var_dump($rels);
    ?>