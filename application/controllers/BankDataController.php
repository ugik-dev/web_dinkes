<?php
class BankDataController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('BankDataModel');
        $this->load->library('upload');
    }
    public function index()
    {
        $filter = $this->input->get();
        $dataContent = array(
            'page' => 'bank_data',
            'navbar' => ['title' => "Bank Data", 'kategori' => "Informasi"], 'filter' => $filter
        );

        $this->load->view('template', $dataContent);
    }

    public function getAllBankData()
    {
        try {
            // $this->SecurityModel->userOnlyGuard(TRUE);
            $filter = $this->input->get();
            $data = $this->BankDataModel->getAllBankData($this->input->get());
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }


    public function download($id)
    {
        try {
            // $this->SecurityModel->userOnlyGuard(TRUE);
            $filter = $this->input->get();
            $data = $this->BankDataModel->getAllBankData(['id_bank_data' => $id])[$id];
            $this->BankDataModel->edit(['id_bank_data' => $id, 'total_download' => $data['total_download'] + 1]);
            if ($data['bank_jenis'] == 1) {
                $this->load->helper('download');
                force_download('upload/bank_data/' . $data['path_bank_data'], NULL);
            } else {
                redirect($data['bank_url']);
            }
            // echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }


    function edit()
    {
        try {
            $this->SecurityModel->roleOnlyGuard('admin', true);

            $config['upload_path'] = './upload/bank_data/'; //path folder
            $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
            $data = $this->input->post();
            $data_fx = [];
            $this->upload->initialize($config);
            if (!empty($_FILES['path_bank_data'])) {
                // var_dump($_FILES);
                // die();
                if ($this->upload->do_upload('path_bank_data')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    // $config['image_library'] = 'gd2';
                    // $config['source_image'] = './upload/bank_data/' . $gbr['file_name'];
                    // $config['create_thumb'] = FALSE;
                    // $config['maintain_ratio'] = FALSE;
                    // $config['quality'] = '60%';
                    // // $config['width']= 710;
                    // // $config['height']= 420;
                    // $config['new_image'] = './upload/bank_data/' . $gbr['file_name'];
                    // $this->load->library('image_lib', $config);
                    // $this->image_lib->resize();

                    $data['path_bank_data'] = $gbr['file_name'];
                    // $jdl = $this->input->post('judul');
                    // $menu = $this->input->post('menu');

                    // redirect('admin/BankData_post');
                } else {
                    // redirect('admin/BankData_post');
                }
            }
            // $data_fx['id_menu'] = $data['id_menu'];
            // $data_fx['menu_judul'] = $data['menu_judul'];
            // $data_fx['menu_slug'] = $this->slugify($data['menu_judul'], '-');
            // $data_fx['urut'] = $data['urut'];
            // $data_fx['menu_isi'] = $data['menu_isi'];
            // $data_fx['pdf_name'] = $data['pdf_name'];
            // $data_fx['id_ref_menu'] = $data['id_ref_menu'];

            $this->BankDataModel->edit($data);
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function add()
    {
        try {
            $this->SecurityModel->roleOnlyGuard('admin', true);

            $data = $this->input->post();

            if (!empty($_FILES['path_bank_data'])) {
                $config['upload_path'] = './upload/bank_data/'; //path folder
                $config['allowed_types'] = 'pdf|doc|docx|xls|csv|jpg|jpeg|png'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
                $data_fx = [];
                $this->upload->initialize($config);
                if ($this->upload->do_upload('path_bank_data')) {
                    // echo 'uplds';
                    $gbr = $this->upload->data();
                    $data['path_bank_data'] = $gbr['file_name'];
                } else {
                }
            }

            $this->BankDataModel->add($data);
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }



    public function getAll()
    {
        try {
            // $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->BankDataModel->getAll($this->input->get());
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function get()
    {
        try {
            // $this->SecurityModel->userOnlyGuard(TRUE);
            // var_dump($this->input->get()['id_menu']);
            $data = $this->BankDataModel->get($this->input->get()['id_menu']);

            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }


    public function edit_post()
    {
        try {
            $this->SecurityModel->roleOnlyGuard('admin');
            // $this->load->view('admin/EditBankDataPost');

            $input = $this->input->get();
            $data = $this->BankDataModel->get($input['menu_id']);
            $pageData = array(
                'title' => 'Edit BankData Post',
                'content' => 'admin/EditBankDataPost',
                'breadcrumb' => array(
                    'Home' => base_url(),
                ),
                'dataContent' => $data,
            );
            $this->load->view('Page', $pageData);
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function delete()
    {
        try {
            $this->SecurityModel->userOnlyGuard('admin');
            $this->BankDataModel->delete($this->input->post());
            echo json_encode([]);
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }
}
