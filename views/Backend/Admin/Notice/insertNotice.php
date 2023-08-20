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
  ?>
  <?php view("./layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">

    <div class="card-header" style="">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="reg-form">
            <?php view("components/flashMessage.php"); ?>
            <?php
            $url = "/admin/notice";
            if (isset($data["title"]) && $data["title"] !== "")
              $url = "/admin/notice/update";
            ?>
            <form action="<?= url($url); ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <?php
                if (isset($data["title"]) && $data["title"] !== "")
                  echo '<input type="hidden" name="old_file" value="' . $data["file_source"] . '">';
                ?>
                <?php
                if (isset($data["notice_id"]) && $data["notice_id"] !== "")
                  echo '<input type="hidden" name="notice_id" value="' . $data["notice_id"] . '">';
                ?>
              </div>
              <div class="form-group">
                <level><b>Notice File</b></level>
                <div class="custom-file">
                  <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                  <label id="fileLevel" class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
              </div>
              <div class="form-group">
                <level><b>Notice Title</b></level>
                <?php
                if (isset($data["title"]) && $data["title"] !== "") {
                  echo "<textarea name='title' class='form-control' name='title'>" . $data["title"] . "</textarea>";
                } else {
                  echo "<textarea name='title' class='form-control' name='title'></textarea>";
                }
                ?>

              </div>
              <div class="form-group">
                <level><b>Notice Description</b></level>
                <textarea name="des" class="form-control summernote" name="description">
                    <?php
                    if (isset($data["title"]) && $data["title"] !== "")
                      echo $data["des"];
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
                    if (isset($data["title"]) && $data["title"] !== "")
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
  <script src="<?= assets('Backend/Admin/Static/gallery.js'); ?>"></script>
  <?php view("layout/partials/backendScript.php"); ?>

</body>

</html>