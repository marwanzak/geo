<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
		$this->load->view('home');
	}

	//insert user
	public function insertUser(){
		return $this->geomodel->insertUser(
			//	$_POST["number"], $_POST["lit"], $_POST["long"]
				$_POST["lit"], $_POST["long"]
				);
	}

	//modify user location
	public function modifyUserLocation(){
		return $this->geomodel->modifyUserLocation(
				$_POST["id"], $_POST["lit"], $_POST["long"]);
	}
	
	//get user location
	public function getUserLocation(){
		return $this->getmodel->getUserLocation($_POST["id"]);
	}
}
