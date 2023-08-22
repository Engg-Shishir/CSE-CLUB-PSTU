<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event | Registration</title>
  <!-- CSS Part -->
  <?php view("layout/partials/backendLink.php") ?>
  <link rel="stylesheet" href="<?= assets('style/Frontend/Event/registration.css'); ?>" />
</head>

<body>
  <?php
  session_start();
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
  ?>
  <!-- Navigation Part -->
  <?php view("layout/navbar.php", compact("navbar")); ?>

  <div class="containers content">
    <div class="row support-row">
      <div class="col-md-2">
            <img class="gallery" id="output">
      </div>
      <div class="col-md-8">
       <?php view("components/flashMessage.php"); ?>
        <form action="<?= url("/signup/event"); ?>" method="POST" enctype="multipart/form-data">
          <div class="row m-0">
            <div class="col-md-6 m-0">
              <div class="form-group">
                <label>Profile Picturer</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image">
                    <label class="custom-file-label">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 m-0">
              <div class="form-group">
                <label for="exampleInputEmail1">Tranjection No</label>
                <input type="text" name="tranjection" class="form-control" placeholder="Payment Tranjection no">
              </div>
            </div>
          </div>

          <div class="row p-0 m-0">
            <div class="col-md-6 m-0">
              <div class="form-group">
                <label for=""><strong>Carnival</strong></label>
                <?= selectForm($compact["carnivals"], "", "select2  form-control carnival"); ?>
              </div>
            </div>
            <div class="col-md-6 m-0">
              <div class="form-group">
                <label for=""><strong>Event</strong></label>
                <?= selectForm([], "event_id", "select2  form-control eventSelect"); ?>
              </div>
            </div>
          </div>

          <div class="row p-0 m-0">
            <div class="col-md-6 m-0">
              <div class="form-group">
                <label for=""><strong>College</strong></label>
                <?= selectForm($compact["colleges"], "college_code", "select2  form-control"); ?>
              </div>
            </div>
            <div class="col-md-6 m-0">
              <div class="form-group">
                <label for="exampleInputEmail1">Student Id</label>
                <input type="text" name="student_id" class="form-control" placeholder="Enter SID">
              </div>
            </div>
          </div>


          <!-- <div class="row m-0">
            <div class="col-md-12 m-0">

            </div>
          </div> -->


          <div class="row m-0">
            <div class="col-md-6 m-0">
              <div class="form-group">
                <label>Naame</label>
                <input type="text" name="name" class="form-control" placeholder="Your name">
              </div>
            </div>
            <div class="col-md-6 m-0">
              <div class="form-group">
                <label for=""><strong>Education</strong></label>
                <select name="current_edu" class="select2  form-control">
                  <option value="">Current Education Status</option>
                  <?php
                  $edu = [
                    "undergaraduate" => "Undergaraduation",
                    "L1-s1" => "Level-1 : Semester-1",
                    "L1-s2" => "Level-1 : Semester-2",
                    "L2-s1" => "Level-2 : Semester-1",
                    "L2-s2" => "Level-2 : Semester-2",
                    "L3-s1" => "Level-3 : Semester-1",
                    "L3-s2" => "Level-3 : Semester-2",
                    "L4-s1" => "Level-4 : Semester-1",
                    "L4-s2" => "Level-4: Semester-2",
                    "postgraduate" => "Postgraduate"
                  ];

                  foreach ($edu as $key => $value) {
                    echo "<option value='" . $key . "'>" . $value . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>

          <div class="row m-0">
            <div class="col-md-6 m-0">
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Your email">
              </div>
            </div>
            <div class="col-md-6 m-0">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Your password">
              </div>
            </div>
          </div>


          <div class="row m-0">
            <div class="col-md-12 m-0">
              <div class="form-group">
                <input type="submit" class="form-control submit-btn" value="Registration">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-2"> </div>
    </div>

  </div>
  <?php view("layout/footer.php", compact("footer")); ?>
  <?php view("layout/partials/BackendScript.php") ?>
  <script src="<?= assets('js/registration.js'); ?>"></script>
  <script src="<?= assets('js/gallery.js'); ?>"></script>
</body>

</html>