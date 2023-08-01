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

  <!-- Navigation Part -->
  <?php view("./layout/Admin/navbar.php"); ?>
  <div class="containers content">

    <div class="card-header" style="">
    
    <?php view("components/flashMessage.php"); ?>
      <div class="row">
        <div class="col-md-12" style="">
          <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb float-end" style="display:flex;align-item:center;justify-content:end;">
              <li class=" float-end">
                 <a href="<?= url("/admin/notice/insert"); ?>" class="btn btn-md btn-light  float-end">Insert</a>
              </li>
            </ol>
          </nav> -->
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
                    <?= $item["des"] ?>
                  </td>
                  <td>
                    <a href="<?= url("/admin/notice/delete/" . $item["notice_id"]) ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-trash"></i></a>
                    <a target="_blank" href="<?= $item["file_source"] ?>" class="btn btn-default btn-sm text-success"><i
                        class="fa-solid fa-eye"></i></a>
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