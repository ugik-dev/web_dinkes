<?php
class AlbumModel extends CI_Model
{

    public function getAll($filter = [])
    {

        $this->db->select('*');
        $this->db->from("album");
        $this->db->order_by('album_id', 'desc');
        if (!empty($filter['album_id'])) $this->db->where('album_id', $filter['album_id']);
        $res = $this->db->get();
        // return $res->result_array();
        return DataStructure::keyValue($res->result_array(), 'album_id');
    }


    public function get($id = NULL)
    {
        $row = $this->getAll(['album_id' => $id]);
        if (empty($row)) {
            throw new UserException("Berita yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
        }
        return $row[$id];
    }

    public function add($data)
    {
        $this->db->insert('album', DataStructure::slice($data, ['nama_album']));
        // echo $this->db->last_query();
        // ExceptionHandler::handleDBError($this->db->error(), "Tambah Product gagal", "product");

        return $this->db->insert_id();
    }

    public function edit($data)
    {
        $this->db->where('album_id', $data['album_id']);
        $this->db->update('album', DataStructure::slice($data, ['nama_album']));
        ExceptionHandler::handleDBError($this->db->error(), "Edit Berita Gagal", "album");

        return $data['album_id'];
    }

    public function delete($data)
    {
        $this->db->where('album_id', $data['album_id']);
        $this->db->delete('album');

        ExceptionHandler::handleDBError($this->db->error(), "Hapus Album Post", "Album");
    }
}
