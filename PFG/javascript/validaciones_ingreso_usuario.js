function validar_ingreso_usuario(formulario){

	return validar_login(formulario.login) && validar_password(formulario.password);

}

function validar_login(login){
	if (login.value.length==0){
			alert("Debe introducir un nombre de usuario");
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
	return true;
}