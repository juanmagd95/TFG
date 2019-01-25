<?php
class usuario {
	private  $NUM_HOBBIES = 3;
	private   $id, $edad, $id_universidad, $id_rol, $tlf;
	private $login, $password, $nombre, $apellido1, $apellido2, $email, $cultura, $nombre_tabla="users";
	private $hobbies;
	
	
	
	public function __construct() { // constructor por defecto
		$this->id=0;
		$this->login="";
		$this->password="";

		$this->edad=0;
		$this->id_universidad=0;
		$this->id_rol=0;
		$this->nombre="";
		$this->apellido1 = "";
		$this->apellido2="";
		$this->email="";
		$this->cultura="";
		$this->tlf=0;
		for ($i =0; $i<$this->NUM_HOBBIES;$i++)
			$this->hobbies[$i]="";
		
	}
	
	//constructor por parámetros (recibiendo como hobbies un String):
	
	
	public function usuario2($login, $password,$nombre, $apellido1, $apellido2, $tlf, $email, $hobbies, $cultura, $edad, $id_universidad, $id_rol) {
		$this->id=0;
		$this->login=$login;
		$this->password=$password;
		$this->nombre=$nombre;
		$this->apellido1=$apellido1;
		$this->apellido2=$apellido2;
		$this->tlf=$tlf;
		$this->email=$email;
		$this->cultura=$cultura;
		$this->edad=$edad;
		$this->id_universidad=$id_universidad;
		$this->id_rol=$id_rol;
		$this->hobbies=$hobbies.split(" ");
		
	}
	
	//constructor por parámetros (recibiendo como hobbies un vector de Strings):
	
	
		public function usuario3( $login, $password, $nombre, $apellido1, $apellido2, $tlf, $email, $hobbies, $cultura, $edad, $id_universidad, $id_rol) {
			$this->id=0;
			$this->login=$login;
			$this->password=$password;
			$this->nombre=$nombre;
			$this->apellido1=$apellido1;
			$this->apellido2=$apellido2;
			$this->tlf=$tlf;
			$this->email=$email;
			$this->cultura=$cultura;
			$this->edad=$edad;
			$this->id_universidad=$id_universidad;
			$this->id_rol=$id_rol;
			$this->hobbies=$hobbies;
			
		}
		
		
		// constructor a partir de la id de usuario
		public function usuario4($id) {
			$this->id=$id;
			if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
			}

