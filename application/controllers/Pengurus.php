<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller {

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
        if($this->session->userdata['username'] == ""){
			redirect('home');
		}else{
			if($this->session->userdata['role'] == "1"){
				redirect('sekertaris');
			}/*else if($this->session->userdata['role'] == "2"){
				redirect('pengurus');
			}*/
		}
    }

	public function index(){
		$this->load->view('pengurus/index.php');
	}

	public function generatenumber(){
		
	}

	public function uploadsurat() {

	}

	public function verifikasiSurat() {
		
	}

	public function writeInformasiSurat() {
		
	}

	public function logout(){
		$this->session->set_userdata('username','');
		//$this->session->set_userdata('role','');
		redirect('home');
	}
	
}
