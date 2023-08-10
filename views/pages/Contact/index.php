<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CLUB | Login</title>
  <!-- CSS Part -->
  <?php view("pages/Contact/links.php"); ?>
</head>
<body>
  <?php  ;
    $footer=[
      "navLogo"=>$settings["navLogo"],
      "short_des"=>$settings["short_des"],
      "copyright"=>$settings["copyright"]
    ];
    $navbar=[
      "navLogo"=>$settings["navLogo"]
    ];
  ?>
  <!-- Navigation Part -->
  <?php view("./layout/navbar.php",compact("navbar")); ?>
  <div class="containers content">
      <?php view("pages/Contact/form.php"); ?>
    <?php view("layout/footer.php",compact("footer")); ?>
  </div>
  <?php view("pages/Contact/scripts.php"); ?>
  
</body>
</html>