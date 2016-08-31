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
  	return $query->result();
  }

  function getPersonById($id) {
  	$safeid = $this->db->escape($id);
  	$query = $this->db->query('SELECT * FROM people WHERE id='. $safeid);
  	return $query->result();
  }

}