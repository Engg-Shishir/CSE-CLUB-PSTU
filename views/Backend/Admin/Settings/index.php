<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Projects</title>
  <!-- CSS Part -->
  <?php view("layout/partials/backendLink.php"); ?>
  <link rel="stylesheet" href="<?= assets('style/Backend/Admin/Static/country.css'); ?>" />
</head>

<body>
<?php
    $navbar = $compact["settings"];
    $data = $compact["data"];
    $carnivals = $compact["carnivals"];
  ?>
  <?php view("layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">
    <div class="card-header">
      <div class="row">
        <div class="col-md-12">
          <?php 
              $compact=[
                "formData"=>$data[0],
                "carnivals"=>$carnivals
              ];
            view("Backend/Admin/Settings/Partials/settingForm.php",compact("compact"))  
          ?>
        </div>
      </div>
    </div>

    <!-- Javacript Part -->
  </div>




  <?php view("layout/partials/backendScript.php"); ?>
  <script src="<?= assets('pages/Admin/Settings/image.js'); ?>"></script>
</body>

</html>