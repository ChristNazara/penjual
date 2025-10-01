<script>
$(document).ready(function(e){
	$('#tambah').click(function(e){
		var kodebarang=$('#kodebarang').val();
		var hargabeli=$('#hargabeli').val();
		var jumlah=$('#jumlah').val();
		var diskon=$('#diskon').val();
		datanya ="&kodebarang="+kodebarang+"&hargabeli="+hargabeli+"&jumlah="+jumlah+"&diskon="+diskon;
		$.ajax({
			url : "<?php echo site_url('pembelian/simpantemp')?>",
			data: datanya,
			type: "POST",
			cache:false,
			success:function(msg){
				location.href=('<?php echo site_url('pembelian')?>');
			}
		})
	});
});
</script>
<script>
function ambil(kodebarang,namabarang,hargabeli)
{
$('#kodebarang').val(kodebarang);
$('#namabarang').val(namabarang);
$('#hargabeli').val(hargabeli);
$('#myModal').modal('hide');
}
</script>
<style type="text/css">.editor{
display:none;
}
</style>
<body>
<div class="box-body">
<form method="post" action="<?php echo site_url('pembelian/simpantransaksi')?>" id="tmb" onSubmit="return cetak();">
<div class="col-xs-12">
<div class="box-body table-responsive">
<table class="table table-bordered">
<tr>
<td>Kode</td>
<td width="100"><div class="col-sm-114"><input type="text" class="form-control" readonly name="kodebarang" id="kodebarang"></div></td>
<td><button type="button" title="Cari Barang" class="btn btn-primary" data-toggle="modal" data-target="#myModal">      <span class='glyphicon glyphicon-search'></span></button>
</td>
<td>Nama</td>
<td><input type="text" class="form-control" readonly name="namabarang" id="namabarang"></td>
<td>Harga Beli</td>
<td><input type="text" class="form-control" name="hargabeli" id="hargabeli"></td>
<td>Jumlah</td>
<td width="100"><div class="col-sm-12"><input type="text" class="form-control" name="jumlah" id="jumlah"></div></td>
<td>Diskon</td>
<td width="70"><div class="col-sm-14"><input type="text" class="form-control" name="diskon" id="diskon"></div></td>
<td><button type="button" id="tambah" class="btn btn-primary"><span class='glyphicon glyphicon-plus'></span></button></td>
</tr>
</table>
</div>
</div>
<div class="col-xs-12" id="data_sementara">
<div class="box-body table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th width="50" align="center">No</th>
<th>Kode</th>
<th>Nama Barang</th>
<th>Harga Jual</th>
<th>Harga Beli</th>
<th width="50">Jumlah</th>
<th>Diskon %</th>
<th width="200">Sub Total</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $nomor=1; $total=0; foreach($datatemp->result_array() as $d){
$subtotal = ($d['harga'] * $d['qty'])-(($d['harga']*$d['qty'])*$d['diskon']/100);
$total = $total + $subtotal;?>
<tr>
<td align="center"><?php echo $nomor?><input id="dataid" type="text" class="form-control editor"   					value="<?php echo $d ['kodebarang']?>"/></td>
<td><?php echo $d['kodebarang']; ?></td>
<td><?php echo $d['namabarang']; ?></td>
<td style="cursor:pointer;">
<span class="caption"><?php echo "Rp ".number_format($d['harga']);?></span>
<input type="text" onKeyDown="update_hrgjual(event,'<?php echo $d['kodebarang']?>')" class="form-control editor"  value="<?php echo $d['hargajual']?>"/>
</td>
<td style="cursor:pointer;">
<span class="caption"><?php echo "Rp ".number_format($d['harga'])?></span>
<input type="text" onKeyDown="update_hrgbeli(event,'<?php echo $d['kodebarang']?>')" class="form-control editor" 	value="<?php echo $d['harga']?>"/>
</td>
<td style="cursor:pointer;">
<span class="caption"><?php echo $d['qty']?></span>
<input type="text" onKeyDown="update_stok(event,'<?php echo $d['kodebarang']?>')" class="form-control editor" 		value="<?php echo $d['qty']?>"/>
</td>
<td style="cursor:pointer;">
<span class="caption"><?php echo $d['diskon']; ?></span>
<input type="text" onKeyDown="update_disc(event,'<?php echo $d['kodebarang']?>')" class="form-control editor"		 value="<?php echo $d['diskon']?>"/>
</td>
<td><?php echo "Rp ".number_format($subtotal)?></td>
<td>
<a class='btn btn-danger btn-xs' title='Hapus Item' href="<?php echo site_url('pembelian/hapusitem/'.$d['kodebarang'].'/'.$d['qty'])?>"><span class='glyphicon glyphicon-trash'></span></a>
</td>
</tr>
<?php $nomor++; } ?>
</tbody>
<tfoot>
<tr>
<th colspan="7">SUB TOTAL</th>
<th><?php echo "Rp ".number_format($total)?>
<input type="hidden" id="totalbayar" name="totalbayar" value="<?php echo $total?>"/>
</th>
</tr>
<tr>
<th colspan="7">DISC %</th>
<th colspan="2">
<div class="col-xs-4">
<input type="text" name="diskon" id="diskon" class="form-control"/>
</div>
</th>
</tr>
<tr>
<th colspan="7">TOTAL</th>
<th colspan="2">
<div class="col-xs-12">
<span id="tot"></span>
<input type="hidden" name="bersih" id="bersih">
</div>
</th>
</tr>
<tr>
<td colspan="7" align="right">No. Faktur</td>
<td colspan="2">
<div class="input-group col-sm-8">
<input type="text" class="form-control" name="nofaktur" id="nofaktur" required>
</div>
</td>
</tr>
<tr>
<td colspan="7" align="right">Tanggal Beli</td>
<td colspan="2">
<div class="input-group date col-sm-8>
<ii class="fa fa-calendar"></i>
</div>
<input type="date" class="form-control pull-right" id="tglpembelian" name="tglpembelian"                     placeholder="mm-dd-yyyy" required>
</div>
</td>
</tr>
<tr>
<td colspan="5">
<button type="submit" class="btn btn-primary btn-sm"/><span class='glyphicon glyphicon-floppy-save'></span> 		Simpan Transaksi</button>
<a class='btn btn-danger btn-sm' title='Hapus Data' href='<?php echo site_url('pembelian/batal')?>' onclick="return confirm('Anda Yakin menghapus data ini?')"><span class='fa fa-ban'> Batal Transaksi</span></a>
<button type="submit" onclick="location.href=('<?php echo site_url('pembelian/data')?>')" 							class="btn btn-success btn-sm"><span class='fa fa-mail-reply-all'></span> Kembali</button>
</td>
<td colspan="2" align="right">Pemasok</td>
<td colspan="2">
<div class="input-group col-sm-8">
<select class="form-control select2" style="width: 100%;" name="pemasok" id="pemasok" required>
<option selected>-Pilih-</option>
<?php foreach($datapemasok->result_array() as $k){?>
<option value="<?php echo $k['kodepemasok']?>"><?php echo $k['namapemasok']?></option>
<?php }?>
</select>
</div>
</td>
</tr>
</tfoot>
</table>
</div>
</div>
</form>
</div>
</body>
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>  </button>
<h4 class="modal-title" id="myModalLabel">Cari Data Barang</h4>
<div class="box-body table-responsive">
<table class="table table-bordered table-striped table-hover" id="datatiket">
<thead>
<tr>
<th width="5">No</th>
<th>Kode Barang</th>
<th>Nama Barang</th>
<th>Harga Beli</th>
<th>Harga Jual</th>
<th>Stok</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $no=1;
foreach($databarang->result_array() as $r){
?>
<tr>
<td><?php echo $no ?></td>
<td><?php echo $r['kodebarang'] ?></td>
<td><?php echo $r['namabarang'] ?></td>
<td><?php echo "Rp ".number_format($r['hargabeli'])?></td>
<td><?php echo "Rp ".number_format($r['hargajual'])?></td>
<td><?php echo $r['stock'] ?></td>
<td><button class="btn btn-primary btn-xs" type="button" onClick="return ambil('<?php echo $r['kodebarang']?>','<?php echo $r['namabarang']?>','<?php echo $r['hargabeli']?>')"><span class='glyphicon glyphicon-check'></span> 	Pilih</button>
</td>
</tr>
<?php $no++; } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
