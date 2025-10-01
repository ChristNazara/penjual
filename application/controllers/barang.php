<?php
class Barang extends CI_controller {
    function __Construct()
    {
        parent :: __Construct();
        $this ->load->model('modelbarang','barang');
        $this->load->library(array('form_validation', 'session'));
    }
    function index() {
        $querydatabarang = $this->barang->databarang();
        $data = array(
            'tampildata' => $querydatabarang
        );
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Data Barang',
            'konten' => $this->load->view('barang/tampilbarang', $data, TRUE),
        );
        $this->parser->parse('template/vtemplate', $template);
    }

    function tambahbarang() {
    $template = array(
        'menu' => $this->load->view('template/menu', '', TRUE),
        'judul' => 'Tambah Barang',
        'konten' => $this->load->view('barang/vformbarang', '', TRUE),
    );
    $this->parser->parse('template/vtemplate', $template);
}

    function formbarang(){
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Tambah Barang',
            'konten' => $this->load->view('barang/vformbarang', '', TRUE),
        );
        $this->parser->parse('template/vtemplate', $template);
        }

        function simpanbarang(){
        $querysimpanbarang = $this->barang->simpanbarang();
            if ($querysimpanbarang == FALSE) {
                $this->tambahbarang();
            } else {
                $pesan = '<div class="alert alert-success alert-dismissible">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                        . 'Data Berhasil di Simpan'
                        . '</div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect('barang/tambahbarang');
            }
    }
     function edit() {
        $kodebarang = $this->uri->segment(3);
        $queryambildata = $this->barang->ambildata($kodebarang);
        if ($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $data = array(
                'kodebarang' => $baris['kodebarang'],
                'namabarang' => $baris['namabarang'],
                'merek' => $baris['merek'],
                'hargabeli' => $baris['hargabeli'],
                'hargajual' => $baris['hargajual'],
                'stock' => $baris['stock'],
            );
        } else {
            exit('Data Tidak Di Temukan');
        }
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Edit Barang',
            'konten' => $this->load->view('barang/veditbarang', $data, TRUE),
        );
        $this->parser->parse('template/vtemplate', $template);
    }

    function update() {
        $kodebarang = $this->input->post('kodebarang', TRUE);
        $queryupdatedata = $this->barang->updatedata();
        $pesan = '<div class="alert alert-success alert-dismissible">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                . 'Data Berhasil di Update'
                . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('barang/edit/' . $kodebarang);
    }
    function hapusbarang()
    {
        $kodebarang = $this->uri->segment(3);
        $queryhapus = $this->barang->hapusbarang($kodebarang);
        if ($queryhapus) {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Hapus'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('barang/index');
        }
    }

    
}
?>

