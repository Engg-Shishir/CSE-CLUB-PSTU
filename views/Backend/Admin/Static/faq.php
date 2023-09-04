<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Faq</title>
  <!-- CSS Part -->
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
        <div class="col-md-6">
          <div class="editBox"></div>
          <div class="reg-form">
            <form action="<?= url("/admin/faq"); ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group small p-0">
                <label for=""><strong>Which Page ?</strong></label>
                <select name="faq_category" id="" class="select2 details-select">
                  <option value="">Select Option</option>
                  <option value="Home">Home</option>
                  <option value="Carnival">Carnival</option>
                  <option value="Event">Event</option>
                  <option value="Course">Course</option>
                  <option value="Partner">Partner</option>
                  <option value="Registration">Registration</option>
                  <option value="Login">Login</option>
                </select>
              </div>
              <div class="row row-input">
                <?= textArea("question", "", "Question", "lg postal-code-input"); ?>
              </div>
              <div class="row row-input">
                <?= textArea("ans", "", "Answer", "lg"); ?>
              </div>
              <div class="reg-btn-box">
                <a href="">
                  <button class="glowing-btn" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Faq Insert
                  </button>
                </a>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="editBox"></div>
          <div class="reg-form">
            <?php view("components/flashMessage.php"); ?>
            <form action="<?= url("/admin/faq"); ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group small p-0">
                <label for=""><strong>Which Page ?</strong></label>
                <select name="faq_category" id="" class="select2 details-select">
                  <option value="">Select Option</option>
                  <option value="Home">Home</option>
                  <option value="Carnival">Carnival</option>
                  <option value="Event">Event</option>
                  <option value="Course">Course</option>
                  <option value="Partner">Partner</option>
                  <option value="Registration">Registration</option>
                  <option value="Login">Login</option>
                </select>
              </div>
              <div class="row row-input">
                <?= textArea("question", "", "Question", "lg postal-code-input"); ?>
              </div>
              <div class="row row-input">
                <?= textArea("ans", "", "Answer", "lg"); ?>
              </div>
              <div class="reg-btn-box">
                <a href="">
                  <button class="glowing-btn" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Faq Update
                  </button>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row"  style="margin-top:100px;">
        <div class="col-md-12">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
                <th>For</th>
                <th>Question</th>
                <th>Ans</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $key => $item) {
                ?>
                <tr>
                  <td>
                    <?= $item["faq_category"] ?>
                  </td>
                  <td>
                    <?= $item["question"] ?>
                  </td>
                  <td>
                    <?= $item["ans"] ?>
                  </td>
                  <td>
                    <a href="<?= url("/admin/faq/delete/" . $item["faq_id"]) ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-trash"></i></a>
                    <a onclick='faqEdit(<?= $item["faq_id"] ?>);' class="btn btn-default btn-sm"><i
                        class="fa-solid fa-pen"></i></a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <?php view("layout/partials/backendScript.php"); ?>
</body>

</html>