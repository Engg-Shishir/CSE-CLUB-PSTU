$("document").ready(function () {
  $(".carnival").on("change", function () {
    var carnival_slug = $(this).val();
    $.ajax({
      url: "http://localhost/club/fetch/event",
      type: "POST",
      data: { carnival_slug: carnival_slug },
      dataType: "json",
      success: function (data) {
        console.log(data);

        $(".eventSelect").empty();
        // Loop through the data array and append each event as an option to the event select2 component
        $.each(data, function (index, item) {
          $(".eventSelect").append(
            $("<option>", {
              value: item.event_id,
              text: item.event_name,
            })
          );
        });

        $(".eventSelect").trigger("change");
      },
    });
  });







  $("#emailVerifyBtn").click(function(e){
    e.preventDefault();
    var email = $("#email").val();
    $.ajax({
      url: "http://localhost/club/mail/verify",
      type: "POST",
      data: { 
        email: email,
        table: "event_reg"
      },
      dataType: "json",
      success: function (data) {
        if(data.type=="error"){
          toastr.error(data.message);
        }else{
          toastr.success(data.message);
        }
      },
    });
  }) 








});
