<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Log extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('login');
    }
    function index()
    {
        $this->load->view('login/vlogin3');
    }
    function masuk()
    {
        $user  = strip_tags(str_replace("'", "", $this->input->post('un',TRUE)));
        $pass  = strip_tags(str_replace("'", "", $this->input->post('ps',TRUE)));
        $cekakun = $this->login->in($user,$pass);
        if(strlen($user)=='' || strlen($pass)=='')
        {
            $this->session->set_flashdata('msg','Username Atau Password Anda Tidak Boleh Kosong');
            $url=base_url();redirect($url);
        }
        else{
            if($cekakun->num_rows() > 0){
                $rcekuser = $cekakun->row_array();
                $this->session->set_userdata('masuk',TRUE);
                $this->session->set_userdata('status_login','Oke');
                $this->session->set_userdata('user',$rcekuser['username']);
                $this->session->set_userdata('akses',$rcekuser['hakakses']);
            }
            else{
                $this->session->set_userdata('masuk',FALSE);
            }
        }
        if($this->session->userdata('masuk')==TRUE){
            $user=$this->session->userdata('user');
            redirect('template'); 
        }
        else{
            $this->session->set_flashdata('msg','Periksa kembali username dan password anda');
            $url=base_url();redirect($url);
        }
      }
      function logout()
          {
              $this->session->sess_destroy();
              $url=base_url();
              redirect($url);
          }
    }