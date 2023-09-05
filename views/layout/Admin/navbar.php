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

<div class="engg-shishir-fullnav" onMouseOver="this.style.right='0'" onMouseOut="this.style.right='-260px'">
  <div class="accordion">

    <?php
      $url = [
        "Users" => [
          [
            "name" => "Manage",
            "href" => "/admin/users/manage"
          ]
        ],
        "Static" => [
          [
            "name" => "Country",
            "href" => "/admin/country"
          ],
          [
            "name" => "City",
            "href" => "/admin/city"
          ],
          [
            "name" => "College",
            "href" => "/admin/college"
          ],
          [
            "name" => "Faculty",
            "href" => "/admin/faculty"
          ],
          [
            "name" => "Session",
            "href" => "/admin/session"
          ],
          [
            "name" => "Course",
            "href" => "/admin/course"
          ],
          [
            "name" => "Faqs",
            "href" => "/admin/faq"
          ],
          [
            "name" => "Galary",
            "href" => "/admin/galary"
          ],
          [
            "name" => "About Slider",
            "href" => "/admin/home/about"
          ],
        ],
        "Notice" => [
          [
            "name" => "All notice",
            "href" => "/admin/notice"
          ],
          [
            "name" => "Insert Notice",
            "href" => "/admin/notice/insert"
          ],
        ],
        "Pages" => [
          [
            "name" => "About",
            "href" => "/admin/about"
          ],
          [
            "name" => "Faculty Law",
            "href" => "/admin/facultylaw"
          ],
          [
            "name" => "Club Activity",
            "href" => "/admin/clubactivity"
          ],
        ],
        "Payment" => [
          [
            "name" => "Tranjection",
            "href" => "/admin/tranjection"
          ]
        ],
        "Events" => [
          [
            "name" => "Support Category",
            "href" => "/admin/support/category"
          ],
          [
            "name" => "Carnival",
            "href" => "/admin/carnivals"
          ],
          [
            "name" => "Sponsor",
            "href" => "/admin/events/sponsor"
          ],
          [
            "name" => "Events",
            "href" => "/admin/events"
          ],
          [
            "name" => "Registration",
            "href" => "/admin/event/registration"
          ]
        ],
        "Blogs" => [
          [
            "name" => "Blog Category",
            "href" => "/admin/blogcategory"
          ],
          [
            "name" => "All Blogs",
            "href" => "/admin/blog"
          ],
          [
            "name" => "Insert Blog",
            "href" => "/blogInsert"
          ]
        ],
        "Faqs" => [
          [
            "name" => "Manage Faq",
            "href" => "/admin/faq"
          ]
        ],
        "Alumini" => [
          [
            "name" => "Manage",
            "href" => "/admin/alumini"
          ],
          [
            "name" => "Send Mail",
            "href" => "/admin/sendmail"
          ]
        ],
        "Partners" => "/admin/partners",
        "Settings" => "/admin/setting",
        "Projects" => "/admin/projects",
        "Message" => "/admin/message",
        "Logout" => "/logout"
      ];
    ?>

    <?php
    foreach ($url as $key => $value) {
      ?>
        <div class="accordion__item">
          <?php
            if (is_array($url[$key])) {
              ?>
              <a class="accordion__toggle">
                <i class="far fa-envelope"></i>
                <?= $key ?>
                <i class="fa-solid fa-chevron-right accordion__icon"></i>
              </a>
              <?php

            } else {
              ?>
              <a href="<?= url($value); ?>" class="accordion__toggle">
                <i class="far fa-envelope"></i>
                <?= $key ?>
              </a>
              <?php
            }
          ?>

          <?php
            if (is_array($url[$key])) {
              ?>
              <div class="accordion__content">
                <div class="accordion__content-container">
                  <?php
                  foreach ($url[$key] as $key1 => $value1) {
                    ?>
                    <a class="accordion__a" href="<?= url($value1["href"]); ?>"><?= $value1["name"] ?></a>
                    <?php
                  }
                  ?>
                </div>
              </div>
              <?php
            }
          ?>
        </div>
      <?php
    }
    ?>


  </div>
</div>