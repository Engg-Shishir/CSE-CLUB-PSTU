

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CLUB | Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= assets('pages/UserDetails/details.css'); ?>" />
  <style>
    .footerBox{
      margin-top: 300px ;
    }
  </style>
</head>

<body>
  <?php
  $settings = $compact["settings"][0];
  $footer = [
    "navLogo" => $settings["navLogo"],
    "short_des" => $settings["short_des"],
    "copyright" => $settings["copyright"]
  ];
  $navbar = [
    "navLogo" => $settings["navLogo"],
    "carnival" => [$settings["carTitle"], $settings["carSlug"]],
    "carnivals" => $compact["carnivals"]
  ];
  $countrys = $compact["countrys"];
  $colleges = $compact["colleges"];
  $facultys = $compact["facultys"];
  ?>
  <!-- Navigation Part -->
  <?php view("./layout/navbar.php", compact("navbar")); ?>
  <div class="containers content"  style="margin-top:90px !important">
    <div class="row m-0">
      <div class="col-md-12">
      <?php view("components/flashMessage.php"); ?>
      <form action="<?= url("/userdetails"); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user_id"
              value="<?php if (isset($_SESSION["auth_id"])) {
                echo $_SESSION["auth_id"];
              } ?>">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Full Name <span class="must">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Enter event name"
                      value="<?= ietp("name") ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group small p-0">
                    <label for="">Select Country <span class="must">*</span></label>
                    <?= selectForm($countrys, "country_code", "select2 details-select"); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group small p-0">
                    <label for="">Select Gender <span class="must">*</span></label>
                    <select name="gender" id="" class="select2 details-select">
                      <option value="">Select Option</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center align-items-center">
                  <img height="100px" width="100px" class="gallery" id="output">
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group small p-0">
                    <label for="">Blood group <span class="must">*</span></label>
                    <select name="blood" id="" class="select2 details-select">
                      <option value="">Select Option</option>
                      <option value="A+">A+</option>
                      <option value="B+">B+</option>
                      <option value="A-">A-</option>
                      <option value="B-">B-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Birth date <span class="must">*</span></label>
                    <input type="date" class="form-control" name="birth" placeholder="Birth date"
                      value="<?= ietp("birth") ?>">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Nid</label>
                    <input type="text" class="form-control" name="nid" placeholder="National Id no"
                      value="<?= ietp("nid") ?>">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputFile">Profile Picture <span class="must">*</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image">
                        <label id="fileLevel" class="custom-file-label" for="exampleInputFile">Choose Profile</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Facebook</label>
                    <input type="text" class="form-control" name="facebook" placeholder="facebook profile link"
                      value="<?= ietp("facebook") ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Linkedin <span class="must">*</span></label>
                    <input type="text" class="form-control" name="linkedin" placeholder="Linkedin profile link"
                      value="<?= ietp("linkedin") ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Github</label>
                    <input type="text" class="form-control" name="github" placeholder="Github profile link"
                      value="<?= ietp("github") ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group small p-0">
                    <label for="">College <span class="must">*</span></label>
                    <?= selectForm($colleges, "college", "select2 details-select"); ?>
                  </div>
                </div> 

                <div class="col-md-4">
                  <div class="form-group small p-0">
                    <label for="">Department <span class="must">*</span></label>
                    <?= selectForm($facultys, "facultys", "select2 details-select"); ?>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Student Id <span class="must">*</span></label>
                    <input type="text" class="form-control" name="sid" placeholder="Student Id"
                      value="<?= ietp("sid") ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">About Yourself <span class="must">*</span></label>
                    <textarea class="form-control" name="bio" rows="3" placeholder="About yourself"><?= ietp("bio") ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </form>
      </div>
    </div>
  </div>
  <div class="footerBox">
    <?php view("layout/footer.php", compact("footer")); ?>
  </div>
  <?php view("layout/footer.php", compact("footer")); ?>
  <!-- Javacript Part -->
  <?php view("pages/Login/scripts.php"); ?>
  <?php view("pages/Admin/Static/scripts.php"); ?>


  <script src="<?= assets('pages/Admin/Static/gallery.js'); ?>"></script>
</body>

</html>