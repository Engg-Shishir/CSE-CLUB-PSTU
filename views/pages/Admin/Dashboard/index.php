<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Home</title>
  <link rel="stylesheet" href="<?= assets('pages/Admin/dashboard.css'); ?>" />
</head>

<body>
  <?php
  $navbar = [
    "navLogo" => $settings["navLogo"]
  ];
  ?>
  <?php view("./layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content"></div>
  <?php view("layout/partials/backendScript.php"); ?>
</body>

</html>