<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CLUB | Login</title>
  <!-- CSS Part -->
  <?php view("layout/partials/frontendLink.php") ?>
  <link rel="stylesheet" href="<?= assets('pages/Contact/contact.css'); ?>" />
</head>
<body>
<?php 
    $settings = $compact["settings"][0];
    $footer=[
      "navLogo"=>$settings["navLogo"],
      "short_des"=>$settings["short_des"],
      "copyright"=>$settings["copyright"]
    ];
    $navbar=[
      "navLogo"=>$settings["navLogo"],
      "carnival"=>[$settings["carTitle"],$settings["carSlug"]],
      "carnivals"=>$compact["carnivals"]
    ];
  ?>
  <!-- Navigation Part -->
  <?php view("layout/navbar.php",compact("navbar")); ?>
  <div class="containers content">
      <?php view("pages/Contact/form.php"); ?>
    <?php view("layout/footer.php",compact("footer")); ?>
  </div>

  <?php view("layout/partials/frontendScript.php") ?>
  <script src="<?= assets('js/Frontend/contactpage.js');?>"></script>
  
</body>
</html>