<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notice | Insert</title>
  <!-- CSS Part -->
  <link rel="stylesheet" href="<?= assets('style/Backend/Admin/Static/gallery.css'); ?>" />
  <?php view("layout/partials/backendLink.php"); ?>


</head>

<body>
  <?php
  $navbar = $compact["settings"];
  $data = $compact["rulesData"][0];
  ?>
  <?php view("./layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">

    <div class="card-header" style="">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="reg-form">
            <?php view("components/flashMessage.php"); ?>

            <form action="<?= url('/admin/facultylaw') ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <level><b>Club Rules & Regulation</b></level>
                <textarea class="form-control summernote" name="description">
                    <?php
                    if (isset($data["description"]) && $data["description"] !== "")
                      echo $data["description"];
                    ?>
                  </textarea>
              </div>

              <div class="reg-btn-box">
                <a href="">
                  <button class="glowing-btn" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <?php
                    if (isset($data["description"]) && $data["description"] !== "")
                      echo "Update";
                    else
                      echo "Insert";
                    ?>
                  </button>
                </a>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    </div>

  </div>

  <?php view("layout/partials/backendScript.php"); ?>
<script src="<?= assets('js/gallery.js'); ?>"></script>

</body>

</html>