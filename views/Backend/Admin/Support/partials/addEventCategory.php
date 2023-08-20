<div class="modal fade" data-backdrop="static" id="eventCategoryAddModal" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <?php view("components/flashMessage.php"); ?>
        <div class="card card-primary">
          <form action="<?= url("/admin/partnerpage"); ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label>Event Name</label>
                <input type="text" class="form-control" name="title" placeholder="Enter event name"
                  value="<?= ietp("title") ?>">
              </div>
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <div class="imageBox">
                     <img id="image">
                  </div>
                </div>
                <div class="col-md-3"></div>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Event Logo</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" onchange="myfunction(this)">
                    <label class="custom-file-label" id="level_image" for="exampleInputFile">Choose file</label>
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