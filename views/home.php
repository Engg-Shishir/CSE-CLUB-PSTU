<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSE CLUB</title>
  <link rel="stylesheet" href="<?= assets('css/home.css') ?>">
  <link rel="stylesheet" href="<?= assets('Plugin/owl/dist/assets/owl.carousel.css') ?>" />
  <link rel="stylesheet" href="<?= assets('Plugin/owl/dist/assets/owl.theme.default.css') ?>" />
</head>

<body>
  <div class="container">
    <div class="engg-shishir-fixed">
      <div class="fixed-left-logo">
        <a href="/"><img src="<?= assets('Image/Club-Logo-Dark.svg')?>" alt="" /></a>
      </div>
      <div class="engg-shishir-fixed-content">
        <div class="engg-shishir-fixed-content-left">
          <div class="title">
            <h1>Computer Science Club</h1>
          </div>
          <p class="title-des">
            CSE club is one of the largest scientific clubs in Algeria.
            Working since 2008, our main goal is to offer original and
            innovative content throughout our hackathons, workshops, training
            and social media.
          </p>
          <a href="/registration">
            <button class="glowing-btn">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              Join Us
            </button>
          </a>

          <div class="scroll-indicator"></div>
        </div>
        <div class="engg-shishir-fixed-content-right"></div>
      </div>
    </div>

    <div class="video-circle">
      <div class="shishir-video-circle-nav">
        <div class="left"></div>
        <div class="shishir-video-circle-nav-right">
          <div class="shishir-menu" onclick="hamburger()">
            <span>
              <span class="shishir-mainSpan">
                <span class="text">MENU</span>
                <span class="shishir-hamburger">
                  <i class="shishir-hamburger-line"></i>
                  <i class="shishir-hamburger-line"></i>
                  <i class="shishir-hamburger-line"></i>
                </span>
              </span>
            </span>
          </div>
        </div>
      </div>
      <div class="shishir-top-video-circle-box">
        <video id="background-video" autoplay loop muted plays-inline poster="">
          <source src="<?= assets("Image/circle-video.mp4") ?>" type="video/mp4" />
        </video>
      </div>
    </div>

    <?php  view("./layout/navbar.php"); ?>
  </div>

  <div class="container content">
    <div class="row about-row">
      <div class="about-row-image">
        <div class="about-row-image-first">
          <div class="about-row-image-first-box"></div>
        </div>
        <div class="about-row-image-second">
          <div class="about-row-image-first-box"></div>
        </div>
      </div>
      <div class="about-row-text">
        <h2>Who we are ?</h2>
        <p>
          CSE (Scientific Club of ESI) is a student club at the Higher
          National School of Computer Science in Algiers. It's made for
          students who are passionate about computers, high tech, robotics,
          design, and anything related to technology . The CSE has managed to
          gain its place nationally and internationally by organizing major
          Tech events. After organizing the first hackathon and one of the
          largest in Algeria, the club is considered as one of the biggest and
          most active clubs in the country.
        </p>
      </div>
    </div>


    <div class="row projects-row">
      <div class="projects-row-left">
        <h2>Projects 2023</h2>
        <p>
          At CSE, we never cease learning and working on projects, that help
          us unleash our creativity and gather all of our brilliant ideas to
          create great projects! Do you want to take a look at what we've
          built? Well, click on this button!
        </p>
        <a href="https://github.com/Engg-Shishir">
          <button class="glowing-btn">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Check all
          </button>
        </a>
      </div>
      <div class="projects-row-right">
        <div class="projects-row-right-box owl-carousel owl-theme">
          <div class="projects-row-right-box-item">
            <img src="<?= assets('Image/sponor.png')?>" alt="" />
            <p>
              At CSE, we never cease learning and working on projects, that
              help us unleash our creativity and gather all of our brilliant
              ideas to create great projects! Do you want to take a look at
              what we've built? Well, click on this button!
            </p>
          </div>
          <div class="projects-row-right-box-item">
            <img src="<?= assets('Image/sponor.png')?>" alt="" />
            <p>
              At CSE, we never cease learning and working on projects, that
              help us unleash our creativity and gather all of our brilliant
              ideas to create great projects! Do you want to take a look at
              what we've built? Well, click on this button!
            </p>
          </div>
          <div class="projects-row-right-box-item">
            <img src="<?= assets('Image/sponor.png')?>" alt="" />
            <p>
              At CSE, we never cease learning and working on projects, that
              help us unleash our creativity and gather all of our brilliant
              ideas to create great projects! Do you want to take a look at
              what we've built? Well, click on this button!
            </p>
          </div>
        </div>
      </div>
    </div>


    <div class="row partner-row">
      <h2>Trusted Collaborators</h2>
      <p>
        We work with the world’s most progressive companies and visionaries
        with the same aspirations as us from different parts of the universe.
      </p>
      <div class="partner-logo">
        <div class="partner-logo-slide">
          <img src="<?= assets('Image/sponsor/appscode.svg')?>" alt="" />
          <img src="<?= assets('Image/sponsor/brain.svg')?>" alt="" />
          <img src="<?= assets('Image/sponsor/nescafe.png')?>" alt="" />
          <img src="<?= assets('Image/sponsor/vibasoft.svg')?>" alt="" />
          <img src="<?= assets('Image/sponsor/robi.png')?>" alt="" />
        </div>
        <div class="partner-logo-slide">
          <img src="<?= assets('Image/sponsor/appscode.svg')?>" alt="" />
          <img src="<?= assets('Image/sponsor/brain.svg')?>" alt="" />
          <img src="<?= assets('Image/sponsor/nescafe.png')?>" alt="" />
          <img src="<?= assets('Image/sponsor/vibasoft.svg')?>" alt="" />
          <img src="<?= assets('Image/sponsor/robi.png')?>" alt="" />
        </div>
      </div>
      <a href="./support">
        <button class="glowing-btn">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Become Partners
        </button>
      </a>
    </div>
    <?php  view("./layout/footer.php"); ?>
  </div>

  <script src="https://kit.fontawesome.com/4b35f5bfb9.js" crossorigin="anonymous"></script>
  <script src="<?= assets('Plugin/Jquery/jquery-3.6.0.js') ?>"></script>
  <script src="<?= assets('js/navbar.js') ?>"></script>
  <script src="<?= assets('js/default.js') ?>"></script>
  <script src="<?= assets('Plugin/owl/dist/owl.carousel.min.js') ?>"></script>
  <script src="<?= assets('js/jqueryUse.js') ?>"></script>
</body>

</html>