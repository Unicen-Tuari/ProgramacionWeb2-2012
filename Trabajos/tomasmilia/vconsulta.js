

/*function vconsulta(formulario) {
  if(formulario.username.value.length==0) { //comprueba que no esté vacío
    formulario.username.focus();   
    alert('No has escrito tu Nombre'); 
    return false; //devolvemos el foco
  }
  if(formulario.lastname.value.length==0) { //comprueba que no esté vacío
    formulario.lastname.focus();   
    alert('No has escrito tu Apellido'); 
    return false; //devolvemos el foco
  }
  if(formulario.email.value.length==0) { //comprueba que no esté vacío
    formulario.email.focus();
    alert('No has escrito tu E-Mail');
    return false;
  }
  if(formulario.mensaje.value.length==0) {  //comprueba que no esté vacío
    formulario.mensaje.focus();
    alert('No has escrito ninguna mensaje');
    return false;
  }
  return true;
}
*/

function validar(e) {
  e.preventDefault() || window.eventReturnValue = false;
  return false;
}