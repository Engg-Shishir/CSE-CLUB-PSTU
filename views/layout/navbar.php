<div class="container">
  <div class="engg-shishir-navbar">
    <div class="engg-shishir-nav-left">
      <a href="<?= url('/'); ?>"><img src="<?= assets('Upload/Settings/' . $navbar["navLogo"]) ?>" alt="" /></a>
    </div>
    <div class="engg-shishir-nav-right">
      <?php

      if ($navbar["carnival"][0] !== null) { ?>
        <a target="_blank" href="<?= url("/carnival/" . $navbar["carnival"][1]) ?>"
          class="engg-shishir-nav-right-event"><?= $navbar["carnival"][0] ?></a>
      <?php }
      ?>
      <a href="<?= url("/blog") ?>" class="engg-shishir-nav-right-login">Blog</a>
      <?php
      if (isset($_SESSION["auth_profile"]) && $_SESSION["auth_profile"] !== "") {
        ?>
        <a href="<?= url("" . $_SESSION["auth_profile"]) ?>" class="engg-shishir-nav-right-login">Profile</a>
        <?php
      } else {
        ?>
        <a href="<?= url("/login") ?>" class="engg-shishir-nav-right-login">Login</a>
        <?php
      }
      ?>
      <div class="engg-shishir-nav-right-menu" onclick="hamburger()">
        <span class="text">MENU</span>
        <span class="hamburger">
          <i class="line"></i>
          <i class="line"></i>
          <i class="line"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="engg-shishir-fullnav">
    <div class="engg-shishir-fullnav-menu">
      <div class="tabbar">
        <ul class="tabs-menu">
          <li class="tab-li  tab-li-active">Essential Link</li>
          <?php
            if (isset($_SESSION["auth_profile"])) {
              ?>
                <li class="tab-li">Authorized Access</li>
              <?php
            }
          ?>
          <li class="tab-li">It Carnival 2023</li>
        </ul>
      </div>
      <div class="tab-content">
        <ul class="tab-li-content engg-shishir-fullnav-right-ul tab-li-content-active">
          <li class="shishir-navitem">
            <a href="<?= url("/about") ?>" class="shishir-navLink">
              <p>About Us</p>
              <p>About Us</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="<?= url("/executive") ?>" class="shishir-navLink">
              <p>Executive Member</p>
              <p>Executive Member</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="<?= url("/contact") ?>" class="shishir-navLink">
              <p>Contact</p>
              <p>Contact</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="<?= url("/gallery") ?>" class="shishir-navLink">
              <p>gallery</p>
              <p>gallery</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="<?= url("/events") ?>" class="shishir-navLink">
              <p>Events</p>
              <p>Events</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="<?= url("/blog") ?>" class="shishir-navLink">
              <p>Blog</p>
              <p>Blog</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="<?= url("/welcome/partner") ?>" class="shishir-navLink">
              <p>Suport Us</p>
              <p>Suport Us</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="<?= url("/developers") ?>" class="shishir-navLink">
              <p>Developers</p>
              <p>Developers</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="<?= url("/curicolum") ?>" class="shishir-navLink">
              <p>CSE course curicolum</p>
              <p>CSE course curicolum</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="<?= url("/schedule") ?>" class="shishir-navLink">
              <p>CSE class schedule</p>
              <p>CSE class schedule</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="<?= url("/cselaw") ?>" class="shishir-navLink">
              <p>CSE faculty define law</p>
              <p>CSE faculty define law</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="<?= url("/batch") ?>" class="shishir-navLink">
              <p>Batch Wall</p>
              <p>Batch Wall</p>
            </a>
          </li>
        </ul>
        <?php
        if (isset($_SESSION["auth_profile"])) {
          ?>
          <ul class="tab-li-content engg-shishir-fullnav-left-ul">
            <li class="shishir-navitem">
              <a href="" class="shishir-navLink">
                <p>Profile</p>
                <p>Profile</p>
              </a>
            </li>
            <li class="shishir-navitem">
              <a href="" class="shishir-navLink">
                <p>Academic Resource</p>
                <p>Academic Resource</p>
              </a>
            </li>
            <li class="shishir-navitem">
              <a href="" class="shishir-navLink">
                <p>Payment</p>
                <p>Payment</p>
              </a>
            </li>
            <li class="shishir-navitem">
              <a href="" class="shishir-navLink">
                <p>Attendence</p>
                <p>Attendence</p>
              </a>
            </li>
          </ul>
          <?php
        }
        ?>
        <ul class="tab-li-content engg-shishir-fullnav-left-ul">
          <?php
          foreach ($navbar["carnivals"] as $key => $value) { ?>
            <li class="shishir-navitem">
              <a target="_blank" href="<?= url("/carnival/" . $value["slug"]) ?>" class="shishir-navLink">
                <p>
                  <?= $value["title"] ?>
                </p>
                <p>
                  <?= $value["title"] ?>
                </p>
              </a>
            </li>
          <?php }
          ?>
        </ul>
      </div>
    </div>
    <div class="engg-shishir-fullnav-content">
      <!-- <button class="closenav"  onclick="hamburger()">Close X</button> -->
    </div>
  </div>
</div>