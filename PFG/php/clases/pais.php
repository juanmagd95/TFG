<?php

class pais {
	private $id;
	private $nombre, $nombre_tabla = "countries";
	
	public function __construct() { // constructor por defecto
		$this->id=0;
		$this->nombre="";
	}
	
	public function pais2( $nombre) { // constructor por parámetros
		$this->id=0;
		$this->nombre=$nombre;
		
	}
	
	public function pais3($id) {  // constructor a partir del id del pais
		$this->id=$id;
		
		if ($this->id!=0) {
		
			
				if (!$enlace = mysqli_connect("localhost", "root", "")) {
    				echo 'No pudo conectarse a mysql';
   					exit;
				}

				if (!mysqli_select_db($enlace,'mydb')) {
    				echo 'No pudo seleccionar la base de datos';
    				exit;
				}
				$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_COUNTRY = " . $this->id;
				$resultado = mysqli_query( $enlace,$sql);

				if (!$resultado) {
    				echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    				exit;
				}

			
				
			 if($fila = mysqli_fetch_assoc($resultado))
		
					
				$this->nombre=$fila["NAME"];
			else						
				$this->nombre="";
				
		}
					
	}
	
  		



// Métodos GETTERS

public function getId() {
	return $this->id;
}

public function getNombre() {
	return $this->nombre;
}


// Métodos SETTERS

public function setId($id) {
	$this->id = $id;
}



public function setNombre($nombre) {
	$this->nombre = $nombre;
}


// Método que muestra los datos del país

public function mostrar() {
	if ($this->id!=0)
		echo "id--> " . $this->id . "\n";
	
	echo "nombre--> " . $this->nombre ."\n";
}

//Método para insertar el país en la tabla

public function Insertar() {
		if (!$enlace = mysqli_connect("localhost", "root", "")) {
    		echo 'No pudo conectarse a mysql';
   		    exit;
		}

		if (!mysqli_select_db($enlace,"mydb")) {
    		echo 'No pudo seleccionar la base de datos';
    		exit;
		}
		$this->nombre=utf8_decode($this->nombre);
		$insertTableSQL = "INSERT INTO " . $this->nombre_tabla .  " (NAME) VALUES" . "('" . $this->nombre . "')" ;
		if (mysqli_query($enlace,$insertTableSQL))

			echo "<script>alert('Inserción realizada con éxito. La tabla ha sido actualizada.');</script>";
						
		else{
			
			echo mysqli_error($enlace);
		    echo "No pudo realizarse la inserción";
		}	
	        
}


//Método para modificar los datos del país

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
			$this->nombre=utf8_decode($this->nombre);
		
			$modifyTableSQL = "UPDATE " . $this->nombre_tabla .  " SET  NAME = " . $this->nombre . " WHERE ID_COUNTRY = " . $this->id;
			$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_COUNTRY = " . $this->id;
			$resultado=mysql_query($sql,$enlace);
			if(!($fila = mysql_fetch_assoc($resultado)))
				echo "No existe el país. La tabla no se ha actualizado!";
			else{
				
				mysql_query($modifyTableSQL,$enlace);
        		echo "<script>alert('Se ha modificado el país con éxito. La tabla ha sido actualizada');</script>";
				
				}
		}

     
	}   
			

					


//Método para borrar país de la base de datos

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
				$deleteTableSQL = "DELETE FROM " . $this->nombre_tabla . " WHERE ID_COUNTRY = " . $this->id;
				$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_COUNTRY = " . $this->id;
				$resultado=mysqli_query($enlace,$sql);
				if(!($fila = mysqli_fetch_assoc($resultado)))
					echo "No existe el país. La tabla no se ha actualizado!";
				else{
					mysqli_query($enlace,$deleteTableSQL);
					echo "<script>alert('Se borró el país correctamente. La tabla ha sido actualizada.');</script>";
		            
				}
					
				
		}

	}
}
?>