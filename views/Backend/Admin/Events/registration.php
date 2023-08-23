<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Events</title>
  <!-- CSS Part -->
  <?php view("layout/partials/backendLink.php"); ?>
  <link rel="stylesheet" href="<?= assets('style/Backend/Admin/Static/country.css'); ?>" />
</head>

<body>
  <?php
    session_start();
  $settings = $compact["settings"];
  $navbar = [
    "navLogo" => $settings["navLogo"]
  ];
  ?>
  <?php view("layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">
    <div class="card-header" style="background-color:none !important;">
      <div class="row">
        <div class="col-md-12">
            <?php view("components/flashMessage.php"); ?>
          <table id="example" class="table table-striped">
            <thead>
              <tr>
                <th>Carnival</th>
                <th>Event</th>
                <th>Name</th>
                <th>SID</th>
                <th>Education</th>
                <th>Transection</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($compact["data"] as $key => $item) {

                ?>
                <tr>
                  <td>
                    <a style="color:blue;">
                      <?= $item["title"] ?>
                    </a>
                  </td>
                  <td>
                    <?= $item["event_name"] ?>
                  </td>
                  <td>
                    <?= $item["name"] ?>
                  </td>
                  <td>
                    <?= $item["student_id"] ?>
                  </td>
                  <td>
                    <?= $item["current_edu"] ?>
                  </td>
                  <td>
                    <?= $item["tranjection"] ?>
                  </td>
                  <td>
                    <a href="<?= url("/admin/event/registration/delete/" . $item["reg_id"]) ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-trash"></i></a>
                    <?php
                    if ($item["status"] == 1) {
                      ?>
                      <a href="<?= url("/admin/event/registration/status/" . $item["reg_id"]) ?>"
                        class="btn btn-default btn-sm"><i class="fa-solid fa-circle-check text-success" ></i></a>
                      <?php
                    } else {
                      ?>
                      <a href="<?= url("/admin/event/registration/status/" . $item["reg_id"]) ?>"
                        class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-circle-check"></i></a>
                      <?php
                    }
                    ?>
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
  </div>
  <?php view("layout/partials/backendScript.php"); ?>

</body>

</html>