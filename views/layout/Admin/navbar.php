<div class="container">
  <div class="engg-shishir-navbar">
    <div class="engg-shishir-nav-left">
      <a href="<?= url('/'); ?>"><img src="<?= assets('image/Club-Logo-Blue.svg') ?>" alt="" /></a>
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
  <div class="engg-shishir-fullnav">
    <div class="accordion">

      <div class="accordion__item">
        <a href="#" class="accordion__toggle">
          <i class="far fa-user"></i> Profile
        </a>
      </div>
      <div class="accordion__item">
        <a href="#" class="accordion__toggle">
          <i class="far fa-envelope"></i> Users
          <svg class="icon__chevron icon__chevron--right accordion__icon" width="7" height="13"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M.974 11.347c-.303.378-.303.992 0 1.37.304.377.797.377 1.1 0L6.52 7.185c.303-.378.303-.992 0-1.37L2.075.283c-.304-.377-.797-.377-1.101 0-.303.378-.303.992 0 1.37l3.897 4.85-3.897 4.844z"
              fill-rule="nonzero" />
          </svg>
        </a>
        <div class="accordion__content">
          <div class="accordion__content-container">
            <a class="accordion__a" href="#">Teacher</a>
            <a class="accordion__a" href="#">Alumini</a>
            <a class="accordion__a" href="#">Volenter</a>
            <a class="accordion__a" href="#">Partners</a>
          </div>
        </div>
      </div>
      <div class="accordion__item">
        <a href="#" class="accordion__toggle">
          <i class="fas fa-cog"></i> Events
          <svg class="icon__chevron icon__chevron--right accordion__icon" width="7" height="13"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M.974 11.347c-.303.378-.303.992 0 1.37.304.377.797.377 1.1 0L6.52 7.185c.303-.378.303-.992 0-1.37L2.075.283c-.304-.377-.797-.377-1.101 0-.303.378-.303.992 0 1.37l3.897 4.85-3.897 4.844z"
              fill-rule="nonzero" />
          </svg>
        </a>
        <div class="accordion__content">
          <div class="accordion__content-container">
            <a class="accordion__a" href="#">All events</a>
            <a class="accordion__a" href="#">Insert</a>
          </div>
        </div>
      </div>
      <div class="accordion__item">
        <a href="#" class="accordion__toggle">
          <i class="far fa-user"></i> Logout
        </a>
      </div>
    </div>
  </div>
</div>