 <?php 
 class alquiler{
	
	private $id, $id_usuario, $id_arrendatario, $id_apartamento, $estado;
	private $nombre_tabla="alquileres";

	public function __construct(){
		$this->id=0;
		$this->id_usuario=0;
		$this->id_arrendatario=0;
		$this->id_apartamento=0;
		$this->estado=0;

	}

	public function alquiler2($id_usuario, $id_arrendatario, $id_apartamento, $estado){
		$this->id=0;

		$this->id_usuario=$id_usuario;
		$this->id_arrendatario=$id_arrendatario;
		$this->id_apartamento=$id_apartamento;
		$this->estado=$estado;

	}
	public function alquiler3($id){
		
		$this->id = $id;
		
			if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
			}

			if (!mysqli_select_db( $enlace, 'mydb')) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
			}
			
			$sql = "SELECT * FROM " . $this->nombre_tabla . " WHERE ID_ALQUILER = " . $this->id;
			
			$resultado = mysqli_query( $enlace,$sql);

			if (!$resultado) {
    			echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    			exit;
			}

			
			if ($this->id!=0) {
				if($fila = mysqli_fetch_assoc($resultado)){
		
					
					
					$this->id_usuario=$fila["ID_USER"];
					$this->id_arrendatario=$fila["ID_ARRENDATARIO"];
					$this->id_apartamento=$fila["ID_APARTMENT"];
					$this->estado=$fila["STATE"];
				}
				else{
					$this->id=0;
					$this->id_usuario=0;
					$this->id_arrendatario=0;
					$this->id_apartamento=0;
					$this-$estado=0;
					
				}
			}else{
					
					$this->id_usuario=0;
					$this->id_arrendatario=0;
					$this->id_apartamento=0;
					$this->estado=0;
			}
}

public function getId(){
	return $this->id;
}

public function getId_Usuario(){
	return $this->id_usuario;
}

public function getId_Arrendatario(){
	return $this->id_arrendatario;
}

public function getId_Apartamento(){
	return $this->id_apartamento;
}

public function getEstado(){
	return $this->estado;
}

public function setId_Usuario($id_usuario){
	$this->id_usuario=$id_usuario;
}

public function setId_Arrendatario($id_arrendatario){
	$this->id_arrendatario=$id_arrendatario;
}

public function setId_Apartamento($id_apartamento){
	$this->id_apartamento=$id_apartamento;
}

public function setEstado($estado){
	$this->estado=$estado;
}

public function mostrar(){
	
	if ($this->id!=0)
		echo "Id--> " . $this->id ."\n";
	echo "Id usuario--> " . $this->id_usuario . "\n";
	echo "Id arrendatario--> " . $this->id_arrendatario . "\n";
	echo "Id apartamento--> " . $this->id_apartamento . "\n";
	echo "Estado-->" . $this->estado . "\n";
}

public function Insertar(){
	
			if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   		    	exit;
			}

			if (!mysqli_select_db($enlace,'mydb')) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
			}

			$insertTableSQL = "INSERT INTO " . $this->nombre_tabla . " (ID_USER, ID_ARRENDATARIO, ID_APARTMENT, STATE) VALUES(" . $this->id_usuario . ", " . $this->id_arrendatario . ", " . $this->id_apartamento . ", " . $this->estado .")";

			if (mysqli_query($enlace,$insertTableSQL)){

				echo "<script>alert('La petición ha sido enviada.');</script>";
				
						
			}
			else{
			
				echo mysqli_error($enlace);
		    	echo "No pudo realizarse la inserción";
			}
			
	
	}

	public function Modificar_Estado() {
		
			if ($this->id!=0){
				if (!$enlace = mysqli_connect("localhost", "root", "")) {
    				echo 'No pudo conectarse a mysql';
   		    		exit;
				}

				if (!mysqli_select_db($enlace,"mydb")) {
    				echo 'No pudo seleccionar la base de datos';
    				exit;
				}
			
				$modifyTableSQL = "UPDATE " . $this->nombre_tabla . " SET STATE = " . $this->estado .   " WHERE ID_ALQUILER = " . $this->id;
				
				
				
				mysqli_query($enlace,$modifyTableSQL);
				echo "<script>alert('Hecho');</script>";
        			
				
				
	     
			}
		}
	// Método para borrar el alquiler de la base de datos
	
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
					$deleteTableSQL = "DELETE FROM " . $this->nombre_tabla . " WHERE ID_ALQUILER = " . $this->id;
					
						mysqli_query($enlace,$deleteTableSQL);
						echo "<script>alert('Hecho');</script>";
						
		            
					
					
			}
		}

	

}

