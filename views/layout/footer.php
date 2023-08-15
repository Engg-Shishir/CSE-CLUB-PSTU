<footer>
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
            <img src="<?=  assets("Upload/Settings/".$footer["navLogo"])  ?>" alt="" />
          </div>
          <div class="aboutText">
            <p><?= $footer["short_des"] ?> </p>
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
      <p><?= $footer["copyright"] ?></p>
    </div>
  </footer>