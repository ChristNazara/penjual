<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-warning" onclick="location.href = ('<?php echo site_url('barang/index') ?>')">
                        <i class="fa fa-backward"></i> Kembali
                    </button>
                </h3>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <?php echo form_open('barang/simpanbarang', array('class' => 'form-horizontal')) ?>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Kode Barang</label>
                    <div class="col-sm-4">
                        <input type="text" name="kodebarang" class="form-control">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('kodebarang') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Barang</label>
                    <div class="col-sm-6">
                        <input type="text" name="namabarang" class="form-control">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('namabarang') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Merek</label>
                    <div class="col-sm-6">
                        <input type="text" name="merek" class="form-control">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('merek') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Harga Beli</label>
                    <div class="col-sm-4">
                        <input type="text" name="hargabeli" class="form-control">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('hargabeli') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Harga Jual</label>
                    <div class="col-sm-4">
                        <input type="text" name="hargajual" class="form-control" >
                        <span style="font-weight: bold; color: red;"><?php echo form_error('hargajual') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Stock</label>
                    <div class="col-sm-2">
                        <input type="text" name="stock" class="form-control">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('stock') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> Simpan Data
                        </button>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>