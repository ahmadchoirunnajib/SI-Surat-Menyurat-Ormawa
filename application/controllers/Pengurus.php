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
		$this->load->model('Pengurus_models');
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
		if(!isset($_POST['program_kerja']) || !isset($_POST['jenis_surat'])){
			$id_departemen = $this->session->userdata['id_departemen'];
			$data = $this->Pengurus_models->getProkerDepartemen($id_departemen);
			$data2 = $this->Pengurus_models->getJenisSurat();
			$this->load->view('pengurus/generatecode.php',array('proker' => $data,'jenissurat' => $data2));
		}else{
			$program_kerja = $_POST['program_kerja'];
			$jenis_surat = $_POST['jenis_surat'];
			$keterangan = $_POST['keterangan'];
			$username = $this->session->userdata['username'];

			$nproker = $this->Pengurus_models->getNamaProker($program_kerja);
			foreach($nproker as $np);
			$kodeproker = $np['KODE_PROKER'];

			if(date('m')==1){
				$bulan = "I";
			}else if(date('m')==2){
				$bulan = "II";
			}else if(date('m')==3){
				$bulan = "III";
			}else if(date('m')==4){
				$bulan = "IV";
			}else if(date('m')==5){
				$bulan = "V";
			}else if(date('m')==6){
				$bulan = "VI";
			}else if(date('m')==7){
				$bulan = "VII";
			}else if(date('m')==8){
				$bulan = "VIII";
			}else if(date('m')==9){
				$bulan = "IX";
			}else if(date('m')==10){
				$bulan = "X";
			}else if(date('m')==11){
				$bulan = "XI";
			}else if(date('m')==12){
				$bulan = "XII";
			}
			$tahun = "20".date('y');

			$id_departemen = $this->session->userdata['id_departemen'];
			$data = $this->Pengurus_models->getMaxNumber($jenis_surat);
			//print_r($id_departemen);
			foreach($data as $d);
			if($d['NOMOR_SURAT'] == ""){
				$nomor_surat = 1;
			}else{
				$nomor_surat = $d['NOMOR_SURAT']+1;
			}
			//print_r($tahun);
			$this->Pengurus_models->tambahSurat($nomor_surat,$jenis_surat,$program_kerja,$username,$bulan,$tahun);
			if($jenis_surat==1){
				$jnssurat = "SPK";
			}else if($jenis_surat==2){
				$jnssurat = "SU";
			}else if($jenis_surat==3){
				$jnssurat = "SPi";
			}else if($jenis_surat==4){
				$jnssurat = "SKr";
			}else if($jenis_surat==5){
				$jnssurat = "SPm";
			}else if($jenis_surat==6){
				$jnssurat = "SKet";
			}
			$nomorsuratfix =  $nomor_surat."/".$jnssurat."/".$kodeproker."/BEM-FTIf/08/".$bulan."/".$tahun;
			$this->load->view('pengurus/nomersuratfix',array('nomorsuratfix' => $nomorsuratfix));
			//echo "wew";
		}
		//print_r($data2);
	}

	public function banksurat(){
		$data = $this->Pengurus_models->getBankSurat();
		$this->load->view('pengurus/banksurat',array('bank' => $data));
	}

	public function logout(){
		$this->session->set_userdata('username','');
		$this->session->set_userdata('role','');
		$this->session->set_userdata('id_departemen','');
		//$this->session->set_userdata('role','');
		redirect('home');
	}

	public function surateksternal(){
		$id_departemen = $this->session->userdata['id_departemen'];
		$data = $this->Pengurus_models->getSuratEksternal($id_departemen);
		$this->load->view('pengurus/surateksternal',array('data' => $data));
		//print_r($data);
	}

	public function uploadsurateksternal(){
		if(!isset($_POST['departemen'])){
			$data = $this->Pengurus_models->getDepartemen();
			$this->load->view('pengurus/uploadsurateksternal',array('departemen' => $data));
		}else if($_POST['departemen'] == ""){
			$data = $this->Pengurus_models->getDepartemen();
			$this->load->view('pengurus/uploadsurateksternal',array('departemen' => $data));
		}else{
			if($_POST['departemen']==1){
				$config['upload_path']          = './upload/eksternal/Internal Affairs/';
				$link = base_url()."upload/eksternal/Internal Affairs/";
			}else if($_POST['departemen']==2){
				$config['upload_path']          = './upload/eksternal/Eksternal Affairs/';
				$link = base_url()."upload/eksternal/Eksternal Affairs/";
			}else if($_POST['departemen']==3){
				$config['upload_path']          = './upload/eksternal/Student Resource Development/';
				$link = base_url()."upload/eksternal/Student Resource Development/";
			}else if($_POST['departemen']==4){
				$config['upload_path']          = './upload/eksternal/Research and Technology Development/';
				$link = base_url()."upload/eksternal/Research and Technology Development/";
			}else if($_POST['departemen']==5){
				$config['upload_path']          = './upload/eksternal/Entrepreneurship/';
				$link = base_url()."upload/eksternal/Entrepreneurship/";
			}else if($_POST['departemen']==6){
				$config['upload_path']          = './upload/eksternal/Organization Student Responsibility/';
				$link = base_url()."upload/eksternal/Organization Student Responsibility/";
			}else if($_POST['departemen']==7){
				$config['upload_path']          = './upload/eksternal/Badan Koordinasi Pemandu/';
				$link = base_url()."upload/eksternal/Badan Koordinasi Pemandu/";
			}else if($_POST['departemen']==8){
				$config['upload_path']          = './upload/eksternal/Information Media/';
				$link = base_url()."upload/eksternal/Information Media/";
			}
			$config['allowed_types']        = 'gif|jpg|png|jpeg|jpe|pdf|doc|docx|rtf|text|txt';
			$config['max_size']             = 0;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('berkas')){
				$error = array('error' => $this->upload->display_errors());
				print_r($error);//$this->load->view('v_upload', $error);
			}else{
				$upload_data = $this->upload->data();
				$data = $this->Pengurus_models->getDepartemen();
				echo "Berhasil";
				$namafile = $upload_data['file_name'];
				$link = $link.$namafile;
				$keterangan = $_POST['keterangan'];
				$id_departemen = $_POST['ID_DEPARTEMEN'];
				$this->Pengurus_models->tambahSuratEksternal($namafile,$link,$keterangan,$id_departemen);

				$this->load->view('pengurus/uploadsurateksternal',array('departemen' => $data));
			}
			//print_r($link);
		}
		
	}

	public function coba(){
		echo date('d-m-y');
	}
	
}
