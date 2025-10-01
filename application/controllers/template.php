<?php
class Template extends CI_controller {
    public function __Construct(){
        parent :: __Construct();
    }

    public function index(){
        $template = array(
            'menu' => $this->load->view('template/menu','',TRUE),
            'judul'=>'Aplikasi Penjualan Komputer',
            'konten'=>$this->load->view('template/beranda','',TRUE),
        );
        $this->parser->parse('template/vtemplate',$template);
    }
  }