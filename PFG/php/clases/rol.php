<?php
class rol {
	private  $id;
	private  $nombre_rol;
	private $nombre_tabla = "ROLES";
	
	
	public  function __construct() {  // constructor por defecto
		
		$this->id=0;
		$this->nombre_rol="";
	}
	
	public  function  rol2($nombre_rol)  {  // constructor por parámetros
		$this->id=0;
		$this->nombre_rol=$nombre_rol;
		
	}

	public  function  rol3($id) {  // constructor a partir del id del rol

		if (!$enlace = mysqli_connect("localhost", "root", "")) {
    		echo 'No pudo conectarse a mysql';
   			exit;
		}

		if (!mysqli_select_db( $enlace,'mydb')) {
    		echo 'No pudo seleccionar la base de datos';
    		exit;
		}

		$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_ROLE = " . $this->id;
		$resultado = mysqli_query( $enlace,$sql);

		if (!$resultado) {
    		echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    		exit;
		}

		$this->id=$id;
		if ($this->id!=0) {
			if($fila = mysqli_fetch_assoc($resultado))
		
					$this->nombre_rol=$fila["ROLE"];
			else
					$this->nombre_rol = "";
				
		}
		else
			$this->nombre_rol = "";
	}
	
	// Métodos GETTERS
	
	public function  getId() {
		return $this->id;
		
	}
	
	public  function getNombre_Rol() {
		return $this->nombre_rol;
	}
	
	// Métodos SETTERS
	
	public function  setId(int $id) {
		$this->id = $id;
	}
	
	public function setNombre_Rol(String $nombre_rol) {
		$this->nombre_rol=$nombre_rol;
	}
	
	// Método para mostrar los datos del rol
	public function mostrar() {
		if ($this->id!=0)
			echo "id--> " . $this->id . "\n";
		echo "nombre del rol--> " . $this->nombre_rol . "\n";
	}
	
	//Método para insertar el rol en la tabla

	public function Insertar() {
		if (!$enlace = mysqli_connect("localhost", "root", "")) {
    		echo 'No pudo conectarse a mysql';
   		    exit;
		}

		if (!mysqli_select_db($enlace,"mydb")) {
    		echo 'No pudo seleccionar la base de datos';
    		exit;
		}
		
			$this->nombre_rol=utf8_decode($this->nombre_rol);
		$insertTableSQL = "INSERT INTO " . $this->nombre_tabla . "(ROLE) VALUES('" . $this->nombre_rol . "')" ;
				
		if (mysqli_query($enlace,$insertTableSQL))
			echo "<script>alert('Inserción realizada con éxito. La tabla ha sido actualizada.');</script>";
						
		else
		    echo "No pudo realizarse la inserción";

		       
	}
	
	// Método para modificar los datos del rol
	
	public function Modificar() {
		if ($id!=0) {
			if (!$enlace = mysql_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   		    	exit;
			}

			if (!mysql_select_db('mydb', $enlace)) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
			}

			$this->nombre_rol=utf8_decode($this->nombre_rol);
		
		
			$modifyTableSQL = "UPDATE " . $this->nombre_table .  " SET ROLE = " . $this->nombre_rol  .  " WHERE ID_ROLE = " . $this->id;
			$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_ROLE = " . $this->id;
			$resultado=mysql_query($sql,$enlace);
			if(!($fila = mysql_fetch_assoc($resultado)))
				echo "No existe el rol. La tabla no se ha actualizado!";
			else{
				
				mysql_query($modifyTableSQL,$enlace);
        		echo "<script>alert('Se ha modificado el rol con éxito. La tabla ha sido actualizada');</script>";
				
			}
		}
        	       
}
	
	// Método para borrar rol de la base de datos
	
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
				$deleteTableSQL = "DELETE FROM " . $this->nombre_tabla . " WHERE ID_ROLE = " . $this->id;
				$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_ROLE = " . $this->id;
				$resultado=mysqli_query($enlace,$sql);
				if(!($fila = mysqli_fetch_assoc($resultado)))
					echo "No existe el rol. La tabla no se ha actualizado!";
				else{
					mysqli_query($enlace,$deleteTableSQL);
					echo "<script>alert('Se borró el rol correctamente. La tabla ha sido actualizada.');</script>";
		            
				}
					
			}
		}
}
?>