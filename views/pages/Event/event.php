<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CSE CLUB</title>
  <!-- CSS Part -->
  <?php view("pages/Event/partials/links.php"); ?>
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

  $sponsor = $compact["sponsor"];
  $events = $compact["events"];

  //   parray($events);
  ?>
  <?php view("layout/navbar.php", compact("navbar")); ?>
  <div class="container content">
    <div class="row row-banner"
      style='background-image: url(<?= assets("Upload/Events/" . $events["event_image"]) ?>);'>
    </div>
  </div>



  <?php
  if ($events["event_des"] !== null) { ?>
    <div class="row event-description">
      <div class="box">
        <div class="title center fancy">
          <h2>Event Description</h2>
        </div>
        <p class="eventText">
          <?= add_root_to_images($events["event_des"]) ?>
        </p>
      </div>
    </div>
  <?php }
  ?>





  <?php
  if ($events["event_schedule"] !== null) { ?>
    <div class="row event-schedule">
      <div class="box">
        <div class="title center">
          <h2>Event Scedule</h2>
        </div>
        <p class="eventSchedule">
          <?= nl2br(add_root_to_images($events["event_schedule"])) ?>
        </p>
      </div>
      <div class="image"></div>
    </div>
  <?php }
  ?>


  <?php
  if ($events["event_schedule"] !== null) { ?>
    <div class="row event-rules">
      <div class="box">
        <div class="title center">
          <h2>Rules & Regolation</h2>
        </div>
        <p class="eventText">
          <?= nl2br(add_root_to_images($events["event_roles"])) ?>
        </p>
      </div>
    </div>
  <?php }
  ?>




  <?php view("layout/footer.php", compact("footer")); ?>
  </div>
  <?php view("pages/Event/partials/scripts.php"); ?>


</body>

</html>