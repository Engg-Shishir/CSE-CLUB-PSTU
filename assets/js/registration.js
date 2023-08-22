$("document").ready(function () {
    $(".carnival").on("change", function () {
      var carnival_slug= $(this).val();
      $.ajax({
        url: "http://localhost/club/fetch/event",
        type: "POST",
        data: { carnival_slug: carnival_slug },
        dataType: "json",
        success: function (data) {

          $(".eventSelect").empty();
          // Loop through the data array and append each event as an option to the event select2 component
          $.each(data, function (index, item) {
            $(".eventSelect").append(
              $("<option>", {
                value: item.event_slug,
                text: item.event_name,
              })
            );
          });
          
          $(".eventSelect").trigger("change");
        }
      });
    });
});

