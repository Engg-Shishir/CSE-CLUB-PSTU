<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users | Manage</title>
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
            <th>Username</th>
            <th>role</th>
            <th>status</th>
            <th>Last Login</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($data as $key => $item) {
            ?>
            <tr>
              <td>
                <?= $item["username"] ?>
              </td>
              <td>
                <form action="<?= url("/admin/user/role"); ?>" method="POST">
                  <input type="hidden" value="<?= $item["username"] ?>" name="username">
                  <select onchange="this.form.submit()" name="role">
                    <option value="admin" <?= $item['role'] == '1' ? ' selected="selected"' : ''; ?>>Admin</option>
                    <option value="accountent" <?= $item['role'] == '1' ? ' selected="selected"' : ''; ?>>Accountent</option>
                    <option value="student" <?= $item['role'] == '1' ? ' selected="selected"' : ''; ?>>Student</option>
                    <option value="teacher" <?= $item['role'] == '3' ? ' selected="selected"' : ''; ?>>Teacher</option>
                    <option value="alumini" <?= $item['role'] == '4' ? ' selected="selected"' : ''; ?>>Alumini</option>
                    <option value="partcipant" <?= $item['role'] == '5' ? ' selected="selected"' : ''; ?>>Participant</option>
                    <option value="Partner" <?= $item['role'] == '5' ? ' selected="selected"' : ''; ?>>Partner</option>
                  </select>
                </form>
              </td>
              <td>
                <?= $item["status"] ?>
              </td>
              <td>

                <?php
                $dt = new DateTime($item['last_login']);
                echo $dt->format('d/m/y');
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $dt->format('H:i A');
                ?>
              </td>
              <td colspan="2">
                <div>
                  <form action="<?= url("/admin/user/status"); ?>" method="POST">
                    <input type="hidden" value="<?= $item["status"] ?>" name="status">
                    <input type="hidden" value="<?= $item["username"] ?>" name="username">
                    <?php if ($item["status"] == 0) {
                      $btnColor = "btn-danger";
                      $btnName = "Inactive";
                    } else {
                      $btnColor = "btn-success";
                      $btnName = "Active";
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