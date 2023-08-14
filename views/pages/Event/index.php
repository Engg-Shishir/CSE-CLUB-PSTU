<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CSE CLUB</title>
  <!-- CSS Part -->
  <?php view("pages/Event/partials/links.php"); ?>
</head>

<body>
  <?php
  $settings = $compact["settings"];
  $footer = [
    "navLogo" => $settings["navLogo"],
    "short_des" => $settings["short_des"],
    "copyright" => $settings["copyright"]
  ];
  $navbar = [
    "navLogo" => $settings["navLogo"]
  ];
  ?>
  <?php view("layout/navbar.php", compact("navbar")); ?>
  <div class="container content">

    <?php view("pages/Event/partials/sponsor.php"); ?>

    <?php view("layout/footer.php", compact("footer")); ?>
  </div>
  <?php view("pages/Event/partials/scripts.php"); ?>


</body>

</html>