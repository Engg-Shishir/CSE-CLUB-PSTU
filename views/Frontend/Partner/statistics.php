<?php  
 $count = $count[0];
?>

<div class="row row-statistics">
  <div class="counter-box">
    <div class="counter-box-item">
      <h2 id="members"><?= $count["user_count"] ?></h2>
      <h3>Members</h3>
    </div>
    <div class="counter-box-item">
      <h2 id="events"><?= $count["event_count"] ?></h2>
      <h3>Events</h3>
    </div>
    <div class="counter-box-item">
      <h2 id="partners"><?= $count["colla_count"] ?></h2>
      <h3>Partners</h3>
    </div>
  </div>
</div>