<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus_models extends CI_Model {

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
	public function getProkerDepartemen($id_departemen){
		$data = $this->db->get_where('program_kerja',array('id_departemen' => $id_departemen));
		return $data->result_array();
	}

	public function getJenisSurat(){
		$data = $this->db->get('jenis_surat');
		return $data->result_array();
	}
	public function getMaxNumber($jenis_surat){
		$this->db->select_max('NOMOR_SURAT');
		$this->db->where('ID_JENIS', $jenis_surat);
		$data = $this->db->get('nomor_surat');
		return $data->result_array();	
	}
	public function tambahSurat($nomor_surat,$jenis_surat,$program_kerja,$username,$bulan,$tahun){
		$this->db->insert('nomor_surat',array('NOMOR_SURAT'=> $nomor_surat,'ID_JENIS'=> $jenis_surat,'ID_PROKER'=> $program_kerja,'BULAN'=> $bulan,'TAHUN'=> $tahun,'USERNAME'=> $username,'BULAN'=> $bulan,'TAHUN'=> $tahun));
	}
	public function getNamaProker($program_kerja){
		$data = $this->db->get_where('program_kerja',array('ID_PROKER' => $program_kerja));
		return $data->result_array();
	}
	public function getDepartemen(){
		$data = $this->db->get('departemen');
		return $data->result_array();
	}
	public function tambahSuratEksternal($namafile,$link,$keterangan,$id_departemen){
		$this->db->insert('surat_eksternal',array('NAMA_FILE'=> $namafile,'KETERANGAN'=> $keterangan,'LINK'=> $link,'ID_DEPARTEMEN'=>$id_departemen));
	}
	public function getSuratEksternal($id_departemen){
		$data = $this->db->get_where('surat_eksternal',array('ID_DEPARTEMEN' => $id_departemen));
		return $data->result_array();
	}
	public function getBankSurat(){
		$data = $this->db->get('template_surat');
		return $data->result_array();	
	}
}
