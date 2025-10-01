<?php

class Modeluser extends CI_Model {

    function datauser() {
        return $this->db->query("select * from user");
    }

    function cariuser($cari)
    {

        return $this->db->query("select * from user where iduser='$cari' or username like '%$cari%' ");
    } 
    


    function simpanuser() {
        $username = $this->input->post('username', TRUE);
        $password= $this->input->post('password', TRUE);
        $hakakses= $this->input->post('hakakses', TRUE);

        $this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('hakakses', 'Hak Akses', 'required', array('required' => '%s tidak boleh kosong'));
       

        if ($this->form_validation->run() == FALSE) {
            return FALSE;
        } else {
            return $this->db->query("INSERT INTO user VALUES('$iduser','$username',md5('$password'),'$hakakses')");
        }
    }

    function ambildata($iduser) {
        return $this->db->query("select * from user where iduser = '$iduser'");
    }

    function updatedata() {
        $iduser = $this->input->post('iduser', TRUE);
        $username= $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $hakakses = $this->input->post('hakakses', TRUE);
        return $this->db->query("UPDATE user SET username='$username',password=md5('$password'),hakakses='$hakakses' WHERE iduser='$iduser'");
    }
    
    function hapususer($iduser){
        return $this->db->query("DELETE FROM user WHERE iduser='$iduser'");
    }

}
