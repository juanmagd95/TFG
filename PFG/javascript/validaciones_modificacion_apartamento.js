function validar_modificacion_apartamento(formulario){
	if (validar_localidad(formulario.localidad) && validar_calle(formulario.calle) && validar_numero(formulario.numero) && validar_piso(formulario.piso) && validar_letra(formulario.letra) && validar_nh(formulario.num_habitaciones) && validar_num_baños(formulario.num_baños) && validar_internet(formulario.internet) && validar_ascensor(formulario.ascensor) && validar_calefaccion(formulario.calefaccion) &&  validar_parking(formulario.parking) && validar_provincia(formulario.provincia) && validar_precio(formulario.precio) && validar_tipo_apartamento(formulario.tipo_apartamento))
		return true;
	else
		return false;

}

function validar_localidad(localidad){
	
	if (localidad.value.length==0){
			alert("Debe introducir una localidad");
			localidad.focus();
			localidad.select();
			return false;
	}
	if (localidad.value.length>45){
			alert("Nombre de localidad demasiado largo");
			localidad.focus();
			localidad.select();
			return false;
	}
	return true;
}

function validar_calle(calle){
	
	if (calle.value.length==0){
			alert("Debe introducir una calle");
			calle.focus();
			calle.select();
			return false;
	}
	if (calle.value.length>45){
			alert("Nombre de la calle demasiado largo");
			calle.focus();
			calle.select();
			return false;
	}
	return true;
}
function validar_numero(numero){
	
	
	if (numero.value.length>4){
			alert("Numero demasiado largo");
			numero.focus();
			numero.select();
			return false;
	}
	for (i=0;i<numero.length;i++){
		if (numero.charCodeAt(i)<48 || numero.charCodeAt(i)>57){
			alert("El numero de la calle no es valido");
			numero.focus();
			numero.select();
			return false;
		}
	}
	return true;
}
function validar_piso(piso){
	
	
	if (piso.value.length>3){
			alert("Piso demasiado largo");
			piso.focus();
			piso.select();
			return false;
	}
	for (i=0;i<piso.length;i++){
		if (piso.charCodeAt(i)<48 || piso.charCodeAt(i)>57){
			alert("El piso no es valido");
			piso.focus();
			piso.select();
			return false;
		}
	}
	return true;
}

function validar_letra(letra){
	
	
	if (letra.value.length>1){
			alert("Letra no válida");
			letra.focus();
			letra.select();
			return false;
	}

	if (letra.value.charCodeAt(i)>48 && letra.value.charCodeAt(0)<57){
			alert("Letra no válida");
			letra.focus();
			letra.select();
			return false;
	}
	return true;
}

function validar_nh(num_habitaciones){
	
	if (num_habitaciones.value.length==0){
			alert("Debe introducir un numero de habitaciones");
			num_habitaciones.focus();
			num_habitaciones.select();
			return false;
	}
	if (num_habitaciones.value>999){
			alert("Número de habitaciones excesivo");
			num_habitaciones.focus();
			num_habitaciones.select();
			return false;
	}
	for (i=0;i<num_habitaciones.value.length;i++){
		if (num_habitaciones.value.charCodeAt(i)<48 || num_habitaciones.value.charCodeAt(i)>57){
			alert("El numero de habitaciones no es valido");
			num_habitaciones.focus();
			num_habitaciones.select();
			return false;
		}
	}
	return true;
}

function validar_num_baños(num_baños){
	if (num_baños.value.length==0){
			alert("Debe introducir un numero de cuartos de baño");
			num_baños.focus();
			num_baños.select();
			return false;
	}
	if (num_baños.value.length>2){
			alert("Número de cuartos de baño excesivo");
			num_baños.focus();
			num_baños.select();
			return false;
	}
	for (i=0;i<num_baños.value.length;i++){
		if (num_baños.value.charCodeAt(i)<48 || num_baños.value.charCodeAt(i)>57){
			alert("El numero de cuartos de baño no es valido");
			num_baños.focus();
			num_baños.select();
			return false;
		}
	}
	return true;
}

function validar_internet(internet){
	if (internet.value=="sn"){
		
		alert("Debe seleccionar la opción de internet");
		
		return false;
	}
	return true;
}

function validar_ascensor(ascensor){
	if (ascensor.value=="sn"){
		
		alert("Debe seleccionar la opción de ascensor");
		
		return false;
	}
	return true;
}

function validar_calefaccion(calefaccion){
	if (calefaccion.value=="sn"){
		
		alert("Debe seleccionar la opción de calefacción");
		
		return false;
	}
	return true;
}

function validar_parking(parking){
	if (parking.value=="sn"){
		
		alert("Debe seleccionar la opción de parking");
		
		return false;
	}
	return true;
}

function validar_precio(precio){
	if (precio.value.length==0){
			alert("Debe introducir el precio");
			precio.focus();
			precio.select();
			return false;
	}
	if (precio.value.length>10){
			alert("Número de dígitos excesivo para el precio");
			precio.focus();
			precio.select();
			return false;
	}
	for (i=0;i<precio.value.length;i++){
		if ((precio.value.charCodeAt(i)<48 || precio.value.charCodeAt(i)>57) && precio.value.charAt(i)!='.' && precio.value.charAt(i)!=','){
			alert("El precio no es valido");
			precio.focus();
			precio.select();
			return false;
		}
	}
	for (i=0;i<precio.value.length;i++){
		if (precio.value.charAt(i)==','){
			alert("Utilice punto para los decimales, no use la coma");
			precio.focus();
			precio.select();
			return false;
		}
	}
	cont=0;
	for (i=0;i<precio.value.length;i++)
		if (precio.value.charAt(i)=='.')
			  cont++;
	if (cont>1){
		alert("El precio no es valido");
		precio.focus();
		precio.select();
		return false;
		
	}

	return true;
	
}

function validar_tipo_apartamento(tipo){
	if (tipo.value=='0'){
		alert("Debe seleccionar un tipo de apartamento");
		
		return false;
			
	}
	return true;

}
function validar_provincia(provincia){
	if (provincia.value=='0'){
		alert("Debe seleccionar una provincia");
		return false;
			
	}
	return true;

}