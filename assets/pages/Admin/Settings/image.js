$("document").ready(function () {
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
      // var fileName = e.target.files[0].name;
      // var fileSize = e.target.files[0].size;
      // var KB = Math.ceil(fileSize / 1024);
      // var MB = Math.ceil(fileSize / 1024000);
      // var ext = getExtension(fileName);
      // $("#fileLevel").text(fileName + "~~~~~ Size: " + KB + " KB");

      // var extentionBox = ["png", "jpg", "jpeg", "svg", "gif"];
      // if ($.inArray(ext, extentionBox) >= 0) {
      //   imagesPreview(this, "img.gallery");
      // } else {
      //   $(".gallery").css({ height: "0", width: "0" });
      //   $(".gallery").attr("src", "");
      // }
    });



  });
});

function displayImagePreview(file,fieldId) {
  var reader = new FileReader();
  reader.onload = function(e) {
    $('#'+fieldId).attr("src", e.target.result);
    $('#'+fieldId).css({ height: "150px", width: "150px" });
  };
  reader.readAsDataURL(file);
}



function myfunction(fileInput) {
  console.log(fileInput.name);
  if (fileInput.files && fileInput.files[0]) {
    var file = fileInput.files[0];
    var fileSize = (file.size / 1024).toFixed(2); // Size in KB
    var fileType = file.type;
    
    var details = "File Name: " + file.name + "<br>";
    details += "File Size: " + fileSize + " KB<br>";
    details += "File Type: " + fileType;
    $("#level_"+fileInput.name).text(file.name + "~~~~~ Size: " + fileSize + " KB");
    

    displayImagePreview(file,fileInput.name);
   
  } else {
    $('#fileDetails').html("No file selected.");
  }
}

