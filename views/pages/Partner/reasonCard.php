<div class="reason-card-box">
  <?php
  foreach ($category as $key => $value) { ?>
    <a href="" class="reason-card-box-item">
      <div class="reason-card-box-item-card">
        <div class="reason-card-box-item-card-first">
          <div class="reason-card-box-item-card-first-image">
            <img src="<?= assets("Upload/Sponsor-Category/".$value["image"]) ?>" alt="" />
          </div>
          <div class="reason-card-box-item-card-first-text">
            <p><?= $value["title"] ?></p>
          </div>
        </div>
      </div>
    </a>
  <?php }
  ?>
</div>