<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event | Registration</title>
  <!-- CSS Part -->
  <?php view("layout/partials/backendLink.php") ?>
  <link rel="stylesheet" href="<?= assets('style/Frontend/Event/registration.css'); ?>" />
</head>

<body>
  <?php
  $settings = $compact["settings"][0];
  $footer = [
    "navLogo" => $settings["navLogo"],
    "short_des" => $settings["short_des"],
    "copyright" => $settings["copyright"]
  ];
  $navbar = [
    "navLogo" => $settings["navLogo"],
    "carnival" => [$settings["carTitle"], $settings["carSlug"]],
    "carnivals" => $compact["carnivals"]
  ];
  ?>
  <!-- Navigation Part -->
  <?php view("layout/navbar.php", compact("navbar")); ?>

  <div class="containers content">
      <div class="row support-row">
        <?php view("components/flashMessage.php"); ?>
        <div class="reg-form">

        </div>
      </div>
      <?php view("layout/footer.php", compact("footer")); ?>
    </div>
  <?php view("layout/footer.php", compact("footer")); ?>
  <!-- Javacript Part -->
  <?php view("layout/partials/frontendScript.php") ?>
</body>

</html>