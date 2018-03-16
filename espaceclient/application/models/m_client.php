<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_client extends CI_Model{
	
function __construct(){
	parent::__construct();
}
// inser and update query
public function save($save=FALSE,$edit_id=FALSE){
	
	if($edit_id){
		
	$this->db->where('id', $edit_id);
	
	$this->db->update('client', $save);
	
	return $edit_id;
	
	}else{
		
	$this->db->insert("client",$save);

	return $this->db->insert_id();	
	}
	
}

//list of client

public function list_client(){
	
$result	= $this->db->get('client');
		return $result->result();	
}

//list of client in desc

public function list_client_desc(){

$this->db->order_by("year", "desc");
	
$result	= $this->db->get('client');

		return $result->result();	
}

//list of client selected in desc

public function list_client_select($current_year,$next_year){

$this->db->where("year BETWEEN '$next_year' and '$current_year'", NULL, FALSE);  
$this->db->order_by("year", "desc");
	
$result	= $this->db->get('client');

		return $result->result();	
}


//list of client selected unique in desc

public function list_client_unique($current_year,$next_year){
	
$this->db->distinct();
$this->db->group_by('year');
$this->db->where("year BETWEEN '$next_year' and '$current_year'", NULL, FALSE);  
$this->db->order_by("year", "desc");
$result	= $this->db->get('client');
return $result->result();	
}

//list of single client
public function single_client($id=FALSE,$edit_id=FALSE){
	
	if($edit_id){
	$result	= $this->db->get_where('client', array('id'=>$edit_id));
	}else{
		$result	= $this->db->get_where('client', array('id'=>$id));
	}
	return $result->row();
}

//delete client
public function delete_client($delete_id){
	
	$this->db->where('id', $delete_id);
		
	return $this->db->delete('client');
	
}

}