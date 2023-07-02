<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CSE CLUB|Login</title>
  <link rel="stylesheet" href="<?= assets('css/login.css') ?>" />
</head>

<body>
  <!-- Include Navigation Bar -->
  <?php  view("./layout/navbar.php"); ?>
  <div class="container content">
    <div class="row support-row">
      <div class="direction">
        <div class="instruction-title-box">
          <span>Login Instruction</span>
        </div>
        <ul>
          <li>
            <img src="./Image/Icon/file-signature-solid.svg" alt="">
            <span>Enter your username and password in the fields provided.</span>
          </li>
          <li>
            <img src="./Image/Icon/paper-plane-solid.svg" alt="">
            <span>Make sure that you are using the correct username and password.</span>
          </li>
          <li>
            <img src="./Image/Icon/archway-solid.svg" alt="">
            <span>Check that your caps lock key is not on, as passwords are case-sensitive.</span>
          </li>
          <li>
            <img src="./Image/Icon/paper-plane-solid.svg" alt="">
            <span>If you have forgotten your password, click on the "forgot password" link and follow the prompts to
              reset it.</span>
          </li>
          <li>
            <img src="./Image/Icon/archway-solid.svg" alt="">
            <span>Once you have entered your correct login credentials, click the "Login" button to access your
              account.</span>
          </li>
        </ul>
      </div>
      <div class="reg-form">
        <!-- <div class="title-box">
            <span>Deep</span><br>
            <span>Deep Dive your dashboard</span>
          </div> -->
        <form action="">
          <div class="row row-input">
            <input type="text" class="lg" placeholder="Email" />
          </div>
          <div class="row row-input">
            <input type="text" class="lg" placeholder="Password" />
          </div>
        </form>
        <div class="row px-5">
          <div class="flex-row">
            <a href="">Password Reset</a>
            <a href="">SignUp</a>
          </div>
        </div>
        <div class="reg-btn-box">
          <a href="">
            <button class="glowing-btn">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              Signin
            </button>
          </a>
        </div>
      </div>
    </div>
  <?php view("./layout/footer.php"); ?>
  </div>
  <script src="https://kit.fontawesome.com/4b35f5bfb9.js" crossorigin="anonymous"></script>
  <script src="<?= assets('js/navbar.js') ?>"></script>
</body>

</html>