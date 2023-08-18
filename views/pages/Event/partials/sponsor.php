<div class="row sponsor-row">
  <div class="sponsor-title">
    <span>Sponsors & Partners</span>
    <span class="line"></span>
  </div>
  <div class="sponsor-card-box">
    <?php
    foreach ($sponsor as $key => $value) {
      ?>
      <a href="<?= $value["web"] ?>">
        <img src="<?= assets("Upload/Partners/" . $value["image"]) ?>" alt="">
        <span>
          <?= $value["function"] ?>
        </span>
      </a>
      <?php
    }

    ?>
  </div>
</div>