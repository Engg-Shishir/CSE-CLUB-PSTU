<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSE CLUB</title>
  <?php view("pages/Home/links.php") ?>
</head>
<body>
  
  <div class="container">
    <?php view("layout/navbar.php") ?>
    <?php view("pages/Home/fixedHero.php") ?>
    <?php view("pages/Home/videoCircle.php") ?>
  </div>
  <div class="container content">
    <?php view("pages/Home/about.php") ?>
    <?php 
       $projects = $compact["projects"];
       view("pages/Home/projects.php",compact("projects")) 
    ?>
    <?php 
      $partners = $compact["partners"];
       view("pages/Home/partner.php",compact("partners")) 
    ?>
    <?php view("layout/footer.php") ?>
  </div>

<?php view("pages/Home/scripts.php") ?>
</body>
</html>