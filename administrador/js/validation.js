//var username = document.forms['vform']['username'];
var email = document.forms['vform']['email'];
// var password = document.forms['vform']['password'];
// var password_confirm = document.forms['vform']['password_confirm'];

// SELECTING ALL ERROR DISPLAY ELEMENTS
//var name_error = document.getElementById('name_error');
 var email_error = document.getElementById('email_error');
// var password_error = document.getElementById('password_error');

// SETTING ALL EVENT LISTENERS
username.addEventListener('blur', nameVerify, true);
email.addEventListener('blur', emailVerify, true);
password.addEventListener('blur', passwordVerify, true);

// validation function
function Validate() {
  // validate username
//   if (username.value == "") {
//     username.style.border = "1px solid red";
//     document.getElementById('username_div').style.color = "red";
//     name_error.textContent = "Username is required";
//     username.focus();
//     return false;
//   }
  if (email.value == "") {
    email.style.border = "1px solid red";
    document.getElementById('email_div').style.color = "red";
    email_error.textContent = "Email is required";
    email.focus();
    return false;
  }
  
}
function emailVerify() {
    if (email.value != "") {
        email.style.border = "1px solid #5e6e66";
        document.getElementById('email_div').style.color = "#5e6e66";
        email_error.innerHTML = "";
        return true;
    }
  }