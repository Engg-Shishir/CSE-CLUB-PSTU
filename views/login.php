<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CSE CLUB|Login</title>
</head>

<body>
  <!-- Include Navigation Bar -->
  <?php  view("./layout/navbar.php"); ?>
  <div class="container content">
    <div class="row support-row">
      <?php view("pages/Login/direction.php"); ?>
      <?php view("pages/Login/form.php"); ?>
    </div>
  <?php view("layout/footer.php"); ?>
  </div>
</body>

</html>