<script src="https://kit.fontawesome.com/4b35f5bfb9.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="<?= assets('js/navbar.js') ?>"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
  integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
          var Toast = Swal.mixin({
            toast: false,
            position: 'toast-bottom-full-width',
            showConfirmButton: false,
            timer: 3000,
            progressBar: true,
          });
          Toast.fire({
            icon: 'success', // error, info, warning
            title: 'Message send'
          })

          setTimeout(() => {
            $("#messageForm").submit();
          }, 2000);
        } else {
          var Toast = Swal.mixin({
            toast: false,
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