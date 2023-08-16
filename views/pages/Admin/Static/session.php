<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Session</title>
  <!-- CSS Part -->
  <?php view("pages/Admin/Static/links.php"); ?>
  <link rel="stylesheet" href="<?= assets('pages/Admin/Static/college.css'); ?>" />
</head>

<body>

  <?php
    $navbar = $compact["settings"];
    $data = $compact["data"];
  ?>
  <?php view("./layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">

    <div class="card-header" style="background-color:none !important;">
      <div class="row">
        <div class="col-md-8" style="border-right:2px solid #383d59;">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
                <th>Session</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $key => $item) {
                ?>
                <tr>
                  <td>
                    <?= $item["session"] ?>
                  </td>
                  <td>
                    <a href="<?= url("/admin/session/delete/" . $item["session_id"]) ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-trash"></i></a>
                    <a onclick='sessionEdit(<?= $item["session_id"] ?>);' class="btn btn-default btn-sm"><i
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
            <form action="<?= url("/admin/session"); ?>" method="POST" enctype="multipart/form-data">

              <div class="row row-input">
                <?= inputField("text", "session", "", "2018-2019", "lg postal-code-input"); ?>
              </div>
              <div class="reg-btn-box">
                <a href="">
                  <button class="glowing-btn" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Session
                  </button>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- Javacript Part -->
  <?php view("pages/Admin/Static/scripts.php"); ?>
</body>

</html>