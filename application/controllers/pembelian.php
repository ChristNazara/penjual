<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pembelian extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('modelpembelian');	
		$this->load->model('modelpemasok');
	}
	
	public function index()
	{
		$a['judul']			='Input Pembelian Barang';
		$d['databarang']	= $this->modelpembelian->databarang();
		$d['datatemp']		= $this->modelpembelian->datatemp();
		$d['datapemasok'] 	= $this->modelpemasok->datapemasok();
		$a['menu']   = $this->load->view('template/menu', '', TRUE);
		$a['konten'] = $this->load->view('pembelian/viewadd',$d,true);
		$this->parser->parse('template/vtemplate',$a);
	
	}
	public function data()
	{
		$a['judul']			= 'Pembelian';
		$a['subjudul']		= '<li class="active"><i class="fa fa-dashboard"></i> &nbsp;Transaksi</li><li>Data Pembelian</li>';
		$data['tampil']		= $this->modelpembelian->tampil();
		$a['isi'] 			= $this->load->view('pembelian/data',$data,true);
		$this->parser->parse('template/vtemplate',$a);
	}
	function simpantemp()
	{
		$kd 	= $this->input->post('kodebarang',true);
		$qty 	= $this->input->post('jumlah',true);
		$hrg 	= $this->input->post('hargabeli',true);
		$dis 	= $this->input->post('diskon',true);
		$this->modelpembelian->smptemp($kd,$qty,$hrg,$dis);
		//$this->modelpembelian->updatebeli($kd,$hrg);
	}
	function simpantransaksi()
	{
		$nofaktur = $this->input->post('nofaktur');
		$date = $this->input->post('tglpembelian');
		$tglpembelian = date("Y-m-d",strtotime($date));
		$user = $this->session->userdata('kode');
		$pemasok = $this->input->post('pemasok');
		$this->modelpembelian->simpan($nofaktur,$tglpembelian,$user,$pemasok);
		redirect('pembelian');
	}
	function hapusitem($kode)
	{
		$this->modelpembelian->hapustmp($kode);
		redirect('pembelian');
	}
}
?>

