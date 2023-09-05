<script src="https://kit.fontawesome.com/4b35f5bfb9.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            "lineHeight": 1,
            "height": 500,
            "fontNames": ["Arial", "Arial Black", "Comic Sans MS", "Courier New", "Georgia", "Impact", "Times New Roman", "Trebuchet MS", "Verdana", "Helvetica", "Calibri", "Palatino Linotype", "Tahoma", "Geneva", "Bookman Old Style", "Century Gothic", "Garamond", "Lucida Console", "Lucida Sans Unicode", "MS Sans Serif"],
            "lineHeights": ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
            "fontSizes": ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150'],
            "toolbar": [
                ["style", ["bold", "italic", "underline", "clear"]],
                ["font", ["strikethrough",'fontname']],
                ["fontsize", ["fontsize"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ['insert', ['link', 'picture', 'video', 'hr']],
                ['table', ['table']],
                ["height", ["height"]],
                ['view', ['undo', 'redo', 'codeview','fullscreen']]
            ]
        });
    });
    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-full-width",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }


</script>