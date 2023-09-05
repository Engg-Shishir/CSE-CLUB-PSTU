<div class="modal fade" data-backdrop="static" id="addPartnerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl ">
    <div class="modal-content">
      <?php view("components/flashMessage.php"); ?>
      <div class="modal-body">
        <div class="card card-primary">
          <form action="<?= url("/admin/partner"); ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Company Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter company name" value="<?= ietp("name") ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?= ietp("email") ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone No</label>
                    <input type="text" class="form-control" name="phone" placeholder="Contact No" value="<?= ietp("phone") ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Website Url</label>
                    <input type="text" class="form-control" name="web" value="<?= ietp("web") ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputFile">Company Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea3">Address</label>
                    <textarea class="form-control" name="address" rows="3"><?= ietp("address") ?></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea3">Description</label>
                    <textarea class="form-control summernote" name="description" rows="3"><?= ietp("description") ?></textarea>
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