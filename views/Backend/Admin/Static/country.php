<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Country</title>

  <?php view("layout/partials/backendLink.php"); ?>
  <link rel="stylesheet" href="<?= assets('style/Backend/Admin/Static/country.css'); ?>" />
</head>

<body>
  <?php
  $navbar = $comapact["settings"];
  $data = $comapact["data"];
  ?>
  <?php view("./layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">

    <div class="card-header">
      <div class="row">
        <div class="col-md-7">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
                <th>Country Code</th>
                <th>Country Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $key => $item) {
                ?>
                <tr>
                  <td>
                    <?= $item["country_code"] ?>
                  </td>
                  <td>
                    <?= $item["name"] ?>
                  </td>
                  <td>
                    <a href="<?= url("/admin/country/delete/" . $item["country_code"]) ?>"
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
            <form action="<?= url("/admin/country"); ?>" method="POST" enctype="multipart/form-data">
              <div class="row row-input">
                <?= inputField("text", "country_code", "", "Contry code", "lg"); ?>
              </div>
              <div class="row row-input">
                <?= inputField("text", "name", "", "Country name", "lg"); ?>
              </div>
              <div class="reg-btn-box">
                <a href="">
                  <button class="glowing-btn" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Country
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