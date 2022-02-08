<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
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
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		// Query ini digunakan untuk menangani SQL Injection
		$input = $this->input->post(NULL, TRUE);

		// get variabel email
		$email = $input['email'];

		// cek data user di dalam database dan ambil data user tersebut menggunakan data email yang diinputkan di form login
		$user = $this->usr->getAuthuser($email);

		// jika usernya ada
		if ($user) {

			// jika usernya tidak disuspend (ditandai dengan is active di dalam database bernilai 1)
			if ($user['is_active'] == 1) {

				// jika password input (pasword di ekripsi 1 arah dahulu dengan hash password) = pasword yang tersimpan di database sama
				if (password_verify($input['password'], $user['user_password'])) {

					// maka buat data array untuk dimasukkan ke session
					$data = [
						'user_email' => $user['user_email'],
						'user_role_id' => $user['user_role_id']
					];

					// masukkan data array diatas ke dalam session
					$this->session->set_userdata($data);

					// cek user role id nya, dan arahkan sesuai hak akses masing masing user role id
					if ($user['user_role_id'] == 1) {
						redirect('dashboard');
					} else {
						redirect('landingpage');
					}

					// jika inputan password (pasword di ekripsi 1 arah dahulu dengan hash password) tidak sama dengan database
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">password salah!</div>');
					redirect('auth');
				}

				// Jika user disuspend (ditandai dengan is active di dalam database bernilai 0)
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">anda telah di suspend!</div>');
				redirect('auth');
			}

			// jika data user tidak ada di dalam database
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun yang anda masukkan salah!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_email');
		$this->session->unset_userdata('user_role_id');
		redirect('auth');
	}

	public function temporaridaftar()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.user_email]', ['is_unique' => 'email sudah ada broo']);
		$this->form_validation->set_rules('password1', 'Password1', 'required');
		$this->form_validation->set_rules('password2', 'Password2', 'required|matches[password1]', ['matches' => 'password not match']);
		if ($this->form_validation->run() == false) {
			$this->load->view('template/auth_header');
			$this->load->view('auth/temporaridaftar');
			$this->load->view('template/auth_footer');
		} else {
			$input = $this->input->post(NULL, TRUE);
			// var_dump($input);
			// die;
			$data = [
				'user_name' => $input['name'],
				'user_email' => $input['email'],
				'user_password' => password_hash($input['password1'], PASSWORD_DEFAULT),
				'is_active' => 1,
				'date_created' => date('y/m/d')
			];
			// echo '<pre>';
			// var_dump($data);
			// die;

			// $this->db->insert('nama tabel', 'isian tabel');
			$this->db->insert('user', $data);
			redirect('auth');
		}
	}

	public function daftar()
	{
		// ini tidak perlu karena sudah masuk ke config->autoload
		// $this->load->library('form_validation');

		$data['user'] = $this->db->get('user')->result_array();
		$this->load->view('temporari', $data);
	}
}
