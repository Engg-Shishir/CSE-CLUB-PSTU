<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CLUB | Login</title>
  <!-- CSS Part -->
  <?php view("layout/partials/backendLink.php") ?>
  <link rel="stylesheet" href="<?= assets('style/Frontend/Login/login.css'); ?>" />
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
    <div class="row support-row">
      <!-- Login Instruction -->
      <?php view("Frontend/Login/direction.php"); ?>
      <!-- Login form -->
      <?php view("Frontend/Login/form.php"); ?>
    </div>
    <!-- Footer Part -->
    <?php view("layout/footer.php",compact("footer")); ?>
  </div>
  <!-- Javacript Part -->
  <?php view("layout/partials/backendScript.php") ?>
</body>
</html>