var password = document.getElementById("password")
  , confirm_password = document.getElementById("repeatpassword");

function validatePassword(){
  if(password.value != repeatpassword.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } 
}
