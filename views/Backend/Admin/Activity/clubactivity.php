<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club | Activity</title>
    <!-- CSS Part -->
    <?php view("layout/partials/backendLink.php"); ?>
    <link rel="stylesheet" href="<?= assets('style/Backend/Admin/Alumini/alumini.css'); ?>" />
</head>

<body>
    <?php
    $settings = $compact["settings"];
    $navbar = [
        "navLogo" => $settings["navLogo"]
    ];
    ?>
    <?php view("layout/Admin/navbar.php", compact("navbar")); ?>
    <div class="containers content">
        <div class="card-header" style="background-color:none !important;">
            <div class="row">
                <div class="col-md-8" style="border-right:1px solid;">
                    <table id="example" class="table table-striped table-responsive w-100 d-block d-md-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Year</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($compact["activityData"] as $key => $item) {

                                ?>
                                <tr style='<?php if ($item["status"] == 1)
                                    echo "background-color:#ebf8ed;"; ?>'>
                                    <td>
                                        <img src="<?= assets("Upload/ClubActivity/" . $item["image"]) ?>" height="40px"
                                            width="40px">
                                    </td>
                                    <td>
                                        <?= $item["event_name"] ?>
                                    </td>
                                    <td>
                                        <?= $item["year"] ?>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-default btn-sm text-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        <?php
                                        if ($item["status"] == 1) {
                                            ?>
                                            <a href="" class="btn btn-default btn-sm text-success">
                                              <i class="fa-solid fa-circle-check"></i>
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                                <a href="" class="btn btn-default btn-sm text-danger">
                                                <i class="fa-solid fa-circle-check"></i>
                                                </a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <?php view("components/flashMessage.php"); ?>
                    <form action="<?= url("/admin/clubactivity"); ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-md-12">
                                    <div class="imageBox">
                                        <div class="image">
                                          <img class="gallery" id="output">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label><strong>Activity Title</strong></label>
                                <input type="text" class="form-control" name="event_name" placeholder="Activity name"
                                    value="<?= ietp("event_name") ?>">
                            </div>
                            <div class="form-group">
                                <label><strong>Activity Image</strong></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0 p-0">
                                <div class="col-md-12 m-0 p-0">
                                    <div class="form-group m-0">
                                        <label><strong>Activity year</strong></label>
                                        <input type="date" class="form-control" name="year">
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0 p-0">
                                <div class="col-md-12 m-0 p-0">
                                    <div class="form-group">
                                        <label><strong>Activity Details</strong></label>
                                        <textarea class="form-control" name="description" rows="4"
                                            spellcheck="true"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary form-control mt-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php view("layout/partials/backendScript.php"); ?>
    <script src="<?= assets('js/gallery.js'); ?>"></script>


</body>

</html>