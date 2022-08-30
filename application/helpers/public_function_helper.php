<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('BeritaTerikini')) {

    function BeritaTerikini()
    {
        $CI = &get_instance();
        $CI->load->database();
        $CI->db->select("*");
        $CI->db->from('postingan');
        $CI->db->where('tipe', 'berita');
        $CI->db->limit('3');
        $query = $CI->db->get();
        $res = $query->result_array();
        return $res;
    }
}

if (!function_exists('Pelayanan')) {

    function Pelayanan()
    {
        $CI = &get_instance();
        $CI->load->database();
        $CI->db->select("*");
        $CI->db->from('postingan');
        $CI->db->where('tipe', 'pelayanan');
        $CI->db->limit('3');
        $query = $CI->db->get();
        $res = $query->result_array();
        return $res;
    }
}


if (!function_exists('Pengumuman')) {

    function Pengumuman()
    {
        $CI = &get_instance();
        $CI->load->database();
        $CI->db->select("*");
        $CI->db->from('postingan');
        $CI->db->where('tipe', 'pengumuman');
        $CI->db->limit('3');
        $query = $CI->db->get();
        $res = $query->result_array();
        return $res;
    }
}

if (!function_exists('Menu')) {

    function Menu()
    {
        $CI = &get_instance();
        $CI->load->database();
        $CI->db->select("label_menu, menu_judul, menu_slug, id_menu,rf.id_ref_menu,urut");
        $CI->db->from('menu as m');
        $CI->db->join('ref_menu as rf', 'm.id_ref_menu = rf.id_ref_menu');
        $CI->db->order_by('urut', 'ASC');
        // $CI->db->where('tipe', 'pengumuman');
        // $CI->db->limit('3');
        $query = $CI->db->get();
        $res = $query->result_array();

        $ret = array();
        foreach ($res as $a) {
            // if ($childKey != NULL) {
            //     $ret[$groupName][$a[$childKey]] = !empty($childCol) ? $a[$childCol] : $a;
            // } else {
            $ret[$a['label_menu']][] = $a;
            // }
        }

        return $ret;
    }
}
