<script src="https://kit.fontawesome.com/4b35f5bfb9.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="<?= assets('js/navbar.js') ?>"></script>

<script>
  $(document).ready(function () {
    $('.select2').select2({
      placeholder: 'Select an option',
      closeOnSelect: true
    });

    $('#file').change(function () {
      // var file = $(this).get(0).files[0];
      // if (file) {
      //   var extension = $(this).val().split('.').pop().toLowerCase();
      //   var validFileExtensions = ['jpeg', 'jpg', 'png'];
      //   if ($.inArray(extension, validFileExtensions) == -1) {
      //     // $('#file').val("");
      //     $("#imagealert").css({ 'display': 'block' });
      //     $("#imagealert").children('strong').text("Wrong file selected");
      //   } else {
      //     // Get file size as MB
      //     var MB = Math.floor(file.size / 1024000);
      //     if (MB > 1) {
      //       // $('#file').val("");
      //       $("#imagealert").css({ 'display': 'block' });
      //       $("#imagealert").children('strong').text("File size at most 2 MB");
      //     } else {
      //       // $('#file').val("");
      //       $("#imagealert").css({ 'display': 'none' });
      //       $("#imagealert").children('strong').text("");
      //       $('#file').next().text(file.name);
      //     }
      //   }
      // }
    });

  });
</script>