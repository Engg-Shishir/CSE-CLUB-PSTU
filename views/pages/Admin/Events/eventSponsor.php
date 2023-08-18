<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Events</title>
  <!-- CSS Part -->
  <?php view("layout/partials/backendLink.php"); ?>
  <link rel="stylesheet" href="<?= assets('pages/Admin/Static/college.css'); ?>" />
  <style>
    .select2{
      width: 100% !important;
    }
    .select2.select2-container{
      width: 100% !important;
    }
  </style>
</head>

<body>
  <?php
  $settings = $compact["settings"];
  $navbar = [
    "navLogo" => $settings["navLogo"]
  ];
  // if(count($compact["data"]) > 0)
  //   $data = $compact["data"];
  // else $data=[];
  $data = $compact["data"];
  $carnivals = $compact["carnivals"];
  $collaborators = $compact["collaborators"];
  ?>
  <?php view("./layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">

    <div class="card-header" style="background-color:none !important;">
      <div class="row">
        <div class="col-md-8" style="border-right:2px solid #383d59;">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
                <th>Carnival</th>
                <th>Sponsor</th>
                <th>Function</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $key => $item) {

                ?>
                <tr>
                  <td>
                    <a href="<?= url("/admin/carnivals/".$item["slug"]) ?>" style="color:blue;">
                      <?= $item["title"] ?>
                    </a>
                  </td>
                  <td>
                    <a href="<?= $item["web"] ?>" target="_blank" style="color:blue;">
                       <?= $item["name"] ?>
                    </a>
                  </td>
                  <td>
                    <?= $item["function"] ?>
                  </td>
                  <td>
                    <a href="<?= url("/admin/carnivals/delete/") ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-trash"></i></a>
                    <a onclick='collegeEdit();' class="btn btn-default btn-sm"><i
                        class="fa-solid fa-pen"></i></a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="col-md-4">
          <div class="editBox"></div>
          <div class="reg-form">
            <?php view("components/flashMessage.php"); ?>
            <form action="<?= url("/admin/events/sponsor"); ?>" method="POST" enctype="multipart/form-data">

              <div class="form-group mb-4">
                <label for="" class="mb-0"></label>Select Carnival</label>
                <?= selectForm($carnivals, "carnival_id", "select2"); ?>
              </div>
              
              <div class="form-group mb-4">
                <label for="" class="mb-0">Select Sponsor</label>
                <?= selectForm($collaborators, "colla_id", "select2"); ?>
              </div>
              
              <div class="form-group">
                <input type="text" class="form-control" name="function" placeholder="Enter function" value="<?= ietp("function") ?>">
              </div>

              <div class="reg-btn-box">
                <a href="">
                  <button class="glowing-btn" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Sponsor
                  </button>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php view("layout/partials/backendScript.php"); ?>

</body>

</html>