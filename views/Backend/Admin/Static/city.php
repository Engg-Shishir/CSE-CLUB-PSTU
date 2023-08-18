<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | City</title>
  <!-- CSS Part -->
  <?php view("layout/partials/backendLink.php"); ?>
  <link rel="stylesheet" href="<?= assets('style/Backend/Admin/Static/city.css'); ?>" />
</head>

<body>
  <?php
  $navbar = $compact["settings"];
  $citys = $compact["citys"];
  $countrys = $compact["countrys"];
  ?>
  <?php view("./layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">

    <div class="card-header" style="background-color:none !important;">
      <div class="row">
        <div class="col-md-7">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
                <th>City Name</th>
                <th>Postal Code</th>
                <th>Country Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($citys as $key => $item) {

                ?>
                <tr>
                  <td>
                    <?= $item["name"] ?>
                  </td>
                  <td>
                    <?= $item["postal_code"] ?>
                  </td>
                  <td>
                    <?= $item["CN"] ?>
                  </td>
                  <td>
                    <a href="<?= url("/admin/city/delete/" . $item["postal_code"]) ?>"
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
            <form action="<?= url("/admin/city"); ?>" method="POST" enctype="multipart/form-data">

              <div class="form-group small p-0">
                <?= selectForm($countrys, "country_code", "select2 country-select"); ?>
              </div>
              <div class="row row-input">
                <?= inputField("text", "postal_code", "", "Postal Colde", "lg postal-code-input"); ?>
              </div>
              <div class="row row-input">
                <?= inputField("text", "name", "", "City name", "lg"); ?>
              </div>
              <div class="reg-btn-box">
                <a href="">
                  <button class="glowing-btn" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    City
                  </button>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <?php view("layout/partials/backendScript.php"); ?>
</body>

</html>