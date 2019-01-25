function validar_rol(formulario){

	return validar_nombre_rol(formulario.nombre_rol);

}

function validar_nombre_rol(nombre_rol){
	if (nombre_rol.value.length==0){
			alert("Debe introducir un nombre para el rol");
			nombre_rol.focus();
			nombre_rol.select();
			return false;
	}
	if (nombre_rol.value.length>45){
			alert("Nombre de rol demasiado largo");
			nombre_rol.focus();
			nombre_rol.select();
			return false;
	}
	return true;
}
		