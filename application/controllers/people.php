<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People extends CI_Controller {

	function __construct()
  {
    // Call the Controller constructor
    parent::__construct();
    $this->load->model('People_model','pm');
  }

	function index() {
		$data['results'] = $this->pm->getAllPeopleResult();
		$this->load->view('people', $data);
	}

	function detail($id) {
		$person = $this->pm->getPersonById($id);
		header("Content-type: application/json");
		echo json_encode($person);
	}

}

