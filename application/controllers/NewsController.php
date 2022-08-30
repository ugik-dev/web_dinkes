<?php
class NewsController extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('NewsModel');
    $this->load->library('upload');
  }
  function index()
  {
    $this->load->view('admin/NewNewPost');
  }
  function hide_comentar()
  {
    try {
      $this->SecurityModel->roleOnlyGuard('admin', true);
      $this->NewsModel->delete_comentar($this->input->get('id'), 2);
      redirect(site_url() . 'newsx?id_news=' . $this->input->get('id_news'));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  function unhide_comentar()
  {
    try {
      $this->SecurityModel->roleOnlyGuard('admin', true);
      $this->NewsModel->delete_comentar($this->input->get('id'), 1);
      redirect(site_url() . 'newsx?id_news=' . $this->input->get('id_news'));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  function simpan_post()
  {
    try {
      $this->SecurityModel->roleOnlyGuard('admin', true);

      $config['upload_path'] = './upload/berita_image/'; //path folder
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
      $data = $this->input->post();
      $this->upload->initialize($config);
      if (!empty($_FILES['berita_image'])) {
        // var_dump($data);
        // die();
        if ($this->upload->do_upload('berita_image')) {
          $gbr = $this->upload->data();
          //Compress Image
          $config['image_library'] = 'gd2';
          $config['source_image'] = './upload/berita_image/' . $gbr['file_name'];
          $config['create_thumb'] = FALSE;
          $config['maintain_ratio'] = FALSE;
          $config['quality'] = '60%';
          // $config['width']= 710;
          // $config['height']= 420;
          $config['new_image'] = './upload/berita_image/' . $gbr['file_name'];
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $data['berita_image'] = $gbr['file_name'];
          // $jdl = $this->input->post('judul');
          // $berita = $this->input->post('berita');

          // $this->NewsModel->simpan_berita($jdl, $berita, $gambar);
          // redirect('admin/news_post');
        } else {
          // redirect('admin/news_post');
        }
      }
      $data['berita_slug'] = $this->slugify($data['berita_judul']);
      $this->NewsModel->edit($data);
      // echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
    // redirect('admin/news_post');
  }

  function simpan_new_post()
  {
    try {
      $this->SecurityModel->roleOnlyGuard('admin', true);

      $config['upload_path'] = './upload/berita_image/'; //path folder
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
          $config['source_image'] = './upload/berita_image/' . $gbr['file_name'];
          $config['create_thumb'] = FALSE;
          $config['maintain_ratio'] = FALSE;
          $config['quality'] = '60%';
          // $config['width']= 710;
          // $config['height']= 420;
          $config['new_image'] = './upload/berita_image/' . $gbr['file_name'];
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $data['berita_image'] = $gbr['file_name'];
        } else {
          // redirect('admin/news_post');
        }
      }
      $data['berita_slug'] = $this->slugify($data['berita_judul']);
      $this->NewsModel->add($data);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
    // redirect('admin/news_post');
  }

  function lists()
  {
    $x['data'] = $this->NewsModel->get_all_berita();
    $this->load->view('v_post_list', $x);
  }

  function view()
  {
    $kode = $this->uri->segment(3);
    $x['data'] = $this->NewsModel->get_berita_by_kode($kode);
    $this->load->view('v_post_view', $x);
  }

  public function getAll()
  {
    try {
      // $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->NewsModel->getAll($this->input->get());
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function get()
  {
    try {
      // $this->SecurityModel->userOnlyGuard(TRUE);
      // var_dump($this->input->get()['id_berita']);
      $data = $this->NewsModel->get($this->input->get()['id_berita']);

      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function edit_post()
  {
    try {
      $this->SecurityModel->roleOnlyGuard('admin');
      // $this->load->view('admin/EditNewsPost');

      $input = $this->input->get();
      $data = $this->NewsModel->get($input['berita_id']);
      $pageData = array(
        'title' => 'Edit News Post',
        'content' => 'admin/EditNewsPost',
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
      $this->NewsModel->delete($this->input->post());
      echo json_encode([]);
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
}
