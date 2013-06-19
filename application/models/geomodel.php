<?php
class geoModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	//insert cat in database
	public function insertCat($cat){
		return $this->db->insert("cats", array("cat" => $cat));
	}
	
	//modify catagory in database
	public function modifyCat($id, $cat){
		$this->db->where("id", $id);
		return $this->db->update("cats", array("cat"=> $cat));
	}
	
	//get catagory from database
	public function getCat($id){
		$query = $this->db->get("cats", array("id" => $id));
		return $query->row();
	}
	
	//get all catagor from database
	public function getAllCats(){
		$query = $this->db->get("cats");
		return $query->result();
	}
	
	//insert product in database
	public function insertProd($prod, $cat, $salary){
		return $this->db->insert("products", array(
				"product" => $prod,
				"cat" => $cat,
				"salary" => $salary
				));
	}
	
	//modify product in database
	public function modifyProd($id, $prod, $cat, $salary){
		$this->db->where("id", $id);
		return $this->db->update("products", array(
				"product" => $prod,
				"cat" => $cat,
				"salary" => $salary
		));
	}
}