			if (!mysqli_select_db( $enlace, 'mydb')) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
			}

			$sql = "SELECT * FROM " . $this->nombre_tabla . "  WHERE ID_USER = " . $this->id;
			$resultado = mysqli_query( $enlace, $sql);

			if (!$resultado) {
    			echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    			exit;
			}

			
			if ($this->id!=0) {
				if($fila = mysqli_fetch_assoc($resultado)){
		
					$this->login=$fila["LOGIN"];
					$this->password=$fila["PASSWORD"];
					$this->nombre=$fila["NAME"];
					$this->apellido1=$fila["FIRST_NAME"];
					$this->apellido2=$fila["SECOND_NAME"];
					$this->tlf=$fila["PHONE"];
					$this->email=$fila["MAIL"];
					$this->cultura=$fila["CULTURE"];
					$this->edad=$fila["AGE"];
					$this->id_universidad=$fila["ID_UNIVERSITY"];
					$this->id_rol=$fila["ID_ROL"];
					$this->hobbies=explode(" ",$fila["HOBBIES"]);
				}
				else{
					$this->login="";
					$this->password="";
					$this->nombre="";
					$this->apellido1="";
					$this->apellido2="";
					$this->tlf=0;
					$this->email="";
					$this->cultura="";
					$this->edad=0;
					$this->id_universidad=0;
					$this->id_rol=0;
					for ($i =0; $i<$NUM_HOBBIES;$i++)
							$hobbies[$i]="";
				}
				
				
			}
			else {
					$this->login="";
					$this->password="";
					$this->nombre="";
					$this->apellido1="";
					$this->apellido2="";
					$this->tlf=0;
					$this->email="";
					$this->cultura="";
					$this->edad=0;
					$this->id_universidad=0;
					$this->id_rol=0;
					for ($i =0; $i<$NUM_HOBBIES;$i++)
							$hobbies[$i]="";
			}
				
			
	}
		
		
	// Métodos GETTERS	
	public function getLogin() {
		return $this->login;
	}

	public function getPassword() {
		return $this->password;
	}
	public function getId() {
		return $this->id;
	}
	
	public function getNombre() {
		return $this->nombre;
	}
	
	public function getApellido1() {
		return $this->apellido1;
	}
	
	public function getApellido2() {
		return $this->apellido2;
	}
	public function getTlf() {
		return $this->tlf;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function getHobbies() {
		return $this->hobbies;
	}
	
	public function getCultura() {
		return $this->cultura;
	}
	
	public function getEdad() {
		return $this->edad;
	}
	
	public function getId_Universidad() {
		return $this->id_universidad;
	}
	
	public function getId_Rol() {
		return $this->id_rol;
	}
	
	
	
	//Métodos SETTERS:
	
	public function setId($id) {
		$this->id = $id;
	
	}
	public function setLogin($login) {
		$this->login = $login;
	
	}

	public function setPassword($password) {
		$this->password = $password;
	
	}
	
	public function setNombre($nombre) {
		$this->nombre=$nombre;
	}
	
	
	public function setApellido1($apellido1) {
		$this->apellido1=$apellido1;
	}
	
	public function setApellido2($apellido2) {
		$this->apellido2=$apellido2;
	}
	
	public function setTlf($tlf) {
		$this->tlf=$tlf;
	}
	
	
	public function setEmail($email) {
		$this->email=$email;
	}
	
	public function setHobbies1($hobbies) {
		$this->hobbies=$hobbies.split(" ");
	}
	
	public function setHobbies2($hobbies) {
		$this->hobbies=$hobbies;
	}
	
	
	
	public function setCultura($cultura) {
		$this->cultura=$cultura;
	}
	
	public function setEdad($edad) {
		$this->edad=$edad;
	}
	
	public function setId_Universidad($id_universidad) {
		$this->id_universidad=$id_universidad;
	}
	
	public function setId_Rol($id_rol) {
		$this->id_rol=$id_rol;
	}
	
	// Método para mostrar todos los datos del usuario
	
	public function  mostrar() {
		if ($this->id != 0)
			echo "Id-->" . $this->id . "\n" ;
		echo "Login-->" . $this->login . "\n";
		echo "Contraseña--> " . $this->password . "\n";
		 echo "Nombre y apellidos --> " . $this->nombre . " " . $this->apellido1 . " " . $this->apellido2 . "\n";
		echo "Teléfono --> " . $this->tlf . "\n";
		echo "Email --> " . $this->email . "\n";
		
		for ($i=0; $i<$this->NUM_HOBBIES;$i++ )
			echo $this->hobbies[$i] . " ";
		echo "\n";
			
		
		echo "Cultura --> " . $this->cultura . "\n";
		echo "Edad --> " . $this->edad . "\n";
		echo "Id Universidad --> " . $this->id_universidad . "\n";
		echo "Id_Rol --> " . $this->id_rol . "\n" ;
		
	}
	
	
	// Método para insertar el usuario en la tabla
	
	public function Insertar() {

		if (!$enlace = mysqli_connect("localhost", "root", "")) {
    		echo 'No pudo conectarse a mysql';
   		    exit;
		}

		if (!mysqli_select_db($enlace,"mydb")) {
    		echo 'No pudo seleccionar la base de datos';
    		exit;
		}
		
			
			
		$cad="";
		for ($i = 0; $i<$this->NUM_HOBBIES; $i++){
			$cad = $cad . $this->hobbies[$i];;
			if ($i<$this->NUM_HOBBIES-1)
				$cad = $cad . " ";
		}
		$this->login=utf8_decode($this->login);
		$this->password=utf8_decode($this->password);
		$this->nombre=utf8_decode($this->nombre);
		$this->apellido1=utf8_decode($this->apellido1);
		$this->apellido2=utf8_decode($this->apellido2);
		$this->email=utf8_decode($this->email);
		$cad=utf8_decode($cad);
		$this->cultura=utf8_decode($this->cultura);
		$insertTableSQL = "INSERT INTO " . $this->nombre_tabla . "(LOGIN, PASSWORD, NAME, FIRST_NAME, SECOND_NAME, PHONE, MAIL, HOBBIES, CULTURE, AGE, ID_UNIVERSITY, ID_ROL) VALUES('" . $this->login . "', '" . $this->password . "', '" . $this->nombre . "', '" . $this->apellido1 . "', '" . $this->apellido2 . "', " . $this->tlf . ", '" . $this->email . "', '" . $cad . "', '" . $this->cultura . "', " . $this->edad . ", " . $this->id_universidad . ", " . $this->id_rol . ")"; 
				
		if (mysqli_query($enlace,$insertTableSQL))

			echo "<script>alert('Inserción realizada con éxito. La tabla ha sido actualizada.');</script>";
						
		else{
			
			echo mysqli_error($enlace);
		    echo "No pudo realizarse la inserción";
		    echo $insertTableSQL;
		   }
	}
	
	//Método para modificar los datos del usuario

		public function Modificar() {

			if ($this->id!=0) {
				if (!$enlace = mysqli_connect("localhost", "root", "")) {
    				echo 'No pudo conectarse a mysql';
   		    		exit;
				}

				if (!mysqli_select_db($enlace,"mydb")) {
    				echo 'No pudo seleccionar la base de datos';
    				exit;
				}
				
				$cad="";
				for ($i = 0; $i<$this->NUM_HOBBIES; $i++){
					$cad = $cad . $this->hobbies[$i];;
					if ($i<$this->NUM_HOBBIES-1)
						$cad = $cad . " ";
				}
				$this->login=utf8_decode($this->login);
				$this->password=utf8_decode($this->password);
				$this->nombre=utf8_decode($this->nombre);
				$this->apellido1=utf8_decode($this->apellido1);
				$this->apellido2=utf8_decode($this->apellido2);
				$this->email=utf8_decode($this->email);
				$cad=utf8_decode($cad);
				$this->cultura=utf8_decode($this->cultura);
				$modifyTableSQL = "UPDATE " . $this->nombre_tabla .  " SET LOGIN = '" . $this->login . "', PASSWORD = '" . $this->password . "', NAME = '" . $this->nombre .  "' ,  FIRST_NAME = '" . $this->apellido1 . "' ,  SECOND_NAME = '" . $this->apellido2 . "' , PHONE = " . $this->tlf . " , MAIL = '" . $this->email . "' , HOBBIES = '" . $cad . "' , CULTURE = '" . $this->cultura . "' , AGE  = " . $this->edad . " , ID_UNIVERSITY = " . $this->id_universidad . " , ID_ROL = " . $this->id_rol . " WHERE ID_USER = " . $this->id;
				$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_USER = " . $this->id;
			
	     		$resultado=mysqli_query($enlace,$sql);
				if(!($fila = mysqli_fetch_assoc($resultado)))
					echo "No existe el usuario. La tabla no se ha actualizado!";
				else{
				
					mysqli_query($enlace,$modifyTableSQL);
        			echo "<script>alert('Se ha modificado el usuario con éxito. La tabla ha sido actualizada');</script>";
				
				}
		}
	}
						
	
	// Método para borrar usuario de la base de datos
	
	public function Borrar() {
		if ($this->id!=0) {
			if (!$enlace = mysqli_connect("localhost", "root", "")) {
    				echo 'No pudo conectarse a mysql';
   		    		exit;
				}

				if (!mysqli_select_db( $enlace,'mydb')) {
    				echo 'No pudo seleccionar la base de datos';
    				exit;
				}
				$deleteTableSQL = "DELETE FROM " . $this->nombre_tabla . " WHERE ID_USER = " . $this->id;
				$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_USER = " . $this->id;
		
				$resultado=mysqli_query($enlace,$sql);
				if(!($fila = mysqli_fetch_assoc($resultado)))
					echo "No existe el usuario. La tabla no se ha actualizado!";
				else{
					mysqli_query($enlace,$deleteTableSQL);
					echo "<script>alert('Se borró el usuario correctamente. La tabla ha sido actualizada.');</script>";
		            
				}
					
		}
	}
}	

?>