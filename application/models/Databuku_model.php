<?php

class Databuku_model extends CI_Model
{
  public function getDatabuku($databukuid = false)
  {
    if (!$databukuid) {
      return $this->db->get('tb_databuku')->result_array();
    } else {
      return $this->db->get_where('tb_databuku', ['tb_databuku_id' => $databukuid])->row_array();
    }
  }

  public function getDatabukulandingpage($databukuid = false)
  {
    if (!$databukuid) {
      $this->db->where('is_active', 1);
      return $this->db->get('tb_databuku')->result_array();
    } else {
      return $this->db->get_where('tb_databuku', ['tb_databuku_id' => $databukuid])->row_array();
    }
  }

  public function getCreatedatabuku($dataisian)
  {
    $this->db->insert('tb_databuku', $dataisian);
    $id = $this->db->insert_id();
    $datanilai = [
      'tb_databuku_id' => $id,
      'tb_siswa_id' => 1,
      'tb_databuku_rating_nilai' => 5
    ];
    $this->db->insert('tb_databuku_rating', $datanilai);
  }

  public function getInsertnilairating($datanilai)
  {
    $this->db->insert('tb_databuku_rating', $datanilai);
  }

  public function getRatingbysiswa($tb_siswa_id, $tb_databuku_id)
  {
    $this->db->where('tb_databuku_id', $tb_databuku_id);
    $this->db->where('tb_siswa_id', $tb_siswa_id);
    return $this->db->get('tb_databuku_rating')->row_array();
  }

  public function getDatabukujenis($tb_databuku_jenis_id = false)
  {
    if (!$tb_databuku_jenis_id) {
      return $this->db->get('tb_databuku_jenis')->result_array();
    } else {
      return $this->db->get_where('tb_databuku_jenis', ['tb_databuku_jenis_id' => $tb_databuku_jenis_id])->row_array();
    }
  }

  public function getCreatedatajenisbuku($dataisian)
  {
    $this->db->insert('tb_databuku_jenis', $dataisian);
  }

  public function getEditdatabuku($bukuid, $dataisian)
  {
    $this->db->where('tb_databuku_id', $bukuid);
    $this->db->update('tb_databuku', $dataisian);
  }

  public function getEditdatajenisbuku($jenisbukuid, $dataisian)
  {
    $this->db->where('tb_databuku_jenis_id', $jenisbukuid);
    $this->db->update('tb_databuku_jenis', $dataisian);
  }

  public function getHapusdatajenisbuku($jenisbukuid)
  {
    $this->db->where('tb_databuku_jenis_id', $jenisbukuid);
    $this->db->delete('tb_databuku_jenis');
  }
}
