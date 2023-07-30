<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users | Manage</title>
  <!-- CSS Part -->
  <?php view("pages/Admin/Dashboard/links.php"); ?>
  <style>
    html {
      font-size: 100%;
    }
  </style>
</head>

<body>

  <!-- Navigation Part -->
  <?php view("./layout/Admin/navbar.php"); ?>
  <div class="containers content">
    <div class="row">
      <div class="card">
        <div class="card-header">
          Featured
        </div>
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Javacript Part -->
  <?php view("pages/Admin/Dashboard/scripts.php"); ?>
</body>

</html>