<?php 
class Validation {
  public static function ajaxValidateForm($rules){
    $CI =& get_instance();
    $CI->load->library('form_validation');
    $CI->form_validation->set_rules($rules);
    if ($CI->form_validation->run() == false){
      throw new UserException(validation_errors(), VALIDATION_ERROR_CODE);
    }
  }

  public static function ajaxValidateData($data, $rules){
    $CI =& get_instance();
    $CI->load->library('form_validation');
    $CI->form_validation->set_data($data);
    $CI->form_validation->set_rules($rules);
    if ($CI->form_validation->run() == false){
      throw new UserException(validation_errors(), VALIDATION_ERROR_CODE);
    }
  }
}