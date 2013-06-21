<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function index($table)
	{
		$table_data = $this->getTable($table);
		$catagories = $this->geomodel->getAllCats();
		$products = $this->geomodel->getAllProds();
		$data = array(
				"headings" => $table_data["headings"],
				"catagories" => $catagories,
				"products" => $products,
				"rows" => $table_data["rows"],
				"table" => $table
				
				);
		$this->load->view('home', $data);
	}

	//insert user
	public function insertUser(){
		return $this->geomodel->insertUser(
			//	$_POST["number"], $_POST["lit"], $_POST["long"]
				$_POST["latit"], $_POST["longit"]
				);
	}

	//modify user location
	public function modifyUserLocation(){
		return $this->geomodel->modifyUserLocation(
				$_POST["id"], $_POST["latit"], $_POST["longit"]);
	}
	
	//get user location
	public function getUserLocation(){
		return $this->getmodel->getUserLocation($_POST["id"]);
	}
	
	//insert catagory in database
	public function insertCatagory(){
		$this->geomodel->insertCat($_POST["catagory"]);
		redirect("/home/index/catagories", "refresh");
	}
	
	//insert product in database
	public function insertProduct(){
		$this->geomodel->insertProd($_POST["product"],$_POST["catagory"], $_POST["salary"]);
		redirect("/home/index/products", "refresh");
		
	}
	
	
	//get table contents for the BIG SHOW!!
	public function getTable($table){
		$headings = array();
		$rows = array();
		$query = $this->db->get($table);
	
		switch($table){
			case "products":
				$headings = array("ID", "Catagory", "Product", "Salary");
				break;
			case "catagories":
				$headings = array("ID","Catagory");
				break;
			default:
				echo "Wrong request!";
				exit();
				break;
		}
		$i=0;
		foreach($query->result() as $row)
		{
			switch($table){
				case "products":
					$cat = $this->geomodel->getCat($row->cat);
					$rows[$i] = array($row->id,$cat->cat, $row->product, $row->salary);
					break;
				case "catagories":

					$rows[$i] = array($row->id,$row->cat);
					break;
				default:
					echo "Wrong request!";
					exit();
					break;
			}
			$i++;
		}
		return array("headings" => $headings, "rows" => $rows);
	}
}
