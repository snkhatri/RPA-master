<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Client extends CI_Controller{
	
function __construct(){
	
	parent::__construct();
	$this->load->model(array("m_invoice","m_client","m_admin"));
	$this->load->library('email');
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

// List client
public function index(){
$this->admin_check();

$data['client_result'] = $this->m_client->list_client();

$this->load->view('admin/v_list_client',$data);
}

// view Client
public function view(){
	
$view_id = $this->uri->segment(4);

$single_result = $this->m_client->single_client($view_id);

$data['invoice_result'] = $this->m_invoice->selected_invoice($view_id);

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

$this->load->view('admin/v_client_view',$data);
}

//delete client
public function delete(){
$this->admin_check();	

$delete_id = $this->uri->segment(4);

if($delete_id){

$unlink_result = $this->m_client->single_client($delete_id);
					
$unlink_image = $unlink_result->image;

unlink('./assests/uploads/client/'.$unlink_image);

$this->m_invoice->delete_client_invoice($delete_id);

$delete_client = $this->m_client->delete_client($delete_id);
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
			redirect('admin/client');
			exit;
			
		}else{
			
			$this->session->set_flashdata('error', "Database error");
			
			redirect('admin/client');
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

$this->form_validation->set_rules('address','Address field is required.','trim|required');

$this->form_validation->set_rules('company','Company field is required.','trim|required');

$this->form_validation->set_rules('position','Position field is required.','trim|required');

$this->form_validation->set_rules('city','City field is required.','trim|required');

if($id=="" && $edit_id==""){
		$this->form_validation->set_rules('image', 'Image Upload', 'callback_handle_upload');
		
		$this->form_validation->set_rules('email','Email field is required.','required|valid_email|is_unique[client.email]');

		}else{
			$this->form_validation->set_rules('email','Email field is required.','required|valid_email');

		}

}else{
$this->form_validation->set_rules('name','Merci de renseigner votre nom','trim|required');

$this->form_validation->set_rules('phone','Merci de renseigner votre numéro de mobile','trim|required');


$this->form_validation->set_rules('address','Merci de renseigner votre adresse','trim|required');

$this->form_validation->set_rules('company','Merci de renseigner votre entreprise','trim|required');

$this->form_validation->set_rules('position','Merci de renseigner votre poste','trim|required');

$this->form_validation->set_rules('city','Merci de renseigner votre ville','trim|required');

if($id=="" && $edit_id==""){
		$this->form_validation->set_rules('image', 'Image Upload', 'callback_handle_upload');
		$this->form_validation->set_rules('email','Merci de renseigner votre e-mail','required|valid_email|valid_email|is_unique[client.email]');

		}else{
			$this->form_validation->set_rules('email','Merci de renseigner votre e-mail','required|valid_email');
		}

}
		
if($this->form_validation->run()==FALSE){
	if($id=="" && $edit_id==""){

	$data['name'] = $this->input->post('name');
		$data['surname'] = $this->input->post('surname');
		$data['phone'] = $this->input->post('phone');
		$data['email'] = $this->input->post('email');
		$data['address'] = $this->input->post('address');
		$data['company'] = $this->input->post('company');
		$data['position'] = $this->input->post('position');
		 $data['city'] = $this->input->post('city');
	}
	$this->load->view('admin/v_client_register',$data);

}else{
	
	if($this->input->post('email')){
		
		$edit_id = $this->input->post('edit_id');
				
		$save['name'] = $this->input->post('name');
		$save['surname'] = $this->input->post('surname');
		$save['phone'] = $this->input->post('phone');
		$save['email'] = $this->input->post('email');
		$email= $this->input->post('email');
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
			
if($edit_id==''){

$this->load->helper('string');
$new_pass = random_string('alnum', 6);
$save_pass['password'] = md5($new_pass);
$success = $this->m_client->save($save_pass,$success);
if($new_pass!=''){

$html = '<html><head><title></title></head>
<body style="width: 560px;margin: 0px auto;font-family: Verdana, Geneva, sans-serif;text-align: left;font-weight: normal;">
<div id="body_wrapper">
<div style="border: 5px solid #F30;border-radius: 20px 0px 20px 0px; padding: 20px;margin-top: 20px;background: url(http://residence-paris-asnieres.com/espaceclient/assests/image/image.png);opacity:0.9;">
<p><img src="http://residence-paris-asnieres.com/espaceclient/assests/image/logo.png" alt="logo" height="92" width="129" style="float:left;" />
<img src="http://residence-paris-asnieres.com/espaceclient/assests/image/logo_title.png" alt="logo" height="20" width="282"  style="float:left; padding:20px 0px 0px 10px;"/>
<div style="clear:both"></div>
</p>
<p style="background: url(http://residence-paris-asnieres.com/espaceclient/assests/image/stripe.png);background-repeat: repeat-x;">&nbsp;</p>
<h2 style=" font-size: 17px;color: #C00;margin-bottom: 18px;">Inscription Detail pour le client</h2>
<div style="border: 1px solid #C30;border-radius: 0px 20px 0px 20px;padding: 10px;background-color: #FFF;">
<p style="margin-bottom:8px;font-size:14px;">Name : '.$this->input->post('name').'</p>
<p style="margin-bottom:8px;font-size:14px;">Email : '.$this->input->post('email').'</p>
<p style="margin-bottom:8px;font-size:14px;">Password : '.$new_pass.'</p>
<p style="margin-bottom:8px;font-size:14px;">Mobile : '. $this->input->post('phone').'</p>
<h3>Thank you </h3>
</div>
</div>
</div>
</body></html>';


$config = Array(

'protocol' => 'smtp',

'smtp_host' => 'ssl://smtp.googlemail.com',

'smtp_port' => '465',

'smtp_crypto'=>'tls/ssl',

'smtp_user' => 'sivaraj@i2isoft.com',

'smtp_pass' => 'sivarajsiva',

'charset' => 'iso-8859-1',

'mailtype' => 'html'

);

$this->load->library('email',$config);

$this->email->set_newline("\r\n");

$this->email->set_mailtype("html");

$this->email->from('sivaraj@i2isoft.com',"RESIDENCE PARIS ASNIERES");

$this->email->to($email); 

$this->email->subject("New Password");

$this->email->message($html);

$this->email->send();		
			
 }
				
			}
			
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
			redirect('admin/client');
			exit;
			
		}else{
			
			$this->session->set_flashdata('error', "Database error");
			
			redirect('admin/client');
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
	

if($lang=='english'){

      $this->form_validation->set_message('handle_upload', "You must upload an image!");
}else{
	      $this->form_validation->set_message('handle_upload', "Vous devez télécharger une image de profil");
}
      return false;
    }
  }
}