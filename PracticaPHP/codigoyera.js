//GENERALES 
function mensajeemergente(titulo, mensaje){
  let div = document.createElement('div');
  div.setAttribute('id','capafondo'); 
  let html = '';
  html += '<article>';
  html += '<h2>'+titulo+'</h2>';
  html += '<p>'+mensaje+'</p>';
  html += '<button onclick="cerrarmodal();"> Aceptar </button>';
  html += '</article>';
 div.innerHTML = html;
  document.body.appendChild(div);
}
function cerrarmodal(){
  document.querySelector('#capafondo').remove();
}

//GENERALES end

//Formularios
function validateForm() {
    var nom = document.forms["formulario"]["username"].value;
    var pass = document.forms["formulario"]["password"].value;
    if (nom == "" || pass =="") {
      mensajeemergente("No se puede dejar en blanco","Vuelve a introducirlo");
      return false;
    }
    if(nom.substring(0,1)==" " || pass.substring(0,1)==" "){
      mensajeemergente("No se pueden poner espacios","Vuelve a introducirlo");
        return false;
    }
  }
  //Formularios end

  //Tablas
function creatabla(){ //  <table> //table >caption strong> tr>td
  var tabla = document.getElementById("tabla");
  var tbody=document.createElement("tbody");
  var precio2="yokese";
  //crear celdas
  for(var i=0; i<=14;i++){
    var row = document.createElement("tr");
    for(var j=0; j<=5;j++){
      if(j==0){
        precio2=i+1;
      }
      else{
        if(j==1) {precio2=(i+1)*3;}
        else{ precio2 = calculaprecio(i,j)}
      }
      var celda = document.createElement("td");
      var precio = document.createTextNode(precio2);
      celda.appendChild(precio);
      row.appendChild(celda);
    }
    tbody.appendChild(row);
  }
  var cap=document.createElement("caption");
  var texto = document.createTextNode("Tabla de precios");
  var cabecera =document.createElement("tr");
  var header1 =document.createElement("th");
  var textoh1 = document.createTextNode("numero de paginas");
  var header2 =document.createElement("th");
  var textoh2 = document.createTextNode("numero de fotos");
  var header3 =document.createElement("th");
  var textoh3 = document.createTextNode("150-300 dpi");
  var header4 =document.createElement("th");
  var textoh4 = document.createTextNode("450-900 dpi");
  var header5 =document.createElement("th");
  var textoh5 = document.createTextNode("150-300 dpi");
  var header6 =document.createElement("th");
  var textoh6 = document.createTextNode("150-300 dpi");
  
  cap.appendChild(texto);
  header1.appendChild(textoh1);
  header2.appendChild(textoh2);
  header3.appendChild(textoh3);
  header4.appendChild(textoh4);
  header5.appendChild(textoh5);
  header6.appendChild(textoh6);
  cabecera.appendChild(header1);
  cabecera.appendChild(header2);
  cabecera.appendChild(header3);
  cabecera.appendChild(header4);
  cabecera.appendChild(header5);
  cabecera.appendChild(header6);

  tabla.appendChild(cap);
  tabla.appendChild(cabecera);
  tabla.appendChild(tbody);
  
}

function calculaprecio(i,j){
  //breaking points de precio en 4 y 11 con decrementos de 2 y 1 ct al precio total
  var precio;
  var deductor1=0;
  var deductor2=0;
  switch(j){
    case 2: precio=0.1;break;
    case 3: precio=0.16;break;
    case 4: precio=0.25;break;
    case 5: precio=0.31;break;
  }
  if(i>3){
    console.log(i-4);
    deductor1=(i-3)*0.02;
    if(i>11){
      deductor2=(i-10)*0.01;
    }
  }
  
  precio=precio*(i+1);
  precio = precio.toFixed(2);
  precio=precio-deductor1-deductor2;
  precio = precio.toFixed(2);
  return precio;
  
}

  //Tablas end