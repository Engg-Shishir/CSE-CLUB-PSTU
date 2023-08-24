<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Home</title>
  <?php view("layout/partials/backendLink.php"); ?>
  <link rel="stylesheet" href="<?= assets('style/Backend/dashboard.css'); ?>" />
</head>

<body>
  <?php
  $navbar = [
    "navLogo" => $settings["navLogo"]
  ];
  ?>
  <?php view("layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">
    <div class="row mb-2">
      <div class="col-sm-6 col-md-4 col-lg-3 col-12 mb-1">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>150</h3>
            <p>New Orders</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 col-12 mb-1">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>
            <p>Bounce Rate</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 col-12 mb-1">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>44</h3>
            <p>User Registrations</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 col-12 mb-1">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>
            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3 mb-1">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">CPU Traffic</span>
            <span class="info-box-number">
              10
              <small>%</small>
            </span>
          </div>

        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-3 mb-1">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Likes</span>
            <span class="info-box-number">41,410</span>
          </div>

        </div>

      </div>
      <div class="col-12 col-sm-6 col-md-3 mb-1">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Sales</span>
            <span class="info-box-number">760</span>
          </div>

        </div>

      </div>
      <div class="col-12 col-sm-6 col-md-3 mb-1">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">New Members</span>
            <span class="info-box-number">2,000</span>
          </div>

        </div>

      </div>

    </div>

    <div class="row">
      <div class="col-md-3">
        <div id="accordion">
          <div class="card">
            <div class="card-header card-success collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                  aria-controls="collapseOne">
                <div class="header-card">
                  <p>Recent User</p>
                 <i class="fas fa-plus"></i>
                </div>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php view("layout/partials/backendScript.php"); ?>
</body>

</html>