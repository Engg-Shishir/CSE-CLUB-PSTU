<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Tranjection</title>
  <!-- CSS Part -->
  <?php view("layout/partials/backendLink.php"); ?>
  <link rel="stylesheet" href="<?= assets('style/Backend/Admin/Static/college.css'); ?>" />
  <link rel="stylesheet" href="<?= assets('style/Backend/Admin/Payment/transection.css'); ?>" />
</head>

<body>
  <?php
  $settings = $compact["settings"];
  $navbar = [
    "navLogo" => $settings["navLogo"]
  ];
  if(count($compact["data"]) > 0){
    $total = $compact["data"][0]["sum"];
  }else{
     $total=0;
  }

  $eventMoney = ($compact["eventMoney"]>0) ? $compact["eventMoney"] : 0;


  ?>
  <?php view("layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">
    <div class="card-header" style="background-color:none !important;">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3 mb-1">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-sack-dollar"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total</span>
              <span class="info-box-number">
                <?= $total ?>
                <small> Taka</small>
              </span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 mb-1">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-sack-dollar"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Event</span>
              <span class="info-box-number">
                <?= $eventMoney ?>
                <small> Taka</small>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <table id="example" class="table table-striped table-responsive w-100 d-block d-md-table">
            <thead>
              <tr>
                <th>Tranjection No</th>
                <th>Type</th>
                <th>Reason</th>
                <th>Amount</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($compact["data"] as $key => $item) {

                ?>
                <tr style='<?php if($item["status"]==1) echo"background-color:#cbffd2;"; ?>'>
                  <td>
                    <a style="color:blue;">
                      <?= $item["tno"] ?>
                    </a>
                  </td>
                  <td>
                    <?= $item["pay_type"] ?>
                  </td>
                  <td>
                    <?= $item["reason"] ?>
                  </td>
                  <td>
                    <?= $item["amount"] ?>
                  </td>
                  <td>
                    <?= $item["tr_date"] ?>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="col-md-4">
          <div class="reg-form">
            <?php view("components/flashMessage.php"); ?>
            <form action="<?= url("/admin/tranjection"); ?>" method="POST">
              <div class="form-group">
                <label for=""><strong>Tranjection From</strong></label>
                <select name="pay_type" class="select2  form-control">
                  <option value="">Current Education Status</option>
                  <?php
                  $tran = [
                    "bikash" => "Bikash",
                    "rocket" => "Rocket",
                    "nagod" => "Nagod"
                  ];

                  foreach ($tran as $key => $value) {
                    echo "<option value='" . $key . "'>" . $value . "</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="row row-input">
                <?= inputField("text", "tno", "", "Tranjection No", "lg postal-code-input"); ?>
              </div>
              <div class="row row-input">
                <?= inputField("text", "amount", "", "Amount", "lg"); ?>
              </div>
              <div class="form-group">
                <label for=""><strong>Reason</strong></label>
                <select name="reason" class="select2  form-control">
                  <option value="">Current Education Status</option>
                  <?php
                  $reason = [
                    "event" => "Event",
                    "club" => "Club",
                    "enrolment" => "Enrolment"
                  ];

                  foreach ($reason as $key => $value) {
                    echo "<option value='" . $key . "'>" . $value . "</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="reg-btn-box">
                <a href="">
                  <button class="glowing-btn" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Tranjection
                  </button>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php view("layout/partials/backendScript.php"); ?>

</body>

</html>