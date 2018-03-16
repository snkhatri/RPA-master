<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller{
	
function __construct(){
	
	parent::__construct();
		$this->load->model(array("m_admin","m_client"));
}

// User Check

public function admin_check(){
	
$admin_details = $this->session->userdata('admin_details');

$admin_id = $admin_details['id'];
$user = $admin_details['user'];

if($admin_id=="" || $user!="admin"){
	
	redirect("login");
	exit;
}

return true;
}

// List Dashboard
public function index(){
$this->admin_check();

$this->load->view('admin/v_dashboard');
}
//change password
public function change_password(){
$this->admin_check();

$data['old_password'] = '';

$data['new_password'] = '';

$data['confirm_password'] = '';

$this->form_validation->set_rules('old_password','Old Password','trim|required');

$this->form_validation->set_rules('new_password','New Password','trim|required');

$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required');

if($this->form_validation->run()==FALSE){
	
	$this->load->view('admin/v_change_password',$data);
	
}else{
	
	if($this->input->post('old_password')){
		
		 $old_password = $this->input->post('old_password');
		
		$check_password = $this->m_admin->check_password(md5($old_password));
		 $count = count($check_password);
		if($count!='1'){
			
			$lang = $this->session->userdata('lang');
if($lang==''){
	$lang='french';
}
if($lang=='english'){
			$this->session->set_flashdata('error', "Old Password Not Match");
}else{
				$this->session->set_flashdata('error', "Ancien mot de passe ne correspondent pas");

}
			
			redirect('admin/dashboard/change_password');
			exit;
		}
		$new_password = $this->input->post('new_password');
		
		$confirm_password = $this->input->post('confirm_password');
		
		if($new_password!=$confirm_password){
			if($lang=='english'){

			$this->session->set_flashdata('error', "New Password And Confirm Password Not Match");
			}else{
			$this->session->set_flashdata('error', "Nouveau mot de passe et Confirmer le mot de passe ne correspondent pas");

			}
			redirect('admin/dashboard/change_password');
			exit;
		}

		$save['password'] = md5($confirm_password);
		
		$success = $this->m_admin->change_password($save);
		
		if($success!=""){
			if($lang=='english'){
			$this->session->set_flashdata('message', "Password Changed Successfully");
			}else{
			$this->session->set_flashdata('message', "Mot de passe modifié avec succès");

			}
			
			redirect('admin/dashboard');
			exit;
			
		}else{
			
			$this->session->set_flashdata('error', "Database error");
			
			redirect('admin/dashboard');
			exit;
			
		}
		
		
	}
}

	
}


public function setting(){
$this->admin_check();

$edit_id = $this->input->post('edit_id');
if($edit_id==''){
$id='1';
}else{
$id='';
}
if($id=="" && $edit_id==""){
	
$data['id'] = '';

$data['name'] = '';

$data['phone'] = '';

$data['email'] = '';

$data['address'] = '';

$data['image'] = '';

}else{
	
$single_result = $this->m_admin->single_admin($id,$edit_id);
	
if($edit_id){
	
$data['id'] = $edit_id;

}else{
$data['id'] = $id;
}

$data['name'] = $single_result->name;

$data['phone'] = $single_result->phone;

$data['email'] = $single_result->email;

$data['address'] = $single_result->address;

$data['image'] = $single_result->image;

}
$this->form_validation->set_rules('name','Name','trim|required');

$this->form_validation->set_rules('phone','Mobile No','trim|required');

$this->form_validation->set_rules('email','Email','trim|required');

$this->form_validation->set_rules('address','Address','trim|required');


if($id=="" && $edit_id==""){
		$this->form_validation->set_rules('image', 'Image Upload', 'callback_handle_upload');
		}

if($this->form_validation->run()==FALSE){
	
	$this->load->view('admin/v_setting',$data);
	
}else{
	
	if($this->input->post('email')){
		
		$edit_id = $this->input->post('edit_id');
				
		$save['name'] = $this->input->post('name');
		$save['phone'] = $this->input->post('phone');
		$save['email'] = $this->input->post('email');
		$save['address'] = $this->input->post('address');		
		
if($_FILES['image']['name']!=""){
				
				$this->load->library('upload');
				
				//for application image
				
				$this->load->library('image_lib');
				
				if($edit_id){
					
					$unlink_result = $this->m_client->single_client($edit_id);
					
					$unlink_image = $unlink_result->image;
					unlink('./assests/uploads/client/'.$unlink_image);

				}
				
				$_FILES['userfile']['name'] = $_FILES['image']['name'];
				$_FILES['userfile']['type'] = $_FILES['image']['type'];
				$_FILES['userfile']['tmp_name'] = $_FILES['image']['tmp_name'];
				$_FILES['userfile']['error'] = $_FILES['image']['error'];
				$_FILES['userfile']['size'] = $_FILES['image']['size'];
				
				$rand=rand(0,10000);
				
				$aconfig['file_name'] = $rand;
				
				$aconfig['upload_path'] = './assests/uploads/client/';
				
				$aconfig['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
				
				$this->upload->initialize($aconfig);
				
				$this->upload->do_upload();
				
				$file_names_array = $this->upload->data();
				
				
				$file_names[] = $file_names_array['file_name'];
				
				$save['image'] =$file_names[0]; 
				
				
				}
		$success = $this->m_admin->change_password($save);
		
		if($success!=""){
			$lang = $this->session->userdata('lang');
if($lang==''){
	$lang='french';
}
if($lang=='english'){
			$this->session->set_flashdata('message','Saved Successfully');
}else{
				$this->session->set_flashdata('message','Enregistré terminée');
}
			redirect('admin/dashboard/setting');
			exit;
			
		}else{
			
			$this->session->set_flashdata('error', "Database error");
			
			redirect('admin/dashboard/setting');
			exit;
			
		}
		
		
	}
}

	
}
function handle_upload() {
	
    if (isset($_FILES['image']) && !empty($_FILES['image']['name']))
     {
       $types =  $_FILES['image']['type'];
	   
	  if($types!="image/png" && $types!="image/jpeg" && $types!="image/gif"){
	   if($lang==''){
	$lang='french';
}
if($lang=='english'){
	  $this->form_validation->set_message('handle_upload', "Invalid Image!");
}else{
	  $this->form_validation->set_message('handle_upload', "Image invalide!");

}
      return false;
	  
	  }else{ 
	  
	   return true; }
	   
    }
    else
    {
      // throw an error because nothing was uploaded
	  if($lang==''){
	$lang='french';
}
if($lang=='english'){

      $this->form_validation->set_message('handle_upload', "You must upload an image!");
}else{
	      $this->form_validation->set_message('handle_upload', "Vous devez télécharger une image!");

}
      return false;
    }
  }
}
