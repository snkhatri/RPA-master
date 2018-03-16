<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
	
function __construct(){
	
	parent::__construct();
	$this->load->model("m_admin");
}
// User Check

public function admin_check(){
	
$admin_details = $this->session->userdata('admin_details');

$admin_id = $admin_details['id'];

if($admin_id==""){
	
	redirect("login");
	exit;
}

return $admin_details;

}
public function language(){

$this->session->set_userdata('lang',$this->uri->segment(3));
redirect("login");
	exit;
}
public function index(){
	 $user_id = $this->session->userdata('admin_details');
	 
		if(!empty($user_id)){
			redirect('login/dashboard','refresh');
		}else{
			$data['forgot_pass'] = '';
           $this->load->view("v_login",$data);
		} 
}

//Login
public function  login_validate(){

$submit = $this->input->post('submit');

if($submit=='submit'){
	
	$email = $this->input->post('email');
	
	$password = md5($this->input->post('password'));
	
	$login = $this->m_admin->admin_login($email,$password);
	
	 $count = count($login);
	
if($count==1){
	
	$admin['id'] = $login->id;
	
	$admin['email'] = $login->email;
	
	$admin['user'] = 'admin';
	
	$this->session->set_userdata('admin_details',$admin);
	
	redirect("login/dashboard");
	exit;
}else{
$login = $this->m_admin->client_login($email,$password);
	
	$count = count($login);
	
if($count==1){
	
	$admin['id'] = $login->id;
	
	$admin['email'] = $login->email;
	
	$admin['user'] = 'client';
	
	$this->session->set_userdata('admin_details',$admin);
	redirect("login/dashboard");
	exit;
}else{
	
	$this->session->set_flashdata('error_message',"Nom d'utilisateur ou mot de passe incorrect");
	
	redirect("login");
	exit;
}}
	
}

$data['forgot_pass'] = '';
redirect('login');
}

// Dashboard
public function dashboard(){

$admin_details = $this->admin_check();
$user = $admin_details['user'];

if($user=='admin'){
	
redirect('admin/dashboard');
		
}elseif($user=='client'){
	
redirect('client/invoice');

}
}

//forgot password
public function forgot(){
	
 $submit = $this->input->post('submit');

if($submit=='submit'){
	
 $email = $this->input->post('email');

 $new_password = $this->m_admin->forgot($email);
 
 if($new_password){
	 
	$html ='<div style="background:#CFEAC8;border:solid 1px #ddd;border-radius:10px;padding:20px 35px"><div class="adM">
 		</div ><h3>Hi! '.$email.',</h3>
		<h3>Votre mot de passe est ci-dessous,</h3>
		<strong>mot de passe : &nbsp;&nbsp;&nbsp;&nbsp;</strong><label>'.$new_password.'</label><br><br>
		<h3>Merci </h3>
		</div>';
		
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
		
		$this->email->subject("nouveau mot de passe");
		
		$this->email->message($html);
		
		$this->email->send();	

	$this->session->set_flashdata('error_message', "Mot de passe envoyé un e-mail avec succès");
	redirect("login/forgot");
	exit;		
			
 }else{
	
	$this->session->set_flashdata('error_message', "S'il vous plaît vérifier votre e-mail");	
	redirect("login/forgot");
	exit;		
 
 }
  
  
}
	
$data['forgot_pass'] = 'forgot'; 	
$this->load->view('v_login',$data);

}

// Logout
public function logout(){
	
$this->session->sess_destroy();

redirect("login");
exit;
}

}