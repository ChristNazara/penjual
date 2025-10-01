<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-warning" onclick="location.href = ('<?php echo site_url('pelanggan/index') ?>')">
                        <i class="fa fa-backward"></i> Kembali
                    </button>
                </h3>
            </div>
            <?php echo $this->session->flashdata('pesan'); ?>
            <?php echo form_open('pelanggan/update', array('class' => 'form-horizontal')) ?>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Kode Pelanggan</label>
                    <div class="col-sm-4">
                        <input type="text" name="kodepelanggan" class="form-control" value="<?php echo $kodepelanggan;?>" readonly="readonly">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('kodepelanggan') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Pelanggan</label>
                    <div class="col-sm-6">
                        <input type="text" name="namapelanggan" class="form-control" value="<?php echo $namapelanggan;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('namapelanggan') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">No Hp</label>
                    <div class="col-sm-2">
                        <input type="text" name="nohp" class="form-control" value="<?php echo $nohp;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('nohp') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-4">
                        <input type="text" name="alamat" class="form-control" value="<?php echo $alamat;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('alamat') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> Update Data
                        </button>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>