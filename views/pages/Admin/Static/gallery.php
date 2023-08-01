<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Gallery</title>
  <!-- CSS Part -->
  <?php view("pages/Admin/Static/links.php"); ?>
  <link rel="stylesheet" href="<?= assets('pages/Admin/Static/gallery.css'); ?>" />
</head>

<body>

  <!-- Navigation Part -->
  <?php view("./layout/Admin/navbar.php"); ?>
  <div class="containers content">

    <div class="card-header" style="">
      <div class="row">
        <div class="col-md-8" style="border-right:2px solid #383d59;">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
                <th>File Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $key => $item) {
                ?>
                <tr>
                  <td>
                    <?= $item["title"] ?>
                  </td>
                  <td>
                    <?= $item["description"] ?>
                  </td>
                  <td>
                    <?= $item["file_type"] ?>
                  </td>
                  <td>
                    <a href="<?= url("/admin/gallery/delete/" . $item["title"]) ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-trash"></i></a>
                    <a target="_blank" href="<?= $item["source"] ?>"
                      class="btn btn-default btn-sm text-success"><i class="fa-solid fa-eye"></i></a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="col-md-4">
          <div class="imageBox">
            <div class="image">
              <img class="gallery" id="output"/>
              <!-- <div class="gallery"></div> -->
            </div>
          </div>
          <div class="reg-form">
            <?php view("components/flashMessage.php"); ?>
            <form action="<?= url("/admin/gallery"); ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <div class="input-group">
                  <div class="custom-file">
                    <!-- <input type="file" name="file" class="custom-file-input" id="exampleInputFile" 
                      onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0]); document.getElementById('output').style.width='250px';document.getElementById('output').style.height='250px';document.getElementById('output').style.display='block';"> -->
                      <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                    <label id="fileLevel" class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="File Title">
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
                    Upload
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
  <?php view("pages/Admin/Static/scripts.php"); ?>
  <script src="<?= assets('pages/Admin/Static/gallery.js'); ?>"></script>

</body>

</html>