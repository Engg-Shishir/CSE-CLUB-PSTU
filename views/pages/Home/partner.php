<div class="row partner-row">
  <h2>Trusted Collaborators</h2>
  <p>
    We work with the world’s most progressive companies and visionaries
    with the same aspirations as us from different parts of the universe.

  </p>
  <div class="partner-logo">
    <div class="partner-logo-slide">
      <?php foreach ($partners as $key => $value) {
        if ($value["status"] == 1) { ?>
          <a href="<?= $value["web"] ?>"><img src="<?= assets('Upload/Partners/' . $value["image"]) ?>" alt="" /></a>
        <?php }
      } ?>
    </div>
    <div class="partner-logo-slide">
      <?php foreach ($partners as $key => $value) {
        if ($value["status"] == 1) { ?>
          <a href="<?= $value["web"] ?>"><img src="<?= assets('Upload/Partners/' . $value["image"]) ?>" alt="" /></a>
        <?php }
      } ?>
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