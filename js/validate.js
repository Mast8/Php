    var email = document.forms['vform']['email'];
    var password = document.forms['vform']['password'];

    var email_erro = document.getElementById('email_erro');
    var pass_error = document.getElementById('pass_error');

   //var email_div = document.getElementById('email_div');
  //email.addEventListener('blur', emailVerify, true);

// validation function
function Validate() {
 
 
    wow = validateEmail();
    wow1 = validatePassword();

    if(wow && wow1)
      return true;
      else return false;
  
  
  // if (email.value == "") {
  //   email.style.border = "1px solid red";
  //   email_erro.textContent = "Email is required";
  //   document.getElementById('email_erro').style.color = "red";
  //   email.focus();
  //   return false;
  // }

  // if (password.value.trim() == "") {
  //   password.style.border = "1px solid red";
  //   pass_error.textContent = "Password is required";
  //   document.getElementById('pass_error').style.color = "red";
  //   password.focus();
  //   return false;
  // }
}

function validateEmail() {
  // check if is empty
  if (checkIfEmpty(email, email_erro)) return false;
  // is if it has only letters
  //if (!checkIfOnlyLetters(firstName)) return;
  return true;
}
function validatePassword() {
  if (checkIfEmpty(password, pass_error)) return false;
  // is if it has only letters
  //if (!checkIfOnlyLetters(firstName)) return;
  return true;
}


function checkIfEmpty(field, errorDiv) {
  if (field.value.trim()=="") {
    // set field invalid
    setInvalid(field, `The field ${field.name} must not be empty`, errorDiv);
    return true;
  } else {
    // set field valid
    setValid(field,errorDiv);
    return false;
  }
}

function setInvalid(field, message, errorDiv){
  if (field.value == "") {
    field.style.border = "1rem solid red";
    errorDiv.textContent = message;
    errorDiv.style.color = "red";
    field.focus();

  }
}

function setValid(field, errorDiv) {
      field.style.border = "2rem solid #5e6e66";
      errorDiv.style.color = "#5e6e66"
      errorDiv.innerHTML = "";
}


// function emailVerify() {
//   if (email.value.trim() != "") {
//       email.style.border = "1px solid #5e6e66";
//       //document.getElementById('email_div').style.color = "#5e6e66";
//       email_erro.innerHTML = "";
//       return true;
//   }
// }

// function passwordVerify() {
//   if (password.value.trim() != "") {
//       password.style.border = "1px solid #5e6e66";
//       //document.getElementById('email_div').style.color = "#5e6e66";
//       pass_error.innerHTML = "";
//       return true;
//   }
// }
