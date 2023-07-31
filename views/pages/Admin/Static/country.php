<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Country</title>
  <!-- CSS Part -->
  <?php view("pages/Admin/Static/links.php"); ?>
</head>

<body>

  <!-- Navigation Part -->
  <?php view("./layout/Admin/navbar.php"); ?>
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
                    <a href="<?=  url("/admin/country/delete/".$item["country_code"]) ?>" class="btn btn-danger btn-sm">Delete</a>
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
  <!-- Javacript Part -->
  <?php view("pages/Admin/Static/scripts.php"); ?>
</body>

</html>