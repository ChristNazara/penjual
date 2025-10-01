<?php
class Pemasok extends CI_controller {
    function __Construct()
    {
        parent :: __Construct();
        $this ->load->model('modelpemasok','pemasok');
        $this->load->library(array('form_validation', 'session'));
    }
    function index() {
        $querydatapemasok = $this->pemasok->datapemasok();
        $data = array(
            'tampildata' => $querydatapemasok
        );
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Data Pemasok',
            'konten' => $this->load->view('pemasok/tampilpemasok', $data, TRUE),
        );
        $this->parser->parse('template/vtemplate', $template);
    }

    function tambahpemasok() {
    $template = array(
        'menu' => $this->load->view('template/menu', '', TRUE),
        'judul' => 'Tambah Pemasok',
        'konten' => $this->load->view('pemasok/vformpemasok', '', TRUE),
    );
    $this->parser->parse('template/vtemplate', $template);
}

    function formpemasok(){
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Tambah Pemasok',
            'konten' => $this->load->view('pemasok/vformpemasok', '', TRUE),
        );
        $this->parser->parse('template/vtemplate', $template);
        }

        function simpanpemasok(){
        $querysimpanpemasok = $this->pemasok->simpanpemasok();
            if ($querysimpanpemasok== FALSE) {
                $this->tambahpemasok();
            } else {
                $pesan = '<div class="alert alert-success alert-dismissible">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                        . 'Data Berhasil di Simpan'
                        . '</div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect('pemasok/tambahpemasok');
            }
    }
     function edit() {
        $kodepemasok = $this->uri->segment(3);
        $queryambildata = $this->pemasok->ambildata($kodepemasok);
        if ($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $data = array(
                'kodepemasok' => $baris['kodepemasok'],
                'namapemasok' => $baris['namapemasok'],
                'alamat' => $baris['alamat'],
                'notelp' => $baris['notelp'],
            );
        } else {
            exit('Data Tidak Di Temukan');
        }
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Edit Pemasok',
            'konten' => $this->load->view('pemasok/veditpemasok', $data, TRUE),
        );
        $this->parser->parse('template/vtemplate', $template);
    }

    function update() {
        $kodepemasok = $this->input->post('kodepemasok', TRUE);
        $queryupdatedata = $this->pemasok->updatedata();
        $pesan = '<div class="alert alert-success alert-dismissible">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                . 'Data Berhasil di Update'
                . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('pemasok/edit/' . $kodepemasok);
    }
    function hapuspemasok()
    {
        $kodepemasok = $this->uri->segment(3);
        $queryhapus = $this->pemasok->hapuspemasok($kodepemasok);
        if ($queryhapus) {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Hapus'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pemasok/index');
        }
    }

    
}
?>

