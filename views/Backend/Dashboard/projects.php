<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User | Projects</title>
  <!-- CSS Part -->
  <?php view("pages/Admin/Dashboard/links.php"); ?>
  <link rel="stylesheet" href="<?= assets('pages/User/profile.css'); ?>" />

  <style>
    body {
      font-size: 20px !important;
    }
  </style>
</head>

<body>
  <?php
  $settings = $compact["settings"];
  $navbar = [
    "navLogo" => $settings["navLogo"]
  ];

  $data = $compact["data"][0];

  ?>
  <?php view("./layout/Student/navbar.php", compact("navbar")); ?>

  <!-- Javacript Part -->
  <?php view("pages/Admin/Dashboard/scripts.php"); ?>

  <script>
    $(function () {
      $("#print").click(function () {
        //Hide all other elements other than printarea.
        $(this).hide();
        setTimeout(() => {
          $(this).show();
        }, 1000);
        $("#main").show();
        $("body").css({ "margin": "0px" });
        $("body").css({ "margin-left": "50px" });
        $("body").css({ "width": "650px" });
        window.print();
      });

    });
  </script>
</body>

</html>