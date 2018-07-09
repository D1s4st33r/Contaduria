<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
		protected $session_id;
		protected $session_token;

    public function __construct() {
      parent::__construct();
	  	$get = $this->input->get();
	  
	  if( !empty($get['token']) &&  !empty($get['id'])){
		  $session = $this->Auth_Model->verificarSesion($get);
		 if(!$session){
			 //fallo de credenciales
			redirect(base_url(), "refresh");
		 }
		 if($session['error_login']){
			redirect('Login/index?error_login='.$session['error_login'],'refresh');
		 }
		 $this->session_token = $get['token'];
		 $this->session_id = $get['id'];
	  }else{
		redirect(base_url(), "refresh");
	  }

    }
}