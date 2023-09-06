<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CSE CLUB</title>
  <!-- CSS Part -->
  <?php view("layout/partials/frontendLink.php") ?>
  <link rel="stylesheet" href="<?= assets('style/Frontend/Event/carnival.css'); ?>" />
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
  $events = $compact["events"];
  $faqs = $compact["faqs"];
  $carnival = $compact["carnival"][0];
  ?>
  <?php view("layout/navbar.php", compact("navbar")); ?>
  <div class="container content">
    <div class="row row-banner"
      style='background-image: url(<?= assets("Upload/Carnivals/" . $carnival["banner"]) ?>);'> </div>
   

    <?php 
      if(count($sponsor) > 0)
      view("Frontend/Event/partials/sponsor.php", compact("sponsor")); 
    ?>
    <?php 
      if(count($events) > 0)
       view("Frontend/Event/partials/eventCard.php", compact("events"));
    ?>



<!-- faq niye kaz korte hobe -->
    <div class="row banner-btn">
      <a href="<?= url("/signup/event") ?>" class="eventRegistrationBtn">
        <button class="glowing-btn" type="submit">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Registration
        </button>
      </a>
    </div>

    
    <?php 
      if(count($faqs)>0)
      view("Frontend/faq.php", compact("faqs")) 
    ?>

    <?php view("layout/footer.php", compact("footer")); ?>
  </div>
  <?php view("layout/partials/frontendScript.php") ?>
  <script src="<?= assets('js/faqs.js') ?>"></script>

</body>

</html>