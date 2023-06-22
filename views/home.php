<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shishir PHP MVC Framework</title>
  <link rel="stylesheet" href="<?= assets("Plugin/Bootstrap/bootstrap.css") ?>">
  <link rel="stylesheet" href="<?= assets("css/home.css") ?>">
</head>

<body>


  <div class="container">
    <div class="background" style='background-image: url("<?php echo assets("images/php.svg") ?>")'></div>

    <div class="row mt-4">
      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Shishir Bhuiyan</li>
            <li class="breadcrumb-item active" aria-current="page">shishir.cse.pstu@gmail.com</li>
            <li class="breadcrumb-item active" aria-current="page">Simple PHP MVC Framework</li>
            <li class="breadcrumb-item active" aria-current="page">Mode : Development</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="essential-gloval-function">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#essential-gloval-function-colapse" aria-expanded="false"
                aria-controls="essential-gloval-function-colapse">
                <strong>Global Class Function</strong>
              </button>
            </h2>
            <div id="essential-gloval-function-colapse" class="accordion-collapse collapse"
              aria-labelledby="essential-gloval-function" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <ul>
                  <li> <code>shishirEnv()</code> to access <code>.env</code> variable </li>
                  <li> <code>view()</code> to access <code>views</code> file </li>
                  <li> <code>parray()</code> to print data in view file,which was send by controller </li>
                  <li> <code>assets()</code> to load <code>assets</code> folder data </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="essential-gloval-db-function">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#essential-gloval-db-function-colapse" aria-expanded="false"
                aria-controls="essential-gloval-db-function-colapse">
                <strong>Global Database handale Function</strong>
              </button>
            </h2>
            <div id="essential-gloval-db-function-colapse" class="accordion-collapse collapse"
              aria-labelledby="essential-gloval-db-function" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <ul>
                  <li><code>fetchall($tableName)</code> to access specific table all rows </li>
                  <li><code>fetchById($tableName,$tableColumnName,$targetData)</code> to access specific table specific
                    column rows. You should pass 3 arguments. Such as tablename, table column name, column value.Suppose
                    id=2</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="css-settings-describe">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#css-settings-describe-colapse" aria-expanded="false"
                aria-controls="css-settings-describe-colapse">
                <strong>Design guideline</strong>
              </button>
            </h2>
            <div id="css-settings-describe-colapse" class="accordion-collapse collapse"
              aria-labelledby="css-settings-describe" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <ul>
                  <li>Import <code>@import './setting/settings';</code> from settings folder, in your design
                    <code>scss</code> file </li>
                  <li>For responsive,folloe this formate<br>
                  <strong>SCSS : </strong><br>
                    <code>
                      .container{<br>
                        &nbsp;&nbsp;.breadcrumb{<br>
                         &nbsp;&nbsp;&nbsp;&nbsp;background-color:#f3f3f3;<br> 
                         &nbsp;&nbsp;&nbsp;&nbsp;@include respond(lp-sm){<br>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;background-color: #f0bbbb;<br>
                          &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                          &nbsp;&nbsp;}<br>
                          &nbsp;}<br>
                    </code><br>
                  <strong>CSS : </strong><br>
                  <code>
                  .container .breadcrumb {<br>
                    &nbsp;&nbsp;background-color: #f3f3f3;<br>
                  }<br>
                  @media only screen and (min-width: 992px) {<br>
                    &nbsp;&nbsp;.container .breadcrumb {<br>
                      &nbsp;&nbsp;&nbsp;&nbsp;background-color: #f0bbbb;<br>
                      &nbsp;&nbsp;}<br>
                  }
                  </code>
                  </li>
                  <li> Availavle parameter for <code>@include respond(){}</code> function <br>
                    <code>
                      $mb-sm: 320px;<br>
                      $mb-md: 375px;<br>
                      $mb-lg: 425px;<br>
                      $tb-sm: 576px;<br>
                      $tb-md: 768px;<br>
                      $lp-sm: 992px;<br>
                      $lp-md: 1280px;<br>
                      $lp-lg: 1440px;<br>
                    </code>
                  </li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="col-md-2"></div>
    </div>
  </div>



  <script src="<?= assets("Plugin/Jquery/jquery-3.6.0.js") ?>"></script>
  <script src="<?= assets("Plugin/Bootstrap/bootstrap.js") ?>"></script>
</body>

</html>