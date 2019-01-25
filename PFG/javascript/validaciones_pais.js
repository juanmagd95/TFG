function validar_pais(formulario){

	return validar_nombre_pais(formulario.nombre_pais);

}

function validar_nombre_pais(nombre_pais){
	if (nombre_pais.value.length==0){
			alert("Debe introducir un nombre para el pais");
			nombre_pais.focus();
			nombre_pais.select();
			return false;
	}
	if (nombre_pais.value.length>100){
			alert("Nombre de pais demasiado largo");
			nombre_pais.focus();
			nombre_pais.select();
			return false;
	}
	return true;
}