<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumini | Home</title>
    <?php view("layout/partials/backendLink.php"); ?>
    <link rel="stylesheet" href="<?= assets('style/Backend/Alumini/dashboard.css'); ?>" />
</head>

<body>
    <?php
    $settings = $compact["settings"];
    $navbar = [
        "navLogo" => $settings["navLogo"]
    ];
    $alumini = $compact["aluminis"][0];
    ?>
    <?php view("layout/Student/navbar.php", compact("navbar")); ?>
    <div class="containers content">
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-striped table-responsive w-100 d-block d-md-table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Session</th>
                            <th>Company</th>
                            <th>Connect</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($compact["aluminis"] as $key => $item) {

                            ?>
                            <tr style='<?php if ($item["status"] == 1)
                                echo "background-color:#ebf8ed;"; ?>'>
                                <td>
                                    <img src="<?= assets("Upload/users/" . $item["image"]) ?>" height="40px" width="40px">
                                </td>
                                <td>
                                    <?= $item["name"] ?>
                                </td>
                                <td>
                                    <?= $item["birth"] ?>
                                </td>
                                <td>
                                    <?= $item["job_title"] ?>
                                </td>
                                <td>
                                    <a href="<?= $item["facebook"] ?>"><i class="mr-1 fa-brands fa-square-facebook"
                                            style="font-size: 26px; color:blue;"></i></a>
                                    <a href="<?= $item["linkedin"] ?>"><i class="mr-1 fa-brands fa-linkedin"
                                            style="font-size: 26px; color:blue;"></i></a>
                                    <a href="<?= $item["github"] ?>"><i class="fa-brands fa-square-github"
                                            style="font-size: 26px; color:blue;"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php view("layout/partials/backendScript.php"); ?>
</body>

</html>