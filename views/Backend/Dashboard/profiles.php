<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User | Profile</title>
  <!-- CSS Part -->
  <?php view("pages/Admin/Dashboard/links.php"); ?>
  <link rel="stylesheet" href="<?= assets('pages/User/profile.css'); ?>" />
</head>

<body>
  <?php
  $settings = $compact["settings"];
  $navbar = [
    "navLogo" => $settings["navLogo"]
  ];

  $data = $compact["data"][0];
  $college = $compact["college"][0];
  $country = $compact["country"][0];
  $faculty = $compact["faculty"][0];

  ?>
  <?php view("./layout/Student/navbar.php", compact("navbar")); ?>

  <?php $image = assets('Upload/Users/' . $data['image']); ?>


  <?php

  $docs = "<div id='main' style='margin: 0 !important; margin-top: 80px !important; display: flex; align-items: center; justify-content: center;'> <div style='width: 1000px; height: 500px;'> <div style='width: 100%; height: 300px; display: flex;'><div style='flex: 0 0 40%; max-width: 40%; width: 40%; display: flex; align-items: center; justify-content: center; flex-direction: column;'><img src='{$image}' style='height: 200px; width: 50%; border:3px solid #f1f1f1;'>
      <p style='font-size: 22px; font-weight: 600; margin-top: 5px;'>{$data["name"]}</p><div style='width: 100%; display: flex; align-items: center; justify-content: center; -moz-column-gap: 13px; column-gap: 13px;'> <a href='{$data["linkedin"]}' style='text-decoration: none;'><i class='fa-brands fa-linkedin' style='font-size: 18px; color:#444''></i></a>
        <a href='{$data["facebook"]}'style='text-decoration: none;'><i class='fa-brands fa-square-facebook'
            style='font-size: 18px; color:#444';></i></a>
        <a href='{$data["github"]}' style='text-decoration: none;'><i class='fa-brands fa-square-github'
            style='font-size: 18px; color:#444';'></i></a>
      </div>
    </div>
    <div style='flex: 0 0 60%; max-width: 60%; width: 60%;'>
      <div style='width: 100%; padding: 10px;'>
        <div
          style='color: rgb(180, 3, 3); font-size: 20px; font-weight: 900; margin: 5px 0px 5px 0px; position: relative;'>
          Education
        </div>
        <span style='font-size :16px;font-weight :600;'>College : </span>
        <span style='font-size :15px;font-weight :500;'>{$college["name"]}</span>
        <br>
        <span style='font-size :16px;font-weight :600;'>Department : </span>
        <span style='font-size :15px;font-weight :500;'>{$faculty["name"]}</span>
      </div>
      <div style='width :100%;padding :10px;'>
        <div style='color :rgb(180,3,3);font-size :20px;font-weight :900;margin :5px 0px;'>
          Others
        </div>
        <span style='font-size :16px;font-weight :600;'>Country :</span>
        <span style='font-size :15px;font-weight :500;'>{$country["name"]}</span><br>
        <span style='font-size :16px;font-weight :600;'>Email :</span>
        <span style='font-size :15px;font-weight :500;'>{$data["username"]}</span><br>
        <span style='font-size :16px;font-weight :600;'>Birt Date :</span>
        <span style='font-size :15px;font-weight :500;'>{$data["birth"]}</span><br>
        <span style='font-size :16px;font-weight :600;'>Blood Group :</span>
        <span style='font-size :15px;font-weight :500;'>{$data["blood"]}</span><br>
        <span style='font-size :16px;font-weight :600;'>Print :</span>
        <a id='print' href='' style='font-size: 16px; font-weight: 500; margin-top: 5px; color:green'><i class='fa-solid fa-print'></i></a>
      </div>
    </div>
  </div>
  <div style='height :200px;width :100%;padding :20px;'>
    <div style='width :100%;padding :10px;'>
      <div style='color :rgb(180,3,3);font-size :20px;font-weight :900;margin :5px 0px;'>
        About
      </div>
      <p style='font-size :16px;font-weight :500;'>{$data["bio"]}</p>
    </div>
  </div>
</div>
</div>";

  echo $docs;
  ?>
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