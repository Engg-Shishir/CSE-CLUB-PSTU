<div class="direction">


<img class="gallery" id="output">
  <div class="instruction-title-box">
    <span>Get ready for take-off</span>
  </div>
  <ul>
    <li>
      <img src="<?= assets('Image/Icon/file-signature-solid.svg') ?>" alt="">
      <span>Complete the form on the left to begin your journey to Harbour.Space</span>
    </li>
    <li>
      <img src="<?= assets('Image/Icon/paper-plane-solid.svg') ?>" alt="">
      <span>Confirm it's really you with your email</span>
    </li>
    <li>
      <img src="<?= assets('Image/Icon/archway-solid.svg') ?>" alt="">
      <span>Log in to get your application ready to fly our way</span>
    </li>
    <li>
      <img src="<?= assets('Image/Icon/archway-solid.svg') ?>" alt="">
      <span>Before submit the form check properly, everything should well insert or not, otherwise it takes extra time
        for again insert all of them</span>
    </li>
  </ul>

  <ul>
    <?php
    if (isset($_SESSION["formError"])) {
      foreach ($_SESSION["formError"] as $key => $value) {
        echo "<li>" . $value . "</li>";
      }
    }

    ?>
  </ul>
</div>