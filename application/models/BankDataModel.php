<?php
class BankDataModel extends CI_Model
{


    public function getAllBankData($filter = [])
    {

        $this->db->select('*');
        $this->db->from('bank_data as m');
        $this->db->join('ref_bank_data as rf', 'rf.id_ref_bank_data = m.id_ref', 'left');
        if (!empty($filter['id_bank_data'])) $this->db->where('id_bank_data', $filter['id_bank_data']);
        if (!empty($filter['id_ref'])) $this->db->where('id_ref', $filter['id_ref']);
        if (!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
        // $this->db->order_by('urut', 'ASC');
        $res = $this->db->get();
        if (!empty($filter['no_key']))
            return $res->result_array();
        else
            return DataStructure::keyValue($res->result_array(), 'id_bank_data');
    }



    public function get($id = NULL)
    {
        $row = $this->getAllBankData(['id_bank_data' => $id]);
        if (empty($row)) {
            throw new UserException("Berita yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
        }
        return $row[0];
    }

    public function add($data)
    {
        $this->db->insert('bank_data', DataStructure::slice($data, ['id_ref', 'tahun', 'path_bank_data', 'nama_bank_data', 'total_download', 'bank_jenis', 'bank_url']));
        ExceptionHandler::handleDBError($this->db->error(), "Tambah Product gagal", "product");

        return $this->db->insert_id();
    }

    public function edit($data)
    {
        $this->db->where('id_bank_data', $data['id_bank_data']);
        $this->db->update('bank_data', DataStructure::slice($data, ['id_ref', 'tahun', 'path_bank_data', 'nama_bank_data', 'total_download', 'bank_jenis', 'bank_url']));
        ExceptionHandler::handleDBError($this->db->error(), "Edit Berita Gagal", "bank_data");

        return $data['id_bank_data'];
    }

    public function delete($data)
    {
        $this->db->where('id_bank_data', $data['id_bank_data']);
        $this->db->delete('bank_data');

        ExceptionHandler::handleDBError($this->db->error(), "Hapus News Post", "News");
    }
}
