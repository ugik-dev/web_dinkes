<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('UserModel'));
        // $this->load->helper(array('DataStructure', 'Validation'));
        $this->db->db_debug = false;
    }

    public function index()
    {
        redirect('login');
    }

    public function login()
    {
        $this->SecurityModel->guestOnlyGuard();
        $pageData = array(
            'title' => 'Masuk',
        );

        $this->load->view('LoginPage', $pageData);
    }

    public function loginProcess()
    {
        try {
            // $this->SecurityModel->guestOnlyGuard(TRUE);
            // Validation::ajaxValidateForm($this->SecurityModel->loginValidation());

            $loginData = $this->input->post();
            if (empty($loginData['username'])) {
                throw new UserException("Username tidak boleh kosong !! ", USER_NOT_FOUND_CODE);
            }
            if (empty($loginData['password'])) {
                throw new UserException("Password tidak boleh kosong !! ", USER_NOT_FOUND_CODE);
            }


            $user = $this->UserModel->login($loginData);

            $this->session->set_userdata($user);
            echo json_encode(array("error" => FALSE, "user" => $user));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }


    public function email_send($data, $action)
    {
        $serv = $this->PengirimanModel->getEmailConfig();

        $send['to'] = $data['email']; //KPB
        if ($action == 'activate') {
            $send['subject'] = 'Activation KPB Lada Babel';
            $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="http://kpbladababel.com/assets/img/logo-kpb.png" width="60px" vspace=0 /></td></tr>';
            $emailContent .= '<tr><td style="height:20px"></td></tr>';
            $url_act = site_url("/activator/{$data['id']}/{$data['activator']}");
            $emailContent .= "<br><br> Username :  {$data['username']}
						<br> Password :  {$data['password_hash']}
						<br> 
						<br>Selamat Akun anda sudah berhasil didaftarkan, silahkan login dan lengkapi data.";
            $emailContent .= '<tr><td style="height:20px"></td></tr>';
            $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='kpbladababel.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>kpbladababel.com</a></p></td></tr></table></body></html>";
        } else {
            $send['subject'] = 'Activation KPB Lada Babel';
            $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="http://kpbladababel.com/assets/img/logo-kpb.png" width="60px" vspace=0 /></td></tr>';
            $emailContent .= '<tr><td style="height:20px"></td></tr>';
            $url_act = site_url("/activator/{$data['id']}/{$data['activator']}");
            $emailContent .= "<br><br> Username :  {$data['username']}
						<br> Password :  {$data['password_hash']}
						<br> Activator :  {$data['activator']}
						<br> 
						<br><a href='{$url_act}' target='_blank' style='text-decoration:none;color: #60d2ff;'>Click this to activate</a>

						<br> manual activate = {$url_act}";
            $emailContent .= '<tr><td style="height:20px"></td></tr>';
            $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='kpbladababel.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>kpbladababel.com</a></p></td></tr></table></body></html>";
        }
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

    public function update()
    {
        try {
            $profile = $this->input->post();
            $profile['id_user'] = $this->session->userdata('id_user');
            $newProfile = $this->UserModel->updateDosenLocal($profile);
            $oldSess = $this->session->userdata();
            $this->session->set_userdata(array_merge($oldSess, $newProfile));
            $profile = DataStructure::slice($this->session->userdata(), ['nidn', 'nohp', 'telepon', 'email', 'bidang_keahlian']);
            echo json_encode(array('profile' => $profile));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function changePassword()
    {
        try {
            $this->SecurityModel->roleOnlyGuard('pengusul', TRUE);
            $this->SecurityModel->pengusulSubTypeGuard(['dosen_tendik'], TRUE);
            // Validation::ajaxValidateForm($this->SecurityModel->deleteDosenTendik());

            $CP = $this->input->post();
            if (md5($CP['old_password']) != $this->session->userdata('password')) {
                throw new UserException('Password Lama Salah', 0);
            }
            $this->UserModel->changePassword($CP);
            $this->session->set_userdata('password', md5($CP['password']));
            echo json_encode(array());
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function changeUsername()
    {
        $this->SecurityModel->apiKeyGuard();
        try {
            $data = $this->input->post();

            if (!isset($data['username']) || !isset($data['username_new'])) {
                throw new UserException('Parameter tidak lengkap', 0);
            }
            $this->UserModel->changeUsername($data);
            echo json_encode(array());
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function getAllUser()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->UserModel->getAllUser($this->input->post());
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function addUser()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $idUser = $this->UserModel->addUser($this->input->post());
            $user = $this->UserModel->getUser($idUser);
            echo json_encode(array("data" => $user));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function editUser()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $idUser = $this->UserModel->editUser($this->input->post());
            $user = $this->UserModel->getUser($idUser);

            if ($user['id_user'] == $this->session->userdata('id_user')) {
                $this->session->set_userdata(array_merge($this->session->userdata(), $user));
            }
            if ($user['id_role'] == '2') {
                $id = $this->PerusahaanModel->getAll(array('is_user' => '1', 'id_user' => $user['id_user']));
                $this->PerusahaanModel->updateModifedDate($id);
            }

            echo json_encode(array("data" => $user));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function logout()
    {
        // $this->SecurityModel->userOnlyGuard();
        $this->session->sess_destroy();
        echo json_encode(["error" => FALSE, 'data' => 'Logout berhasil.']);
    }
}
