<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Faculty</title>
  <!-- CSS Part -->
  <?php view("pages/Admin/Static/links.php"); ?>
  <link rel="stylesheet" href="<?= assets('pages/Admin/Static/college.css'); ?>" />
</head>

<body>

  <!-- Navigation Part -->
  <?php view("./layout/Admin/navbar.php"); ?>
  <div class="containers content">

    <div class="card-header" style="background-color:none !important;">
      <div class="row">
        <div class="col-md-8" style="border-right:2px solid #383d59;">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
                <th>Faculty</th>
                <th>Faculty Code</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $key => $item) {
                ?>
                <tr>
                  <td>
                    <?= $item["name"] ?>
                  </td>
                  <td>
                    <?= $item["fac_code"] ?>
                  </td>
                  <td>
                    <a href="<?= url("/admin/faculty/delete/" . $item["fac_id"]) ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-trash"></i></a>
                    <a onclick='facultyEdit(<?= $item["fac_id"]  ?>);' class="btn btn-default btn-sm"><i class="fa-solid fa-pen"></i></a>
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
            <form action="<?= url("/admin/faculty"); ?>" method="POST" enctype="multipart/form-data">

              <div class="row row-input">
                <?= inputField("text", "fac_code", "", "Faculty Code", "lg postal-code-input"); ?>
              </div>
              <div class="row row-input">
                <?= inputField("text", "name", "", "Faculty name", "lg"); ?>
              </div>
              <div class="reg-btn-box">
                <a href="">
                  <button class="glowing-btn" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Faculty
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