document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector("form");

  if (form) {
    form.addEventListener("submit", function (event) {
      var name = document.querySelector("input[name='name']").value;
      var email = document.querySelector("input[name='email']").value;
      var message = document.querySelector("textarea[name='message']").value;

      if (name === "" || email === "" || message === "") {
        alert("Please fill in all fields before submitting.");
        event.preventDefault();
      }
    });
  }
});