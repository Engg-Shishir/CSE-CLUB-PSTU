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
  <!-- Navigation Part -->
  <?php view("./layout/Admin/navbar.php"); ?>
  <div class="containers content">

    <div class="card-header" style="">
      <div class="row">
        <div class="col-md-7">
          <div class="imagebox" style="height:220px; width:220px;position:relative;">
             <img src="<?=  assets("Upload/About/passport.jpg")  ?>" alt="" width="200" height="200" tyle="color:red; text-align:center; position:absolute; left:100%; top:50%;">
             <a href="" style="color:black; text-align:center; position:absolute; right:0; top:0; background-color:red; font-weight:500;">Delete</a>
          </div>
        </div>
        <div class="col-md-5">
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
                  echo '<input type="hidden" name="old_file" value="'.$data["title"].'">';
                ?>
                
                <div class="input-group">

                </div>
              </div>
              <div class="form-group">
                <level><b>About Text</b></level>
                <?php
                  if (isset($data["title"]) && $data["title"] !==""){
                    echo"<textarea name='title' class='form-control' name='title'>".$data["title"]."</textarea>";
                  }else{
                    echo"<textarea name='title' class='form-control' name='title'></textarea>";
                  }
                ?>
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
      </div>
    </div>

  </div>
  <!-- Javacript Part -->
  <?php view("pages/Admin/Static/scripts.php"); ?>
  <script src="<?= assets('pages/Admin/Static/gallery.js'); ?>"></script>

</body>

</html>