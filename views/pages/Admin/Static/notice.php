<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Notice</title>
  <!-- CSS Part -->
  <?php view("pages/Admin/Static/links.php"); ?>
  <link rel="stylesheet" href="<?= assets('pages/Admin/Static/gallery.css'); ?>" />
</head>

<body>

  <?php
    $navbar = $compact["settings"];
    $data = $compact["data"];
  ?>
  <?php view("./layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">

    <div class="card-header" style="">

      <?php view("components/flashMessage.php"); ?>
      <div class="row">
        <div class="col-md-12" style="">
          <table id="example" class="table table-hoverable">
            <thead>
              <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $key => $item) {
                ?>
                <tr>
                  <td>
                    <?= $item["title"] ?>
                  </td>
                  <td>
                    <p class="card-text mb-auto">
                      <?= nl2br(add_root_to_images($item["des"])) ?>
                    </p>
                  </td>
                  <td>
                    <a href="<?= url("/admin/notice/delete/" . $item["notice_id"]) ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-trash"></i></a>
                    <a target="_blank" href="<?= url("/admin/notice/edit/" . $item["notice_id"]) ?>"
                      class="btn btn-default btn-sm text-success"><i class="fa-solid fa-pen"></i></a>
                    <a target="_blank" href="<?= assets("Upload/Notice/" . $item["file_source"]) ?>"
                      class="btn btn-default btn-sm text-success"><i class="fa-solid fa-file"></i></a>
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
  <!-- Javacript Part -->
  <?php view("pages/Admin/Static/scripts.php"); ?>
  <script src="<?= assets('pages/Admin/Static/gallery.js'); ?>"></script>

</body>

</html>