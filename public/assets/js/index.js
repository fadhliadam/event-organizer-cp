function confirmSwalHandler({ title, text, buttonText, url, redirectTo, method = "GET" }) {
  Swal.fire({
    icon: "warning",
    title,
    text,
    showCancelButton: true,
    confirmButtonText: buttonText,
    confirmButtonColor: "#ca2b43",
  }).then((result) => {
    if (result.isConfirmed) {
      performAjaxRequest({ url, redirectTo, method });
    }
  });
}

function performAjaxRequest({ url, redirectTo, method }) {
  $.ajax({
    url,
    method,
    dataType: "json",
    success: function (response) {
      if (response.status === "success") {
        Swal.fire({
          text: response.message,
          icon: "success",
          showConfirmButton: false,
          timer: 1000,
        }).then(() => {
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
