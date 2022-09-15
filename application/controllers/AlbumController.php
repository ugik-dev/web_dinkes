<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AlbumController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('AlbumModel', 'SecurityModel'));
        // $this->load->helper(array('DataStructure', 'Validation'));
        $this->db->db_debug = false;
    }

    public function update()
    {
        try {
            $profile = $this->input->post();
            $profile['album_id'] = $this->session->albumdata('album_id');
            $newProfile = $this->AlbumModel->updateDosenLocal($profile);
            $oldSess = $this->session->albumdata();
            $this->session->set_albumdata(array_merge($oldSess, $newProfile));
            $profile = DataStructure::slice($this->session->albumdata(), ['nidn', 'nohp', 'telepon', 'email', 'bidang_keahlian']);
            echo json_encode(array('profile' => $profile));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }


    public function getAllAlbum()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->AlbumModel->getAll($this->input->post());
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function addAlbum()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $idAlbum = $this->AlbumModel->add($this->input->post());
            $album = $this->AlbumModel->get($idAlbum);
            echo json_encode(array("data" => $album));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function editAlbum()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $idAlbum = $this->AlbumModel->edit($this->input->post());
            $album = $this->AlbumModel->get($idAlbum);
            echo json_encode(array("data" => $album));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function deleteAlbum()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $idAlbum = $this->AlbumModel->delete($this->input->post());
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
