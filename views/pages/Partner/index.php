<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CLUB | Joinus</title>
  <!-- CSS Part -->
  <?php view("pages/Partner/links.php"); ?>
</head>

<body>
  <?php ;
  $settings = $compact["settings"];
  $footer = [
    "navLogo" => $settings["navLogo"],
    "short_des" => $settings["short_des"],
    "copyright" => $settings["copyright"]
  ];
  $navbar = [
    "navLogo" => $settings["navLogo"]
  ];
  $category = $compact["category"];
  $count = $compact["count"];
  ?>
  <?php view("layout/navbar.php", compact("navbar")); ?>
  <div class="container content">
    <?php view("pages/Partner/statistics.php",compact("count")); ?>
    <div class="row partner-reason-row">

      <div class="reson-title-box">
        <h1>How do sponsors partner with us?</h1>
        <p>
          The CSE is a non-profit student club, the funding of our events
          depends on the generosity of our sponsors and partners, if you wish
          to support our efforts, here are some suggestions on how to sponsor
          us:
        </p>
      </div>

      <?php view("pages/Partner/reasonCard.php",compact("category")); ?>

    </div>

    <?php view("pages/Partner/form.php"); ?>
    <?php view("layout/footer.php", compact("footer")); ?>
  </div>
  <?php view("pages/Partner/scripts.php"); ?>
</body>

</html>