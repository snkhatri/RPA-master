<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Document extends CI_Controller{
	
function __construct(){
	
	parent::__construct();
	$this->load->model(array("m_document","m_client","m_admin"));
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

// List document
public function index(){
$this->admin_check();
$data['document_result'] = $this->m_document->list_document();

$this->load->view('admin/v_list_document',$data);
}
//delete document
public function delete(){
$this->admin_check();	

$delete_id = $this->uri->segment(4);

if($delete_id){

$unlink_result = $this->m_document->single_document($delete_id);
					
$unlink_image = $unlink_result->image;

unlink('./assests/uploads/document/'.$unlink_image);

$delete_document = $this->m_document->delete_document($delete_id);
}else{
	
$delete_documents = $this->input->post('checkbox');

$count = count($delete_documents);
 
for($i=0; $i<$count; $i++){

$delete_value = $delete_documents[$i];	
 
$unlink_result = $this->m_document->single_document($delete_value);
					
$unlink_image = $unlink_result->image;

unlink('./assests/uploads/document/'.$unlink_image);

$delete_document = $this->m_document->delete_document($delete_value);
	 
 }


}
if($delete_document!=""){
$lang = $this->session->userdata('lang');
if($lang==''){
	$lang='french';
}
if($lang=='english'){

			$this->session->set_flashdata('message', "The document's Deleted Correctly");
}else{
			$this->session->set_flashdata('message', "La facture a été supprimée");

}
			redirect('admin/document');
			exit;
			
		}else{
			
			$this->session->set_flashdata('error', "Database error");
			
			redirect('admin/document');
			exit;
			
		}
		

}
//Insert and edit document

public function form(){
$this->admin_check();

$id = $this->uri->segment(4);
if($id=='0'){
	$id='';
	$client_id=$this->uri->segment(5);
}else{
	$client_id='';
}
$edit_id = $this->input->post('edit_id');

if($id=="" && $edit_id==""){

$data['id'] = '';

$data['client_id'] = $client_id;

$data['image'] = '';

$data['client_result'] = $this->m_client->list_client();

}else{
	
$single_result = $this->m_document->single_document($id,$edit_id);
	
if($edit_id){
	
$data['id'] = $edit_id;

}else{
$data['id'] = $id;
}

$data['client_id'] = $single_result->client_id;

$data['image'] = $single_result->image;

$data['client_result'] = $this->m_client->list_client();

}
$lang = $this->session->userdata('lang');
if($lang==''){
	$lang='french';
}

if($lang=='english'){

$this->form_validation->set_rules('client_id','Client ID field is required.','trim|required');

}else{
$this->form_validation->set_rules('client_id','Merci de renseigner un identifiant client','trim|required');

}
if($id=="" && $edit_id==""){
		$this->form_validation->set_rules('image', 'Image Upload', 'callback_handle_upload');
		}

if($this->form_validation->run()==FALSE){
	
	$this->load->view('admin/v_document_register',$data);
	
}else{
	
	if($this->input->post('client_id')){
		
		$edit_id = $this->input->post('edit_id');
		$save['client_id'] = $this->input->post('client_id');
		
if($_FILES['image']['name']!=""){
				
				$this->load->library('upload');
				
				//for application image
				
				$this->load->library('image_lib');
				
				if($edit_id){
					
					$unlink_result = $this->m_document->single_document($edit_id);
					
					$unlink_image = $unlink_result->image;
					unlink('./assests/uploads/document/'.$unlink_image);

				}
				
				$_FILES['userfile']['name'] = $_FILES['image']['name'];
				$_FILES['userfile']['type'] = $_FILES['image']['type'];
				$_FILES['userfile']['tmp_name'] = $_FILES['image']['tmp_name'];
				$_FILES['userfile']['error'] = $_FILES['image']['error'];
				$_FILES['userfile']['size'] = $_FILES['image']['size'];
				
				$rand=rand(0,10000);
				
				$aconfig['file_name'] = $rand;
				
				$aconfig['upload_path'] = './assests/uploads/document/';
				
				$aconfig['allowed_types'] = 'jpg|jpeg|gif|png|bmp|pdf|doc|xlsx|docx';
				
				$this->upload->initialize($aconfig);
				
				$this->upload->do_upload();
				
				$file_names_array = $this->upload->data();
				
				
				$file_names[] = $file_names_array['file_name'];
				
				$save['image'] =$file_names[0]; 
				
				
				}
		$success = $this->m_document->save($save,$edit_id);
		
		if($success!=""){
			
			if($edit_id==''){
				$insert['date_time'] = date('Y-m-d');
				$this->m_document->save($insert,$success);
				
			}
$lang = $this->session->userdata('lang');
if($lang==''){
	$lang='french';
}

if($lang=='english' && $edit_id==''){

			$this->session->set_flashdata('message','The document Been Added Correctly');
			
}elseif($lang=='english' && $edit_id!=''){

			$this->session->set_flashdata('message','The document Been Edited Correctly');
}elseif($lang=='french' && $edit_id!=''){

			$this->session->set_flashdata('message','Le facture correctement édité');
}elseif($lang=='french' && $edit_id==''){
			$this->session->set_flashdata('message','Le facture été ajouté correctement');

}
			redirect('admin/document');
			exit;
			
		}else{
			
			$this->session->set_flashdata('error', "Database error");
			
			redirect('admin/document');
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
	   
	  if($types!="image/png" && $types!="image/jpeg" && $types!="image/gif" && $types!="application/pdf" && $types!="application/doc" && $types!="application/xlsx" && $types!="application/docx"){
	   if($lang=='english'){
	  $this->form_validation->set_message('handle_upload', "Invalid Document!");
	   }else{
 		 $this->form_validation->set_message('handle_upload', "document valide!");
	   }
      return false;
	  
	  }else{ 
	  
	   return true; }
	   
    }
    else
    {
      // throw an error because nothing was uploaded
	  if($lang=='english'){

      $this->form_validation->set_message('handle_upload', "You must upload a Document pdf");
	  }else{
		        $this->form_validation->set_message('handle_upload', "Vous devez télécharger un document pdf");
	  }
      return false;
    }
  }
}