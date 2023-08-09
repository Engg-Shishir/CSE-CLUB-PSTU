<div class="modal fade" data-backdrop="static" id="projectAddModal" tabindex="-1" aria-labelledby="projectAddModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl ">
    <div class="modal-content">
      <?php view("components/flashMessage.php"); ?>
      <div class="modal-body">
        <div class="card card-primary">
          <form action="<?= url("/admin/project"); ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Project Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Project Name" value="<?= ietp("title") ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputFile">Project Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="logo">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Author Id</label>
                    <input type="text" class="form-control" name="user_id" placeholder="Author id" value="<?= ietp("user_id") ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Source Code Link</label>
                    <input type="text" class="form-control" name="sourcecode" value="<?= ietp("sourcecode") ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description"><?= ietp("description") ?></textarea>
                  </div>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>