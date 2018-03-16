<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin extends CI_Model{
	
function __construct(){
	parent::__construct();
}


public function admin_login ($email,$password){
	
	$this->db->select('*');
	$this->db->from('admin');
	$this->db->where('email',$email);
	$this->db->where('password',$password);
	$query = $this->db->get();
	return $result = $query->row();
	
}

public function single_admin(){
	
	$this->db->select('*');
	$this->db->from('admin');
	$this->db->where('id','1');
	$query = $this->db->get();
	return $result = $query->row();
	
}
public function client_login ($email,$password){
	
	$this->db->select('*');
	$this->db->from('client');
	$this->db->where('email',$email);
	$this->db->where('password',$password);
	$query = $this->db->get();
	return $result = $query->row();
	
}
public function check_password ($password){
	
	$this->db->select('*');
	$this->db->from('admin');
	$this->db->where('id','1');
	$this->db->where('password',$password);
	$query = $this->db->get();
	return $result = $query->row();
	
}
public function check_password_client ($password,$id){
	
	$this->db->select('*');
	$this->db->from('client');
	$this->db->where('id',$id);
	$this->db->where('password',$password);
	$query = $this->db->get();
	return $result = $query->row();
	
}

public function change_password_client ($data,$id){
	
	$this->db->where('id',$id);
		
	$this->db->update('client',$data);
	return '1';
	
}

public function save($save=FALSE){
	
	$this->db->where('id',1);
	
	$this->db->update('admin', $save);
	
	return $edit_id;
	
}


public function change_password ($data){
	$this->db->where('id','1');
		
	$this->db->update('admin',$data);
	return '1';
	
}
public function forgot($email){
	
	$this->db->select('*');
	$this->db->from('admin');
	$this->db->where('email',$email);
	$query = $this->db->get();
	$result = $query->row();
	$count = count($result);
	
	if($count==1){
		$this->load->helper('string');
		
		$new_pass = random_string('alnum', 6);
		$md5_pass = md5($new_pass);
		 
		$data = array(
		'password'=>$md5_pass
		); 
		
		$this->db->where('email',$email);
		
		$this->db->update('admin',$data);
		
		return $new_pass;
		 
	}else{
		
	$this->db->select('*');
	$this->db->from('client');
	$this->db->where('email',$email);
	$query = $this->db->get();
	$result = $query->row();
	$count = count($result);
	
	if($count==1){
		$this->load->helper('string');
		
		$new_pass = random_string('alnum', 6);
		$md5_pass = md5($new_pass);
		 
		$data = array(
		'password'=>$md5_pass
		); 
		
		$this->db->where('email',$email);
		
		$this->db->update('client',$data);
		
		return $new_pass;
		 
	}
		else{
		
		
		return false;
	}}
	
}
}