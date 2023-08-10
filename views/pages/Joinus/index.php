<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CLUB | Joinus</title>
  <!-- CSS Part -->
  <?php view("pages/Joinus/links.php"); ?>
</head>

<body>
  <?php ;
  $footer = [
    "navLogo" => $settings["navLogo"],
    "short_des" => $settings["short_des"],
    "copyright" => $settings["copyright"]
  ];
  $navbar = [
    "navLogo" => $settings["navLogo"]
  ];
  ?>
  <!-- Navigation Part -->
  <?php view("layout/navbar.php", compact("navbar")); ?>
  <div class="containers content">

    <div class="row support-row">
      <!-- Login Instruction -->
      <?php view("pages/Joinus/direction.php"); ?>
      <!-- Login form -->
      <?php view("pages/Joinus/form.php", compact("data")); ?>
    </div>
    <!-- Footer Part -->
    <?php view("layout/footer.php", compact("footer")); ?>
  </div>
  <!-- Javacript Part -->
  <?php view("pages/Joinus/scripts.php"); ?>
</body>

</html>