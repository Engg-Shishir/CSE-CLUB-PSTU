<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Country</title>
  <!-- CSS Part -->
  <?php view("pages/Admin/Partners/partials/links.php"); ?>
  <link rel="stylesheet" href="<?= assets('pages/Admin/Static/country.css'); ?>" />
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
        <div class="col-md-10"> </div>
        <div class="col-md-2">
          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal"
            data-backdrop="static" id="ok">Add Partners</button>
        </div>
      </div>
    </div>

    <div class="card-header">
      <div class="row">
        <div class="col-md-12">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Details</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $key => $item) { ?>
                <tr>
                  <td>
                    <a href="<?= $item["web"]; ?>" target="_blank"><img width="100px" height="100px"
                        src="<?= assets("Upload/Partners/" . $item["image"]) ?>" alt=""></a>
                  </td>
                  <td>
                    <?= $item["name"] ?>
                  </td>
                  <td>
                    <?= $item["email"] ?>
                  </td>
                  <td>
                    <?= $item["description"] ?>
                  </td>
                  <td>
                    <?php
                    if ($item["status"] == 1) { ?>
                      <a href="<?= url("/admin/partner/status/" . $item["colla_id"]) ?>"
                        class="btn btn-default btn-sm text-success"><i class="fa-solid fa-circle-check"></i></a>
                    <?php }else{ ?>
                      <a href="<?= url("/admin/partner/status/" . $item["colla_id"]) ?>"
                        class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-skull-crossbones"></i></a>
                    <?php }
                    ?>
                    <a onclick='collegeEdit(<?= $item["colla_id"] ?>);' class="btn btn-default btn-sm"><i
                        class="fa-solid fa-pen"></i></a>
                  </td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Javacript Part -->
  </div>




  <?php view("pages/Admin/Partners/partials/scripts.php"); ?>

  <?php
  if (isset($_SESSION["error_message"]) && $_SESSION["error_message"] !== "") { ?>
    <script>
      $(function () {
        $('#exampleModal').modal('show');
      });
    </script>
    <?php
  }
  ?>


  <?php view("pages/Admin/Partners/partials/addPartner.php"); ?>





  <script>
    $(document).ready(function () {
      $('#ok').on("click", function () {
        $("#exampleModal").modal("toggle");
      })
    })
  </script>
</body>

</html>