<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CLUB | Joinus</title>
  <!-- CSS Part -->
  <?php view("pages/Admin/Dashboard/links.php"); ?>
</head>

<body>
  <?php
  $navbar = [
    "navLogo" => $settings["navLogo"]
  ];
  ?>
  <?php view("./layout/Admin/navbar.php",compact("navbar")); ?>
  <div class="containers content">



  </div>
  <!-- Javacript Part -->
  <?php view("pages/Admin/Dashboard/scripts.php"); ?>
</body>

</html>