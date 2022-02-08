<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek extends CI_Controller
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

	public function index()
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
				array_push($rating, $datarating['tb_databuku_rating_nilai']);
				echo $datarating['tb_databuku_rating_nilai'];
			}
		}


		$data['nilairating'] = $rating;
		$this->load->view('nilairating', $data);
	}

	public function rumus()
	{
		$rating = [
			'3', '0', '5', '0', '2', '2',
			'0', '4', '0', '4', '3', '0',
			'4', '0', '4', '3', '1', '0',
			'0', '2', '0', '5', '0', '3'
		];
		// Pemecah Array
		$jmlhuser = $this->db->get('tb_siswa')->num_rows();
		$jmlhrating = $this->db->get('tb_databuku')->num_rows() * $jmlhuser;
		$split = $jmlhrating / $jmlhuser;
		$array_terpecah = array_split($rating, $split);


		// Perhitungan Similarity
		for ($a = 0; $a < $split; $a++) {
			echo "similarity = " . $a;
			for ($i = 0; $i < $split; $i++) {
				$similarity = CosineSimilarity::calc($array_terpecah[$a], $array_terpecah[$i]);
				echo '<pre>';
				echo ($similarity);
				echo '</pre>';
			}
		}
		die;
	}
}
