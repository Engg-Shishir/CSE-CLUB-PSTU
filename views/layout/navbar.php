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
      <a href="<?= url("/login") ?>" class="engg-shishir-nav-right-login">Login</a>
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
              <p>Alumini</p>
              <p>Alumini</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="" class="shishir-navLink">
              <p>Executive Member</p>
              <p>Executive Member</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="" class="shishir-navLink">
              <p>partners</p>
              <p>partners</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="" class="shishir-navLink">
              <p>About</p>
              <p>About</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="" class="shishir-navLink">
              <p>Contact</p>
              <p>Contact</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="" class="shishir-navLink">
              <p>FAQ</p>
              <p>FAQ</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="" class="shishir-navLink">
              <p>Blog</p>
              <p>Blog</p>
            </a>
          </li>
          <li class="shishir-navitem">
            <a href="" class="shishir-navLink">
              <p>Suport Us</p>
              <p>Suport Us</p>
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