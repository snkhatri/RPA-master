<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller{
	
function __construct(){
	
	parent::__construct();
	$this->load->model(array("m_invoice","m_client","m_admin"));
}

// User Check

public function admin_check(){
	
$admin_details = $this->session->userdata('admin_details');

$admin_id = $admin_details['id'];
$user = $admin_details['user'];

if($admin_id=="" || $user!="client"){
	
	redirect("login");
	exit;
}

return true;
}

// List client
public function index(){
$this->admin_check();

$admin_details = $this->session->userdata('admin_details');
$admin_id = $admin_details['id'];
$single_result = $this->m_client->single_client($admin_id);

$data['id'] = $single_result->id;

$data['name'] = $single_result->name;

$data['surname'] = $single_result->surname;

$data['phone'] = $single_result->phone;

$data['email'] = $single_result->email;

$data['address'] = $single_result->address;

$data['company'] = $single_result->company;

$data['position'] = $single_result->position;

$data['city'] = $single_result->city;

$data['image'] = $single_result->image;

$this->load->view('client/v_my_profile',$data);
}

//delete client
public function delete(){
$this->admin_check();	

$delete_id = $this->uri->segment(4);

if($delete_id){

$unlink_result = $this->m_client->single_client($delete_id);
					
$unlink_image = $unlink_result->image;

unlink('./assests/uploads/client/'.$unlink_image);

$delete_client = $this->m_client->delete_client($delete_id);
}else{
	
$delete_clients = $this->input->post('checkbox');

$count = count($delete_clients);
 
for($i=0; $i<$count; $i++){

$delete_value = $delete_clients[$i];	
 
$unlink_result = $this->m_client->single_client($delete_value);
					
$unlink_image = $unlink_result->image;

unlink('./assests/uploads/client/'.$unlink_image);

$delete_client = $this->m_client->delete_client($delete_value);
	 
 }


}
if($delete_client!=""){
			
$lang = $this->session->userdata('lang');
if($lang==''){
	$lang='french';
}

if($lang=='english'){
			$this->session->set_flashdata('message', "The Client's Removed Correctly");
}else{
			$this->session->set_flashdata('message', "Le client de les ôter correctement");

}
			
			redirect('client/profile');
			exit;
			
		}else{
			
			$this->session->set_flashdata('error', "Database error");
			
			redirect('client/profile');
			exit;
			
		}
		

}
//Insert and edit client

public function form(){
$this->admin_check();

$id = $this->uri->segment(4);

$edit_id = $this->input->post('edit_id');

if($id=="" && $edit_id==""){

$data['id'] = '';

$data['name'] = '';

$data['surname'] = '';

$data['phone'] = '';

$data['email'] = '';

$data['address'] = '';

$data['company'] = '';

$data['position'] = '';

$data['city'] = '';

$data['image'] = '';

}else{
	
$single_result = $this->m_client->single_client($id,$edit_id);
	
if($edit_id){
	
$data['id'] = $edit_id;

}else{
$data['id'] = $id;
}

$data['name'] = $single_result->name;

$data['surname'] = $single_result->surname;

$data['phone'] = $single_result->phone;

$data['email'] = $single_result->email;

$data['address'] = $single_result->address;

$data['company'] = $single_result->company;

$data['position'] = $single_result->position;

$data['city'] = $single_result->city;

$data['image'] = $single_result->image;

}
$lang = $this->session->userdata('lang');
if($lang==''){
	$lang='french';
}

if($lang=='english'){

$this->form_validation->set_rules('name','Name field is required.','trim|required');

$this->form_validation->set_rules('phone','Mobile No field is required.','trim|required');

$this->form_validation->set_rules('email','Email field is required.','required|valid_email');

$this->form_validation->set_rules('address','Address field is required.','trim|required');

$this->form_validation->set_rules('company','Company field is required.','trim|required');

$this->form_validation->set_rules('position','Position field is required.','trim|required');

$this->form_validation->set_rules('city','City field is required.','trim|required');

if($id=="" && $edit_id==""){
		$this->form_validation->set_rules('image', 'Image Upload', 'callback_handle_upload');
		}

}else{
$this->form_validation->set_rules('name','Merci de renseigner votre nom','trim|required');

$this->form_validation->set_rules('phone','Merci de renseigner votre numéro de mobile','trim|required');

$this->form_validation->set_rules('email','Merci de renseigner votre e-mail','required|valid_email');

$this->form_validation->set_rules('address','Merci de renseigner votre adresse','trim|required');

$this->form_validation->set_rules('company','Merci de renseigner votre entreprise','trim|required');

$this->form_validation->set_rules('position','Merci de renseigner votre poste','trim|required');

$this->form_validation->set_rules('city','Merci de renseigner votre ville','trim|required');

if($id=="" && $edit_id==""){
		$this->form_validation->set_rules('image', 'Image Upload', 'callback_handle_upload');
		}

}

if($this->form_validation->run()==FALSE){
	
	$this->load->view('client/v_update_profile',$data);
	
}else{
	
	if($this->input->post('email')){
		
		$edit_id = $this->input->post('edit_id');
				
		$save['name'] = $this->input->post('name');
		$save['surname'] = $this->input->post('surname');
		$save['phone'] = $this->input->post('phone');
		$save['email'] = $this->input->post('email');
		$save['address'] = $this->input->post('address');
		$save['company'] = $this->input->post('company');
		$save['position'] = $this->input->post('position');
		$save['city'] = $this->input->post('city');
		
		
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
		$success = $this->m_client->save($save,$edit_id);
		
		if($success!=""){

$lang = $this->session->userdata('lang');
if($lang==''){
	$lang='french';
}

if($lang=='english' && $edit_id==''){

			$this->session->set_flashdata('message','The Client Been Added Correctly');
			
}elseif($lang=='english' && $edit_id!=''){

			$this->session->set_flashdata('message','The Client Been Edited Correctly');
}elseif($lang=='french' && $edit_id!=''){

			$this->session->set_flashdata('message','Le client correctement édité');
}elseif($lang=='french' && $edit_id==''){
			$this->session->set_flashdata('message','Le Client été ajouté correctement');

}			
			redirect('client/profile');
			exit;
			
		}else{
			
			$this->session->set_flashdata('error', "Database error");
			
			redirect('client/profile');
			exit;
			
		}
		
		
	}
}

	
}
function handle_upload() {
	 $lang = $this->session->userdata('lang');
if($lang==''){
	$lang='french';
}	
    if (isset($_FILES['image']) && !empty($_FILES['image']['name']))
     {
       $types =  $_FILES['image']['type'];
	   
	  if($types!="image/png" && $types!="image/jpeg" && $types!="image/gif"){
	  
	  if($lang=='english'){

	  $this->form_validation->set_message('handle_upload', "Invalid Image!");
	  }else{
		  	  $this->form_validation->set_message('handle_upload', "image non valide!");
	  }
      return false;
	  
	  }else{ 
	  
	   return true; }
	   
    }
    else
    {
      // throw an error because nothing was uploaded
      $this->form_validation->set_message('handle_upload', "You must upload an image!");
      return false;
    }
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
	
	$this->load->view('client/v_change_password',$data);
	
}else{
	
	if($this->input->post('old_password')){
		
		 $old_password = $this->input->post('old_password');
		
$admin_details = $this->session->userdata('admin_details');

$id = $admin_details['id'];

		$check_password = $this->m_admin->check_password_client(md5($old_password),$id);
		
		 $count = count($check_password);
		if($count!='1'){
			
		echo	$lang = $this->session->userdata('lang');exit;
if($lang==''){
	$lang='french';
}
if($lang=='english'){
			$this->session->set_flashdata('error', "Old Password Not Match");
}else{
				$this->session->set_flashdata('error', "Ancien mot de passe ne correspondent pas");

}
			
			redirect('client/profile/change_password');
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
			redirect('client/profile/change_password');
			exit;
		}

		$save['password'] = md5($confirm_password);
		
		$success = $this->m_admin->change_password_client($save,$id);
		
		if($success!=""){
			
if($lang=='english'){
			$this->session->set_flashdata('message', "Password Changed Successfully");
			}else{
			$this->session->set_flashdata('message', "Mot de passe modifié avec succès");

			}			
			redirect('client/profile');
			exit;
			
		}else{
			
			$this->session->set_flashdata('error', "Database error");
			
			redirect('client/profile');
			exit;
			
		}
		
		
	}
}

	
}
}