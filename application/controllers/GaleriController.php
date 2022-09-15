<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GaleriController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('GaleriModel', 'SecurityModel'));
        // $this->load->helper(array('DataStructure', 'Validation'));
        $this->db->db_debug = false;
    }

    public function update()
    {
        try {
            $profile = $this->input->post();
            $profile['galeri_id'] = $this->session->galeridata('galeri_id');
            $newProfile = $this->GaleriModel->updateDosenLocal($profile);
            $oldSess = $this->session->galeridata();
            $this->session->set_galeridata(array_merge($oldSess, $newProfile));
            $profile = DataStructure::slice($this->session->galeridata(), ['nidn', 'nohp', 'telepon', 'email', 'bidang_keahlian']);
            echo json_encode(array('profile' => $profile));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }


    public function getAllGaleri()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->GaleriModel->getAll($this->input->post());
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function addGaleri()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->input->post();
            if (!empty($_FILES['filefoto'])) {
                $this->load->library('upload');
                $config['upload_path'] = './upload/galeri/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
                $this->upload->initialize($config);
                if ($this->upload->do_upload('filefoto')) {
                    $gbr = $this->upload->data();
                    // $config['image_library'] = 'gd2';
                    // $config['source_image'] = './upload/berita_image/' . $gbr['file_name'];
                    // $config['create_thumb'] = FALSE;
                    // $config['maintain_ratio'] = FALSE;
                    // $config['quality'] = '60%';
                    // $config['new_image'] = './upload/berita_image/' . $gbr['file_name'];
                    // $this->load->library('image_lib', $config);
                    // $this->image_lib->resize();
                    $data['file_galeri'] = $gbr['file_name'];
                } else {
                    throw new UserException('Upload Gagal', UNAUTHORIZED_CODE);
                }
            }

            $idGaleri = $this->GaleriModel->add($data);
            $galeri = $this->GaleriModel->get($idGaleri);
            echo json_encode(array("data" => $galeri));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function editGaleri()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->input->post();

            if (!empty($_FILES['filefoto'])) {
                $this->load->library('upload');
                $config['upload_path'] = './upload/galeri/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
                $this->upload->initialize($config);
                if ($this->upload->do_upload('filefoto')) {
                    $gbr = $this->upload->data();
                    // $config['image_library'] = 'gd2';
                    // $config['source_image'] = './upload/galeri/' . $gbr['file_name'];
                    // $config['create_thumb'] = FALSE;
                    // $config['maintain_ratio'] = FALSE;
                    // $config['quality'] = '60%';
                    // $config['new_image'] = './upload/galeri/' . $gbr['file_name'];
                    // $this->load->library('image_lib', $config);
                    // $this->image_lib->resize();
                    $data['file_galeri'] = $gbr['file_name'];
                } else {
                    throw new UserException('Upload Gagal', UNAUTHORIZED_CODE);
                }
            }
            $idGaleri = $this->GaleriModel->edit($data);
            $galeri = $this->GaleriModel->get($idGaleri);
            echo json_encode(array("data" => $galeri));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function deleteGaleri()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $idGaleri = $this->GaleriModel->delete($this->input->post());
            echo json_encode(array("data" => ''));
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
