<?php
class User extends CI_controller {
    function __Construct()
    {
        parent :: __Construct();
        $this ->load->model('modeluser','user');
        $this->load->library(array('form_validation', 'session'));
    }
    function index() {
        $querydatauser = $this->user->datauser();
        $data = array(
            'tampildata' => $querydatauser
        );
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Data User',
            'konten' => $this->load->view('user/tampiluser', $data, TRUE),
        );
        $this->parser->parse('template/vtemplate', $template);
    }

    function tambahuser() {
    $template = array(
        'menu' => $this->load->view('template/menu', '', TRUE),
        'judul' => 'Tambah Pelanggan',
        'konten' => $this->load->view('user/vformuser', '', TRUE),
    );
    $this->parser->parse('template/vtemplate', $template);
}

    function formuser(){
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Tambah Pelanggan',
            'konten' => $this->load->view('user/vformuser', '', TRUE),
        );
        $this->parser->parse('template/vtemplate', $template);
        }

        function simpanuser(){
        $querysimpanuser = $this->user->simpanuser();
            if ($querysimpanuser == FALSE) {
                $this->tambahuser();
            } else {
                $pesan = '<div class="alert alert-success alert-dismissible">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                        . 'Data Berhasil di Simpan'
                        . '</div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect('user/tambahuser');
            }
    }
     function edit() {
        $iduser = $this->uri->segment(3);
        $queryambildata = $this->user->ambildata($iduser);
        if ($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $data = array(
                'iduser' => $baris['iduser'],
                'username' => $baris['username'],
                'password' => $baris['password'],
                'hakakses' => $baris['hakakses'],
            );
        } else {
            exit('Data Tidak Di Temukan');
        }
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Edit User',
            'konten' => $this->load->view('user/vedituser', $data, TRUE),
        );
        $this->parser->parse('template/vtemplate', $template);
    }

    function update() {
        $iduser = $this->input->post('iduser', TRUE);
        $queryupdatedata = $this->user->updatedata();
        $pesan = '<div class="alert alert-success alert-dismissible">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                . 'Data Berhasil di Update'
                . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('user/edit/' . $iduser);
    }
    function hapususer()
    {
        $iduser = $this->uri->segment(3);
        $queryhapus = $this->user->hapususer($iduser);
        if ($queryhapus) {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Hapus'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('user/index');
        }
    }

    
}
?>

