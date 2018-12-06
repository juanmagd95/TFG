package es.universidad.pfg.modelo;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

@Entity // This tells Hibernate to make a table out of this class
public class User {
    @Id
    @GeneratedValue(strategy=GenerationType.AUTO)
    private Integer idUsuarios;
	private String nombre;
	private String apellido_1;
	private String apellido_2;
	private Integer telefono;
	private String correo;
	private String aficiones;
	
	public User(Integer id, String apellido1, String apellido2) {
		this.idUsuarios = id;
		this.apellido_1 = apellido1;
		this.apellido_2 = apellido2;
	}
	
	public User() {
		// TODO Auto-generated constructor stub
	}

	public Integer getIdUsuarios() {
		return idUsuarios;
	}
	public void setIdUsuarios(Integer idUsuarios) {
		this.idUsuarios = idUsuarios;
	}
	public String getNombre() {
		return nombre;
	}
	public void setNombre(String nombre) {
		this.nombre = nombre;
	}
	public String getApellido_1() {
		return apellido_1;
	}
	public void setApellido_1(String apellido_1) {
		this.apellido_1 = apellido_1;
	}
	public String getApellido_2() {
		return apellido_2;
	}
	public void setApellido_2(String apellido_2) {
		this.apellido_2 = apellido_2;
	}
	public Integer getTelefono() {
		return telefono;
	}
	public void setTelefono(Integer telefono) {
		this.telefono = telefono;
	}
	public String getCorreo() {
		return correo;
	}
	public void setCorreo(String correo) {
		this.correo = correo;
	}
	public String getAficiones() {
		return aficiones;
	}
	public void setAficiones(String aficiones) {
		this.aficiones = aficiones;
	}
    
}

