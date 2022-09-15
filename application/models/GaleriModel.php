<?php
class GaleriModel extends CI_Model
{

    public function getAll($filter = [])
    {

        $this->db->select('*');
        $this->db->from("galeri as g");
        $this->db->join('album as a', 'g.album_id = a.album_id');
        $this->db->order_by('galeri_id', 'desc');
        if (!empty($filter['galeri_id'])) $this->db->where('galeri_id', $filter['galeri_id']);
        $res = $this->db->get();
        // return $res->result_array();
        return DataStructure::keyValue($res->result_array(), 'galeri_id');
    }


    public function get($id = NULL)
    {
        $row = $this->getAll(['galeri_id' => $id]);
        if (empty($row)) {
            throw new UserException("Berita yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
        }
        return $row[$id];
    }

    public function add($data)
    {
        $this->db->insert('galeri', DataStructure::slice($data, ['nama_galeri', 'album_id', 'file_galeri', 'deskripsi_galeri']));
        // echo $this->db->last_query();
        // ExceptionHandler::handleDBError($this->db->error(), "Tambah Product gagal", "product");

        return $this->db->insert_id();
    }

    public function edit($data)
    {
        $this->db->where('galeri_id', $data['galeri_id']);
        $this->db->update('galeri', DataStructure::slice($data, ['nama_galeri', 'album_id', 'file_galeri', 'deskripsi_galeri']));
        ExceptionHandler::handleDBError($this->db->error(), "Edit Berita Gagal", "galeri");

        return $data['galeri_id'];
    }

    public function delete($data)
    {
        $this->db->where('galeri_id', $data['galeri_id']);
        $this->db->delete('galeri');

        ExceptionHandler::handleDBError($this->db->error(), "Hapus Galeri Post", "Galeri");
    }
}
