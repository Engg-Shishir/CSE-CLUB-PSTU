
<script src="https://kit.fontawesome.com/4b35f5bfb9.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= assets('js/adminSidebar.js') ?>"></script>







<script>
    $(document).ready(function () {
        $("#example").DataTable();
        $('.select2').select2({
            placeholder: 'Select Option',
            closeOnSelect: true,
            // dropdownParent: $("#actionddModal1")
        });

        $('.country-select').select2({
            placeholder: 'Select Country',
            closeOnSelect: true
        });
    });

    $(document).ready(function () {
        $('.summernote').summernote({
            // height: 150,
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