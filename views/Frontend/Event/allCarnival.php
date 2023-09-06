<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Club Events</title>
    <!-- CSS Part -->
    <?php view("layout/partials/backendLink.php") ?>
    <link rel="stylesheet" href="<?= assets('style/Frontend/Page/allCarnival.css'); ?>" />

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

    $data = $compact["data"];
    ?>
    <?php view("layout/navbar.php", compact("navbar")); ?>

    <div class="containers content">
        <div class="row titleBox">
            <h1>Running And Upcomming Carnivals</h1>
            <hr>
        </div>
        <br>
        <div class="row blog-row">
            <?php
            foreach ($data as $key => $value) { ?>
            <?php
                if(is_array(interval($value['start']))){
                  $date =  interval($value['start']);
                }else{
                    $date="Finished";
                }
            ?>
                <div class="blog-card <?php if ($value["status"] == 1)
                    echo "active"; ?>">
                    <div class="top">
                        <div class="topbox">
                            <img class="banner" src="<?= assets("Upload/Carnivals/" . $value["banner"]) ?>" />
                        </div>
                        <div class="timeCatgoty">
                            <p class="time">
                                Start :
                                <?php
                                $datetime = $value['start'];
                                $newDate = date("j F Y", strtotime($datetime));
                                echo date("j F Y", strtotime($datetime));
                                // echo $dt->format('d/m/Y');
                                ?>
                                <br>
                                <span>
                                    End :
                                    <?php
                                    $datetime = $value['end'];
                                    $newDate = date("j F Y", strtotime($datetime));
                                    echo date("j F Y", strtotime($datetime));
                                    // echo $dt->format('d/m/Y');
                                    ?>
                                </span>
                                <br>
                                <?php  
                                   if($date[0]>0){
                                    ?>
                                       <span>Countdown : <?php echo $date[0]." days,".$date[1]." hours,".$date[2]." miniute"?> </span>
                                    <?php
                                   }else{
                                    ?>
                                       <span>Status : Finished </span>
                                    <?php
                                   }
                                ?>
                            </p>
                            <a href="<?= url("/carnival/" . $value["slug"]) ?>" class="title">
                                <?= $value["title"] ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>

        <div class="row paginationBox">

        </div>
    </div>

    </div>
    <?php view("layout/footer.php", compact("footer")); ?>
    <?php view("layout/partials/frontendScript.php") ?>

</body>

</html>