<?php
class geoModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	//insert cat in database
	public function insertCat($cat){
		return $this->db->insert("catagories", array("cat" => $cat));
	}
	
	//modify catagory in database
	public function modifyCat($id, $cat){
		$this->db->where("id", $id);
		return $this->db->update("catagories", array("cat"=> $cat));
	}
	
	//get catagory from database
	public function getCat($id){
		$query = $this->db->get_where("catagories", array("id" => $id));
		return $query->row();
	}
	
	//get all catagor from database
	public function getAllCats(){
		$query = $this->db->get("catagories");
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
	
	//get product from database
	public function getProd($id){
		$query = $this->db->get_where("products", array("id" => $id));
		return $query->row();
	}
	
	//get all products from database
	public function getAllProds(){
		$query = $this->db->get("products");
		return $query->result();
	}
	
	//get catagory products
	public function getCatProducts($cat){
		$query = $this->get_where("products", array("cat" => $cat));
		return $query->result();
	}

	//calculate price
	public function calculatePrice($product, $quantity){
		return (int)$product*$quantity;
	}
	
	//insert user properities
	public function insertUser($num, $lat, $long){
		$query = $this->db->insert("users", array(
				"lat" => $lat,
				"long" => $long
				));
		return ($query->affected_rows()>0)? $this->db->insert_id: "-1";
	}
	
	//modify user location
	public function modifyUserLocation($id, $lit, $long){
		$this->db->where("id", $id);
		return $this->db->update("users", array("latit" => $lit, "longit" => $long));
	}
	
	//get user location from database
	public function getUserLocation($id){
		$query = $this->db->get_where("users",array("id" => $id));
		return $query->row();
	}
	
	
}