<script src="https://kit.fontawesome.com/4b35f5bfb9.js" crossorigin="anonymous"></script>
<script src="<?= assets('js/adminSidebar.js') ?>"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
  new DataTable('#example');
</script>
<script>
  $(document).ready(function () {
    collegeEdit = function (x) {
      // $(".editBox").slideToggle();
    }

    $('.country-select').select2({
      placeholder: 'Select Country',
      closeOnSelect: true
    });

    $('.carnival-select').select2({
      placeholder: 'Select Carnival',
      closeOnSelect: true
    });

    


  });

  $(document).ready(function () {
    $('.summernote').summernote({
      height: 100,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        // [ 'fontname', [ 'fontname' ] ],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ol', 'ul', 'paragraph']],
        ['table', ['table']],
        ['view', ['undo', 'redo', 'codeview', 'help']]
      ]
    });
  });

</script>