<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage extends CI_Controller
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
		$logsession = $this->session->userdata('user_email');
		if (!$logsession) {
			$data['databuku'] = $this->dbk->getDatabukulandingpage();
			$this->load->view('landingpage/index', $data);
		} else {
			redirect('landingpage/datasiswa');
		}
	}

	public function datasiswa()
	{
		$logsession = $this->session->userdata('user_email');
		if (!$logsession) {
			redirect('landingpage');
		} else {
			$data['user'] = $this->usr->getUserlog();
			// panggil ID guru dulu
			$userlog = $this->usr->getUserlog();
			// setelag dipanggil ID guru, kemudian cari data kelas yang diampu
			$kelasid = $this->usr->getGurukelas($userlog['user_id']);

			// setelah dapat id kelas panggil rombongan belajar untuk mencari id rombongan belajar
			$rombel =  $this->usr->getDatarombelbyid($kelasid['tb_kelas_id']);
			// setelah dapat data id rombongan belajar baru di cari data siswa by id rombongan belajar
			$data['datasiswa'] = $this->usr->getDatasiswabyrombelid($rombel['tb_rombel_id']);
			$this->load->view('landingpage/datasiswa', $data);
		}
	}

	public function pinjambuku($tb_siswa_id)
	{

		function array_split($array, $pieces = 2)
		{
			if ($pieces < 2)
				return array($array);
			$newCount = ceil(count($array) / $pieces);
			$a = array_slice($array, 0, $newCount);
			$b = array_split(array_slice($array, $newCount), $pieces - 1);
			return array_merge(array($a), $b);
		}

		//namauser
		$databuku = $this->db->get('tb_databuku')->result_array();
		// Nilai Rating berdasarkan Banyak user
		$datasiswa = $this->db->get('tb_siswa')->result_array();

		$rating = [];
		foreach ($databuku as $db) {
			// $databuku = $this->db->select('tb_databuku_id');
			// $databuku = $this->db->get('tb_databuku')->result_array();
			foreach ($datasiswa as $ds) {
				$datarating = $this->db->where('tb_databuku_id', $db['tb_databuku_id']);
				$datarating = $this->db->where('tb_siswa_id', $ds['tb_siswa_id']);
				$datarating = $this->db->get('tb_databuku_rating')->row_array();
				if (!$datarating) {
					$nilai0 = null;
					array_push($rating, $nilai0);
				} else {
					array_push($rating, $datarating['tb_databuku_rating_nilai']);
				}
			}
		}

		$jmlhuser = $this->db->get('tb_siswa')->num_rows();
		$jmlhbuku = $this->db->get('tb_databuku')->num_rows();
		$databuku1 = $this->db->get('tb_databuku')->result_array();
		$datasiswa1 = $this->db->get('tb_siswa')->result_array();
		$array_terpecah = array_split($rating, $jmlhbuku);

		$a = 0;
		$similarityhasil = [];

		foreach ($databuku1 as $db1) {
			$i = 0;
			foreach ($databuku1 as $db2) {
				$similarity = CosineSimilarity::calc($array_terpecah[$a], $array_terpecah[$i]);
				array_push($similarityhasil, $similarity);
				$i++;
			}
			$a++;
		}

		$peratingan = [];
		foreach ($datasiswa1 as $ds1) {
			foreach ($databuku1 as $db3) {
				$carinilaibuku = $this->db->get_where('tb_databuku_rating', ['tb_siswa_id' => $ds1['tb_siswa_id'], 'tb_databuku_id' => $db3['tb_databuku_id']])->row_array();
				if (!$carinilaibuku) {
					$nilainol = 0;
					array_push($peratingan, $nilainol);
				} else {
					array_push($peratingan, $carinilaibuku['tb_databuku_rating_nilai']);
				}
			}
		}

		$array_terpecah_buku = array_split($peratingan, $jmlhuser);
		$array_terpecah_similarity = array_split($similarityhasil, $jmlhbuku);
		$perulangan1 = 0;
		$hasilperatingan = [];

		foreach ($datasiswa1 as $datasiswafinal) {
			$perulangan2 = 0;
			foreach ($databuku1 as $databukufinal) {
				if ($datasiswafinal['tb_siswa_id'] == $tb_siswa_id) {
					if (!$carinilaibuku) {
						$hasil_prediksi0 = Weighted_average::calc($array_terpecah_buku[$perulangan1], $array_terpecah_similarity[$perulangan2]);
						$data_hasil_prediksi = [
							'nilairating' => $hasil_prediksi0,
							'databukuid' => $databukufinal['tb_databuku_id']
						];
						array_push($hasilperatingan, $data_hasil_prediksi);
					} else {
						$data_hasil_prediksi = [
							'nilairating' => 0,
							'databukuid' => $databukufinal['tb_databuku_id']
						];
						array_push($hasilperatingan, $data_hasil_prediksi);
					}
				}
				$perulangan2++;
			}
			$perulangan1++;
		}
		rsort($hasilperatingan);
		// echo '<pre>';
		// print_r($hasilperatingan);
		// die;

		$data['hasilperatingan'] = $hasilperatingan;
		$data['tb_siswa_id'] = $tb_siswa_id;
		$data['databuku'] = $this->dbk->getDatabukulandingpage();
		$this->load->view('landingpage/databuku', $data);
	}

	public function submitnilai($tb_databuku_id, $tb_siswa_id)
	{
		$logsession = $this->session->userdata('user_email');
		if (!$logsession) {
			redirect('landingpage');
		} else {
			$this->form_validation->set_rules('nilai', 'Nilai', 'required');
			if ($this->form_validation->run() == false) {
				redirect('landingpage/pinjambuku/' . $tb_siswa_id);
			} else {
				$input = $this->input->post(null, true);
				$datanilai = [
					'tb_databuku_id' => $tb_databuku_id,
					'tb_siswa_id' => $tb_siswa_id,
					'tb_databuku_rating_nilai' => $input['nilai']
				];
				$this->dbk->getInsertnilairating($datanilai);
				redirect('landingpage/pinjambuku/' . $tb_siswa_id);
			}
		}
	}
}
