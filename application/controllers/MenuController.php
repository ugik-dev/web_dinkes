<?php
class MenuController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MenuModel');
        $this->load->library('upload');
    }
    function index()
    {
        $this->load->view('admin/NewNewPost');
    }

    public function getAllMenu()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $filter = $this->input->get();
            $data = $this->MenuModel->getAllMenu($this->input->get());
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function hide_comentar()
    {
        try {
            $this->SecurityModel->roleOnlyGuard('admin', true);
            $this->MenuModel->delete_comentar($this->input->get('id'), 2);
            redirect(site_url() . 'Menux?id_Menu=' . $this->input->get('id_Menu'));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function unhide_comentar()
    {
        try {
            $this->SecurityModel->roleOnlyGuard('admin', true);
            $this->MenuModel->delete_comentar($this->input->get('id'), 1);
            redirect(site_url() . 'Menux?id_Menu=' . $this->input->get('id_Menu'));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }
    function edit()
    {
        try {
            $this->SecurityModel->roleOnlyGuard('admin', true);

            $config['upload_path'] = './upload/menu_pdf/'; //path folder
            $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
            $data = $this->input->post();
            $data_fx = [];
            $this->upload->initialize($config);
            if (!empty($_FILES['menu_pdf'])) {
                // var_dump($data);
                // die();
                if ($this->upload->do_upload('menu_pdf')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    // $config['image_library'] = 'gd2';
                    // $config['source_image'] = './upload/menu_pdf/' . $gbr['file_name'];
                    // $config['create_thumb'] = FALSE;
                    // $config['maintain_ratio'] = FALSE;
                    // $config['quality'] = '60%';
                    // // $config['width']= 710;
                    // // $config['height']= 420;
                    // $config['new_image'] = './upload/menu_pdf/' . $gbr['file_name'];
                    // $this->load->library('image_lib', $config);
                    // $this->image_lib->resize();

                    $data_fx['menu_pdf'] = $gbr['file_name'];
                    // $jdl = $this->input->post('judul');
                    // $menu = $this->input->post('menu');

                    // redirect('admin/Menu_post');
                } else {
                    // redirect('admin/Menu_post');
                }
            }
            $data_fx['id_menu'] = $data['id_menu'];
            $data_fx['menu_judul'] = $data['menu_judul'];
            $data_fx['menu_slug'] = $this->slugify($data['menu_judul'], '-');
            $data_fx['urut'] = $data['urut'];
            $data_fx['menu_isi'] = $data['menu_isi'];
            $data_fx['pdf_name'] = $data['pdf_name'];
            $data_fx['id_ref_menu'] = $data['id_ref_menu'];

            $this->MenuModel->edit($data_fx);
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }
    function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    function add()
    {
        try {
            $this->SecurityModel->roleOnlyGuard('admin', true);

            $config['upload_path'] = './upload/menu_pdf/'; //path folder
            $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
            $data = $this->input->post();
            $data_fx = [];
            $this->upload->initialize($config);
            if (!empty($_FILES['menu_pdf'])) {
                // var_dump($data);
                // die();
                if ($this->upload->do_upload('menu_pdf')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    // $config['image_library'] = 'gd2';
                    // $config['source_image'] = './upload/menu_pdf/' . $gbr['file_name'];
                    // $config['create_thumb'] = FALSE;
                    // $config['maintain_ratio'] = FALSE;
                    // $config['quality'] = '60%';
                    // // $config['width']= 710;
                    // // $config['height']= 420;
                    // $config['new_image'] = './upload/menu_pdf/' . $gbr['file_name'];
                    // $this->load->library('image_lib', $config);
                    // $this->image_lib->resize();

                    $data_fx['menu_pdf'] = $gbr['file_name'];
                    // $jdl = $this->input->post('judul');
                    // $menu = $this->input->post('menu');

                    // redirect('admin/Menu_post');
                } else {
                    // redirect('admin/Menu_post');
                }
            }
            $data_fx['menu_judul'] = $data['menu_judul'];
            $data_fx['menu_slug'] = $this->slugify($data['menu_judul'], '-');
            $data_fx['urut'] = $data['urut'];
            $data_fx['menu_isi'] = $data['menu_isi'];
            $data_fx['pdf_name'] = $data['pdf_name'];
            $data_fx['id_ref_menu'] = $data['id_ref_menu'];

            $this->MenuModel->add($data_fx);
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function simpan_new_post()
    {
        try {
            $this->SecurityModel->roleOnlyGuard('admin', true);

            $config['upload_path'] = './upload/menu_pdf/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
            $data = $this->input->post();
            $this->upload->initialize($config);
            if (!empty($_FILES['filefoto'])) {
                // var_dump($data);
                // die();
                if ($this->upload->do_upload('filefoto')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/img/Menu/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '60%';
                    // $config['width']= 710;
                    // $config['height']= 420;
                    $config['new_image'] = './assets/img/Menu/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar = $gbr['file_name'];
                    $jdl = $this->input->post('judul');
                    $menu = $this->input->post('menu');

                    $this->MenuModel->simpan_menu($jdl, $menu, $gambar);
                    redirect('admin/Menu_post');
                } else {
                    // redirect('admin/Menu_post');
                }
            }
            $this->MenuModel->edit($data);
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
        // redirect('admin/Menu_post');
    }

    function lists()
    {
        $x['data'] = $this->MenuModel->get_all_menu();
        $this->load->view('v_post_list', $x);
    }

    function view()
    {
        $kode = $this->uri->segment(3);
        $x['data'] = $this->MenuModel->get_menu_by_kode($kode);
        $this->load->view('v_post_view', $x);
    }

    public function getAll()
    {
        try {
            // $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->MenuModel->getAll($this->input->get());
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
            $data = $this->MenuModel->get($this->input->get()['id_menu']);

            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }


    public function edit_post()
    {
        try {
            $this->SecurityModel->roleOnlyGuard('admin');
            // $this->load->view('admin/EditMenuPost');

            $input = $this->input->get();
            $data = $this->MenuModel->get($input['menu_id']);
            $pageData = array(
                'title' => 'Edit Menu Post',
                'content' => 'admin/EditMenuPost',
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

    public function deleteMenu()
    {
        try {
            $this->SecurityModel->userOnlyGuard('admin');
            $this->MenuModel->delete($this->input->post());
            echo json_encode([]);
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }
}
