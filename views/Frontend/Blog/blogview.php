<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CSE CLUB</title>
  <!-- CSS Part -->
  <?php view("layout/partials/backendLink.php") ?>
  <link rel="stylesheet" href="<?= assets('style/Frontend/Event/events.css'); ?>" />
  <link rel="stylesheet" href="<?= assets('style/Frontend/Blog/blog.css'); ?>" />
  <style>
    html{
        font-size: 100%;
    }
     .content{
        min-height: 500vh;
        height: 100% !important;
        margin-top: 100px;
        padding: 30px;
        word-wrap: break-word;
        word-break: break-all;
     }
  </style>
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

  $blog = $compact["blog"][0];
  $blogCategory = $compact["blogCategory"];
  $authorBlog = $compact["authorBlog"];

  ?>
  <?php view("layout/navbar.php", compact("navbar")); ?>

  <div class="container-fluid content">
     <div class="row">
        <div class="col-md-9">
           <img width="100%" src="<?= assets("Upload/Blog/".$blog["banner"]) ?>" alt="">
           <a href="" class="text-info"><?= $blog["bcname"] ?> > </a>
           <p><?= $blog["details"] ?></p>
        </div>
        <div class="col-md-3">
            <div class="sideBox">
                <div class="category">
                    <h3>Blog Category</h3>
                    <?php   
                      foreach ($blogCategory as $key => $value) {  ?>
                          <a href="<?= url("/blog/category/".$value["category_slug"])  ?>">
                               <i class="fa-solid fa-link"></i> &nbsp; <?= $value["name"] ?>
                               <?php if($blog["bcname"]==$value["name"]) echo'<i class="fa-solid fa-check text-success"></i>';  ?>
                          </a><br>
                    <?php  }
                    ?>
                </div>
                <div class="category">
                    <h3><span><?= $blog["uname"] ?></span> Others Blog</h3>
                    <?php   
                      foreach ($authorBlog as $key => $value) {  ?>
                          <a href="<?= url("/blog/".$value["blog_slug"])  ?>">
                               <i class="fa-solid fa-link"></i> &nbsp; <?= $value["blogtitle"] ?>
                               <?php if($value["blogtitle"]==$blog["title"]) echo'<i class="fa-solid fa-check text-success"></i>';  ?>
                          </a><br>
                    <?php  }
                    ?>
                </div>
            </div>
        </div>
     </div>
  </div>

  </div>
  <?php view("layout/footer.php", compact("footer")); ?>
  <?php view("layout/partials/frontendScript.php") ?>

</body>

</html>

