<?php

class aplicacion {

private $id, $id_usuario, $id_apartamento;
private $nombre_tabla="applications";

private $fecha;


public function __construct(){ // constructor por defecto
	
	$this->id=0;
	$this->id_usuario=0;
	$this->id_apartamento=0;
	$this->fecha = "1/1/1970";
	
}

// constructor por parámetros pasando como fecha un tipo Date

public function aplicacion2($id_usuario, $id_apartamento, $fecha) { 
	$this->id = 0;
	$this->id_usuario=$id_usuario;
	$this->id_apartamento=$id_apartamento;
	$this->fecha= $fecha;
}


public function aplicacion3($id) { // constructor a partir de la id de la aplicación
  $this->id=$id;

  if ($this->id!=0) {
	if (!$enlace = mysqli_connect("localhost", "root", "")) {
    	echo 'No pudo conectarse a mysql';
   		exit;
	}

	if (!mysqli_select_db( $enlace,'mydb')) {
    	echo 'No pudo seleccionar la base de datos';
    	exit;
	}
	$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_APPLICATION = " . $this->id;
	$resultado = mysqli_query($enlace,$sql);

	if (!$resultado) {
    	echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    	exit;
	}

	if($fila = mysqli_fetch_assoc($resultado)){
		$this->id_usuario=$fila["ID_USER"];
		$this->id_apartamento=$fila["ID_APARTMENT"];
		$this->fecha=$fila["DATE"];
	}			
	else {
			$this->id_usuario=0;
			$this->id_apartamento = 0;
			$this->fecha= "1/1/1970";	
	}
		
 }
 else {
	$this->id_usuario=0;
	$this->id_apartamento = 0;
	$this->fecha= "1/1/1970";	
 }
}


// Métodos GETTERS

public function getId() {
	return $this->id;
}

public function getId_Usuario() {
	return $this->id_usuario;
}

public function getId_Apartamento() {
	return $this->id_apartamento;
}

public function getFecha() {
	return $this->fecha;
}


// Métodos SETTERS

public function setId($id) {
	$this->id=$id;
}

public function setId_Usuario($id_usuario) {
	$this->id_usuario=$id_usuario;
}

public function setId_Apartamento($id_apartamento) {
	$this->id_apartamento=$id_apartamento;
}


public function setFecha($fecha) {
	$this->fecha=$fecha;
}


// Método para mostrar los datos de la aplicación

public function mostrar() {
	if ($this->id!=0)
		echo "Id--> " . $this->id . "\n";
	
	echo "Id_Usuario--> " . $this->id_usuario ."\n";
	echo "Id_Apartamento--> " . $this->id_apartamento . "\n";
	echo "Fecha--> " . $this->fecha . "\n";
}
//Método para insertar la aplicación en la tabla

public function Insertar() {
	
		if (!$enlace = mysqli_connect("localhost", "root", "")) {
    		echo 'No pudo conectarse a mysql';
   		    exit;
		}

		if (!mysqli_select_db($enlace,"mydb")) {
    		echo 'No pudo seleccionar la base de datos';
    		exit;
		}
		$insertTableSQL = "INSERT INTO " .$this->nombre_tabla . "(ID_USER, ID_APARTMENT, DATE) VALUES" . "(" . $this->id_usuario . ", " . $this->id_apartamento . ", '" . $this->fecha . "')";
		echo $insertTableSQL;
		if(mysqli_query($enlace,$insertTableSQL))


			echo "";
						
		else{
			
			echo mysqli_error($enlace);
		    echo "No pudo realizarse la inserción";
		}	
	               
				
	}
		       

	//Método para  modificar los datos de la aplicación

	public function Modificar() {
		
			if ($this->id!=0){
				if (!$enlace = mysqli_connect("localhost", "root", "")) {
    				echo 'No pudo conectarse a mysql';
   		    		exit;
				}

				if (!mysqli_select_db($enlace,"mydb")) {
    				echo 'No pudo seleccionar la base de datos';
    				exit;
				}
			
				$modifyTableSQL = "UPDATE " . $this->nombre_tabla . " SET ID_USER = " . $this->id_usuario .  " ,  ID_APARTMENT = " . $this->id_apartamento . " ,  DATE = " . $this->fecha . " WHERE ID_APPLICATION = " . $this->id;
				$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_APPLICATION = " . $this->id;
				$resultado=mysqli_query($enlace,$sql);
				if(!($fila = mysqli_fetch_assoc($resultado)))
					echo "No existe la aplicación. La tabla no se ha actualizado!";
				else{
				
					mysql_query($modifyTableSQL,$enlace);
        			
				
				}
	     
			}
		}
			       
	// Método para borrar la aplicación de la base de datos
	
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
					$deleteTableSQL = "DELETE FROM " . $this->nombre_tabla . " WHERE ID_APPLICATION = " . $this->id;
					$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_APPLICATION = " . $this->id;
					$resultado=mysqli_query($enlace,$sql);
					if(!($fila = mysqli_fetch_assoc($resultado)))
						echo "No existe ´la aplicación. La tabla no se ha actualizado!";
					else{
						mysqli_query($enlace,$deleteTableSQL);
						
		            
					}
					
			}
		}


}
?>