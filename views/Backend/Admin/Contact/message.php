<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Message</title>
    <!-- CSS Part -->
    <?php view("layout/partials/backendLink.php"); ?>
    <link rel="stylesheet" href="<?= assets('style/Backend/dashboard.css'); ?>" />

</head>

<body>
    <?php
    $navbar = $comapact["settings"];
    $data = $comapact["data"];
    ?>
    <?php view("layout/Admin/navbar.php", compact("navbar")); ?>

    <div class="containers content">
        <div class="card-header">
            <table id="example" class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $key => $item) {
                        
                        ?>
                        <tr style="background-color:<?php if($item["isRead"] == 0) echo"#c0f0c0;"?>">
                            <td>
                                <?php echo $item["fname"] . " " . $item["lname"]; ?>
                            </td>
                            <td>
                                <?= $item["email"] ?>
                            </td>
                            <td>
                                <?= $item["company"] ?>
                            </td>
                            <td>
                                <?= $item["subject"] ?>
                            </td>
                            <td>
                                <?= $item["des"] ?>
                            </td>
                            <td colspan="2">
                                <div>
                                    <form action="<?= url("/admin/message/status"); ?>" method="POST">
                                        <input type="hidden" value="<?= $item["isRead"] ?>" name="isRead">
                                        <input type="hidden" value="<?= $item["id"] ?>" name="id">
                                        <?php if ($item["isRead"] == 0) {
                                            $btnColor = "btn-danger";
                                            $btnName = "Unseen";
                                        }else{
                                            $btnColor = "btn-success";
                                            $btnName = "Seen";
                                        } ?>
                                        <input class="btn btn-sm <?= $btnColor; ?>" type="submit" value="<?= $btnName; ?>">
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Javacript Part -->
    <?php view("layout/partials/backendScript.php"); ?>
</body>

</html>