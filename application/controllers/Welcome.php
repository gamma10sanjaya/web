<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
		$data['siswa'] = $this->db->get('tb_siswa')->result_array();
		$data['databuku'] = $this->db->get('tb_databuku')->result_array();
		$this->load->view('cek', $data);
	}

	public function rumus()
	{
		$ratings = [
			'User A' => [3, null, 5, null, null, null],
			'User B' => [2, 3, null, 3, 4, null],
			'User C' => [5, 4, 4, null, 5, null],
			'User D' => [5, 5, 2, null, 5, 4],
		];



		$ratings = [
			'Buku 1' => [3, null, 5, null, null, null],
			'Buku 2' => [2, 3, null, 3, 4, null],
			'Buku 3' => [5, 4, 4, null, 5, null],
			'Buku 4' => [5, 5, 2, null, 5, 4],
			'Buku 5' => [2, null, null, 3, 4, null],
		];

		echo '<pre>';
		print_r($ratings);
		echo '</pre>';
		die;

		// $sim_ac = CosineSimilarity::setData($ratings['User A'], $ratings['User C']); // 0.66285976669375

		$sim_11 = CosineSimilarity::calc($ratings['Buku 1'], $ratings['Buku 1']); // 0.66285976669375
		$sim_12 = CosineSimilarity::calc($ratings['Buku 1'], $ratings['Buku 2']); // 0.1669244652224
		$sim_13 = CosineSimilarity::calc($ratings['Buku 1'], $ratings['Buku 3']); // 0.66285976669375
		$sim_14 = CosineSimilarity::calc($ratings['Buku 1'], $ratings['Buku 4']); // 0.66285976669375
		$sim_15 = CosineSimilarity::calc($ratings['Buku 1'], $ratings['Buku 5']); // 0.66285976669375

		$sim_21 = CosineSimilarity::calc($ratings['Buku 2'], $ratings['Buku 1']); // 0.66285976669375
		$sim_22 = CosineSimilarity::calc($ratings['Buku 2'], $ratings['Buku 2']); // 0.1669244652224
		$sim_23 = CosineSimilarity::calc($ratings['Buku 2'], $ratings['Buku 3']); // 0.66285976669375
		$sim_24 = CosineSimilarity::calc($ratings['Buku 2'], $ratings['Buku 4']); // 0.66285976669375
		$sim_25 = CosineSimilarity::calc($ratings['Buku 2'], $ratings['Buku 5']); // 0.66285976669375


		// var_dump($sim_ab);
		// var_dump($sim_ab);
		// var_dump($sim_ac);

		$saya_1a = (string)$sim_11;
		$saya_1b = (string)$sim_12;
		$saya_1c = (string)$sim_13;
		$saya_1d = (string)$sim_14;
		$saya_1e = (string)$sim_15;

		$saya_2a = (string)$sim_21;
		$saya_2b = (string)$sim_22;
		$saya_2c = (string)$sim_23;
		$saya_2d = (string)$sim_24;
		$saya_2e = (string)$sim_25;

		echo '<pre>';
		print_r($saya_1a);
		echo '</pre>';
		echo '<pre>';
		print_r($saya_1b);
		echo '</pre>';
		echo '<pre>';
		print_r($saya_1c);
		echo '</pre>';
		echo '<pre>';
		print_r($saya_1d);
		echo '</pre>';
		echo '<pre>';
		print_r($saya_1e);
		echo '</pre>';

		echo '<pre>';
		print_r($saya_2a);
		echo '</pre>';
		echo '<pre>';
		print_r($saya_2b);
		echo '</pre>';
		echo '<pre>';
		print_r($saya_2c);
		echo '</pre>';
		echo '<pre>';
		print_r($saya_2d);
		echo '</pre>';
		echo '<pre>';
		print_r($saya_2e);
		echo '</pre>';
	}
}
