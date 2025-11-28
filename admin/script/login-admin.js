const visibilityLogo = document.querySelector(".visibility-logo");
const passwordField = document.querySelector("#password");

const req = new XMLHttpRequest();
req.open('GET', "../api/staff");
req.addEventListener('load', function() {
  if (req.status === 200)
  {
    staffData = JSON.parse(req.responseText);
    console.log(staffData[0]['nama_staff']);
  }
  else
  {
    console.error("Bad request");
  }
});

req.send();

visibilityLogo.addEventListener("click", function() {
  if (passwordField.type == "password") {
    passwordField.type = "text";
    visibilityLogo.src = "../assets/show.svg";
  } else {
    passwordField.type = "password";
    visibilityLogo.src = "../assets/hide.svg";
  }
})