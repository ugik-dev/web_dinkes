<?php
defined('BASEPATH') or exit('No direct script access allowed');

class main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('MainModel', 'MenuModel', 'SecurityModel'));
    }


    public function berita($id)
    {
        $dataContent = array(
            'page' => 'detail_berita', 'berita' => $this->MainModel->getBerita(array('berita_slug' => $id, 'tipe' => 'berita'))[0]
        );
        // die();
        $this->load->view('template', $dataContent);
    }

    public function pelayanan($id)
    {

        $dataContent = array(
            'page' => 'detail_berita', 'berita' => $this->MainModel->getBerita(array('berita_slug' => $id, 'tipe' => 'pelayanan'))[0]
        );
        $this->load->view('template', $dataContent);
    }


    public function cari_menu($ref_nama, $id)
    {
        $menu = $this->MenuModel->getAllMenu(array('menu_slug' => $id, 'nama_menu' => $ref_nama, 'no_key' => true));
        if (!empty($menu)) {

            $menu =  $menu[0];
            $dataContent = array(
                'page' => 'detail_menu',
                'berita' => $menu,
                'navbar' => ['title' => $menu['menu_judul'], 'kategori' => $menu['label_menu']]
            );
        } else
            $dataContent = array(
                'page' => 'error',
                'message' => 'Halaman tidak ditemukan'
            );
        $this->load->view('template', $dataContent);
    }
    public function pengumuman($id)
    {

        $dataContent = array(
            'page' => 'detail_berita', 'berita' => $this->MainModel->getBerita(array('berita_slug' => $id, 'tipe' => 'pengumuman'))[0]
        );
        $this->load->view('template', $dataContent);
    }

    public function profil()
    {

        $dataContent = array(
            'page' => 'profile'
        );
        $this->load->view('template', $dataContent);
    }
    public function daftar_tamu()
    {

        $dataContent = array(
            'page' => 'tamu', 'tamu' => $this->MainModel->getTamu()
        );
        $this->load->view('template', $dataContent);
    }

    public function login()
    {
        $this->SecurityModel->guestOnlyGuard();
        // if (!empty($this->session->userdata('nama_controller'))) {
        $dataContent = array(
            'page' => 'login', 'tamu' => $this->MainModel->getTamu()
        );
        $this->load->view('template', $dataContent);
        // }
    }



    public function index()
    {
        // echo json_encode(Menu());
        // die();
        $dataContent = array(
            'page' => 'landingpage', 'berita' => $this->MainModel->getBerita(array('tipe' => 'berita', 'limit' => 6))
        );
        $this->load->view('template', $dataContent);
    }

    public function submit_tamu()
    {
        $data = $this->input->post();
        $this->MainModel->add_tamu($data);
        redirect(base_url('daftar-tamu'));
    }
}
