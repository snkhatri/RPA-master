<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Invoice extends CI_Controller{
	
function __construct(){
	
	parent::__construct();
	$this->load->model(array("m_invoice","m_document","m_client","m_admin"));
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

// List invoice
public function index(){
$this->admin_check();
$admin_details = $this->session->userdata('admin_details');

$admin_id = $admin_details['id'];

$data['invoice_result'] = $this->m_invoice->selected_invoice($admin_id);

$this->load->view('client/v_list_invoice',$data);
}
// List document
public function document(){
$this->admin_check();
$admin_details = $this->session->userdata('admin_details');

$admin_id = $admin_details['id'];

$data['document_result'] = $this->m_document->selected_document($admin_id);

$this->load->view('client/v_list_document',$data);
}

//delete invoice
public function delete(){
$this->admin_check();	

$delete_id = $this->uri->segment(4);

if($delete_id){

$unlink_result = $this->m_invoice->single_invoice($delete_id);
					
$unlink_image = $unlink_result->image;

unlink('./assests/uploads/invoice/'.$unlink_image);

$delete_invoice = $this->m_invoice->delete_invoice($delete_id);
}else{
	
$delete_invoices = $this->input->post('checkbox');

$count = count($delete_invoices);
 
for($i=0; $i<$count; $i++){

$delete_value = $delete_invoices[$i];	
 
$unlink_result = $this->m_invoice->single_invoice($delete_value);
					
$unlink_image = $unlink_result->image;

unlink('./assests/uploads/invoice/'.$unlink_image);

$delete_invoice = $this->m_invoice->delete_invoice($delete_value);
	 
 }


}
if($delete_invoice!=""){
			
$lang = $this->session->userdata('lang');
if($lang==''){
	$lang='french';
}
if($lang=='english'){

			$this->session->set_flashdata('message', "The Invoice's Removed Correctly");
}else{
			$this->session->set_flashdata('message', "La facture est retiré correctement");

}
			
			redirect('client/invoice');
			exit;
			
		}else{
			
			$this->session->set_flashdata('error', "Database error");
			
			redirect('client/invoice');
			exit;
			
		}
		

}
}