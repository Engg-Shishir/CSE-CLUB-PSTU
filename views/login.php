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
    <div class="container">
      <div class="engg-shishir-navbar">
        <div class="engg-shishir-nav-left">
          <a href="<?= url('/');?>"><img src="<?=  assets('image/Club-Logo-Blue.svg') ?>" alt="" /></a>
        </div>
        <div class="engg-shishir-nav-right">
          <a
            target="_blank"
            href="./events"
            class="engg-shishir-nav-right-event"
            >It carnival 2023</a
          >
          <a href="" class="engg-shishir-nav-right-login">Login</a>
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
              <li class="tab-li">More</li>
            </ul>
          </div>
          <div class="tab-content">
            <ul
              class="tab-li-content engg-shishir-fullnav-left-ul tab-li-content-active"
            >
              <li class="shishir-navitem">
                <a target="_blank" href="./events" class="shishir-navLink">
                  <p>IT Carinival 2023</p>
                  <p>IT Carinival 2023</p>
                </a>
              </li>
              <li class="shishir-navitem">
                <a href="" class="shishir-navLink">
                  <p>UI UX Development</p>
                  <p>UI UX Development</p>
                </a>
              </li>
              <li class="shishir-navitem">
                <a href="" class="shishir-navLink">
                  <p>Cyber Security</p>
                  <p>Cyber Security</p>
                </a>
              </li>
              <li class="shishir-navitem">
                <a href="" class="shishir-navLink">
                  <p>Digital Marketing</p>
                  <p>Digital Marketing</p>
                </a>
              </li>
              <li class="shishir-navitem">
                <a href="" class="shishir-navLink">
                  <p>ICPC Bootcamp</p>
                  <p>ICPC Bootcamp</p>
                </a>
              </li>
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
              <span>If you have forgotten your password, click on the "forgot password" link and follow the prompts to reset it.</span>
            </li>
            <li>
              <img src="./Image/Icon/archway-solid.svg" alt="">
              <span>Once you have entered your correct login credentials, click the "Login" button to access your account.</span>
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
      <div class="row card">
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
                  <img src="./Image/Club-Logo-Blue.svg" alt="" />
                </div>
                <div class="aboutText">
                  <p>
                    CSE club is one of the largest scientific clubs in Algeria.
                    Working since 2008, our main goal is to offer original and
                    innovative content throughout our hackathons, workshops,
                    training and social media.
                  </p>
                </div>
                <ul>
                  <li><a href="">Privacy Policy</a></li>
                  <li><a href="">Terms & Condition</a></li>
                  <li><a href="">Contact</a></li>
                  <li><a href="">Blog</a></li>
                  <li><a href="">FAQ</a></li>
                  <li><a href="">Developers</a></li>
                </ul>
              </div>
            </div>
          </div>
          <hr />
          <div class="footer-botom">
            <p>© 2023 CSE CLUB PSTU. All rights reserved.</p>
          </div>
        </footer>
      </div>
    </div>
    <script
      src="https://kit.fontawesome.com/4b35f5bfb9.js"
      crossorigin="anonymous"
    ></script>
    <script src="<?= assets('js/navbar.js') ?>"></script>
  </body>
</html>
