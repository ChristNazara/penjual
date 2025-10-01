<?php

class Modelpemasok extends CI_Model {

    function datapemasok() {
        return $this->db->query("select * from pemasok");
    }

    function caripemasok($cari)
    {

        return $this->db->query("select * from pemasok where kodepemasok='$cari' or namapemasok like '%$cari%' ");
    } 
    


    function simpanpemasok() {
        $kodepemasok = $this->input->post('kodepemasok', TRUE);
        $namapemasok= $this->input->post('namapemasok', TRUE);
        $alamat= $this->input->post('alamat', TRUE);
        $notelp= $this->input->post('notelp', TRUE);

        $this->form_validation->set_rules('kodepemasok', 'Kode Pemasok', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('namapemasok', 'Nama Pemasok', 'required', array('required' => '%s tidak boleh kosong'));
       $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s tidak boleh kosong'));
         $this->form_validation->set_rules('notelp', 'No Telp', 'required|numeric', array('required' => '%s tidak boleh kosong', 'numeric' => '%s harus angka'));

        if ($this->form_validation->run() == FALSE) {
            return FALSE;
        } else {
            return $this->db->query("INSERT INTO pemasok VALUES('$kodepemasok','$namapemasok','$alamat','$notelp')");
        }
    }

    function ambildata($kodepemasok) {
        return $this->db->query("select * from pemasok where kodepemasok = '$kodepemasok'");
    }

    function updatedata() {
        $kodepemasok = $this->input->post('kodepemasok', TRUE);
        $namapemasok = $this->input->post('namapemasok', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $notelp = $this->input->post('notelp', TRUE);
        return $this->db->query("UPDATE pemasok SET namapemasok='$namapemasok',alamat='$alamat',notelp='$notelp' WHERE kodepemasok='$kodepemasok'");
    }
    
    function hapuspemasok($kodepemasok){
        return $this->db->query("DELETE FROM pemasok WHERE kodepemasok='$kodepemasok'");
    }

}
