<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Projects</title>
  <!-- CSS Part -->
  <?php view("pages/Admin/Settings/partials/links.php"); ?>
  <link rel="stylesheet" href="<?= assets('pages/Admin/Static/country.css'); ?>" />
</head>

<body>
<?php
    $navbar = $compact["settings"];
    $data = $compact["data"];
  ?>
  <?php view("./layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">
    <div class="card-header">
      <div class="row">
        <div class="col-md-12">
          <?php 
            if(isset($data[0])){
              $formData = $data[0];
            }else{
              $formData=[];
            }
            view("pages/Admin/Settings/Partials/settingForm.php",compact("formData"))  
          ?>
        </div>
      </div>
    </div>

    <!-- Javacript Part -->
  </div>




  <?php view("pages/Admin/Projects/partials/scripts.php"); ?>
  <script src="<?= assets('pages/Admin/Settings/image.js'); ?>"></script>
</body>

</html>