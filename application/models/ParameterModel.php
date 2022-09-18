<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ParameterModel extends CI_Model
{
  public function getAllRole($filter = [])
  {
    $this->db->select('*');
    $this->db->from('role');
    if (isset($filter['except_ids'])) $this->db->where_not_in('id_role', $filter['except_ids']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_role');
  }

  function submit_survey($data)
  {
    $this->db->insert('survey', $data);
  }

  function getSurvey($filter)
  {
    $this->db->select('*');
    $this->db->from('survey');
    if (!empty($filter['show_survey'])) $this->db->where('show_survey', $filter['show_survey']);
    if (!empty($filter['limit'])) $this->db->limit($filter['limit']);
    $this->db->order_by('id', 'ASC');

    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id');
  }

  function submit_pengaduan($data)
  {
    $this->db->insert('pengaduan', $data);
  }

  function getPengaduan($data)
  {
    $this->db->select('*');
    $this->db->from('pengaduan');
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id');
  }

  public function getAllRefBankData($filter = [])
  {
    $this->db->select('*');
    $this->db->from('ref_bank_data');
    // if (isset($filter['except_ids'])) $this->db->where_not_in('id_role', $filter['except_ids']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_ref_bank_data');
  }
  public function getAllJenisMenu($filter = [])
  {
    $this->db->select('*');
    $this->db->from('ref_menu');
    // if (isset($filter['except_ids'])) $this->db->where_not_in('id_role', $filter['except_ids']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_ref_menu');
  }
  public function getAllNegara($filter = [])
  {
    $this->db->select('*');
    $this->db->from('negara');
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_negara');
  }

  public function addJenisDokumenPerusahaan($data)
  {

    $this->db->insert('jenis_dokumen_perusahaan', DataStructure::slice($data, ['nama_jenis_dokumen_perusahaan', 'id_jenis_perusahaan', 'ACT', 'allow_type'], true));
    ExceptionHandler::handleDBError($this->db->error(), "Tambah Jenis Dokumen gagal", "jenis_dokumen");

    return $this->db->insert_id();
  }

  public function editJenisDokumenPerusahaan($data)
  {
    $this->db->where('id_jenis_dokumen_perusahaan', $data['id_jenis_dokumen_perusahaan']);
    $this->db->update('jenis_dokumen_perusahaan', DataStructure::slice($data, ['nama_jenis_dokumen_perusahaan', 'id_jenis_perusahaan', 'ACT', 'allow_type'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Edit Pengiriman gagal", "pengiriman");

    return $data['id_jenis_dokumen_perusahaan'];
  }


  public function getAllJenisDokumenPerusahaan($filter = [])
  {
    $this->db->select('pi.* , jp.nama_jenis_perusahaan');
    $this->db->from('jenis_dokumen_perusahaan as pi');
    $this->db->join("jenis_perusahaan as jp", 'jp.id_jenis_perusahaan = pi.id_jenis_perusahaan', 'LEFT');
    if (!empty($filter['id_jenis_perusahaan'])) $this->db->where('pi.id_jenis_perusahaan', $filter['id_jenis_perusahaan']);
    if (!empty($filter['id_jenis_dokumen_perusahaan']))  $this->db->where('pi.id_jenis_dokumen_perusahaan', $filter['id_jenis_dokumen_perusahaan']);

    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_jenis_dokumen_perusahaan');
  }

  public function getAllSurvey($filter = [])
  {
    $this->db->select('*');
    $this->db->from('survey as pi');
    // $this->db->join("jenis_perusahaan as jp", 'jp.id_jenis_perusahaan = pi.id_jenis_perusahaan', 'LEFT');
    // if (!empty($filter['id_jenis_perusahaan'])) $this->db->where('pi.id_jenis_perusahaan', $filter['id_jenis_perusahaan']);
    // if (!empty($filter['id_jenis_dokumen_perusahaan']))  $this->db->where('pi.id_jenis_dokumen_perusahaan', $filter['id_jenis_dokumen_perusahaan']);

    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id');
  }

  public function getAllPengaduan($filter = [])
  {
    $this->db->select('*');
    $this->db->from('pengaduan as pi');
    // $this->db->join("jenis_perusahaan as jp", 'jp.id_jenis_perusahaan = pi.id_jenis_perusahaan', 'LEFT');
    // if (!empty($filter['id_jenis_perusahaan'])) $this->db->where('pi.id_jenis_perusahaan', $filter['id_jenis_perusahaan']);
    // if (!empty($filter['id_jenis_dokumen_perusahaan']))  $this->db->where('pi.id_jenis_dokumen_perusahaan', $filter['id_jenis_dokumen_perusahaan']);

    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id');
  }

  public function getAllJenisPerusahaan($filter = [])
  {
    $this->db->select('*');
    $this->db->from('jenis_perusahaan');
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_jenis_perusahaan');
  }
}
