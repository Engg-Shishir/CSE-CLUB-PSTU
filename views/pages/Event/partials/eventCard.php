<div class="row eventTitleRow">
<div class="sponsor-title">
    <span class="text">Our Events</span>
    <span class="line"></span>
  </div>
</div>

<div class="row evnt-card-row">

  <?php

  foreach ($events as $key => $value) { ?>
    <div class="engg-shishir-event-card"
      style='background-image:url("<?= assets('Upload/Events/' . $value['event_image']) ?>")'>
      <div class="eengg-shishir-event-card-hover-layer"></div>

      <div class="engg-shishir-event-card-left">
        <div class="engg-shishir-event-card-title">
          <h1>
            <?= $value["event_name"] ?>
          </h1>
        </div>
        <div class="engg-shishir-event-card-schedule">
          <div class="engg-shishir-event-card-schedule-left">
            <div class="engg-shishir-event-card-schedule-time">
              <span>Reg Date</span>
              <span>
                <?php
                $dt = new DateTime($value['reg_date']);
                echo $dt->format('d/m/Y');
                ?>
              </span>
            </div>
            <div class="engg-shishir-event-card-schedule-time">
              <span>Event Date</span>
              <span>
                <?php
                $dt = new DateTime($value['reg_date']);
                echo $dt->format('d/m/Y');
                ?>
              </span>
            </div>
            <div class="engg-shishir-event-card-schedule-time">
              <span>Event Time</span>
              <span>
                <?php
                $dt = new DateTime($value['event_time']);
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $dt->format('H:i A');
                ?>
              </span>
            </div>
          </div>
          <hr />
          <div class="engg-shishir-event-card-schedule-right">
            <p>
              <?= $value["event_loc"] ?>
            </p>
          </div>
        </div>
        <div class="engg-shishir-event-card-description">
          <h1>Description</h1>
          <p>
            <?php echo substr($value["event_des"], 0, 300) . "....."; ?>
          </p>
        </div>
      </div>
      <div class="engg-shishir-event-card-right">
        <div class="engg-shishir-event-card-details-btn">
          <a href="<?= url("/event/".$value["event_slug"]) ?>">View Details</a>
        </div>
      </div>
    </div>
  <?php }

  ?>

</div>