<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_document extends CI_Model{
	
function __construct(){
	parent::__construct();
}
// inser and update query
public function save($save=FALSE,$edit_id=FALSE){
	
	if($edit_id){
		
	$this->db->where('id', $edit_id);
	
	$this->db->update('document', $save);
	
	return $edit_id;
	
	}else{
		
	$this->db->insert("document",$save);

	return $this->db->insert_id();	
	}
	
}
//list of single selected_invoice
public function selected_document($id=FALSE){
	
	$result	= $this->db->get_where('document', array('client_id'=>$id));
	return $result->result();
}

//list of document

public function list_document(){
	
$result	= $this->db->get('document');
		return $result->result();	
}

//list of document in desc

public function list_document_desc(){

$this->db->order_by("year", "desc");
	
$result	= $this->db->get('document');

		return $result->result();	
}

//list of document selected in desc

public function list_document_select($current_year,$next_year){

$this->db->where("year BETWEEN '$next_year' and '$current_year'", NULL, FALSE);  
$this->db->order_by("year", "desc");
	
$result	= $this->db->get('document');

		return $result->result();	
}

//list of document selected unique in desc

public function list_document_unique($current_year,$next_year){
	
$this->db->distinct();
$this->db->group_by('year');
$this->db->where("year BETWEEN '$next_year' and '$current_year'", NULL, FALSE);  
$this->db->order_by("year", "desc");
$result	= $this->db->get('document');
return $result->result();	
}

//list of single document
public function single_document($id=FALSE,$edit_id=FALSE){
	
	if($edit_id){
	$result	= $this->db->get_where('document', array('id'=>$edit_id));
	}else{
		$result	= $this->db->get_where('document', array('id'=>$id));
	}
	return $result->row();
}

//delete document
public function delete_document($delete_id){
	
	$this->db->where('id', $delete_id);
		
	return $this->db->delete('document');
	
}
//delete Client based document
public function delete_client_document($delete_id){
	
	$this->db->where('client_id', $delete_id);
		
	return $this->db->delete('document');
	
}

}