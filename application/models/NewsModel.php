<?php
class NewsModel extends CI_Model
{

  function simpan_berita($jdl, $berita, $gambar, $slug)
  {
    $hsl = $this->db->query("INSERT INTO postingan (berita_judul,berita_isi,berita_image) VALUES ('$jdl','$berita','$gambar','$slug')");
    return $hsl;
  }

  function get_berita_by_kode($filter)
  {
    // $hsl=$this->db->query("SELECT * FROM postingan WHERE berita_id='$kode'");
    $this->db->select('*');
    $this->db->from("postingan");
    $this->db->order_by('berita_id', 'desc');
    if (!empty($filter)) $this->db->where('berita_id', $filter);
    $res = $this->db->get();

    return DataStructure::keyValue($res->result_array(), 'berita_id');
  }

  function get_all_berita()
  {
    $hsl = $this->db->query("SELECT * FROM postingan ORDER BY berita_id DESC");
    return $hsl;
  }

  public function getComentar($filter = [])
  {
    $this->db->select('*');
    $this->db->from("tbl_komentar");
    $this->db->order_by('id_komentar', 'desc');
    // if ($this->session->userdata('nama_role') != 'admin') $this->db->where('st_show', '1');
    if (!empty($filter['berita_id'])) $this->db->where('berita_id', $filter['berita_id']);
    $res = $this->db->get();
    return $res->result_array();
  }


  public function getAll($filter = [])
  {
    if (!empty($filter['last'])) {
      $this->db->select('berita_id, berita_image, berita_judul, total_show');
      $this->db->from("postingan");
      $this->db->order_by('berita_id', 'desc');
      $this->db->limit('4', 'asc');
      if (!empty($filter['berita_id'])) $this->db->where('berita_id', $filter['berita_id']);
      $res = $this->db->get();
      return $res->result_array();
    }
    if (!empty($filter['sort'])) {
      $this->db->select('berita_id, berita_image,tipe , berita_slug, berita_judul,berita_tanggal, total_show');
      $this->db->from("postingan as b");
      // $this->db->join('ref_menu as rf','rf.id_ref_menu = b.')
      $this->db->order_by('berita_id', 'desc');
      if (!empty($filter['berita_id'])) $this->db->where('berita_id', $filter['berita_id']);
      $res = $this->db->get();
      return $res->result_array();
    }

    $this->db->select('*');
    $this->db->from("postingan");
    $this->db->order_by('berita_id', 'desc');
    if (!empty($filter['berita_id'])) $this->db->where('berita_id', $filter['berita_id']);
    $res = $this->db->get();
    return $res->result_array();
    // return DataStructure::keyValue($res->result_array(), 'berita_id');
  }


  public function getAllPagger($filter = [])
  {
    $this->db->select('berita_id, berita_image, berita_judul,berita_tanggal,substr(berita_isi,1,400) as berita_isi, total_show');
    $this->db->from("postingan");
    $this->db->order_by('berita_id', 'desc');
    $this->db->limit(4, ($filter['page'] - 1) * 4, 'asc');
    if (!empty($filter['berita_id'])) $this->db->where('berita_id', $filter['berita_id']);
    if (!empty($filter['key'])) $this->db->where('berita_judul like "%' . $filter['key'] . '%" OR berita_isi like "%' . $filter['key'] . '%"');
    $res = $this->db->get();
    return $res->result_array();
  }

  public function count_pagger($filter = [])
  {
    $this->db->select('count(*) as count');
    $this->db->from("postingan");
    $this->db->order_by('berita_id', 'desc');
    if (!empty($filter['key'])) $this->db->where('berita_judul like "%' . $filter['key'] . '%" OR berita_isi like "%' . $filter['key'] . '%"');
    if (!empty($filter['berita_id'])) $this->db->where('berita_id', $filter['berita_id']);
    $res = $this->db->get();
    return $res->result_array();
  }


  public function get($id = NULL)
  {
    $row = $this->getAll(['berita_id' => $id]);
    if (empty($row)) {
      throw new UserException("Berita yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
    }
    return $row[0];
  }

  public function add($data)
  {
    $this->db->insert('postingan', DataStructure::slice($data, ['berita_judul', 'berita_isi', 'berita_image', 'berita_slug', 'berita_tanggal', 'berita_pdf', 'tipe']));
    // echo $this->db->last_query();
    // ExceptionHandler::handleDBError($this->db->error(), "Tambah Product gagal", "product");

    return $this->db->insert_id();
  }

  public function edit($data)
  {
    // var_dump($data);
    // die();
    $this->db->where('berita_id', $data['berita_id']);
    // if (!empty($data['berita_judul'])) $this->db->set('berita_judul', $data['berita_judul']);
    // if (!empty($data['berita_isi'])) $this->db->set('berita_isi', $data['berita_isi']);
    // if (!empty($data['berita_image'])) $this->db->set('berita_image', $data['berita_image']);
    $this->db->update('postingan', DataStructure::slice($data, ['berita_judul', 'berita_isi', 'berita_pdf', 'berita_image', 'berita_slug', 'berita_tanggal', 'tipe']));
    ExceptionHandler::handleDBError($this->db->error(), "Edit Berita Gagal", "berita");

    return $data['berita_id'];
  }

  public function delete($data)
  {
    $this->db->where('berita_id', $data['berita_id']);
    $this->db->delete('postingan');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus News Post", "News");
  }

  public function post_comentar($data)
  {
    $data['berita_id'] = $data['id_news'];
    // $data['berita_id'] = $data['id_news'];
    $this->db->insert('tbl_komentar', DataStructure::slice($data, ['berita_id', 'name', 'email', 'ip_address', 'komentar']));
    ExceptionHandler::handleDBError($this->db->error(), "Komentar Gagal", "komentar");

    return $this->db->insert_id();
  }

  public function post_show($id, $count)
  {
    $this->db->where('berita_id', $id);
    $this->db->set('total_show', $count);
    $this->db->update('postingan');
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
