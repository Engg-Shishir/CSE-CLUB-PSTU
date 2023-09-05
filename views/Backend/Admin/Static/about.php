<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Settings</title>
  <!-- CSS Part -->
  <?php view("layout/partials/backendLink.php"); ?>
  <link rel="stylesheet" href="<?= assets('style/Backend/Admin/Static/college.css'); ?>" />
</head>

<body>
  <?php
  $navbar = $compact["settings"];
  $data = $compact["aboutData"][0];
  ?>
  <?php view("layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">
    <div class="card-header">
      <div class="row">
        <div class="col-md-12">
          <?php
            view("Backend/Admin/Static/partial/aboutForm.php",compact("data"))
          ?>
        </div>
      </div>
    </div>

    <!-- Javacript Part -->
  </div>




  <?php view("layout/partials/backendScript.php"); ?>
  <script src="<?= assets('js/gallery.js'); ?>"></script>
</body>

</html>