<div class="row projects-row">
  <div class="projects-row-left">
    <h2>CSE's Projects</h2>
    <p>
      <?= $projects["text"] ?>
    </p>
    <a href="https://github.com/Engg-Shishir" target="_blank">
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
      foreach ($projects["code"] as $key => $value) { 
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