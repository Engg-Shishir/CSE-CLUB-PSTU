<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog | Category</title>
  <!-- CSS Part -->
  <?php view("layout/partials/backendLink.php"); ?>
  <link rel="stylesheet" href="<?= assets('style/Backend/Admin/Static/college.css'); ?>" />
</head>

<body>

  <?php
    $navbar = $compact["settings"];
    $blogCategory = $compact["blogCategory"];
  ?>
  <?php view("layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">

    <div class="card-header" style="background-color:none !important;">
      <div class="row">
        <div class="col-md-9" style="border-right:2px solid #383d59;">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
                <th>Category Name</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ( $blogCategory as $key => $item) {
                  
                ?>
                <tr>
                  <td>
                    <?= $item["name"] ?>
                  </td>
                  <td>
                    <?= $item["description"] ?>
                  </td>
                  <td>
                    <a href="<?= url("/admin/blog/delete/" . $item["category_id"]) ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-trash"></i></a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="col-md-3">
          <div class="imageBox">
            <div class="image">
              <img class="gallery" id="output"/>
              <!-- <div class="gallery"></div> -->
            </div>
          </div>
          <div class="reg-form">
            <?php view("components/flashMessage.php"); ?>
            <form action="<?= url("/admin/blogcategory"); ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="File name">
              </div>
              <div class="form-group">
                <textarea name="description" class="form-control" rows="3" placeholder="File description"></textarea>
              </div>

              <div class="reg-btn-box">
                <a href="">
                  <button class="glowing-btn" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Insert
                  </button>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
     
  </div>
  <!-- Javacript Part -->
  <?php view("layout/partials/backendScript.php"); ?>
</body>

</html>