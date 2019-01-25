<?php
header("Content-Type: text/html;charset=utf-8"); 
class apartamento {
	
	private $id, $numero, $piso, $num_habitaciones, $num_baños, $id_tipo_apartamento;
	private $localidad, $calle, $provincia, $letra;
	private $internet, $ascensor, $calefaccion, $parking;
	private $precio;
	private $nombre_tabla="apartments";
	
	public function __construct(){ // constructor por defecto
		$this->id=0;
		$this->localidad="";
		$this->calle="";
		$this->numero = 0;
		$this->letra="";
		$this->num_habitaciones = 0;
		$this->num_baños = 0;
		$this->internet = false;
		$this->ascensor = false;
		$this->calefaccion = false;
		$this->parking = false;
		$this->provincia = "";
		$this->precio=0;
		$this->id_tipo_apartamento = 0;
	}
	
	public function apartamento2($localidad,$calle,$numero,$piso,$letra, $num_habitaciones, $num_baños, $internet,  $ascensor, $calefaccion, $parking, $provincia, $precio, $id_tipo_apartamento ){ // constructor por parámetros
		$this->id=0;
		$this->localidad=$localidad;
		$this->calle=$calle;
		$this->numero = $numero;
		$this->piso = $piso;
		$this->letra=strtoupper($letra);
		$this->num_habitaciones = $num_habitaciones;
		$this->num_baños = $num_baños;
		$this->internet = $internet;
		$this->ascensor = $ascensor;
		$this->calefaccion = $calefaccion;
		$this->parking = $parking;
		$this->provincia = $provincia;
		$this->precio=$precio;
		$this->id_tipo_apartamento = $id_tipo_apartamento;
	}
	
	public function apartamento3($id) { // constructor a partir de la id del apartamento
		$this->id = $id;
		
			if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
			}

