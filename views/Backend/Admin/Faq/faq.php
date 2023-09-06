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