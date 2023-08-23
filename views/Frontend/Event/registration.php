<?php
session_start();
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

$form = [
  "carnivals" => $compact["carnivals"],
  "colleges" => $compact["colleges"]
];
?>


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
  <!-- Navigation Part -->
  <?php view("layout/navbar.php", compact("navbar")); ?>

  <div class="containers content">
    <div class="row support-row">
      <?php view("Frontend/Event/partials/direction.php"); ?>
      <div class="form-box">
        <?php view("components/flashMessage.php"); ?>
        <h2>Event Registration</h2>
        <form action="<?= url("/signup/event"); ?>" method="POST" enctype="multipart/form-data">
          <?php view("Frontend/Event/partials/verifyForm.php") ?>
          <?php view("Frontend/Event/partials/registrationForm.php", compact("form")) ?>
        </form>
      </div>
    </div>
  </div>

  <?php view("layout/footer.php", compact("footer")); ?>
  <?php view("layout/partials/BackendScript.php") ?>
  <script>

  </script>
  <script src="<?= assets('js/default.js') ?>"></script>
  <script src="<?= assets('js/registration.js'); ?>"></script>
  <script src="<?= assets('js/gallery.js'); ?>"></script>

</body>


</html>