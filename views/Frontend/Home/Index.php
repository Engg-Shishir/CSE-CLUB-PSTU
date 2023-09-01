<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSE CLUB</title>
  <?php view("layout/partials/frontendLink.php") ?>
  <link rel="stylesheet" href="<?= assets('style/Frontend/Home/index.css') ?>">
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


  $navbar = [
    "navLogo" => $settings["navLogo"],
    "carnival" => [$settings["carTitle"], $settings["carSlug"]],
    "carnivals" => $compact["carnivals"]
  ];
  // Footer variable
    $footer = $settings;
    $blog = $compact["blog"];
  ?>

  <div class="container">
    <?php view("layout/navbar.php", compact("navbar")) ?>
    <?php view("Frontend/Home/fixedHero.php", compact("heroSec")) ?>
    <?php view("Frontend/Home/videoCircle.php", compact("circle")) ?>
  </div>
  <div class="container content">
    <?php view("Frontend/Home/about.php", compact("aboutText")) ?>
    <?php view("Frontend/Home/projects.php", compact("projects")) ?>
    <?php view("Frontend/Home/blog.php", compact("blog")) ?>
    <?php view("Frontend/Home/partner.php", compact("partners")) ?>
    <?php view("layout/footer.php", compact("footer")) ?>
  </div>

  <?php view("layout/partials/frontendScript.php") ?>
  <script src="<?= assets('js/Frontend/homepage.js') ?>"></script>
</body>

</html>