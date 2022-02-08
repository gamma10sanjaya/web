<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

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

	public function __construct()
	{
		parent::__construct();
		// load model
		$this->load->model('User_model', 'usr');
		$this->load->model('Perpustakaan_model', 'pst');
		$this->load->model('Databuku_model', 'dbk');
	}

	public function dataguru()
	{
		$data['title_sidebar'] = "User";
		$data['title_submenu'] = "Data Guru";
		$data['user'] = $this->usr->getUserlog();
		$data['dataguru'] = $this->usr->getDataguru();
		$this->load->view('templates/dashboard_header', $data);
		$this->load->view('user/dataguru', $data);
		$this->load->view('templates/dashboard_footer');
	}

	public function tambahguru()
	{
		$data['title_sidebar'] = "User";
		$data['title_submenu'] = "Data Guru";
		$data['user'] = $this->usr->getUserlog();
		$data['dataguru'] = $this->usr->getDataguru();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.user_email]', ['is_unique' => 'email sudah ada broo']);
		$this->form_validation->set_rules('password1', 'Password1', 'required');
		$this->form_validation->set_rules('password2', 'Password2', 'required|matches[password1]', ['matches' => 'password not match']);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dashboard_header', $data);
			$this->load->view('user/tambahguru', $data);
			$this->load->view('templates/dashboard_footer');
		} else {
			$input = $this->input->post(NULL, TRUE);
			// var_dump($input);
			// die;
			$data = [
				'user_name' => $input['nama'],
				'user_email' => $input['email'],
				'user_password' => password_hash($input['password1'], PASSWORD_DEFAULT),
				'is_active' => 1,
				'user_role_id' => 2,
				'date_created' => date('Y/m/d')
			];
			// echo '<pre>';
			// var_dump($data);
			// die;

			// $this->db->insert('nama tabel', 'isian tabel');
			$this->usr->getInsertguru($data);
			redirect('user/dataguru');
		}
	}

	public function rombonganbelajar()
	{
		$data['title_sidebar'] = "User";
		$data['title_submenu'] = "Data Rombel";
		$data['user'] = $this->usr->getUserlog();
		$data['datarombel'] = $this->usr->getDatarombel();
		$this->load->view('templates/dashboard_header', $data);
		$this->load->view('user/datarombel', $data);
		$this->load->view('templates/dashboard_footer');
	}

	public function tambahrombel()
	{
		$data['title_sidebar'] = "User";
		$data['title_submenu'] = "Data Rombel";
		$data['user'] = $this->usr->getUserlog();
		$data['datakelas'] = $this->usr->getDatakelas();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dashboard_header', $data);
			$this->load->view('user/tambahrombel', $data);
			$this->load->view('templates/dashboard_footer');
		} else {
			$input = $this->input->post(NULL, TRUE);
			$data = [
				'tb_rombel_title' => $input['title'],
				'tb_kelas_id' => $input['kelas'],
				'tb_rombel_tahun' => $input['tahun'],
				'tb_rombel_semester' => 'Gasal'
			];
			$this->usr->getInsertrombel($data);
			redirect('user/rombonganbelajar');
		}
	}

	public function settingkelas($userid)
	{
		$data['title_sidebar'] = "User";
		$data['title_submenu'] = "Data Guru";
		$data['user'] = $this->usr->getUserlog();
		$data['namaguru'] = $this->usr->getUserbyid($userid);
		$data['dataguru'] = $this->usr->getDataguru();
		$data['datakelas'] = $this->usr->getDatakelas();
		$data['userid'] = $userid;
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		if ($this->form_validation->run() == false) {

			$this->load->view('templates/dashboard_header', $data);
			$this->load->view('user/settingkelas', $data);
			$this->load->view('templates/dashboard_footer');
		} else {
			$cekguru = $this->db->get_where('tb_gurukelas', ['user_id' => $userid])->row_array();
			if (!$cekguru) {
				$input = $this->input->post(NULL, TRUE);
				$dataisian = [
					'user_id' => $userid,
					'tb_kelas_id' => $input['kelas']
				];
				$this->usr->getInsertsettingkelas($dataisian);
				redirect('user/dataguru');
			} else {
				$input = $this->input->post(NULL, TRUE);
				$dataisian = [
					'tb_kelas_id' => $input['kelas']
				];
				$this->db->where('user_id', $userid);
				$this->db->update('tb_gurukelas', $dataisian);
				redirect('user/dataguru');
			}
		}
	}

	public function datasiswa()
	{
		$data['title_sidebar'] = "User";
		$data['title_submenu'] = "Data Siswa";
		$data['user'] = $this->usr->getUserlog();
		$data['datasiswa'] = $this->db->where('tb_siswa_id !=', 1);
		$data['datasiswa'] = $this->db->get('tb_siswa')->result_array();
		$this->load->view('templates/dashboard_header', $data);
		$this->load->view('user/datasiswa', $data);
		$this->load->view('templates/dashboard_footer');
	}

	public function tambahsiswa()
	{
		$data['title_sidebar'] = "User";
		$data['title_submenu'] = "Data Siswa";
		$data['user'] = $this->usr->getUserlog();
		$data['datasiswa'] = $this->usr->getDatasiswa();
		$data['datarombel'] = $this->usr->getDatarombel();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('rombel', 'Rombel', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dashboard_header', $data);
			$this->load->view('user/tambahsiswa', $data);
			$this->load->view('templates/dashboard_footer');
		} else {
			$input = $this->input->post(NULL, TRUE);
			$data = [
				'tb_rombel_id' => $input['rombel'],
				'tb_siswa_nama' => $input['nama'],
			];
			$this->usr->getInsertsiswa($data);
			redirect('user/datasiswa');
		}
	}

	public function editrombel($rombelid)
	{
		$data['title_sidebar'] = "User";
		$data['title_submenu'] = "Data Rombel";
		$data['user'] = $this->usr->getUserlog();
		$data['datakelas'] = $this->usr->getDatakelas();
		$data['datarombel'] = $this->db->get_where('tb_rombel', ['tb_rombel_id', $rombelid])->row_array();
		$data['rombelid'] = $rombelid;
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('semester', 'semester', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dashboard_header', $data);
			$this->load->view('user/editrombel', $data);
			$this->load->view('templates/dashboard_footer');
		} else {
			$input = $this->input->post(NULL, TRUE);
			$dataisian = [
				'tb_kelas_id' => $input['kelas'],
				'tb_rombel_semester' => $input['semester']
			];
			$this->db->where('tb_rombel_id', $rombelid);
			$this->db->update('tb_rombel', $dataisian);
			redirect('user/rombonganbelajar');
		}
	}

	public function lihatkelas($rombelid)
	{
		$data['title_sidebar'] = "User";
		$data['title_submenu'] = "Data Rombel";
		$data['user'] = $this->usr->getUserlog();
		$data['datasiswa'] = $this->db->where('tb_rombel_id', $rombelid);
		$data['datasiswa'] = $this->db->get('tb_siswa')->result_array();
		$this->load->view('templates/dashboard_header', $data);
		$this->load->view('user/datasiswa', $data);
		$this->load->view('templates/dashboard_footer');
	}

	public function editsiswa($siswaid)
	{
		$data['title_sidebar'] = "User";
		$data['title_submenu'] = "Data Siswa";
		$data['user'] = $this->usr->getUserlog();
		$data['siswaid'] = $siswaid;
		$data['datasiswa'] = $this->db->where('tb_siswa_id', $siswaid);
		$data['datasiswa'] = $this->db->get('tb_siswa')->row_array();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dashboard_header', $data);
			$this->load->view('user/editsiswa', $data);
			$this->load->view('templates/dashboard_footer');
		} else {
			$input = $this->input->post(NULL, TRUE);
			$dataisian = [
				'tb_siswa_nama' => $input['nama'],
			];
			$this->db->where('tb_siswa_id', $siswaid);
			$this->db->update('tb_siswa', $dataisian);
			redirect('user/datasiswa');
		}
	}
}
