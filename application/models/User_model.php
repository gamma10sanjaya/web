<?php

use GuzzleHttp\Client;

class User_model extends CI_Model
{
    public function getAuthuser($email)
    {
        return $this->db->get_where('user', ['user_email' => $email])->row_array();
        // var_dump($result);
    }

    public function getAuthsignupuser($email, $password, $username)
    {
        $data = [
            'user_name' => $username,
            'user_email' => $email,
            'image' => 'default.png',
            'user_password' => password_hash($password, PASSWORD_DEFAULT),
            'user_role_id' => 4,
            'is_active' => 0,
            'user_date_created' => date('Y/m/d')
        ];
        $this->db->insert('user', $data);
        $id = $this->db->insert_id();
        $data_user = [
            'user_id' => $id,
            'user_data_alamat' => "alamat",
            'user_data_provinsi' => 0,
            'user_data_kabupaten_kota' => 0,
            'user_data_kecamatan' => 0,
            'user_data_kelurahan' => 0,
            'user_data_telp' => 0
        ];
        $this->db->insert('user_data', $data_user);
    }

    public function getUserlog()
    {
        return $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();
    }

    public function getUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function getUserbyid($userid)
    {
        return $this->db->get_where('user', ['user_id' => $userid])->row_array();
    }

    public function getDataguru()
    {
        $this->db->where('user_role_id', 2);
        return $this->db->get_where('user')->result_array();
    }

    public function getInsertguru($data)
    {
        $this->db->insert('user', $data);
    }

    public function getDatarombel()
    {
        return $this->db->get('tb_rombel')->result_array();
    }

    public function getDatakelas()
    {
        return $this->db->get('tb_kelas')->result_array();
    }

    public function getDatakelasbyid($kelasid)
    {
        return $this->db->get_where('tb_kelas', ['tb_kelas_id' => $kelasid])->row_array();
    }

    public function getDatarombelbyid($kelasid)
    {
        return $this->db->get_where('tb_rombel', ['tb_kelas_id' => $kelasid])->row_array();
    }

    public function getInsertrombel($data)
    {
        $this->db->insert('tb_rombel', $data);
    }

    public function getInsertsiswa($data)
    {
        $this->db->insert('tb_siswa', $data);
    }

    public function getGurukelasbyid($userid)
    {
        return $this->db->get_where('tb_gurukelas', ['user_id' => $userid])->row_array();
    }

    public function getInsertsettingkelas($data)
    {
        $this->db->insert('tb_gurukelas', $data);
    }

    public function getDatasiswa()
    {
        return $this->db->get('tb_siswa')->result_array();
    }

    public function getGurukelas($userlog)
    {
        return $this->db->get_where('tb_gurukelas', ['user_id' => $userlog])->row_array();
    }

    public function getDatasiswabyrombelid($rombel)
    {
        return $this->db->get_where('tb_siswa', ['tb_rombel_id' => $rombel])->result_array();
    }
}
