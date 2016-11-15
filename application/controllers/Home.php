<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
		parent::__construct();
		if(isset($this->session->userdata['username'])){
			if($this->session->userdata['username'] == ""){
			//redirect('home');
			}else{
				if($this->session->userdata['role'] == "1"){
					redirect('sekertaris');
				}else if($this->session->userdata['role'] == "2"){
					redirect('pengurus');
				}
			}
		}else{

		}
    }

	public function index()
	{
		$this->load->view('index');
	}

	public function login(){
		$this->load->model('Home_models');
		if($_POST['username'] =="" || $_POST['password']==""){
			print_r("isi woe");//ada yang tidak diisi
		}else{
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$datalogin = $this->Home_models->datalogin($username,$password);
			if($datalogin == null){
				redirect('home');
			}else{
				foreach($datalogin as $dl);
				$role = $dl['role'];
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('role', $role);
				if($dl['role'] == 0){//admin
					redirect('admin');
				}else if($dl['role'] == 1){//kabinet

				}else if($dl['role'] == 2){//pengurus
					redirect('pengurus');
				}
				//print_r($this->session->userdata['username']);
			}
		}
	}

}
