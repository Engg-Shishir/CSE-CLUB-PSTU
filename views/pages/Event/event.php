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
      <div class="image" style='background-image: url(<?= assets("Upload/Static/callenderBanner.png") ?>);'></div>
    </div>
  <?php }
  ?>

  <?php
  if ($events["event_schedule"] !== null) { ?>
    <div class="row event-rules">
      <svg class="absolute w-full bottom-[-2px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 170.68 1440 149.32">
        <path fill="#ecebf1" fill-opacity="1"
          d="M0,288L80,282.7C160,277,320,267,480,240C640,213,800,171,960,170.7C1120,171,1280,213,1360,234.7L1440,256L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
      </svg>
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


  <div class="row banner-btn">
    <!-- <svg class="absolute w-full bottom-[-2px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 170.68 1440 149.32">
      <path fill="#fff" fill-opacity="1"
        d="M0,288L80,282.7C160,277,320,267,480,240C640,213,800,171,960,170.7C1120,171,1280,213,1360,234.7L1440,256L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
      </path>
    </svg> -->
  <a href="" class="eventRegistrationBtn">
  <button class="glowing-btn" type="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      SignUp
    </button>
  </a>
    
  </div>


  <?php view("layout/footer.php", compact("footer")); ?>
  </div>
  <?php view("pages/Event/partials/scripts.php"); ?>


</body>

</html>