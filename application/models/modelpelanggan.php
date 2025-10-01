<?php

class Modelpelanggan extends CI_Model {

    function datapelanggan() {
        return $this->db->query("select * from pelanggan");
    }

    function caripelanggan($cari)
    {

        return $this->db->query("select * from pelanggan where kodepelanggan='$cari' or namapelanggan like '%$cari%' ");
    } 
    


    function simpanpelanggan() {
        $kodepelanggan = $this->input->post('kodepelanggan', TRUE);
        $namapelanggan = $this->input->post('namapelanggan', TRUE);
        $nohp= $this->input->post('nohp', TRUE);
        $alamat= $this->input->post('alamat', TRUE);

        $this->form_validation->set_rules('kodepelanggan', 'Kode Pelanggan', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('namapelanggan', 'Nama Pelanggan', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('nohp', 'No Hp', 'required|numeric', array('required' => '%s tidak boleh kosong', 'numeric' => '%s harus angka'));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s tidak boleh kosong'));

        if ($this->form_validation->run() == FALSE) {
            return FALSE;
        } else {
            return $this->db->query("INSERT INTO pelanggan VALUES('$kodepelanggan','$namapelanggan','$nohp','$alamat')");
        }
    }

    function ambildata($kodepelanggan) {
        return $this->db->query("select * from pelanggan where kodepelanggan = '$kodepelanggan'");
    }

    function updatedata() {
        $kodepelanggan = $this->input->post('kodepelanggan', TRUE);
        $namapelanggan= $this->input->post('namapelanggan', TRUE);
        $nohp = $this->input->post('nohp', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        return $this->db->query("UPDATE pelanggan SET namapelanggan='$namapelanggan',nohp='$nohp',alamat='$alamat' WHERE kodepelanggan='$kodepelanggan'");
    }
    
    function hapuspelanggan($kodepelanggan){
        return $this->db->query("DELETE FROM pelanggan WHERE kodepelanggan='$kodepelanggan'");
    }

}
