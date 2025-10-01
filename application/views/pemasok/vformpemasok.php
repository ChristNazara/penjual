<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-warning" onclick="location.href = ('<?php echo site_url('pemasok/index') ?>')">
                        <i class="fa fa-backward"></i> Kembali
                    </button>
                </h3>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <?php echo form_open('pemasok/simpanpemasok', array('class' => 'form-horizontal')) ?>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Kode Pemasok</label>
                    <div class="col-sm-4">
                        <input type="text" name="kodepemasok" class="form-control">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('kodepemasok') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Pemasok</label>
                    <div class="col-sm-6">
                        <input type="text" name="namapemasok" class="form-control">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('namapemasok') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-4">
                        <input type="text" name="alamat" class="form-control" >
                        <span style="font-weight: bold; color: red;"><?php echo form_error('alamat') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">No Telp</label>
                    <div class="col-sm-2">
                        <input type="text" name="notelp" class="form-control">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('notelp') ?></span>
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