<div class="container">
  <div class="engg-shishir-navbar">
    <div class="engg-shishir-nav-left">
      <a href="<?= url('/'); ?>"><img src="<?= assets('Upload/Settings/' . $navbar["navLogo"]) ?>" alt="" /></a>
    </div>
    <div class="engg-shishir-nav-right">
      <?php

      if ($navbar["carnival"][0] !== null) { ?>
        <a target="_blank" href="<?= url("/carnival/" . $navbar["carnival"][1]) ?>" class="engg-shishir-nav-right-event"><?= $navbar["carnival"][0] ?></a>
      <?php }
      ?>
      <a href="<?= url("/blog") ?>" class="engg-shishir-nav-right-login">Blog</a>
      <?php  
         if(isset($_SESSION["auth_profile"]) && $_SESSION["auth_profile"]!==""){
          ?>
            <a href="<?= url("".$_SESSION["auth_profile"]) ?>" class="engg-shishir-nav-right-login">Profile</a>
          <?php
         }else{
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
          <li class="tab-li tab-li-active">Programs</li>
          <li class="tab-li">More Access</li>
        </ul>
      </div>
      <div class="tab-content">
        <ul class="tab-li-content engg-shishir-fullnav-left-ul tab-li-content-active">
          <?php
          foreach ($navbar["carnivals"] as $key => $value) { ?>
            <li class="shishir-navitem">
              <a target="_blank" href="<?= url("/carnival/".$value["slug"]) ?>" class="shishir-navLink">
                <p><?= $value["title"] ?></p>
                <p><?= $value["title"] ?></p>
              </a>
            </li>
          <?php }
          ?>
        </ul>
        <ul class="tab-li-content engg-shishir-fullnav-right-ul">
          <li class="shishir-navitem">
            <a href="" class="shishir-navLink">
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
            <a href="<?= url("/faq") ?>" class="shishir-navLink">
              <p>FAQ</p>
              <p>FAQ</p>
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
            <a href="<?= url("/privacypolicy") ?>" class="shishir-navLink">
              <p>Privacy Policy</p>
              <p>Privacy Policy</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="engg-shishir-fullnav-content">
      <!-- <button class="closenav"  onclick="hamburger()">Close X</button> -->
    </div>
  </div>
</div>