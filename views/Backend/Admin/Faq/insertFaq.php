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
    $typedata = $compact["selectType"];
    ?>
    <?php view("./layout/Admin/navbar.php", compact("navbar")); ?>
    <div class="containers content">

        <div class="card-header" style="">
            <div class="row">
                <div class="col-md-7">
                    <table id="example" class="table table-striped">
                        <thead>
                            <tr>
                                <th>For</th>
                                <th>Question</th>
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
                <div class="col-md-5">
                    <div class="editBox"></div>
                    <div class="reg-form">
                        <?php view("components/flashMessage.php"); ?>
                        <form action="<?= url("/admin/faq"); ?>" method="POST" enctype="multipart/form-data">
                            <?php
                            if (is_array($typedata) && count($typedata) > 0) {
                                ?>
                                <div class="form-group small p-0">
                                    <label><strong>Faq for ?</strong></label>
                                    <?= selectForm($typedata, "faq_category", "select2"); ?>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="form-group">
                                    <level><strong>Faq for?</strong></level>
                                    <input type="text" class="form-control" name="faq_category" value="<?= $typedata ?>"
                                    readonly />
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <label><strong>Question</strong></label>
                                <textarea class="form-control" name="question" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label><strong>Answer</strong></label>
                                <textarea class="form-control" name="ans" rows="4"></textarea>
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
        </div>

    </div>
    <?php view("layout/partials/backendScript.php"); ?>
</body>

</html>