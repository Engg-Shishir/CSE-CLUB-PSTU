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

  <!-- Navigation Part -->
  <?php view("./layout/navbar.php"); ?>
  <div class="containers content">
    
    <div class="row support-row">
      <!-- Login Instruction -->
      <?php view("pages/Joinus/direction.php"); ?>
      <!-- Login form -->
      <?php view("pages/Joinus/form.php", compact("data")); ?>
    </div>
    <!-- Footer Part -->
    <?php view("layout/footer.php"); ?>
  </div>
  <!-- Javacript Part -->
  <?php view("pages/Joinus/scripts.php"); ?>
</body>

</html>