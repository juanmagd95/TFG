package es.universidad.pfg.dao;

import org.springframework.data.repository.CrudRepository;

import es.universidad.pfg.modelo.Piso;


// This will be AUTO IMPLEMENTED by Spring into a Bean called userRepository
// CRUD refers Create, Read, Update, Delete

public interface PisoDao extends CrudRepository<Piso, Integer> {

}
