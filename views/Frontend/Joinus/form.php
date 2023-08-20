<div class="reg-form">
  <?php view("components/flashMessage.php"); ?>
  <form action="<?= url("/joinus"); ?>" method="POST" enctype="multipart/form-data">
    <!--inputField();
    * @param mixed $type
    * @param mixed $name
    * @param mixed $value
    * @param mixed $placeholder
    * @param mixed $class -->
    
    <div class="row row-input">
      <?= inputField("email", "username", "", "Email", "lg"); ?>
    </div>

    <div class="row row-input">
      <?= inputField("password", "password", "", "Password", "small"); ?>
      <?= inputField("password", "cpassword", "", "Repeat Password", "small"); ?>
    </div>
    <div class="row px-5">
      <div class="flex-row">
        <h3 style="font-size:16px">Already account ? please </h3>
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