<?php
class universidad {
	private $id,$id_pais;
	private $nombre;
	private $nombre_tabla="universities";
	
	public function __construct() {  // constructor por defecto
		$this->id=0;
		$this->id_pais=0;
		$this->nombre="";
	}

	public function universidad2($id_pais, $nombre) {  // constructor por parámetros
		$this->id=0;
		$this->id_pais=$id_pais;
		$this->nombre=$nombre;
	}
	
//constructor a partir de la id de la universidad
	public function universidad3($id) {  
		$this->id=$id;
		if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
		}

		if (!mysqli_select_db( $enlace, 'mydb')) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
		}
		$sql = "SELECT ID_COUNTRY, UNIVERSITY_NAME FROM " . $this->nombre_tabla . " WHERE ID_UNIVERSITY = " . $this->id;
		$resultado = mysqli_query( $enlace, $sql);

		if (!$resultado) {
    			echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    			exit;
		}

			
		if ($this->id!=0) {
				if($fila = mysqli_fetch_assoc($resultado)){
		
					
					$this->id_pais=$fila["ID_COUNTRY"];
					$this->id_nombre=$fila["UNIVERSITY_NAME"];

				}else{
					$this->id_pais="";
					$this->id_nombre="";
				}
		}
		else{
			$this->id_pais="";
			$this->id_nombre="";
		}
		
	}
	
	// Métodos GETTERS
	
	public function getId() {
		return $this->id;
	}
	
	public function getId_Pais() {
		return $this->id_pais;
	}
	
	public function getNombre() {
		return $this->nombre;
	}
	
	//Métodos SETTERS
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setId_Pais($id_pais) {
		$this->id_pais = $id_pais;
	}
	
	public function setNombre($nombre) {
		$this->nombre=$nombre;
	}
	
	// Método para mostrar los datos de la universidad:
	
	public function mostrar() {
		if ($this->id !=0)
			echo "id--> " . $this->id . "\n";
		echo "Id_pais--> " . $this->id_pais . "\n";
		echo "Nombre --> " . $this->nombre . "\n";
	}
	
	
	// Método para insertar la universidad en la tabla
	
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
			$insertTableSQL = "INSERT INTO " . $this->nombre_tabla  .  " ( ID_COUNTRY, UNIVERSITY_NAME) VALUES(" . $this->id_pais . ",'" . $this->nombre . "')";
			if (mysqli_query($enlace,$insertTableSQL))

				echo "<script>alert('Inserción realizada con éxito. La tabla ha sido actualizada.');</script>";
						
		else{
			
			echo mysqli_error($enlace);
		    echo "No pudo realizarse la inserción";
		}
	}
		
		//Método para modificar los datos de la universidad

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
			
				$modifyTableSQL = "UPDATE " . $this->nombre_tabla . " SET ID_COUNTRY = " . $this->id_pais .   " ,  UNIVERSITY_NAME = '" . $this->nombre . "' WHERE ID_UNIVERSITY = " . $this->id;
				$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_UNIVERSITY = " . $this->id;
			
	   			$resultado=mysql_query($sql,$enlace);
				if(!($fila = mysql_fetch_assoc($resultado)))
					echo "No existe la universidad. La tabla no se ha actualizado!";
				else{
				
					mysql_query($modifyTableSQL,$enlace);
        			echo "<script>alert('Se ha modificado la universidad con éxito. La tabla ha sido actualizada');</script>";
				
				}
			}
			
	}
						
		
		//Método para borrar universidad de la base de datos

				public function Borrar() {
					if ($this->id!=0) {
						if (!$enlace = mysqli_connect("localhost", "root", "")) {
    						echo 'No pudo conectarse a mysql';
   		    				exit;
						}

						if (!mysqli_select_db($enlace,'mydb')) {
    						echo 'No pudo seleccionar la base de datos';
    						exit;
						}
						$deleteTableSQL = "DELETE FROM " . $this->nombre_tabla . " WHERE ID_UNIVERSITY = " . $this->id;
						$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_UNIVERSITY = " . $this->id;
						$resultado=mysqli_query($enlace,$sql);
						if(!($fila = mysqli_fetch_assoc($resultado)))
							echo "No existe la universidad. La tabla no se ha actualizado!";
						else{
							mysqli_query($enlace,$deleteTableSQL);
							echo "<script>alert('Se borró la universidad correctamente. La tabla ha sido actualizada.');</script>";
		            
						}
					
					}
			}

}
 ?>