<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class PublicController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('ParameterModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    }

    public function getAllSurvey()
    {
        try {
            // $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->ParameterModel->getAllSurvey($this->input->get());
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }
}
