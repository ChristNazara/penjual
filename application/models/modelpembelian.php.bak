<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelpembelian extends CI_Model{


function databarang()
{
	return $this->db->query("SELECT kodebarang,namabarang,hargabeli,hargajual,stock FROM barang WHERE kodebarang NOT IN(SELECT idbarang FROM tempbeli)");
}

function datatemp()
{
	return $this->db->query("SELECT kodebarang,namabarang,hargajual,harga,qty,(harga*qty) AS subtotal,diskon FROM tempbeli JOIN barang ON tempbeli.idbarang=barang.kodebarang");
	}

	function smptemp($kd,$qty,$hrg,$dis)
	{
	return $this->db->query("insert into tempbeli values('$kd','$qty','$hrg','$dis')");
	}

	function hapustmp($kode)
	{
return $this->db->query("delete from tempbeli where idbarang='$kode'");
	}
}

?>
