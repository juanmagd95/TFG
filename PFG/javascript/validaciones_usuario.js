function validar_usuario(formulario){

	return validar_login(formulario.login) && validar_password(formulario.password) && validar_repassword(formulario.password,formulario.repassword) && validar_nombre(formulario.nombre) && validar_apellido(formulario.apellido1,1) && validar_apellido(formulario.apellido2,2) && validar_tlf(formulario.tlf) && validar_tlf(formulario.tlf) && validar_email(formulario.email) && validar_hobby(formulario.hobbie1) && validar_hobby(formulario.hobbie2) && validar_hobby(formulario.hobbie3) && validar_cultura(formulario.cultura) && validar_edad(formulario.edad) && validar_universidad(formulario.universidad) && validar_rol(formulario.rol) && validar_polpriv(formulario.pol_priv);

}

function validar_login(login){
	if (login.value.length==0){
			alert("Debe introducir un nombre de usuario");
			login.focus();
			login.select();
			return false;
	}
	if (login.value.length>45){
			alert("Nombre de usuario demasiado largo");
			login.focus();
			login.select();
			return false;
	}
	return true;
}
	
function validar_password(password){
	if (password.value.length==0){
			alert("Debe introducir una contraseña");
			password.focus();
			password.select();
			return false;
	}
	if (password.value.length<6){
			alert("La contraseña debe tener al menos 6 caracteres");
			password.focus();
			password.select();
			return false;
	}
	return true;
}

function validar_repassword(password,repassword){
	if (repassword.value.length==0){
			alert("Debe confirmar la contraseña");
			repassword.focus();
			repassword.select();
			return false;
	}
	if (password.value!=repassword.value){
			alert("La contraseña y su confirmación no coinciden");
			repassword.focus();
			repassword.select();
			return false;
	}
	return true;
}


function validar_nombre(nombre){
	if (nombre.value.length==0){
			alert("Debe introducir su nombre");
			nombre.focus();
			nombre.select();
			return false;
	}
	if (nombre.value.length>45){
			alert("Nombre demasiado largo");
			nombre.focus();
			nombre.select();
			return false;
	}
	return true;
}

function validar_apellido(ape,num){
	if (ape.value.length==0){
			alert("Debe introducir el apellido " + num );
			ape.focus();
			ape.select();
			return false;
	}
	if (ape.value.length>45){
			alert("Apellido " + num + " demasiado largo");
			ape.focus();
			ape.select();
			return false;
	}
	return true;
}

function validar_tlf(tlf){
	if (tlf.value.length==0){
			alert("Debe introducir el teléfono" );
			tlf.focus();
			tlf.select();
			return false;
	}
	if (tlf.value.length!=9){
			alert("Número de dígitos para el teléfono no válido" );
			tlf.focus();
			tlf.select();
			return false;
	}
	for (i=0;i<tlf.value.length;i++)
		if(tlf.value.charCodeAt(i)<48 || tlf.value.charCodeAt(i)>57){
			alert("El téléfono solo debe constar de dígitos" );
			tlf.focus();
			tlf.select();
			return false;
		}
	return true;
}

function validar_email(email){

	if (email.value.length==0){
			alert("Debe introducir su email" );
			email.focus();
			email.select();
			return false;
	}
	if (email.value.length>45){
			alert("Émail demasiado largo" );
			email.focus();
			email.select();
			return false;
	}

	var cor=email.value;
	
	var arroba=false;
	var punto=false;
	
	

	for (i=0;i<cor.length;i++){
	
		if (cor.charAt(i)=='@'){
		
			if (arroba){

				alert("Émail no válido" );
				email.focus();
				email.select();
				return false;
			}
			else
				arroba=true;
			if (i==cor.length-1){

				alert("Émail no válido" );
				email.focus();
				email.select();
				return false;
			}
			
		
			if (i<cor.length-1 && cor.charAt(i+1)=='.'){

				alert("Émail no válido" );
				email.focus();
				email.select();
				return false;
			}
			
		}


		 else if (cor.charAt(i)=='.' && arroba){
			if (cor.charAt(i-1)=='@'){

				alert("Émail no válido" );
				email.focus();
				email.select();
				return false;
			}
			
			punto=true;
			if (i==cor.length-1){

				alert("Émail no válido" );
				email.focus();
				email.select();
				return false;
			}
			
		}
		 	 	
	   
	
		
			
       
	}
	
	if (!punto){

				alert("Émail no válido" );
				email.focus();
				email.select();
				return false;
	}
	return true;
}

function validar_hobby(hobby){
	
	if (hobby.value.length>15){
		
				alert("Hobby demasiado largo" );
				hobby.focus();
				hobby.select();
				return false;
	}
	return true;
}

function validar_cultura(cultura){
	
	if (cultura.value.length==0){
		
				alert("Debe introducir su cultura" );
				cultura.focus();
				cultura.select();
				return false;
	}
	if (cultura.value.length>45){
		
				alert("cultura demasiado larga" );
				cultura.focus();
				cultura.select();
				return false;
	}
	return true;

}

function validar_edad(edad){
	
	if (edad.value.length==0){
		
				alert("Debe introducir su edad" );
				edad.focus();
				edad.select();
				return false;
	}
	if (edad.value.length>2){
		
				alert("Edad no válida" );
				edad.focus();
				edad.select();
				return false;
	}
	for(i=0;i<edad.value.length;i++)
		if(edad.value.charCodeAt(i)<48 || edad.value.charCodeAt(i)>57){
			alert("Edad no válida" );
				edad.focus();
				edad.select();
				return false;
		}


	return true;
}

function validar_universidad(universidad){
	if (universidad.value=='0'){
		alert("Debe seleccionar una universidad");
		return false;
	}
	return true;
}

function validar_rol(rol){
	if (rol.value=='0'){
		alert("Debe seleccionar un rol");
		return false;
	}
	return true;
}
function validar_polpriv(pol_priv){
	if (pol_priv.checked==false){
			alert ("Debe aceptar la pol\u00EDtica de privacidad de datos antes de continuar");
			return false;
	}
	return true;
}


