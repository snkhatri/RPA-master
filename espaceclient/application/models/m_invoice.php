<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_invoice extends CI_Model{
	
function __construct(){
	parent::__construct();
}
// inser and update query
public function save($save=FALSE,$edit_id=FALSE){
	
	if($edit_id){
		
	$this->db->where('id', $edit_id);
	
	$this->db->update('invoice', $save);
	
	return $edit_id;
	
	}else{
		
	$this->db->insert("invoice",$save);

	return $this->db->insert_id();	
	}
	
}

//list of invoice

public function list_invoice(){
	
$result	= $this->db->get('invoice');
		return $result->result();	
}

//list of invoice in desc

public function list_invoice_desc(){

$this->db->order_by("year", "desc");
	
$result	= $this->db->get('invoice');

		return $result->result();	
}

//list of invoice selected in desc

public function list_invoice_select($current_year,$next_year){

$this->db->where("year BETWEEN '$next_year' and '$current_year'", NULL, FALSE);  
$this->db->order_by("year", "desc");
	
$result	= $this->db->get('invoice');

		return $result->result();	
}

//list of invoice selected unique in desc

public function list_invoice_unique($current_year,$next_year){
	
$this->db->distinct();
$this->db->group_by('year');
$this->db->where("year BETWEEN '$next_year' and '$current_year'", NULL, FALSE);  
$this->db->order_by("year", "desc");
$result	= $this->db->get('invoice');
return $result->result();	
}

//list of single invoice
public function single_invoice($id=FALSE,$edit_id=FALSE){
	
	if($edit_id){
	$result	= $this->db->get_where('invoice', array('id'=>$edit_id));
	}else{
		$result	= $this->db->get_where('invoice', array('id'=>$id));
	}
	return $result->row();
}
//list of single selected_invoice
public function selected_invoice($id=FALSE){
	
	$result	= $this->db->get_where('invoice', array('client_id'=>$id));
	return $result->result();
}
//delete invoice
public function delete_invoice($delete_id){
	
	$this->db->where('id', $delete_id);
		
	return $this->db->delete('invoice');
	
}
//delete Client based invoice
public function delete_client_invoice($delete_id){
	
	$this->db->where('client_id', $delete_id);
		
	return $this->db->delete('invoice');
	
}

}