<?php

class tipo_apartamento {
	private $id;
	private $tipo;
	private $nombre_tabla = "apartment_types";
	
	public function __construct() { // constructor por defecto
		$this->id=0;
		$this->tipo="";
	}
	
	public function tipo_apartamento2($tipo) { // contructor por parámetros
		$this->id = 0;
		$this->tipo = $tipo;
	}
	
	public function tipo_apartamento3($id) { // constructor a partir de la id
		$this->id=$id;
		
		if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
		}

		if (!mysqli_select_db( $enlace,'mydb')) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
		}
		$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_APARTMENT_TYPE = " . $this->id;
		$resultado = mysqli_query( $enlace,$sql);

		if (!$resultado) {
    			echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    			exit;
		}

			
		if ($this->id!=0) {
				if($fila = mysqli_fetch_assoc($resultado))
		
					
					$this->tipo=$fila["TYPE"];
				else
					$this->tipo="";
		}
		else
			$this->tipo="";
		
	}
	
	// Métodos GETTERS
	
	public function getId() {
		return $this->id;
	}
	
	public function getTipo() {
		return $this->tipo;
	}
	
	
	// Métodos SETTERS
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setTipo($tipo) {
		$this->tipo =  $tipo;
		
	}
	
	// Método para mostrar los datos del apartamento
	
	public function mostrar() {
		if ($this->id!=0)
			echo "id --> " . $this->id . "\n" ;
		echo "Tipo --> " . $this->tipo . "\n";
		
	}
	
	// método para insertar un tipo de apartamento en la tabla
	
	public function Insertar() {
		if (!$enlace = mysqli_connect("localhost", "root", "")) {
    		echo 'No pudo conectarse a mysql';
   		    exit;
		}

		if (!mysqli_select_db($enlace,"mydb")) {
    		echo 'No pudo seleccionar la base de datos';
    		exit;
		}
		
		$this->tipo=utf8_decode($this->tipo);
		

		$insertTableSQL = " INSERT INTO " . $this->nombre_tabla .  	" (TYPE) VALUES" . "('" . $this->tipo . "')";
		
        if (mysqli_query($enlace,$insertTableSQL))

			echo "<script>alert('Inserción realizada con éxito. La tabla ha sido actualizada.');</script>";
						
		else{
			
			echo mysqli_error($enlace);
		    echo "No pudo realizarse la inserción";
		}
	}
		

	
	// Método para modificar los datos del tipo de apartamento
	
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

				
				$this->tipo=utf8_decode($this->tipo);
				$modifyTableSQL = "UPDATE " . $this->nombre_tabla .  " SET TYPE	 = " . $this->tipo  .  " WHERE ID_APARTMENT_TYPE = " . $this->id;
				$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_APARTMENT_TYPE = " . $this->id;
			
	        	$resultado=mysql_query($sql,$enlace);
				if(!($fila = mysql_fetch_assoc($resultado)))
					echo "No existe el tipo de apartamento. La tabla no se ha actualizado!";
				else{
				
					mysql_query($modifyTableSQL,$enlace);
        			echo "<script>alert('Se ha modificado el tipo de apartamento con éxito. La tabla ha sido actualizada');</script>";
				
				}
			}
			
		}
		
		// Método para borrar el tipo de apartamento de la base de datos
		
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
					$deleteTableSQL = "DELETE FROM " . $this->nombre_tabla . " WHERE ID_APARTMENT_TYPE = " . $this->id;
					$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_APARTMENT_TYPE = " . $this->id;
				
					$resultado=mysqli_query($enlace,$sql);
					if(!($fila = mysqli_fetch_assoc($resultado)))
						echo "No existe el tipo de apartamento. La tabla no se ha actualizado!";
					else{
						mysqli_query($enlace,$deleteTableSQL);
						echo "<script>alert('Se borró el tipo de apartamento correctamente. La tabla ha sido actualizada.');</script>";
		            
					}
					
				}

			}
		}
		


?>