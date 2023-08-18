<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Events</title>
  <!-- CSS Part -->
  <?php view("layout/partials/backendLink.php"); ?>
  <link rel="stylesheet" href="<?= assets('pages/Admin/Static/country.css'); ?>" />
</head>

<body>
  <?php
  $settings = $compact["settings"];
  $navbar = [
    "navLogo" => $settings["navLogo"]
  ];
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
                <th>Start Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($compact["carnivals"] as $key => $item) {

                ?>
                <tr>
                  <td>
                    <a style="color:blue;">
                      <?= $item["title"] ?>
                    </a>
                  </td>
                  <td>
                    <?= $item["start"] ?>
                  </td>
                  <td>
                    <a href="<?= url("/admin/carnival/delete/" . $item["carnival_id"]) ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-trash"></i></a>
                    <a onclick='collegeEdit(<?= $item["carnival_id"] ?>);' class="btn btn-default btn-sm"><i
                        class="fa-solid fa-pen"></i></a>
                    <?php
                    if ($item["status"] == 1) {
                      ?>
                      <a href="<?= url("/admin/carnival/status/" . $item["carnival_id"]) ?>"
                        class="btn btn-default btn-sm"><i class="fa-solid fa-circle-check text-success" ></i></a>
                      <?php
                    } else {
                      ?>
                      <a href="<?= url("/admin/carnival/status/" . $item["carnival_id"]) ?>"
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
        <div class="col-md-4">
          <?php view("components/flashMessage.php"); ?>
          <form action="<?= url("/admin/carnivals"); ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Carnival Name</label>
                <input type="text" class="form-control" name="title" placeholder="Enter carnival name"
                  value="<?= ietp("title") ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Carnival Banner</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="banner">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Start Date</label>
                    <input type="date" class="form-control" name="start">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">End Date</label>
                    <input type="date" class="form-control" name="end">
                  </div>
                </div>
              </div>
            </div>

            <div class="card-footer">
              <div class="row">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php view("layout/partials/backendScript.php"); ?>

</body>

</html>