			if (!mysqli_select_db( $enlace, 'mydb')) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
			}
			
			$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_APARMENTS = " . $this->id;
			
			$resultado = mysqli_query( $enlace,$sql);

			if (!$resultado) {
    			echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    			exit;
			}

			
			if ($this->id!=0) {
				if($fila = mysqli_fetch_assoc($resultado)){
		
					
					
					$this->localidad=$fila["LOCALITY"];
					$this->calle=$fila["STREET"];
					$this->numero = $fila["NUMBER"];
					$this->piso = $fila["FLOOR"];
					$this->letra=strtoupper($fila["WORD"]);
					$this->num_habitaciones = $fila["NUM_ROOMS"];
					$this->num_baños = $fila["NUM_BATHROOMS"];
					if ($fila["INTERNET"]=="Sí")
						$this->internet = true;
					else
						$this->internet = false;
					if ($fila["ELEVATOR"]=="Sí")
						$this->ascensor = true;
					else
						$this->ascensor = false;
					if ($fila["HEATING"]=="Sí")
						$this->calefaccion = true;
					else
						$this->calefaccion = false;
					if ($fila["PARKING"]=="Sí")
						$this->parking = true;
					else
						$this->parking = false;	
					
					$this->provincia = $fila["PROVINCE"];
					$this->precio=$fila["PRICE"];
					$this->id_tipo_apartamento = $fila["ID_APARTMENT_TYPE"];
				
				}
				else {
					$this->id=0;
					$this->localidad="";
					$this->calle="";
					$this->numero = 0;
					$this->letra="";
					$this->num_habitaciones = 0;
					$this->num_baños = 0;
					$this->internet = false;
					$this->ascensor = false;
					$this->calefaccion = false;
					$this->parking = false;
					$this->provincia = "";
					$this->precio=0;
					$this->id_tipo_apartamento = 0;
				}
					
			}	
			else {
				$this->id=0;
				$this->localidad="";
				$this->calle="";
				$this->numero = 0;
				$this->letra="";
				$this->num_habitaciones = 0;
				$this->num_baños = 0;
				$this->internet = false;
				$this->ascensor = false;
				$this->calefaccion = false;
				$this->parking = false;
				$this->provincia = "";
				$this->precio=0;
				$this->id_tipo_apartamento = 0;
			}
	}
	
	// Métodos GETTERS
	public function getId(){
		return $this->id;
	}
	public function getLocalidad() {
		return $this->localidad;
	}
	
	public function getCalle() {
		return $this->calle;
	}
	
	public function getNumero() {
		return $this->numero;
	}
	
	public function getPiso() {
		return $this->piso;
	}
	
	public function getLetra() {
		return $this->letra;
	}
	
	public function getNum_Habitaciones() {
		return $this->num_habitaciones;
	}
	
	public function getNum_Baños() {
		return $this->num_baños;
	}
	
	public function getInternet() {
		return $this->internet;
	}
	public function getAscensor() {
		return $this->ascensor;
	}
	
	public function getCalefaccion() {
		return $this->calefaccion;
	}
	
	public function getParking() {
		return $this->parking;
	}
	
	public function getProvincia() {
		return $this->provincia;
	}
	
	public function getPrecio() {
		return $this->precio;
	}
	
	public function getId_Tipo_Apartamento() {
		return $this->id_tipo_apartamento;
	}
	
	// Métodos SETTERS
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setLocalidad($localidad) {
		$this->localidad = $localidad;
	}
	
	public function setCalle($calle) {
		$this->calle = $calle;
	}
	
	public function setNumero($numero) {
		$this->numero = $numero;
	}
	public function setPiso($piso) {
		$this->piso = $piso;
	}
	public function setLetra($letra) {
		$this->letra = strtoupper($letra);
	}
	
	public function setNum_Habitaciones($num_habitaciones) {
		$this->num_habitaciones = $num_habitaciones;
	}
	
	public function setNum_Bannos($num_baños) {
		$this->num_baños = $num_baños;
	}
	
	public function setInternet($internet) {
		$this->internet = $internet;
	}
	
	public function setAscensor($ascensor) {
		$this->ascensor = $ascensor;
	}
	
	public function setCalefaccion($calefaccion) {
		$this->calefaccion = $calefaccion;
	}
	public function setParking($parking) {
		$this->parking = $parking;
	}
	
	public function setProvincia($provincia) {
		$this->provincia = $provincia;
	}
	
	public function setPrecio($precio) {
		$this->precio = $precio;
	}
	
	public function setId_Tipo_Apartamento($id_tipo_apartamento) {
		$this->id_tipo_apartamento = $id_tipo_apartamento;
	}
	
	// Método para mostrar los datos del apartamento
	
	public function mostrar(){
		
		if ($this->id!=0)
			echo "id --> " . $this->id . "\n";
		echo "Localidad --> " . $this->localidad . "\n";
		
		echo "Dirección: C/" . $this->calle  . " Nº" .  $this->numero . " "; 
		if ($this->piso!=0)
			echo $this->piso .  "º ";
		if (strlen($this->letra)>0)
			echo $this->letra;
		else
			echo "\n";
		echo "Nº de habitaciones --> " . $this->num_habitaciones . "\n";
		echo "Nº de cuartos de baño --> " . $this->num_baños . "\n";
		echo "Con Internet --> " ;
		if ($this->internet)
			echo "Sí" . "\n";
		else
			echo "No" . "\n";
		echo "Con Ascensor --> ";
		if ($this->ascensor)
			echo "Sí" . "\n";
		else
			echo "No" . "\n";
		echo "Con Calefacción --> ";
		if ($this->calefaccion)
			echo "Sí" . "\n";
		else
			echo "No" . "\n";
		echo "Con Aparcamiento --> ";
		if ($this->parking)
			echo "Sí" . "\n";
		else
			echo "No" . "\n";
		echo "Provincia --> " . $this->provincia . "\n";
		echo "Precio --> " . $this->precio . "\n";
		echo "Id Tipo de Apartamento --> " . $this->id_tipo_apartamento . "\n";
		
		
		
		
		}
	
	// Método para insertar el apartamento en la tabla
	
		public function Insertar() {
			$int="";
			if ($this->internet)
				$int= utf8_decode("Sí");
			else 
				$int="No";
			$asc="";
			if ($this->ascensor)
				$asc=utf8_decode("Sí");
			else 
				$asc="No";
			$cal="";
			if ($this->calefaccion)
				$cal=utf8_decode("Sí");
			else 
				$cal="No";
			$park="";
			if ($this->parking)
				$park=utf8_decode("Sí");
			else 
				$park="No";


			if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   		    	exit;
			}

			if (!mysqli_select_db($enlace,'mydb')) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
			}
			
			$this->localidad=utf8_decode($this->localidad);
			$this->calle=utf8_decode($this->calle);
			 $this->provincia=utf8_decode($this->provincia);

			$insertTableSQL = "INSERT INTO " . $this->nombre_tabla . " (LOCALITY, STREET, NUMBER, FLOOR, WORD, NUM_ROOMS, NUM_BATHROOMS, INTERNET, ELEVATOR, HEATING, PARKING, PROVINCE, PRICE, ID_APARTMENT_TYPE) VALUES('" . $this->localidad . "', '" . $this->calle . "', " . $this->numero . ", ". $this->piso . ", '" . $this->letra ."', " . $this->num_habitaciones . ", " . $this->num_baños . ",'" . $int . "', '" . $asc . "', '" . $cal . "', '" . $park . "', '" . $this->provincia . "', " . $this->precio . ", " . $this->id_tipo_apartamento . ")";
			
			
			if (mysqli_query($enlace,$insertTableSQL)){

				echo "<script>alert('Inserción realizada con éxito. La tabla ha sido actualizada.');</script>";
				return mysqli_insert_id($enlace);
						
			}
			else{
			
				echo mysqli_error($enlace);
		    	echo "No pudo realizarse la inserción";
			}
			
		}
		
		
		// Método para modificar los datos del apartamento
		
			public function Modificar() {
			
				if ($this->id!=0) {


					$int="";
					if ($this->internet)
						$int="Sí";
					else 
						$int="No";
					$asc="";
					if ($this->ascensor)
						$asc="Sí";
					else 
						$asc="No";
					$cal="";
					if ($this->calefaccion)
						$cal="Sí";
					else 
						$cal="No";
					$park="";
					if ($this->parking)
						$park="Sí";
					else 
						$park="No";

					if (!$enlace = mysqli_connect("localhost", "root", "")) {
    					echo 'No pudo conectarse a mysql';
   		    			exit;
					}

					if (!mysqli_select_db($enlace,'mydb')) {
    					echo 'No pudo seleccionar la base de datos';
    					exit;
					}
					
					$this->localidad=utf8_decode($this->localidad);
					$this->calle=utf8_decode($this->calle);
			 		$this->provincia=utf8_decode($this->provincia);
			 		$int=utf8_decode($int);
			 		$asc=utf8_decode($asc);
			 		$cal=utf8_decode($cal);
			 		$park=utf8_decode($park);
					
					$modifyTableSQL = "UPDATE " . $this->nombre_tabla . " SET LOCALITY = '" . $this->localidad .  "' ,  STREET = '" . $this->calle .  "' ,  NUMBER = " . $this->numero . " , FLOOR = " . $this->piso . " , WORD = '" . $this->letra . "' , NUM_ROOMS = " . $this->num_habitaciones . " , NUM_BATHROOMS = " . $this->num_baños . " , INTERNET  = '" . $int . "' , ELEVATOR = '" . $asc . "' , HEATING = '" . $cal . "' , PARKING = '" . $park . "' , PROVINCE = '" . $this->provincia . "' , PRICE = " . $this->precio . " , ID_APARTMENT_TYPE = " . $this->id_tipo_apartamento . " WHERE ID_APARMENTS = " . $this->id;
					$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_APARMENTS = " . $this->id;
					echo "<script>alert('" . $modifyTableSQL . "');</script>";
					$resultado=mysqli_query($enlace,$sql);
					if(!($fila = mysqli_fetch_assoc($resultado)))
						echo "No existe el apartamento. La tabla no se ha actualizado!";
					else{
				
						if (mysqli_query($enlace,$modifyTableSQL))
        					echo "<script>alert('Se ha modificado el apartamento con éxito. La tabla ha sido actualizada');</script>";
						else{
							echo "No se pudo realizar la iserción";
							echo mysqli_error($enlace);
							echo "\n" . $modifyTableSQL;
						}
					}
			}
		
	}
		// Método para borrar apartamento de la base de datos
		
			public function Borrar() {
				if ($this->id!=0) {
					if (!$enlace = mysqli_connect("localhost", "root", "")) {
    					echo 'No pudo conectarse a mysql';
   		    			exit;
					}

					if (!mysqli_select_db( $enlace, 'mydb')) {
    					echo 'No pudo seleccionar la base de datos';
    					exit;
					}
					$deleteTableSQL = "DELETE FROM " . $this->nombre_tabla . " WHERE ID_APARMENTS = " . $this->id;
					$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_APARMENTS = " . $this->id;
					$resultado=mysqli_query($enlace, $sql);
					if(!($fila = mysqli_fetch_assoc($resultado)))
						echo "No existe el apartamento. La tabla no se ha actualizado!";
					else{
						mysqli_query($enlace,$deleteTableSQL);
						echo "<script>alert('Se borró el apartamento correctamente. La tabla ha sido actualizada.');</script>";
		            
					}
					
				}
			}
	
}
	
	
?>