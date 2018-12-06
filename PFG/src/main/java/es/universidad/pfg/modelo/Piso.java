package es.universidad.pfg.modelo;

import javax.persistence.Entity;
import javax.persistence.Id;

@Entity
public class Piso {
	private String locality;
	private String number;
	@Id
	private Integer idPiso;
	public String getLocality() {
		return locality;
	}
	public void setLocality(String locality) {
		this.locality = locality;
	}
	public String getNumber() {
		return number;
	}
	public void setNumber(String number) {
		this.number = number;
	}
	public Integer getIdPiso() {
		return idPiso;
	}
	public void setIdPiso(Integer idPiso) {
		this.idPiso = idPiso;
	}
	
}
