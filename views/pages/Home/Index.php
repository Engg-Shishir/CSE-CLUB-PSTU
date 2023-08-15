<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSE CLUB</title>
  <?php view("pages/Home/links.php") ?>
</head>

<body>

  <?php

  $settings = $compact["settings"][0];
  $heroSec = [
    "logo" => $settings["logo"],
    "title" => $settings["title"],
    "text" => $settings["short_des"]
  ];
  $circle = [
    "video" => $settings["video"]
  ];
  $aboutText = $settings["description"];
  $projects = [
    "code" => $compact["projects"],
    "text" => $settings["project_section_text"]
  ];
  $partners = [
    "image" => $compact["partners"],
    "text" => $settings["partners_section_text"]
  ];

  
  $navbar=[
    "navLogo"=>$settings["navLogo"],
    "carnival"=>[$settings["carTitle"],$settings["carSlug"]],
    "carnivals"=>$compact["carnivals"]
  ];
  // Footer variable
  $footer = $settings;
  ?>

  <div class="container">
    <?php view("layout/navbar.php",compact("navbar")) ?>
    <?php view("pages/Home/fixedHero.php", compact("heroSec")) ?>
    <?php view("pages/Home/videoCircle.php",compact("circle")) ?>
  </div>
  <div class="container content">
    <?php
         view("pages/Home/about.php", compact("aboutText"))
      ?>
    <?php

    view("pages/Home/projects.php", compact("projects"))
      ?>

    <?php
    view("pages/Home/partner.php", compact("partners"))
      ?>
    <?php view("layout/footer.php", compact("footer")) ?>
  </div>

  <?php view("pages/Home/scripts.php") ?>
</body>

</html>