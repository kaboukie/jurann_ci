<?php

class People_model extends CI_Model {

	function __construct()
  {
    // Call the Model constructor
    parent::__construct();
  }

  function getAllPeopleResult() {
  	$query = $this->db->query('SELECT * FROM people');
  	// echo var_dump($query->result());
  	If($query->num_rows() > 0){
  		return $query->result();
  	} else {
  		return new array(); //returns empty array if table is empty
  	}
  }

  function getPersonById($id) {
  	$safeid = $this->db->escape($id);
  	$query = $this->db->query('SELECT * FROM people WHERE id='. $safeid);
  	If($query->num_rows() > 0){
  		return $query->result();
  	} else {
  		return new array(); //returns empty array if table is empty
  	}
  }

}
