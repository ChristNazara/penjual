<?php

class Modelbarang extends CI_Model {

    function databarang() {
        return $this->db->query("select * from barang");
    }

    function caribarang($cari)
    {

        return $this->db->query("select * from barang where kodebarang='$cari' or namabarang like '%$cari%' ");
    } 
    


    function simpanbarang() {
        $kodebarang = $this->input->post('kodebarang', TRUE);
        $namabarang = $this->input->post('namabarang', TRUE);
        $merek= $this->input->post('merek', TRUE);
        $hargabeli = $this->input->post('hargabeli', TRUE);
        $hargajual = $this->input->post('hargajual', TRUE);
        $stock = $this->input->post('stock', TRUE);

        $this->form_validation->set_rules('kodebarang', 'Kode Barang', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('namabarang', 'Nama Barang', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('merek', 'Merek', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('hargabeli', 'Harga Beli', 'required|numeric', array('required' => '%s tidak boleh kosong', 'numeric' => '%s harus angka'));
        $this->form_validation->set_rules('hargajual', 'Harga Jual', 'required|numeric', array('required' => '%s tidak boleh kosong', 'numeric' => '%s harus angka'));
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric', array('required' => '%s tidak boleh kosong', 'numeric' => '%s harus angka'));

        if ($this->form_validation->run() == FALSE) {
            return FALSE;
        } else {
            return $this->db->query("INSERT INTO barang VALUES('$kodebarang','$namabarang','$merek','$hargabeli','$hargajual','$stock')");
        }
    }

    function ambildata($kodebarang) {
        return $this->db->query("select * from barang where kodebarang = '$kodebarang'");
    }

    function updatedata() {
        $kodebarang = $this->input->post('kodebarang', TRUE);
        $namabarang = $this->input->post('namabarang', TRUE);
        $merek = $this->input->post('merek', TRUE);
        $hargabeli = $this->input->post('hargabeli', TRUE);
        $hargajual = $this->input->post('hargajual', TRUE);
        $stock = $this->input->post('stock', TRUE);
        return $this->db->query("UPDATE barang SET namabarang='$namabarang',merek='$merek',hargabeli='$hargabeli',hargajual='$hargajual', stock='$stock' WHERE kodebarang='$kodebarang'");
    }
    
    function hapusbarang($kodebarang){
        return $this->db->query("DELETE FROM barang WHERE kodebarang='$kodebarang'");
    }

}
