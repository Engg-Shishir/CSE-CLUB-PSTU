<div class="reg-form">
  <form action="<?= url("/joinuss"); ?>" method="POST" enctype="multipart/form-data">
    <!--inputField();
    * @param mixed $type
    * @param mixed $name
    * @param mixed $value
    * @param mixed $placeholder
    * @param mixed $class -->
    <!--inputField("hidden", "_token", shishirEnv("APP_KEY"));-->
    <div class="row row-input">
      <?= inputField("text", "username", "", "Username", "lg"); ?>
    </div>
    <div class="row row-input">
      <?= inputField("text", "fname", "", "First Name", "small"); ?>
      <?= inputField("text", "lname", "", "Last Name", "small"); ?>
    </div>
    <div class="row row-input">
      <?= inputField("email", "email", "", "Email", "lg"); ?>
    </div>
    <div class="row row-input">
      <div class="form-group lg p-0">
        <?= level("College", "college"); ?>
        <?= selectForm($data[0], "college", "form-control select2"); ?>
      </div>
    </div>

    <div class="row row-input">
      <div class="form-group small p-0">
        <?= level("Depertment", "department"); ?>
        <?= selectForm($data[1], "department", "form-control select2"); ?>
      </div>
      <div class="form-group small p-0">
        <?= level("Your Role", "position"); ?>
        <?= selectForm($data[2], "position", "form-control select2"); ?>
      </div>
    </div>
    <div class="row row-input">
      <div class="form-group small p-0">
        <?= level("Academic Session", "session"); ?>
        <?= selectForm($data[3], "session", "form-control select2"); ?>
      </div>
      <div class="form-group small p-0">
        <?= level("Blood Groups", "blood"); ?>
        <?= selectForm($data[4], "blood", "form-control select2"); ?>
      </div>
    </div>

    <div class="form-group pl-2 pr-4">
      <div class="custom-file">
        <input type="file" class="custom-file-input"  onchange="" id="file">
        <label class="custom-file-label" for="customFile">Choose photo</label>
      </div>
    </div>


    <div class="row row-input">
      <div class="alert alert-warning alert-dismissible fade show w-78" style="display:none" id="imagealert">
        <strong>Holy guacamole!</strong>
      </div>
    </div>
    <?php if (isset($_SESSION["imageerror"])) {
      echo '<div class="row row-input"><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>' . $_SESSION["imageerror"] . '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>';
      unset($_SESSION["imageerror"]);
    } ?>

    <div class="row row-input lg">
      <label for="" style="margin-left:20px;">Birth date</label>
      <?= inputField("date", "birth", "", "", "lg"); ?>
    </div>
    <div class="row row-input">
      <?= inputField("text", "sid", "", "Student ID", "small"); ?>
      <?= inputField("text", "contact", "", "+880", "small"); ?>
    </div>
    <div class="row row-input">
      <?= inputField("text", "linkedin", "", "Linkedin username", "small"); ?>
      <?= inputField("text", "website", "", "Website url", "small"); ?>
    </div>
    <div class="row row-input">
      <?= textArea("about", "", "About yourself", "lg"); ?>
    </div>
    <div class="row row-input">
      <?= inputField("password", "password", "", "Ppassword", "small"); ?>
      <!-- inputField("password", "cpassword", "", "Repeat Password", "small"); -->
    </div>
    <div class="row px-5">
      <div class="flex-row">
        <p>Already account ? please </p>
        <a href="<?= url("/login") ?>">Signin</a>
      </div>
    </div>
    <div class="reg-btn-box">
      <button class="glowing-btn" type="submit">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        SignUp
      </button>
    </div>
  </form>
</div>