<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Projects</title>
  <!-- CSS Part -->
  <?php view("pages/Admin/Projects/partials/links.php"); ?>
  <link rel="stylesheet" href="<?= assets('pages/Admin/Static/country.css'); ?>" />
</head>

<body>

  <!-- Navigation Part -->
  <?php view("./layout/Admin/navbar.php"); ?>
  <div class="containers content">

    <div class="card-header">
      <div class="row">
        <div class="col-md-10"> </div>
        <div class="col-md-2">
          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal"
            data-backdrop="static" id="ok">Add Projects</button>
        </div>
      </div>
    </div>

    <div class="card-header">
      <div class="row">
        <div class="col-md-12">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
                <th>Logo</th>
                <th>Title</th>
                <th>Details</th>
                <th>Author</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $key => $item) { ?>
                <tr>
                  <td>
                  <img width="100px" height="100px"
                        src="<?= assets("Upload/Projects/" . $item["logo"]) ?>" alt="">
                  </td>
                  <td>
                    <?= $item["title"] ?>
                  </td>
                  <td>
                    <?= $item["description"] ?>
                  </td>
                  <td>
                    <a href="<?= url("/admin/projects") ?>" class="text-info"><?= $item["name"] ?></a>
                  </td>
                  <td>
                    <?php
                    if ($item["status"] == 1) { ?>
                      <a href="<?= url("/admin/project/status/" . $item["project_id"]) ?>"
                        class="btn btn-default btn-sm text-success"><i class="fa-solid fa-circle-check"></i></a>
                    <?php }else{ ?>
                      <a href="<?= url("/admin/project/status/" . $item["project_id"]) ?>"
                        class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-skull-crossbones"></i></a>
                    <?php }
                    ?>
                    <a onclick='collegeEdit(<?= $item["project_id"] ?>);' class="btn btn-default btn-sm"><i
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




  <?php view("pages/Admin/Projects/partials/scripts.php"); ?>

  <?php
  if (isset($_SESSION["error_message"]) && $_SESSION["error_message"] !== "") { ?>
    <script>
      $(function () {
        $('#projectAddModal').modal('show');
      });
    </script>
    <?php
  }
  ?>


  <?php view("pages/Admin/Projects/partials/addProject.php"); ?>





  <script>
    $(document).ready(function () {
      $('#ok').on("click", function () {
        $("#projectAddModal").modal("toggle");
      })
    })
  </script>
</body>

</html>