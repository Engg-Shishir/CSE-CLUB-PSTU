<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Club Activity</title>
    <!-- CSS Part -->
    <?php view("layout/partials/backendLink.php") ?>
    <link rel="stylesheet" href="<?= assets('style/Frontend/Activity/activity.css'); ?>" />
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

    $activity = $compact["activity"];
    $AllActivity = $compact["AllActivity"];

    ?>
    <?php view("layout/navbar.php", compact("navbar")); ?>

    <div class="containers content">
        <div class="row titleBox">
            <h1>Recent Events</h1>
            <div class="input-group input-group seasrch p-2">
                <input type="number" class="form-control" style="padding: 18px; font-size: 16px;" min="1900" max="2099"
                    step="1" placeholder="2023" />
                <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat" style="font-size: 16px;">Year Search</button>
                </span>
            </div>
        </div>
        <hr>
        <div class="row searchbox">
            <div class="col-md-6">

            </div>
        </div>
        <div class="row blog-row">
            <?php
            foreach ($activity as $key => $value) { ?>
                <div class="blog-card">
                    <div class="top">
                        <div class="topbox">
                            <img class="banner" src="<?= assets("Upload/ClubActivity/" . $value["image"]) ?>" />
                        </div>
                        <div class="timeCatgoty">
                            <p class="time">
                                <?php
                                $datetime = $value['year'];
                                $newDate = date("j F Y", strtotime($datetime));
                                echo date("j F Y", strtotime($datetime));
                                // echo $dt->format('d/m/Y');
                                ?>
                            </p>
                            <p class="title"><?= $value["event_name"] ?></p>
                        </div>
                    </div>
                    <div class="bottom-box">
                        <div class="box1">
                            <a class="link">
                                <?= $value["description"] ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
        <div class="row paginationBox">
            <div class="col-md-6 pagination">
                <?php
                $page = ceil(count($AllActivity) / 8);

                if (isset($_SESSION["page"]) && $_SESSION["page"] !== "") {
                    for ($i = 1; $i <= $page; $i++) {
                        if ($i == intval($_SESSION["page"])) { ?> <a href="<?= url("/activity/page/" . $i) ?>"
                                class="btn btn-default active"><?= $i ?></a>
                        <?php } else { ?> <a href="<?= url("/activity/page/" . $i) ?>" class="btn btn-default"><?= $i ?></a>
                        <?php }

                    }
                } else {
                    for ($i = 1; $i <= $page; $i++) {
                        if ($i == 1) { ?> <a href="<?= url("/activity/page/" . $i) ?>"
                                class="btn btn-default active"><?= $i ?></a>
                        <?php } else { ?> <a href="<?= url("/activity/page/" . $i) ?>" class="btn btn-default"><?= $i ?></a>
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