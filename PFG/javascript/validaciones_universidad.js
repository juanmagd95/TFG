function validar_universidad(formulario){

	return validar_pais(formulario.pais) &&validar_nombre_universidad(formulario.nombre);

}

function validar_nombre_universidad(nombre){
	if (nombre.value.length==0){
			alert("Debe introducir un nombre para la universidad");
			nombre.focus();
			nombre.select();
			return false;
	}
	if (nombre.value.length>150){
			alert("Nombre de la universidad demasiado largo");
			nombre.focus();
			nombre.select();
			return false;
	}
	return true;
}

function validar_pais(pais){
	if (pais.value=='0'){
		alert("Debe seleccionar un país");
		return false;
	}
	return true;
}