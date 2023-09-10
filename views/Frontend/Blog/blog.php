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

    $blog = $compact["blog"];
    $AllBlog = $compact["AllBlog"];
    $blogCategory = $compact["blogCategory"];

    ?>
    <?php view("layout/navbar.php", compact("navbar")); ?>

    <div class="container-fluid content">
        <div class="row titleBox">
            <div class="col-md-10">
                <h1>Current Articles</h1>
                <p>Get updated with our latest software development news and events</p>
            </div>
        </div>
        <div class="row searchbox">
            <div class="col-md-6">

            </div>
        </div>
        <div class="row blog-row">
            <?php
            foreach ($blog as $key => $value) { ?>
                <div class="blog-card">
                    <div class="top">
                        <div class="topbox">
                            <img class="banner" src="<?= assets("Upload/Blog/" . $value["banner"]) ?>" />
                        </div>
                        <p class="time">
                            <?= intval($value["read_time"]) ?> miniute read
                        </p>
                    </div>
                    <div class="bottom-box">
                        <div class="box1">
                            <a href="<?= url("/blog/" . $value["blog_slug"]) ?>" class="link"><?= $value["title"] ?></a>
                        </div>
                        <div class="box2">
                            <a href="<?= url("/blog/author/" . $value["uslug"]) ?>"><span>Author</span>
                                <?= $value["uname"] ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
        <div class="row searchbox">
            <div class="col-md-6 pagination">
                <?php
                $page = ceil(count($AllBlog) / 4);

                if (isset($_SESSION["page"]) && $_SESSION["page"] !== "") {
                    for ($i = 1; $i <= $page; $i++) {
                        if ($i == intval($_SESSION["page"])) { ?> <a href="<?= url("/blog/page/" . $i) ?>"
                                class="btn btn-default active"><?= $i ?></a>
                        <?php } else { ?> <a href="<?= url("/blog/page/" . $i) ?>" class="btn btn-default"><?= $i ?></a>
                        <?php }

                    }
                } else {
                    for ($i = 1; $i <= $page; $i++) {
                        if ($i == 1) { ?> <a href="<?= url("/blog/page/" . $i) ?>" class="btn btn-default active"><?= $i ?></a>
                        <?php } else { ?> <a href="<?= url("/blog/page/" . $i) ?>" class="btn btn-default"><?= $i ?></a>
                        <?php }
                    }
                }

                ?>
            </div>
        </div>
    </div>

    </div>
    <?php view("layout/footer.php", compact("footer")); ?>
    <?php view("layout/partials/frontendScript.php") ?>

</body>

</html>