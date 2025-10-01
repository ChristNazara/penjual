<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-warning" onclick="location.href = ('<?php echo site_url('user/index') ?>')">
                        <i class="fa fa-backward"></i> Kembali
                    </button>
                </h3>
            </div>
            <?php echo $this->session->flashdata('pesan'); ?>
            <?php echo form_open('user/update', array('class' => 'form-horizontal')) ?>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Id User</label>
                    <div class="col-sm-4">
                        <input type="text" name="iduser" class="form-control" value="<?php echo $iduser;?>" readonly="readonly">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('iduser') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="username" class="form-control" value="<?php echo $username;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('username') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-2">
                        <input type="text" name="password" class="form-control" value="<?php echo $password;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('password') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Hak Akses</label>
                    <div class="col-sm-4">
                        <input type="text" name="hakakses" class="form-control" value="<?php echo $hakakses;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('hakakses') ?></span>
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