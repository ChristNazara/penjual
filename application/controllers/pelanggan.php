<?php
class Pelanggan extends CI_controller {
    function __Construct()
    {
        parent :: __Construct();
        $this ->load->model('modelpelanggan','pelanggan');
        $this->load->library(array('form_validation', 'session'));
    }
    function index() {
        $querydatapelanggan = $this->pelanggan->datapelanggan();
        $data = array(
            'tampildata' => $querydatapelanggan
        );
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Data Pelanggan',
            'konten' => $this->load->view('pelanggan/tampilpelanggan', $data, TRUE),
        );
        $this->parser->parse('template/vtemplate', $template);
    }

    function tambahpelanggan() {
    $template = array(
        'menu' => $this->load->view('template/menu', '', TRUE),
        'judul' => 'Tambah Pelanggan',
        'konten' => $this->load->view('pelanggan/vformpelanggan', '', TRUE),
    );
    $this->parser->parse('template/vtemplate', $template);
}

    function formpelanggan(){
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Tambah Pelanggan',
            'konten' => $this->load->view('barang/vformpelanggan', '', TRUE),
        );
        $this->parser->parse('template/vtemplate', $template);
        }

        function simpanpelanggan(){
        $querysimpanpelanggan = $this->pelanggan->simpanpelanggan();
            if ($querysimpanpelanggan == FALSE) {
                $this->tambahpelanggan();
            } else {
                $pesan = '<div class="alert alert-success alert-dismissible">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                        . 'Data Berhasil di Simpan'
                        . '</div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect('pelanggan/tambahpelanggan');
            }
    }
     function edit() {
        $kodepelanggan = $this->uri->segment(3);
        $queryambildata = $this->pelanggan->ambildata($kodepelanggan);
        if ($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $data = array(
                'kodepelanggan' => $baris['kodepelanggan'],
                'namapelanggan' => $baris['namapelanggan'],
                'nohp' => $baris['nohp'],
                'alamat' => $baris['alamat'],
            );
        } else {
            exit('Data Tidak Di Temukan');
        }
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Edit Pelanggan',
            'konten' => $this->load->view('pelanggan/veditpelanggan', $data, TRUE),
        );
        $this->parser->parse('template/vtemplate', $template);
    }

    function update() {
        $kodepelanggan = $this->input->post('kodepelanggan', TRUE);
        $queryupdatedata = $this->pelanggan->updatedata();
        $pesan = '<div class="alert alert-success alert-dismissible">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                . 'Data Berhasil di Update'
                . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('pelanggan/edit/' . $kodepelanggan);
    }
    function hapuspelanggan()
    {
        $kodepelanggan = $this->uri->segment(3);
        $queryhapus = $this->pelanggan->hapuspelanggan($kodepelanggan);
        if ($queryhapus) {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Hapus'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pelanggan/index');
        }
    }

    
}
?>

