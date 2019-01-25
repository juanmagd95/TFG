function validar_tipo_apartamento(formulario){

	return validar_nombre_tipo(formulario.nombre_tipo);

}

function validar_nombre_tipo(nombre_tipo){
	if (nombre_tipo.value.length==0){
			alert("Debe introducir un nombre para el tipo de apartamento");
			nombre_tipo.focus();
			nombre_tipo.select();
			return false;
	}
	if (nombre_tipo.value.length>45){
			alert("Nombre del tipo demasiado largo");
			nombre_tipo.focus();
			nombre_tipo.select();
			return false;
	}
	return true;
}