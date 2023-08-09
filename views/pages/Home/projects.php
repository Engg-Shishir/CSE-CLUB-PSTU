<div class="row projects-row">
  <div class="projects-row-left">
    <h2>CSE's Projects</h2>
    <p>
      At CSE, we never cease learning and working on projects, that help us unleash our creativity and gather all of our
      brilliant ideas to create great projects!At CSE, innovation knows no bounds, and we are excited to share our
      passion with you. Do you want to take a look at what we've built? Well, click on this button!
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
      <?php
      foreach ($projects as $key => $value) { 
        if($value["status"]==1){ ?>
            <div class="projects-row-right-box-item">
              <img src="<?= assets('Upload/Projects/'.$value["logo"]) ?>" alt="" />
              <a href="<?= $value["sourcecode"] ?>" target="_blank" style="color:blue !important; font-size:16px; font-weight:400;"><?= $value["title"] ?></a>
              <p><?= $value["description"] ?></p>
            </div>
        <?php }
      } ?>

    </div>
  </div>
</div>