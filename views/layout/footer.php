<footer>
  <!-- <svg class="absolute w-full bottom-[-2px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 170.68 1440 149.32">
    <path fill="#313d4c" fill-opacity="1"
      d="M0,288L80,282.7C160,277,320,267,480,240C640,213,800,171,960,170.7C1120,171,1280,213,1360,234.7L1440,256L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
    </path>
  </svg> -->
  <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full">
    <path fill="#313d4c" fill-opacity="1"
      d="M0,256L60,229.3C120,203,240,149,360,160C480,171,600,245,720,256C840,267,960,213,1080,192C1200,171,1320,181,1380,186.7L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
    </path>
  </svg> -->
  <div class="w-full">
    <div style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
        style="height: 100%; width: 100%;">
        <path d="M0.00,49.85 C150.00,149.60 349.20,-49.85 500.00,49.85 L500.00,149.60 L0.00,149.60 Z"
          style="stroke: none; fill: #313d4c;"></path>
      </svg></div>
  </div>
  <div class="footer-top">
    <div class="footer-top-box">
      <div class="footer-top-box-right">
        <p>Follow Us</p>
        <div class="social">
          <ul>
            <li>
              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-brands fa-twitter"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-brands fa-discord"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer-top-box-left">
        <div class="footer-logo-box">
          <img src="<?= assets("Upload/Settings/" . $footer["navLogo"]) ?>" alt="" />
        </div>
        <div class="aboutText">
          <p>
            <?= $footer["short_des"] ?>
          </p>
        </div>
        <ul>
          <li><a href="">Privacy Policy</a></li>
          <li><a href="<?= url("/contact") ?>">Contact</a></li>
          <li><a href="">Blog</a></li>
          <li><a href="">FAQ</a></li>
          <li><a href="">Developers</a></li>
        </ul>
      </div>
    </div>
  </div>
  <hr />
  <div class="footer-botom">
    <p>
      <?= $footer["copyright"] ?>
    </p>
  </div>
</footer>