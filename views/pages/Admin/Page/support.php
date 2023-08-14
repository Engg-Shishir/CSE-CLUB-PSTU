<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Support</title>
  <!-- CSS Part -->
  <?php view("pages/Admin/Events/partials/links.php"); ?>
  <link rel="stylesheet" href="<?= assets('pages/Admin/Static/country.css'); ?>" />
  <link rel="stylesheet" href="<?= assets('pages/Admin/Events/eventsCard.css'); ?>" />
</head>

<body>
<?php
    $navbar = $compact["settings"];
    $data = $compact["data"];
  ?>
  <?php view("./layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">

    <div class="card-header">
      <div class="row">
        <div class="col-md-10">
        </div>
        <div class="col-md-2 d-flex justify-content-end">
          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#eventCategoryAddModal"
            data-backdrop="static" id="ok">Category +</button>
        </div>
      </div>
    </div>

    <div class="card-header">
      <div class="row">
        <?php
        foreach ($data as $key => $value) { ?>
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <div class="d-flex flex-md-column">
                  <strong>
                    <?= $value["title"] ?>
                  </strong>
                </div>
                <div>
                  <?php
                  if ($value["status"] == 1) { ?>
                    <a href="<?= url("/admin/event/category/status/" . $value["id"]) ?>"
                      class="btn btn-default btn-sm text-success"><i class="fa-solid fa-circle-check"></i></a>
                  <?php } else { ?>
                    <a href="<?= url("/admin/event/category/status/" . $value["id"]) ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-skull-crossbones"></i></a>
                  <?php }
                  ?>
                  <a href="<?= url("/admin/event/category/delete/" . $value["id"]) ?>" class="text-danger btn btn-default"><i class="fa-solid fa-trash"></i></a>
                </div>
              </div>
              <div class="card-body d-flex justify-content-center" style="background-color:#f7f7f7;">
                  <img src="<?= assets("Upload/Sponsor-Category/".$value["image"]) ?>" alt="" height="250px" width="250px">
              </div>
            </div>
          </div>
        <?php }
        ?>

      </div>
    </div>

    <!-- Javacript Part -->
  </div>

  <?php view("pages/Admin/Page/partials/scripts.php"); ?>

  <?php
  if (isset($_SESSION["error_message"]) && $_SESSION["error_message"] !== "") { ?>
    <script>
      $(function () {
        $('#eventCategoryAddModal').modal('show');
      });
    </script>
    <?php
  }
  ?>


  <?php view("pages/Admin/Page/partials/addEventCategory.php"); ?>





  <script>
    $(document).ready(function () {
      $('#ok').on("click", function () {
        $("#eventCategoryAddModal").modal("toggle");
      })
    })
  </script>
  <script src="<?= assets('pages/Admin/Settings/image.js'); ?>"></script>

</body>

</html>