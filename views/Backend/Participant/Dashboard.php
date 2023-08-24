<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant | Home</title>
    <?php view("layout/partials/backendLink.php"); ?>
    <link rel="stylesheet" href="<?= assets('style/Backend/dashboard.css'); ?>" />
</head>

<body>
    <?php
    $navbar = [
        "navLogo" => $settings["navLogo"]
    ];
    ?>
    <?php view("layout/Participant/navbar.php", compact("navbar")); ?>
    <div class="containers content">
    </div>
    <?php view("layout/partials/backendScript.php"); ?>
</body>

</html>