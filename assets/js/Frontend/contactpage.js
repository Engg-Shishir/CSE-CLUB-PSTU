$(document).ready(function () {
  $("#messageFormBtn").click(function (e) {
    e.preventDefault();
    

    let fname = $("input[name=fname]").val();
    let lname = $("input[name=lname]").val();
    let email = $("input[name=email]").val();
    let company = $("input[name=company]").val();
    let subject = $("input[name=subject]").val();
    let des = $("input[name=des]").val();

    if (
      fname !== "" &&
      lname !== "" &&
      email !== "" &&
      company !== "" &&
      subject !== "" &&
      des !== ""
    ) {
      var Toast = Swal.mixin({
        toast: false,
        position: "toast-bottom-full-width",
        showConfirmButton: false,
        timer: 3000,
        progressBar: true,
      });
      Toast.fire({
        icon: "success", // error, info, warning
        title: "Message send",
      });

      setTimeout(() => {
        $("#messageForm").submit();
      }, 2000);
    } else {
      var Toast = Swal.mixin({
        toast: false,
        position: "toast-bottom-full-width",
        showConfirmButton: false,
        timer: 3000,
        progressBar: true,
      });
      Toast.fire({
        icon: "error", // error, info, warning
        title: "Fill up all field",
      });
    }
  });
});
