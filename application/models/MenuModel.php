<?php
class MenuModel extends CI_Model
{

    function simpan_menu($ref_id, $jdl, $menu, $gambar)
    {
        $hsl = $this->db->query("INSERT INTO menu (id_ref_menu,menu_judul,menu_isi,menu_pdf) VALUES ('$jdl','$jdl','$menu','$gambar')");
        return $hsl;
    }



    public function getAllMenu($filter = [])
    {

        if (!empty($filter['no_konten']))
            $this->db->select('id_menu, id_ref_menu, menu_judul,menu_slug, urut,rf.*');
        else
            $this->db->select('*');
        $this->db->from('menu as m');
        $this->db->join('ref_menu as rf', 'rf.id_ref_menu = m.id_ref_menu', 'left');
        if (!empty($filter['id_menu'])) $this->db->where('id_menu', $filter['id_menu']);
        if (!empty($filter['menu_slug'])) $this->db->where('menu_slug', $filter['menu_slug']);
        $this->db->order_by('urut', 'ASC');
        $res = $this->db->get();
        if (!empty($filter['no_key']))
            return $res->result_array();
        else
            return DataStructure::keyValue($res->result_array(), 'id_menu');
    }

    public function getComentar($filter = [])
    {
        $this->db->select('*');
        $this->db->from("tbl_komentar");
        $this->db->order_by('id_komentar', 'desc');
        // if ($this->session->userdata('nama_role') != 'admin') $this->db->where('st_show', '1');
        if (!empty($filter['id_menu'])) $this->db->where('id_menu', $filter['id_menu']);
        $res = $this->db->get();
        return $res->result_array();
    }


    public function getAll($filter = [])
    {
        if (!empty($filter['last'])) {
            $this->db->select('id_menu, menu_image, menu_judul, total_show');
            $this->db->from("menu");
            $this->db->order_by('id_menu', 'desc');
            $this->db->limit('4', 'asc');
            if (!empty($filter['id_menu'])) $this->db->where('id_menu', $filter['id_menu']);
            $res = $this->db->get();
            return $res->result_array();
        }
        if (!empty($filter['sort'])) {
            $this->db->select('id_menu, menu_image, menu_judul,menu_tanggal, total_show,substr(menu_isi,1,400) as menu_isi');
            $this->db->from("menu");
            $this->db->order_by('id_menu', 'desc');
            if (!empty($filter['id_menu'])) $this->db->where('id_menu', $filter['id_menu']);
            $res = $this->db->get();
            return $res->result_array();
        }

        $this->db->select('*');
        $this->db->from("menu");
        $this->db->order_by('id_menu', 'desc');
        if (!empty($filter['id_menu'])) $this->db->where('id_menu', $filter['id_menu']);
        $res = $this->db->get();
        return $res->result_array();
        // return DataStructure::keyValue($res->result_array(), 'id_menu');
    }





    public function get($id = NULL)
    {
        $row = $this->getAll(['id_menu' => $id]);
        if (empty($row)) {
            throw new UserException("Berita yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
        }
        return $row[0];
    }

    public function add($data)
    {
        $this->db->insert('menu', DataStructure::slice($data, ['id_ref_menu', 'menu_pdf', 'menu_isi', 'menu_judul', 'pdf_name', 'urut', 'menu_slug']));
        ExceptionHandler::handleDBError($this->db->error(), "Tambah Product gagal", "product");

        return $this->db->insert_id();
    }

    public function edit($data)
    {
        $this->db->where('id_menu', $data['id_menu']);
        $this->db->update('menu', DataStructure::slice($data, ['id_ref_menu', 'menu_pdf', 'menu_isi', 'menu_judul', 'pdf_name', 'urut', 'menu_slug']));
        ExceptionHandler::handleDBError($this->db->error(), "Edit Berita Gagal", "menu");

        return $data['id_menu'];
    }

    public function delete($data)
    {
        $this->db->where('id_menu', $data['id_menu']);
        $this->db->delete('menu');

        ExceptionHandler::handleDBError($this->db->error(), "Hapus News Post", "News");
    }

    public function post_comentar($data)
    {
        $data['id_menu'] = $data['id_news'];
        // $data['id_menu'] = $data['id_news'];
        $this->db->insert('tbl_komentar', DataStructure::slice($data, ['id_menu', 'name', 'email', 'ip_address', 'komentar']));
        ExceptionHandler::handleDBError($this->db->error(), "Komentar Gagal", "komentar");

        return $this->db->insert_id();
    }

    public function post_show($id, $count)
    {
        $this->db->where('id_menu', $id);
        $this->db->set('total_show', $count);
        $this->db->update('menu');
        // ExceptionHandler::handleDBError($this->db->error(), "Edit Product gagal", "product");

        // return $data['id_product'];
    }


    public function delete_comentar($id, $val)
    {
        $this->db->where('id_komentar', $id);
        $this->db->set('st_show', $val);
        $this->db->update('tbl_komentar');
    }
}
