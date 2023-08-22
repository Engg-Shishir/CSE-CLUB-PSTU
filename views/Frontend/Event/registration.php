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
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <form>
          
          <div class="form-group">
            <label for=""><strong>Carnival</strong></label>
            <?= selectForm($compact["carnivals"], "", "select2 carnival-select form-control carnival"); ?>
          </div>

          <div class="form-group">
            <label for=""><strong>Event</strong></label>
            <?= selectForm([], "event_id", "select2 carnival-select form-control eventSelect"); ?>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="col-md-3"> </div>
    </div>
  </div>
  <?php view("layout/footer.php", compact("footer")); ?>
  <?php view("layout/partials/BackendScript.php") ?>
  <script src="<?= assets('js/registration.js'); ?>"></script>

  <script>
    $()
  </script>
</body>

</html>