<?php
defined('BASEPATH') or exit('No direct script access allowed');

class main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('MainModel', 'MenuModel', 'SecurityModel', 'ParameterModel'));
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
                'page' => 'error_page',
                'message' => 'Halaman tidak ditemukan'
            );
        $this->load->view('template', $dataContent);
    }

    public function galeri()
    {
        $filter = $this->input->get();
        if (empty($filter['page'])) {
            $filter['page'] = 1;
        };
        $filter['limit'] = 12;
        $berita =   $this->MainModel->getPaggerGaleri($filter);
        $dataContent = array(
            'page' => 'galeri',
            'berita' => $berita,
            'pager' => ceil($this->MainModel->countPaggerGaleri($filter)['cp'] / $filter['limit']),
            'cur_page' => $filter['page']
            // 'surveys' => $this->ParameterModel->getSurvey(array('show_survey' => '1', 'limit' => 6))
        );
        // echo json_encode($dataContent);
        $this->load->view('template', $dataContent);

        // $dataContent = array(
        //     'page' => 'error_page',
        //     'message' => 'Sedang di bangun'
        // );
        // $this->load->view('template', $dataContent);
    }
    public function pengumuman($id)
    {

        $dataContent = array(
            'page' => 'detail_berita', 'berita' => $this->MainModel->getBerita(array('berita_slug' => $id, 'tipe' => 'pengumuman'))[0]
        );
        $this->load->view('template', $dataContent);
    }
    public function artikel($id)
    {

        $dataContent = array(
            'page' => 'detail_berita', 'berita' => $this->MainModel->getBerita(array('berita_slug' => $id, 'tipe' => 'artikel'))[0]
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
        // echo PHP_VERSION;
        $dataContent = array(
            'page' => 'landingpage',
            'berita' => $this->MainModel->getBerita(array('x_tipe' => 'pengumuman', 'limit' => 7)),
            'pengumuman' => $this->MainModel->getBerita(array('tipe' => 'pengumuman', 'limit' => 3)),
            // 'artikel' => $this->MainModel->getBerita(array('tipe' => 'artikel', 'limit' => 3)),
            'surveys' => $this->ParameterModel->getSurvey(array('show_survey' => '1', 'limit' => 6))
        );
        $this->load->view('template', $dataContent);
    }
    public function cek_php()
    {
        echo PHP_VERSION;
        echo sys_get_temp_dir();

        if (version_compare(PHP_VERSION, '5.6.0') >= 0) {
            echo ' [OK] PHP version is newer than 5.6: ' . phpversion();
        } else {
            echo ' [ERROR] Your PHP version is too old for CKFinder 3.x.';
        }

        if (!function_exists('gd_info')) {
            echo ' [ERROR] GD extension is NOT enabled.';
        } else {
            echo ' [OK] GD extension is enabled.';
        }

        if (!function_exists('finfo_file')) {
            echo ' [ERROR] Fileinfo extension is NOT enabled.';
        } else {
            echo ' [OK] Fileinfo extension is enabled.';
        }
    }

    public function cek_ses()
    {
        echo json_encode($this->session->userdata());
    }
    public function pagger()
    {
        $filter = $this->input->get();
        if (empty($filter['page'])) {
            $filter['page'] = 1;
        };
        $filter['limit'] = 6;
        $berita =   $this->MainModel->getPagger($filter);
        $dataContent = array(
            'page' => 'beritalainnya',
            'berita' => $berita,
            'pager' => ceil($this->MainModel->countPagger($filter)['cp'] / $filter['limit']),
            'cur_page' => $filter['page']
            // 'surveys' => $this->ParameterModel->getSurvey(array('show_survey' => '1', 'limit' => 6))
        );
        // echo json_encode($dataContent);
        $this->load->view('template', $dataContent);
    }



    public function search()
    {
        $filter = $this->input->get();
        if (empty($filter['page'])) {
            $filter['page'] = 1;
        };
        $filter['limit'] = 6;
        $berita =   $this->MainModel->getPagger($filter);
        $dataContent = array(
            'page' => 'search',
            'search' => $filter['s'],
            'berita' => $berita,
            'pager' => ceil($this->MainModel->countPagger($filter)['cp'] / $filter['limit']),
            'cur_page' => $filter['page']
            // 'surveys' => $this->ParameterModel->getSurvey(array('show_survey' => '1', 'limit' => 6))
        );
        // echo json_encode($dataContent);
        $this->load->view('template', $dataContent);
    }


    public function survey()
    {

        // $capt = $this->create_capt();
        $dataContent = array(
            'page' => 'e_survey',
            'navbar' => ['title' => "e-Survey", 'kategori' => "e-Survey",],
            'captcha' => $this->create_capt()
        );

        $this->load->view('template', $dataContent);
    }

    function create_capt()
    {
        $expiration = time() - 7200; // Two hour limit
        $this->db->where('captcha_time < ', $expiration)
            ->delete('captcha');

        $this->load->helper('captcha');
        $this->load->helper('string');
        $vals = array(
            'word'          => strtoupper(random_string('alphanum', 5)),
            'img_path'      => APPPATH . '../assets/captcha/',
            'img_url'       => base_url('assets/captcha/'),
            'font_path'     => './path/to/fonts/texb.ttf',
            'img_width'     => '150',
            'img_height'    => 40,
            'expiration'    => 1200,
            'word_length'   => 5,
            'font_size'     => 26,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',

            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        $cap = create_captcha($vals);
        // var_dump($cap);
        // die();
        $data_captca = array(
            'captcha_time'  => $cap['time'],
            'word'          => $cap['word']
        );

        $query = $this->db->insert_string('captcha', $data_captca);
        $this->db->query($query);

        $this->session->set_userdata('mycaptcha', $cap['word']);
        return $cap['image'];
    }

    function cek_captha($cap)
    {
        $expiration = time() - 600;
        $this->db->where('captcha_time < ', $expiration)
            ->delete('captcha');
        $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND captcha_time > ?';
        $binds = array($cap,  $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();

        if ($row->count == 0) {
            throw new UserException('Captcha salah / sudah kadarluasa, silahkan refres halaman!', UNAUTHORIZED_CODE);
        } else {
            $this->db->where('word', $cap)
                ->delete('captcha');
        }
    }
    function submit_survey()
    {
        try {
            $data = $this->input->post();
            foreach ($data as $key => $d)
                $data[$key] = preg_replace('/[^A-Za-z0-9 @]/', '', $data[$key]);
            $this->cek_captha($data['captcha']);

            // echo json_encode($data);
            // die();
            $data['tanggal'] = date("Y-m-d");
            // $this->load->model('Parameter');
            $this->ParameterModel->submit_survey($data);
            echo json_encode(array('error' => false, 'data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function pengaduan()
    {
        $dataContent = array(
            'page' => 'pengaduan',
            'navbar' => ['title' => "Pengaduan", 'kategori' => "Pengaduan"]
        );

        $this->load->view('template', $dataContent);
    }

    function submit_pengaduan()
    {
        $data = $this->input->post();
        $data['ip_address'] = $this->input->ip_address();
        $data['tanggal'] = date("Y-m-d");
        // $this->load->model('Parameter');
        $this->ParameterModel->submit_pengaduan($data);
        echo json_encode(array('error' => false, 'data' => $data));
    }
    public function submit_tamu()
    {
        $data = $this->input->post();
        $this->MainModel->add_tamu($data);
        redirect(base_url('daftar-tamu'));
    }
}
