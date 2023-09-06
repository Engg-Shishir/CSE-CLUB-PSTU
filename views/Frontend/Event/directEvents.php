<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About us</title>
  <!-- CSS Part -->
  <?php view("layout/partials/frontendLink.php") ?>
  <link rel="stylesheet" href="<?= assets('style/Frontend/Event/DirectEvent/directEvents.css'); ?>" />
  </style>
</head>

<body>
  <?php
  session_start();
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



  $sponsor = $compact["sponsor"];
  $faqs = $compact["faqs"];
  $carnival = $compact["carnival"][0];
  ?>
  <!-- Navigation Part -->
  <?php view("layout/navbar.php", compact("navbar")); ?>
  <div class="containers content">
    <?php
    $image = ASSET_URL . "/Upload/Carnivals/" . $carnival["banner"];
    ?>
    <div class="row-banner" style="background-image:url('<?= $image ?>')"></div>
    <div class="descriptionBox">
      <h3>Description</h3>
      <hr>
      <br>
      <p>
        <?= $carnival["description"] ?>
      </p>
    </div>
    <?php
    if (count($sponsor) > 0)
      view("Frontend/Event/partials/sponsor.php", compact("sponsor"));
    ?>
    <?php
      if (count($faqs) > 0)
      view("Frontend/faq.php", compact("faqs"))
    ?>
    </div>
  <?php view("layout/footer.php", compact("footer")); ?>
  <!-- Javacript Part -->
  <?php view("layout/partials/backendScript.php") ?>
  <script src="<?= assets('js/faqs.js') ?>"></script>
</body>

</html>