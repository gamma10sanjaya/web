<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

	public function index()
	{
		$data['title_sidebar'] = "Dashboard";
		$data['title_submenu'] = "Data Buku";
		$data['user'] = $this->usr->getUserlog();
		$data['databuku'] = $this->dbk->getDatabuku();
		$this->load->view('templates/dashboard_header', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/dashboard_footer');
	}

	public function tambahbuku()
	{
		$data['title_sidebar'] = "Dashboard";
		$data['title_submenu'] = "Data Buku";
		$data['user'] = $this->usr->getUserlog();
		$data['jenisbuku'] = $this->dbk->getDatabukujenis();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('penulis', 'Penulis', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dashboard_header', $data);
			$this->load->view('dashboard/tambahbuku', $data);
			$this->load->view('templates/dashboard_footer');
		} else {
			// cek jika ada gambar
			$upload_image = $_FILES['image'];
			if ($upload_image) {
				$config['allowed_types'] = 'jpg|jpeg|png|gif|bitmap';
				$config['upload_path']   = './assets/images/databuku/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$upload_data = $this->upload->data();
					// var_dump($upload_data);
					// die();

					// $this->load->model('Regist_model');
					// rename file yang diupload
					// $nama_random = $this->Regist_model->generate_random_password();
					$nama_random = 'File'; // nama random dimatiin dulu
					$path = $upload_data['file_path'];
					$old_name = $upload_data['raw_name'] . $upload_data['file_ext'];
					$angka_acak = mt_rand();
					$new_name = $nama_random . '_' . 'new' . '_' . $angka_acak . $upload_data['file_ext'];

					// var_dump($new_name);
					// die();
					rename($path . $old_name, $path . $new_name); // ganti nama image dengan nama & id_event

					$this->db->set('image', $new_name);
				} else {
					$error =  $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" style="color: white;">' . $error . '</div>');
					// redirect('eventcreator/editevent/' . $tb_event_id_e); // supaya berhenti di sini, kalo lanjut, nanti presensi tanpa gambar
				}
			}
			$input = $this->input->post(NULL, TRUE);

			$dataisian = [
				'tb_databuku_nama' => $input['nama'],
				'tb_databuku_jenis_id' => $input['jenis'],
				'tb_databuku_tanggal' => $input['tanggal'],
				'tb_databuku_penulis' => $input['penulis'],
				'tb_databuku_penerbit' => $input['penerbit'],
				'is_active' => 0,
			];

			$this->dbk->getCreatedatabuku($dataisian);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Create Event Berhasil!</div>');
			redirect('dashboard');
		}
	}

	public function jenisbuku()
	{
		$data['title_sidebar'] = "Dashboard";
		$data['title_submenu'] = "Jenis Buku";
		$data['user'] = $this->usr->getUserlog();
		$data['jenisbuku'] = $this->dbk->getDatabukujenis();
		$this->load->view('templates/dashboard_header', $data);
		$this->load->view('dashboard/jenisbuku', $data);
		$this->load->view('templates/dashboard_footer');
	}

	public function tambahjenisbuku()
	{
		$data['title_sidebar'] = "Dashboard";
		$data['title_submenu'] = "Jenis Buku";
		$data['user'] = $this->usr->getUserlog();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dashboard_header', $data);
			$this->load->view('dashboard/tambahjenisbuku', $data);
			$this->load->view('templates/dashboard_footer');
		} else {
			$input = $this->input->post(NULL, TRUE);

			$dataisian = [
				'tb_databuku_jenis_title' => $input['nama']
			];

			$this->dbk->getCreatedatajenisbuku($dataisian);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Create Event Berhasil!</div>');
			redirect('dashboard/jenisbuku');
		}
	}

	public function editjenisbuku($jenisbukuid)
	{
		$data['title_sidebar'] = "Dashboard";
		$data['title_submenu'] = "Jenis Buku";
		$data['user'] = $this->usr->getUserlog();
		$data['jenisbuku'] = $this->dbk->getDatabukujenis($jenisbukuid);
		$data['jenisbukuid'] = $jenisbukuid;
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dashboard_header', $data);
			$this->load->view('dashboard/editjenisbuku', $data);
			$this->load->view('templates/dashboard_footer');
		} else {
			$input = $this->input->post(NULL, TRUE);

			$dataisian = [
				'tb_databuku_jenis_title' => $input['nama']
			];
			$this->dbk->getEditdatajenisbuku($jenisbukuid, $dataisian);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Create Event Berhasil!</div>');
			redirect('dashboard/jenisbuku');
		}
	}

	public function hapusjenisbuku($jenisbukuid)
	{

		$this->dbk->getHapusdatajenisbuku($jenisbukuid);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Create Event Berhasil!</div>');
		redirect('dashboard/jenisbuku');
	}

	public function isactivebuku($databukuid)
	{
		$data['databuku'] = $this->dbk->getDatabuku($databukuid);
		if ($data['databuku']['is_active'] == 0) {
			$databuku = [
				'is_active' => 1
			];
		} else {
			$databuku = [
				'is_active' => 0
			];
		}
		$this->dbk->getEditdatabuku($databukuid, $databuku);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Create Event Berhasil!</div>');
		redirect('dashboard');
	}

	public function laporanratingbuku()
	{
		$this->load->view('dashboard/excelratingbuku');
	}

	public function editbuku($bukuid)
	{
		$data['title_sidebar'] = "Dashboard";
		$data['title_submenu'] = "Data Buku";
		$data['user'] = $this->usr->getUserlog();
		$data['jenisbuku'] = $this->dbk->getDatabukujenis();
		$data['bukuid'] = $bukuid;
		$data['databuku'] = $this->db->get_where('tb_databuku', ['tb_databuku_id' => $bukuid])->row_array();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('penulis', 'Penulis', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dashboard_header', $data);
			$this->load->view('dashboard/editbuku', $data);
			$this->load->view('templates/dashboard_footer');
		} else {
			// cek jika ada gambar
			$upload_image = $_FILES['image'];
			if ($upload_image) {
				$config['allowed_types'] = 'jpg|jpeg|png|gif|bitmap';
				$config['upload_path']   = './assets/images/databuku/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$upload_data = $this->upload->data();
					$nama_random = 'File'; // nama random dimatiin dulu
					$path = $upload_data['file_path'];
					$old_name = $upload_data['raw_name'] . $upload_data['file_ext'];
					$angka_acak = mt_rand();
					$new_name = $nama_random . '_' . 'new' . '_' . $angka_acak . $upload_data['file_ext'];

					// var_dump($new_name);
					// die();
					rename($path . $old_name, $path . $new_name); // ganti nama image dengan nama & id_event

					$this->db->set('image', $new_name);
				} else {
					$error =  $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" style="color: white;">' . $error . '</div>');
					// redirect('eventcreator/editevent/' . $tb_event_id_e); // supaya berhenti di sini, kalo lanjut, nanti presensi tanpa gambar
				}
			}
			$input = $this->input->post(NULL, TRUE);

			$dataisian = [
				'tb_databuku_nama' => $input['nama'],
				'tb_databuku_jenis_id' => $input['jenis'],
				'tb_databuku_tanggal' => $input['tanggal'],
				'tb_databuku_penulis' => $input['penulis'],
				'tb_databuku_penerbit' => $input['penerbit'],
				'is_active' => 1,
			];

			$this->dbk->getEditdatabuku($bukuid, $dataisian);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Create Event Berhasil!</div>');
			redirect('dashboard');
		}
	}
}
