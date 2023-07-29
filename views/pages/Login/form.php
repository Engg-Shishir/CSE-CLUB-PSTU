<div class="reg-form">
  <?php view("components/flashMessage.php"); ?>
  <form  action="<?= url("/admin/login"); ?>" method="POST" enctype="multipart/form-data">
    <?= inputField("hidden", "_token", shishirEnv("APP_KEY")); ?>
    <div class="row row-input">
    <?= inputField("email", "username", "", "Email", "lg"); ?>
    </div>
    <div class="row row-input">
    <?= inputField("password", "password", "", "Password", "lg"); ?>
    </div>
  <div class="row px-5">
    <div class="flex-row">
      <a href="">Password Reset</a>
      <a href="<?= url("/joinus")  ?>">SignUp</a>
    </div>
  </div>
  <div class="reg-btn-box">
    <a href="">
      <button class="glowing-btn"  type="submit">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Signin
      </button>
    </a>
  </div>
  </form>
</div>