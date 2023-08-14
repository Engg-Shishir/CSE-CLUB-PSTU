<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notice | Insert</title>
  <!-- CSS Part -->
  <?php view("pages/Admin/Static/links.php"); ?>
  <link rel="stylesheet" href="<?= assets('pages/Admin/Static/gallery.css'); ?>" />
</head>

<body>
<?php
    $navbar = $compact["settings"];
    $data = $compact["data"];
  ?>
  <?php view("./layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">

    <div class="card-header" style="">
      <div class="row">
        <div class="col-md-7 d-flex flex-wrap">
          <?php
          foreach ($data as $key => $value) {
            ?>
            <div class="imagebox"
              style="height:220px; width:220px;position:relative; margin-left:10px;  margin-top:30px;">
              <img src="<?= assets("Upload/About/" . $value["image"]) ?>" alt="" width="200" height="200"
                tyle="color:red; text-align:center; position:absolute; left:100%; top:50%;">
              <a href="<?= url("/admin/home/about/delete/" . $value["slider_id"]) ?>"
                style="color:white; text-align:center; position:absolute; left:0; top:-15%; background-color:#a50c0c; font-weight:500; padding:5px;">Delete
                - <?= $value["image"] ?></a>
            </div>
            <?php
          }
          ?>
        </div>
        <div class="col-md-5">
          <div class="imageBox">
            <div class="image">
              <img class="gallery" id="output" />
              <!-- <div class="gallery"></div> -->
            </div>
          </div>
          <div class="reg-form">
            <?php view("components/flashMessage.php"); ?>

            <form action="<?= url("/admin/home/about"); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Chose jpg Image</label>
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile" accept="image/*" <?php echo (count($data) == 5) ? 'disabled' : ''; ?>>
                    <label id="fileLevel" class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">File title</label>
                <input name="des" type="text" class="form-control" id="exampleInputEmail1" placeholder="one/two/three/four/five" <?php echo (count($data) == 5) ? 'disabled' : ''; ?>>
              </div>
              <input type="hidden" name="imageCount" value="<?= count($data) ?>">

              <div class="reg-btn-box">
                <a href="">
                  <button class="glowing-btn" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Insert
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
  <script src="<?= assets('pages/Admin/Static/gallery.js'); ?>"></script>

</body>

</html>