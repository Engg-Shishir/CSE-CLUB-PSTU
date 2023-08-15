<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CLUB | Joinus</title>
  <!-- CSS Part -->
  <?php view("pages/Partner/links.php"); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <?php
  $settings = $compact["settings"][0];
  $footer=[
    "navLogo"=>$settings["navLogo"],
    "short_des"=>$settings["short_des"],
    "copyright"=>$settings["copyright"]
  ];
  $navbar=[
    "navLogo"=>$settings["navLogo"],
    "carnival"=>[$settings["carTitle"],$settings["carSlug"]],
    "carnivals"=>$compact["carnivals"]
  ];


  $category = $compact["category"];
  $count = $compact["count"];
  ?>
  <?php view("layout/navbar.php", compact("navbar")); ?>
  <div class="container content">

    <?php view("pages/Partner/statistics.php", compact("count")); ?>
    <div class="row partner-reason-row">

      <div class="reson-title-box">
        <h1>How do sponsors partner with us?</h1>
        <p>
          The CSE is a non-profit student club, the funding of our events
          depends on the generosity of our sponsors and partners, if you wish
          to support our efforts, here are some suggestions on how to sponsor
          us:
        </p>
      </div>

      <?php view("pages/Partner/reasonCard.php", compact("category")); ?>

    </div>

    <?php view("pages/Partner/form.php"); ?>
    <?php view("layout/footer.php", compact("footer")); ?>
  </div>
  <?php view("pages/Partner/scripts.php",compact("count")); ?>
  <script>
    $(document).ready(function () {
      $("#messageFormBtn").click(function (e) {
        e.preventDefault();

        let fname = $("input[name=fname]").val();
        let lname = $("input[name=lname]").val();
        let email = $("input[name=email]").val();
        let company = $("input[name=company]").val();
        let subject = $("input[name=subject]").val();
        let des = $("input[name=des]").val();

        if (fname !== "" && lname !== "" && email !== "" && company !== "" && subject !== "" && des !== "") {
          toastr.success('Successfully Created.') ;

          setTimeout(() => {
            $("#messageForm").submit();
          }, 2000);
        } else {
          var Toast = Swal.mixin({
            toast: true,
            position: 'toast-bottom-full-width',
            showConfirmButton: false,
            timer: 3000,
            progressBar: true,
          });
          Toast.fire({
            icon: 'error', // error, info, warning
            title: 'Fill up all field'
          })
        }

      });
    });
  </script>

</body>

</html>