<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | College</title>
  <!-- CSS Part -->
  <?php view("layout/partials/backendLink.php"); ?>
  <link rel="stylesheet" href="<?= assets('pages/Admin/Static/college.css'); ?>" />
</head>

<body>

  <?php
    $navbar = $compact["settings"];
    $colleges = $compact["colleges"];
    $countrys = $compact["countrys"];
  ?>
  <?php view("./layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">

    <div class="card-header" style="background-color:none !important;">
      <div class="row">
        <div class="col-md-8" style="border-right:2px solid #383d59;">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
                <th>College</th>
                <th>College Code</th>
                <th>Country</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ( $colleges as $key => $item) {
                  
                ?>
                <tr>
                  <td>
                    <a style="color:blue;" href="<?= $item["website"] ?>"><?= $item["name"] ?></a>
                  </td>
                  <td>
                    <?= $item["college_code"] ?>
                  </td>
                  <td>
                    <?= $item["CN"] ?>
                  </td>
                  <td>
                    <a href="<?= url("/admin/college/delete/" . $item["college_code"]) ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-trash"></i></a>
                    <a onclick='collegeEdit(<?= $item["college_code"]  ?>);' class="btn btn-default btn-sm"><i class="fa-solid fa-pen"></i></a>
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
            <form action="<?= url("/admin/college"); ?>" method="POST" enctype="multipart/form-data">

              <div class="form-group small p-0">
                <?= selectForm($countrys, "country_code", "select2 country-select"); ?>
              </div>
              <div class="row row-input">
                <?= inputField("text", "college_code", "", "College Code", "lg postal-code-input"); ?>
              </div>
              <div class="row row-input">
                <?= inputField("text", "website", "", "College Website Link", "lg"); ?>
              </div>
              <div class="row row-input">
                <?= inputField("text", "name", "", "College name", "lg"); ?>
              </div>
              <div class="reg-btn-box">
                <a href="">
                  <button class="glowing-btn" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    College
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
  <?php view("layout/partials/backendScript.php"); ?>
</body>

</html>