<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Insert</title>
    <!-- CSS Part -->
    <link rel="stylesheet" href="<?= assets('style/Backend/Admin/Static/gallery.css'); ?>" />
    <?php view("layout/partials/backendLink.php"); ?>


</head>

<body>
    <?php
    $navbar = $compact["settings"];
    $blogCategory = $compact["blogCategory"];
    ?>
    <?php view("layout/Admin/navbar.php", compact("navbar")); ?>
    <div class="containers content">
        <div class="card-header" style="">
            <div class="row">
                <div class="col-md-12">
                    <div class="reg-form">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-md-3 ">
                                <img class="gallery" id="output">
                            </div>
                        </div>
                        <?php view("components/flashMessage.php"); ?>
                        <?php
                        $url = "/admin/blog";
                        if (isset($data["title"]) && $data["title"] !== "")
                            $url = "/admin/blog/update";
                        ?>
                        <form action="<?= url($url); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <?php
                                if (isset($data["title"]) && $data["title"] !== "")
                                    echo '<input type="hidden" name="old_file" value="' . $data["banner"] . '">';
                                ?>
                                <?php
                                if (isset($data["blog_id"]) && $data["blog_id"] !== "")
                                    echo '<input type="hidden" name="blog_id" value="' . $data["blog_id"] . '">';
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <level><b>Blog Banner</b></level>
                                        <div class="custom-file">
                                            <input type="file" name="banner" class="custom-file-input" id="banerFile">
                                            <label id="fileLevel" class="custom-file-label" for="banerFile">Choose
                                                file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group lg p-0">
                                        <level><b>Blog Category</b></level>
                                        <?= selectForm($blogCategory, "category_id", "select2"); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <level><b>Blog Title</b></level>
                                <input type="text" class="form-control" name="title"
                                        placeholder="Enter Project Name" value="<?php if(strlen(ietp("title"))>0) echo ietp("title"); else ?>">
                            </div>
                            <div class="form-group">
                                <level><b>Blog Description</b></level>
                                <textarea class="form-control summernote" name="details" id="summernote">
                                    <?= ietp("details") ?>
                                </textarea>
                            </div>

                            <div class="reg-btn-box">
                                <a href="">
                                    <button class="glowing-btn" type="submit">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <?php
                                        if (isset($data["title"]) && $data["title"] !== "")
                                            echo "Update";
                                        else
                                            echo "Insert";
                                        ?>
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="descriptionBox"></div>
            </div>
        </div>
    </div>

    <?php view("layout/partials/backendScript.php"); ?>
    <script src="<?= assets('js/gallery.js'); ?>"></script>
    <!-- #region -->

    <script>
        $("document").ready(function () {
        })
    </script>
</body>

</html>