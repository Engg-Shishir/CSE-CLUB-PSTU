<div class="reg-form">
  <?php view("components/flashMessage.php"); ?>
  <form action="<?= url("/dashboard"); ?>" method="POST" enctype="multipart/form-data">
    <?= inputField("hidden", "_token", shishirEnv("APP_KEY")); ?>

    <div class="form-group">
      <label for=""><strong>Education</strong></label>
      <select name="role" class="select2  form-control">
        <option value="">Your role</option>
        <?php
        $edu = [
          "admin" => "Admin",
          "student" => "Student",
          "teacher" => "Teacher",
          "event-partcipant" => "Event Partcipant",
          "partner" => "Partner"
        ];

        foreach ($edu as $key => $value) {
          echo "<option value='" . $key . "'>" . $value . "</option>";
        }
        ?>
      </select>
    </div>
    <div class="row row-input m-0">
      <?= inputField("email", "username", "", "Email", "lg"); ?>
    </div>
    <div class="row row-input m-0">
      <?= inputField("password", "password", "", "Password", "lg"); ?>
    </div>
    <div class="row px-5">
      <div class="flex-row">
        <a href="">Password Reset</a>
        <a href="<?= url("/joinus") ?>">SignUp</a>
      </div>
    </div>
    <div class="reg-btn-box">
      <a href="">
        <button class="glowing-btn" type="submit">
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