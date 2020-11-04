function validaformulario(){
  validatename();
  validateemail();
  sexok();
  verifyPassword();
  matchPassword();
}


function validatename() {
    var erroruser = 0;
    var usercorrect = document.forms["registroform"]["usuario"].value;

    if (usercorrect == "" || Character.isDigit(x.charAt(0)) || usercorrect.lenght() < 3 || usercorrect.lenght() > 15) {
      erroruser = 1;
      alert("Error! El nombre de Usuario es incorrecto!");
      mensajeemergente("titulomensaje","cuerpomensaje hola texto");
    }
  }

function validateemail(){
  var email = document.forms["registroform"]["correo"].value;
    String[] parts = email.split("@");
    String mail1 = parts[0];
    String mail2 = parts[1];
    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(registroform.correo.value) && mail1.lenght() > 1 && mail1.lenght < 64 && mail2.lenght() > 1 && mail2.lenght() < 255){
        return (true)
    }
    alert("You have entered an invalid email address!")
    return (false)
    }


function sexok() {
    var sexocorrect = document.forms["registroform"]["sexo"].value;
if (sexocorrect.value) {
  return true;
}
return false;
}

function verifyPassword() {  
    var pw = document.getElementById("contra").value;  
    //check empty password field  
    if(pw == "") {  
       document.getElementById("message").innerHTML = "**Fill the password please!";  
       return false;  
    }  
     
   //minimum password length validation  
    if(pw.length < 6) {  
       document.getElementById("message").innerHTML = "**Password length must be atleast 6 characters";  
       return false;  
    }  
    
  //maximum length of password validation  
    if(pw.length > 15) {  
       document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";  
       return false;  
    } else {  
       alert("Password is correct");  
    }
  }  


function matchPassword() {  
    var pw1 = document.getElementById("contra");  
    var pw2 = document.getElementById("repcontraseña");  
    if(pw1 != pw2)  
    {   
        document.getElementById("messageconx").innerHTML = "**Las contraseñas deben ser iguales";
    }  
    if(pw1 == pw2)  
    {   
        document.getElementById("messagecon").innerHTML = "**Las contraseñas coinciden";
    }  
}  