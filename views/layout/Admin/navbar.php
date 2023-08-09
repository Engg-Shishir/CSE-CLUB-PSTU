<div class="container">
  <div class="engg-shishir-navbar">

    <div class="engg-shishir-nav-left">
      <a  href="<?= url('/'); ?>"><img src="<?= assets('image/Club-Logo-Blue.svg') ?>" alt="" /></a>
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
  <div class="engg-shishir-fullnav" onMouseOver="this.style.right='0'" onMouseOut="this.style.right='-260px'">
    <div class="accordion">

      <div class="accordion__item">
        <a href="#" class="accordion__toggle">
          <i class="far fa-user"></i> Profile
        </a>
      </div>
      <div class="accordion__item">
        <a  class="accordion__toggle">
          <i class="far fa-envelope"></i> Users
          <i class="fa-solid fa-chevron-right accordion__icon"></i>
        </a>
        <div class="accordion__content">
          <div class="accordion__content-container">
            <a class="accordion__a" href="<?= url("/admin/users/manage"); ?>">Manage</a>
            <a class="accordion__a" href="#">Teacher</a>
            <a class="accordion__a" href="#">Alumini</a>
            <a class="accordion__a" href="#">Volenter</a>
            <a class="accordion__a" href="#">Partners</a>
          </div>
        </div>
      </div>
      <div class="accordion__item">
        <a  class="accordion__toggle" href="<?= url("/admin/events"); ?>">
          <i class="fas fa-cog"></i> Events
        </a>
      </div>

      <div class="accordion__item">
        <a  class="accordion__toggle">
          <i class="fas fa-cog"></i> Static
          <i class="fa-solid fa-chevron-right accordion__icon"></i>
        </a>
        <div class="accordion__content">
          <div class="accordion__content-container">
            <a class="accordion__a" href="<?= url("/admin/country"); ?>">Country</a>
            <a class="accordion__a" href="<?= url("/admin/city"); ?>">City</a>
            <a class="accordion__a" href="<?= url("/admin/college"); ?>">College</a>
            <a class="accordion__a" href="<?= url("/admin/faculty"); ?>">Faculty</a>
            <a class="accordion__a" href="<?= url("/admin/session"); ?>">Session</a>
            <a class="accordion__a" href="<?= url("/admin/course"); ?>">Course</a>
            <a class="accordion__a" href="<?= url("/admin/faq"); ?>">Faqs</a>
            <a class="accordion__a" href="<?= url("/admin/gallery"); ?>">Galary</a>
            <a class="accordion__a" href="<?= url("/admin/home/about"); ?>">About Slider</a>
          </div>
        </div>
      </div>


      <div class="accordion__item">
        <a href="<?= url("/admin/partners") ?>" class="accordion__toggle">
          <i class="far fa-user"></i> Partners
        </a>
      </div>
      
      <div class="accordion__item">
        <a href="<?= url("/admin/setting") ?>" class="accordion__toggle">
          <i class="far fa-user"></i> Settings
        </a>
      </div>

      <div class="accordion__item">
        <a class="accordion__toggle">
          <i class="fas fa-cog"></i> Notice
          <i class="fa-solid fa-chevron-right accordion__icon"></i>
        </a>
        <div class="accordion__content">
          <div class="accordion__content-container">
            <a class="accordion__a" href="<?= url("/admin/notice") ?>">All notice</a>
            <a class="accordion__a" href="<?= url("/admin/notice/insert") ?>">Insert Notice</a>
          </div>
        </div>
      </div>



      <div class="accordion__item">
        <a href="<?= url("/logout") ?>" class="accordion__toggle">
          <i class="far fa-user"></i> Logout
        </a>
      </div>
    </div>
  </div>
</div>