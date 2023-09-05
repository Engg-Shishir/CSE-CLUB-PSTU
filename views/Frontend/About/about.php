<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About us</title>
  <!-- CSS Part -->
  <?php view("layout/partials/frontendLink.php") ?>
  <link rel="stylesheet" href="<?= assets('style/Frontend/Page/about.css'); ?>" />
  </style>
</head>
<body>
  <?php 
    $settings = $compact["settings"][0];
    $footer=[
      "navLogo"=>$settings["navLogo"],
      "short_des"=>$settings["short_des"],
      "copyright"=>$settings["copyright"]
    ];
    $navbar=[
      "navLogo"=>$settings["navLogo"],
      "carnival"=>[$settings["carTitle"],$settings["carSlug"]],
      "carnivals"=>$compact["carnivals"]
    ];

    $data = $compact["data"][0];
  ?>
  <!-- Navigation Part -->
  <?php view("layout/navbar.php",compact("navbar")); ?>
  <div class="containers content">
    <?php  
      $image = ASSET_URL."/Upload/PageBanner/".$data["banner"];
    ?>
    <div class="row-banner" style="background-image:url('<?=  $image ?>')"></div>
    <div class="descriptionBox">
      <h3>History</h3>
      <hr>
      <br>
      <p><?=  $data["about"] ?></p>
    </div>
  </div>
  <?php view("layout/footer.php",compact("footer")); ?>
  <!-- Javacript Part -->
  <?php view("layout/partials/backendScript.php") ?>
</body>
</html>