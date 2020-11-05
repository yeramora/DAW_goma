function validaformulario(){
  var y = 0;
  validatedate()
  y=y+validatename();
  console.log(y + ".1");
  y=y+validateemail();
  if(validateemail() == 1){
    mensajeemergente("Email erroneo", "Introduzca un mail valido");
  }
  console.log(y+".2");
  y=y+sexok();
  console.log(y+".3");
  y=y+verifyPassword();
  console.log(y+".4");
  y=y+matchPassword();
  console.log(y+".5");
  if(y!=0){
    return false
  }else{
    return true;
  }
}


function validatename() {
    var erroruser = 0;
    var usercorrect = document.forms["registroform"]["usuario"].value;

    if (usercorrect == "" || usercorrect.charAt(0) == "1" || usercorrect.charAt(0) == "2" || usercorrect.charAt(0) == "3" || usercorrect.charAt(0) == "4" || usercorrect.charAt(0) == "5" ||
    usercorrect.charAt(0) == "6" || usercorrect.charAt(0) == "7" || usercorrect.charAt(0) == "8" || usercorrect.charAt(0) == "9" || usercorrect.charAt(0) == "0" || usercorrect.lenght < 3 || usercorrect.lenght > 15) {
      erroruser = 1;
      mensajeemergente("Nombre de Usuario Erroneo","Recuerda que le nombre de usuario no debe empezar por un numero y debe ser mayor a 3 caracteres y menor a 14");
      return 1;
    }else{
      return 0;
    }
  }

function validateemail(){
  var email = document.getElementById("correo").value;
  var mail = email.split("@");

  var puntos = 0;

  

  if(email.length > 254){
    return 1;
  }


  if(mail.length != 2){
    return 1;
  }
  if(mail[0].charAt(0) == '.'){
    return 1;
  }

  if(mail[0].charAt(mail[0].length-1) == '.'){
    return 1;
  }

  for(var n = 0; n < mail[0].length; n++){
    if(mail[0].charAt(n) == "."){
      puntos = puntos + 1;
    }else{
      puntos = 0;
    }
    if(puntos == 2){
      return 1;
    }
  }


    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email))
    {
      if(mail[0].length >= 1 && mail[0].length <= 64 && mail[1].length >= 1 && mail[1].length <= 255){
        var dominios = mail[1].split(".");
        var long = dominios.length;
        for(var z = 0; z < long; z++){
          if(dominios[z].length > 63){
            return 1
          }
          if(dominios[z].charAt(0)=="-"){
            return 1
          }
          if(dominios[z].charAt(dominios[z].length-1)=="-"){
            return 1
          }
        }
        return 0  
      }else{
        return 1
      }
    }else{
      return 1;  
    }
   
    }


function sexok() {
    var sexocorrect = x = document.getElementById("sexo").value;
if (sexocorrect=="") {
  mensajeemergente("Sexo no seleccionado", "Seleccione un sexo porfavor");
  return 1;
}else{
  return 0;
}
}

function verifyPassword() {  
    var pw = document.getElementById("contra").value;

    //check empty password field  
    if(pw == "") {  
       document.getElementById("message").innerHTML = "**Rellene este campo";  
       return 1;  
    }  
     
   //minimum password length validation  
    if(pw.length < 6) {  
       document.getElementById("message").innerHTML = "**La contraseña debe tener mas de 6 caracteres";  
       return 1;  
    }  
    
  //maximum length of password validation  
    if(pw.length > 15) {  
      document.getElementById("message").innerHTML = "**La contraseña debe tener menos de 15 caracteres";  
       
       return 1;  

    }

    if(pw.search(/[a-z]/) < 0) {
      document.getElementById("message").innerHTML = "**La contraseña debe tener al menos una minuscula";  
       
      return 1
    }
    if(pw.search(/[A-Z]/) < 0) {
      document.getElementById("message").innerHTML = "**La contraseña debe tener al menos una mayuscula";
      return 1
    }
    if(pw.search(/[0-9]/) < 0) {
      document.getElementById("message").innerHTML = "**La contraseña debe tener al menos un numero";
      return 1
    }
    
    return 0;

    
  }  


function matchPassword() {  
    var pw1 = document.getElementById("contra").value;  
    var pw2 = document.getElementById("repcontraseña").value;  
    if(pw1 != pw2)  
    {   
        document.getElementById("messageconx").innerHTML = "**Las contraseñas deben ser iguales";
        console.log(pw1 + " " + pw2);
        return 1;
    }  
    if(pw1 == pw2 && pw1 != "")  
    {   
        document.getElementById("messagecon").innerHTML = "**Las contraseñas coinciden";
        return 0;
    }  
}  

function validatedate() {
  var today = new Date();



  var datennow = document.getElementById("fechnac").value;


  if(Date.parse(today) < Date.parse(datennow)){
    mensajeemergente("Fecha Erronea","Seleccione una fecha válida");
    return 1
  }else{
    return 0;
  }

}