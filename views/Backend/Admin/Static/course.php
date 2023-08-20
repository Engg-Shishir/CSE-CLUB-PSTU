<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Course</title>
  
  <?php view("layout/partials/backendLink.php"); ?>
  <link rel="stylesheet" href="<?= assets('style/Backend/Admin/Static/city.css'); ?>" />
</head>

<body>
  <?php
    $navbar = $compact["settings"];
    $data = $compact["data"];
  ?>
  <?php view("./layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">

    <div class="card-header" style="">
      <div class="row">
        <div class="col-md-8" style="border-right:2px solid #383d59;">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
                <th>Course Code</th>
                <th>Title</th>
                <th>Credit</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $key => $item) {
                ?>
                <tr>
                  <td>
                    <?= $item["course_code"] ?>
                  </td>
                  <td>
                    <?= $item["course_name"] ?>
                  </td>
                  <td>
                    <?= $item["credit"] ?>
                  </td>
                  <td>
                    <?php echo substr($item["course_des"], 0, 30) . "....."; ?>
                  </td>
                  <td>
                    <a href="<?= url("/admin/course/delete/" . $item["course_code"]) ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-trash"></i></a>
                    <a onclick='courseEdit(<?= $item["course_code"] ?>);' class="btn btn-default btn-sm"><i
                        class="fa-solid fa-pen"></i></a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="col-md-4">
          <div class="editBox"></div>
          <div class="reg-form">
            <?php view("components/flashMessage.php"); ?>
            <form action="<?= url("/admin/course"); ?>" method="POST" enctype="multipart/form-data">

              <div class="row row-input">
                <?= inputField("text", "course_code", "", "Course Code", "lg course-form-field"); ?>
              </div>
              <div class="row row-input">
                <?= inputField("text", "course_name", "", "Courese Title", "lg course-form-field"); ?>
              </div>
              <div class="row row-input">
                <?= inputField("text", "credit", "", "Courese credit", "lg course-form-field"); ?>
              </div>
              <div class="row row-input">
                <?= textArea("course_des", "", "Courese Description", "lg course-form-field"); ?>
              </div>
              <div class="reg-btn-box">
                <a href="">
                  <button class="glowing-btn" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Course
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