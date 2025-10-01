<?php
defined('BASEPATH') OR exit('No direct script accer allowed');

class Login extends CI_Model{
    function in($user,$pass)
    {return $this->db->query("SELECT * FROM user WHERE username='$user' AND password=MD5('$pass')");}
}
?>