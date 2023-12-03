function confirmSwalHandler({ title, text, buttonText, url, redirectTo }) {
  Swal.fire({
    icon: "warning",
    title,
    text,
    showCancelButton: true,
    confirmButtonText: buttonText,
    confirmButtonColor: "#ca2b43",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url,
        method: "GET",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            Swal.fire({
              text: response.message,
              icon: "success",
              showConfirmButton: false,
              timer: 1000,
            }).then((result) => {
              window.location.href = redirectTo;
            });
          } else {
            Swal.fire("Error!", response.message, "error");
          }
        },
        error: function (xhr, status, error) {
          console.error(xhr.responseText);
          Swal.fire("Error!", "An error occurred. Please try again.", "error");
        },
      });
    }
  });
}
