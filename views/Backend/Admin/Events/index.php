<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Events</title>


  <link rel="stylesheet" href="<?= assets('style/Backend/Admin/Static/country.css'); ?>" />
  <link rel="stylesheet" href="<?= assets('style/Backend/Admin/Events/eventsCard.css'); ?>" />
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" /> -->

  <?php view("layout/partials/backendLink.php"); ?>

  


<!-- 
  <style>
    html {
      font-size: 100% !important;
    }

    .select2.select2-container {
      width: 100% !important;
    }
  </style> -->
</head>

<body>
  <?php
  $settings = $compact["settings"];
  $navbar = [
    "navLogo" => $settings["navLogo"]
  ];
  $data = $compact["data"];
  $carnivals = $compact["carnivals"];
  ?>
  <!-- Navigation Part -->
  <?php view("layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">

    <div class="card-header">
      <div class="row">
        <div class="col-md-10">
          <?php view("components/flashMessage.php"); ?>
        </div>
        <div class="col-md-2 d-flex justify-content-end">
          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#eventAddModal"
            data-backdrop="static" id="ok">Events +</button>
        </div>
      </div>
    </div>

    <div class="card-header">
      <div class="row">
        <?php
        foreach ($data as $key => $value) { ?>
          <div class="col-md-6 mb-4">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <div class="d-flex flex-md-column">
                  <strong>
                    <?= $value["carnival"] ?>
                  </strong>
                </div>
                <div>
                  <?php
                  if ($value["status"] == 1) { ?>
                    <a href="<?= url("/admin/event/status/" . $value["event_id"]) ?>"
                      class="btn btn-default btn-sm text-success"><i class="fa-solid fa-circle-check"></i></a>
                  <?php } else { ?>
                    <a href="<?= url("/admin/event/status/" . $value["event_id"]) ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-skull-crossbones"></i></a>
                  <?php }
                  ?>

                  <a href="" class="text-success btn btn-default">edit</a>
                </div>
              </div>
              <div class="card-body">
                <div class="evnt-card-row p-0">
                  <div class="engg-shishir-event-card">
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
                            <span>Start Date</span>
                            <span>
                              <?php
                              $dt = new DateTime($value['event_date']);
                              echo $dt->format('d/m/Y');
                              ?>
                            </span>
                          </div>
                          <div class="engg-shishir-event-card-schedule-time">
                            <span>Start Time</span>
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
                        <a href="<?= url("/admin/event/" . $value["event_id"]) ?>">View Details</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }
        ?>

      </div>
    </div>

    <!-- Javacript Part -->
  </div>

  <?php
  if (isset($_SESSION["error_message"]) && $_SESSION["error_message"] !== "") { ?>
    <script>
      $(function () {
        $('#eventAddModal').modal('show');
      });
    </script>
    <?php
  }
  ?>


  <?php view("Backend/Admin/Events/partials/addEvents.php", compact("carnivals")); ?>



  <?php view("layout/partials/backendScript.php"); ?>


</body>

</html>