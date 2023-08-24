<div class="container">
  <div class="engg-shishir-navbar">

    <div class="engg-shishir-nav-left">
      <a href="<?= url('/'); ?>"><img src="<?= assets('Upload/Settings/' . $navbar["navLogo"]) ?>" alt="" /></a>
    </div>

    <div class="engg-shishir-nav-right">
      <a href="<?= url("/logout") ?>" class="engg-shishir-nav-right-login">Logout</a>
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
  <div class="engg-shishir-fullnav" onMouseOver="this.style.right='0'" onMouseOut="this.style.right='-300px'">
    <div class="accordion">

      <div class="accordion__item">
        <a href="<?= url("/user/profile") ?>" class="accordion__toggle">
          <i class="far fa-user"></i> Profile
        </a>
      </div>
      <div class="accordion__item">
        <a href="<?= url("/logout") ?>" class="accordion__toggle">
          <i class="far fa-user"></i> Logout
        </a>
      </div>
    </div>
  </div>
</div>