$(function () {
  var imagesPreview = function (input, placeToInsertImagePreview) {
    if (input.files) {
      var reader = new FileReader();

      reader.onload = function (event) {
        $(placeToInsertImagePreview).attr("src", event.target.result);
      };

      $(".gallery").css({ height: "250px", width: "250px" });
      reader.readAsDataURL(input.files[0]);
    }
  };

  function getExtension(filename) {
    return filename.split(".").pop().toLowerCase();
  }
  $('input[type="file"]').change(function (e) {
    var fileName = e.target.files[0].name;
    var fileSize = e.target.files[0].size;
    var KB = Math.ceil(fileSize / 1024);
    var MB = Math.ceil(fileSize / 1024000);
    var ext = getExtension(fileName);
    $("#fileLevel").text(KB + " KB, ");

    var extentionBox = ["png", "jpg", "jpeg", "svg", "gif"];
    if ($.inArray(ext, extentionBox) >= 0) {
      imagesPreview(this, "img.gallery");
    } else {
      $(".gallery").css({ height: "0", width: "0" });
      $(".gallery").attr("src", "");
    }
  });



  $("#summernote").on("summernote.keydown", function (e) {
    $("#descriptionBox").html($('#summernote').summernote('code'));
  });





});


