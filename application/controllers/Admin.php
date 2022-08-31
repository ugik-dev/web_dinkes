<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('NewsModel', 'ParameterModel', 'MenuModel', 'MainModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    }

    public function index()
    {
        $this->SecurityModel->rolesOnlyGuard(array('admin', 'kpb'));
        $pageData = array(
            'title' => 'Beranda',
            'content' => 'admin/DashboardPage',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }

    public function kelola_user()
    {
        $this->SecurityModel->rolesOnlyGuard(array('admin'));

        $pageData = array(
            'title' => 'Kelola User',
            'content' => 'admin/KelolaUserPage',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }


    public function bank_data()
    {
        $this->SecurityModel->rolesOnlyGuard(array('admin'));

        $pageData = array(
            'title' => 'Bank Data',
            'content' => 'admin/BankData',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }

    public function ikm()
    {
        $this->SecurityModel->rolesOnlyGuard(array('admin'));

        $pageData = array(
            'title' => 'e-Survey / Index Kepuasan Masyarakat',
            'content' => 'admin/ikm',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }
    public function pengaduan()
    {
        $this->SecurityModel->rolesOnlyGuard(array('admin'));

        $pageData = array(
            'title' => 'Pengaduan',
            'content' => 'admin/pengaduan',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }

    public function  berita()
    {
        $this->SecurityModel->rolesOnlyGuard(array('admin'));
        $pageData = array(
            'title' => 'Berita',
            'content' => 'admin/NewsPost',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }

    public function  menu()
    {
        $this->SecurityModel->rolesOnlyGuard(array('admin'));
        $pageData = array(
            'title' => 'Berita',
            'content' => 'admin/Menu',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }



    public function kelola_email()
    {
        $this->SecurityModel->roleOnlyGuard('admin');
        $pageData = array(
            'title' => 'Kelola Email',
            'content' => 'admin/KelolaEmail',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }

    public function news_post()
    {
        $this->SecurityModel->roleOnlyGuard('admin');

        $kode = $this->uri->segment(3);
        $x['data'] = $this->NewsModel->get_berita_by_kode($kode);
        $pageData = array(
            'title' => 'News Post',
            'content' => 'admin/NewsPost',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $pageData['data'] = $x;
        $this->load->view('Page', $pageData);
    }

    public function new_news_post()
    {
        $this->SecurityModel->roleOnlyGuard('admin');
        $pageData = array(
            'title' => 'News Post',
            'content' => 'admin/NewNewsPost',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }

    public function form_menu()
    {
        $this->SecurityModel->roleOnlyGuard('admin');
        $pageData = array(
            'title' => 'News Post',
            'content' => 'admin/FormMenu',
            'dataContent' => [
                'form_url' => base_url() . 'MenuController/add',
                'ref_menu' => $this->ParameterModel->getAllJenisMenu([]),
            ],
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }

    public function edit_menu($id)
    {
        $this->SecurityModel->roleOnlyGuard('admin');
        $pageData = array(
            'title' => 'Edit Menu',
            'content' => 'admin/FormMenu',
            'dataContent' => [
                'form_url' => base_url() . 'MenuController/edit',
                'ref_menu' => $this->ParameterModel->getAllJenisMenu([]),
                'edit' => $this->MenuModel->getAllMenu(['id_menu' => $id])[$id],
            ],
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        // echo json_encode($this->ParameterModel->getAllJenisMenu([]));
        // die();
        $this->load->view('Page', $pageData);
    }

    public function panduan()
    {
        $this->SecurityModel->roleOnlyGuard('admin');
        $pageData = array(
            'title' => 'Beranda',
            'content' => 'admin/PanduanPage',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }

    public function edit_survey()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('admin'));
            $data = $this->input->post();
            $this->MainModel->edit_survey($data['id'], $data['sh']);
            // $this->email_send($data);
            echo json_encode(array('error' => false, "data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function acc_seller()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('admin', 'kpb'));
            $data = $this->input->post();
            $this->PerusahaanModel->acc_seller($data);
            $this->email_send($data);
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }


    public function getAllDBConfig()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('admin', 'kpb'));
            $data = $this->input->post();
            $data = $this->PengirimanModel->getEmailConfig($data);
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function email_send($data)
    {
        $serv = $this->PengirimanModel->getEmailConfig();

        $send['to'] = $data['email']; //KPB

        $send['subject'] = 'Verificate Account KPB Lada Babel';
        $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="http://kpbladababel.com/assets/img/logo-kpb.png" width="60px" vspace=0 /></td></tr>';
        $emailContent .= '<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<br>Hallo {$data['nama_perusahaan']},";
        if ($data['verificated'] == 'Y') {
            $emailContent .= "<br>Selamat Akun anda sudah berhasil diverifikasi,
                           anda sudah dapat mengakses halaman Trading Bursa Lada mpms.kpbladababel.com/trading .
                        <br> ";
        } else {
            $emailContent .= "<br>Maaf akun anda belum berhasil diverifikasi,
                           mohon lengkapi data dengan benar agar dapat mengakses halaman Trading Bursa Lada mpms.kpbladababel.com/trading .
                        <br> ";
        }
        $emailContent .= '<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='kpbladababel.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>kpbladababel.com</a></p></td></tr></table></body></html>";
        $send['message'] = $emailContent;

        $config['protocol']    = 'smtp';
        $config['smtp_host']    = $serv['stmp_mail']['url_'];
        $config['smtp_port']    = '587';
        $config['smtp_timeout'] = '60';
        $config['smtp_user']    = $serv['stmp_mail']['username'];    //Important
        $config['smtp_pass']    = $serv['stmp_mail']['key'];  //Important
        $config['charset']    = 'utf-8';
        $config['newline']    = '\r\n';
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 
        $send['config'] = $config;

        $this->email->initialize($send['config']);
        $this->email->set_mailtype("html");
        $this->email->from($serv['stmp_mail']['username']);
        $this->email->to($send['to']);
        $this->email->subject($send['subject']);
        $this->email->message($send['message']);
        $this->email->send();
        return 0;
    }
}
