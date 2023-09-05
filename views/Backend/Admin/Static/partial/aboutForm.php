<?php  
    $datas=[ "banner" => "","google_map_latitude" => "","google_map_langitude" => "","phone" => "","fax" => "","email" => "","about" => ""];
if(count($data)){
  $datas = $data;
}

?>

<form action="<?= url("/admin/about"); ?>" method="POST" enctype="multipart/form-data">
  <div class="card-body">
    <?php view("components/flashMessage.php"); ?>
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-3">
        <div class="imageBox">
          <div class="image">
            <?php
            if (isset($datas["banner"]) && $datas["banner"] !== null) { ?>
              <img src="<?= assets("Upload/PageBanner/" . $datas["banner"]) ?>" class="gallery" id="output"
                style="height:250px; width:250px;">
            <?php }
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label><strong>Page Banner</strong></label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input logo" name="banner" onchange="myfunction(this)">
              <label id="level_logo" class="custom-file-label" for="logoLevel">Choose file</label>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label><strong>Map Latitude</strong></label>
          <input 
                name="google_map_latitude" 
                type="text" class="form-control" 
                placeholder="Google map latitude"
                value="<?php if (isset($datas["google_map_latitude"])) echo $datas["google_map_latitude"]; ?>"
          >
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label><strong>Map Longitude</strong></label>
          <input name="google_map_langitude" type="text" class="form-control" placeholder="Google map longitude"
                value="<?php if (isset($datas["google_map_langitude"])) echo $datas["google_map_langitude"]; ?>"
          >
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label><strong>Phone</strong></label>
          <input name="phone" type="number" class="form-control" placeholder="Contact address"
                value="<?php if (isset($datas["phone"])) echo $datas["phone"]; ?>"
          >
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label><strong>Fax</strong></label>
          <input name="fax" type="number" class="form-control" placeholder="Contact fax"
                value="<?php if (isset($datas["fax"])) echo $datas["fax"]; ?>"
          >
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label><strong>Email</strong></label>
          <input name="email" type="email" class="form-control" placeholder="Contact email"
                value="<?php if (isset($datas["email"])) echo $datas["email"]; ?>"
          >
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label><strong>About Club</strong></label>
          <textarea class="form-control" name="about" rows="4"><?php if (isset($datas["about"])) echo $datas["about"]; ?></textarea>
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