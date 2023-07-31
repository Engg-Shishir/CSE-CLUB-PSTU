<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | College</title>
  <!-- CSS Part -->
  <?php view("pages/Admin/Static/links.php"); ?>
  <link rel="stylesheet" href="<?= assets('pages/Admin/Static/city.css'); ?>" />
</head>

<body>

  <!-- Navigation Part -->
  <?php view("./layout/Admin/navbar.php"); ?>
  <div class="containers content">

    <div class="card-header" style="background-color:none !important;">
      <div class="row">
        <div class="col-md-7">
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
              foreach ($data["colleges"] as $key => $item) {
                  
                ?>
                <tr>
                  <td>
                    <?= $item["name"] ?>
                  </td>
                  <td>
                    <?= $item["college_code"] ?>
                  </td>
                  <td>
                    <?= $item["CN"] ?>
                  </td>
                  <td>
                    <a href="<?= url("/admin/college/delete/" . $item["college_code"]) ?>"
                      class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="col-md-5">
          <div class="reg-form">
            <?php view("components/flashMessage.php"); ?>
            <form action="<?= url("/admin/college"); ?>" method="POST" enctype="multipart/form-data">

               <?php  $data[2] = $data["countrys"]; ?>
              <div class="form-group small p-0">
                <?= selectForm($data[2], "country_code", "select2 country-select"); ?>
              </div>
              <div class="row row-input">
                <?= inputField("text", "college_code", "", "College Code", "lg postal-code-input"); ?>
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
  <?php view("pages/Admin/Static/scripts.php"); ?>
</body>

</html>