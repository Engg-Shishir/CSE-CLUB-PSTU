<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CLUB | Login</title>
  <!-- CSS Part -->
  <?php view("pages/Login/links.php"); ?>
</head>
<body>
  <!-- Navigation Part -->
  <?php view("./layout/navbar.php"); ?>
  <div class="container content">
    <div class="row support-row">
      <!-- Login Instruction -->
      <?php view("pages/Login/direction.php"); ?>
      <!-- Login form -->
      <?php view("pages/Login/form.php"); ?>
    </div>
    <!-- Footer Part -->
    <?php view("layout/footer.php"); ?>
  </div>
  <!-- Javacript Part -->
  <?php view("pages/Login/scripts.php"); ?>
</body>
</html>