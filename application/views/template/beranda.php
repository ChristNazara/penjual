<div class="row">
<div class="col-md-12">
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">
Halo
</h3>
</div>

<div class="box-body">
<div class="callout callout-info">
<strong>Selamat Datang</strong>
</div>
</div>
</div>
</div>
</div>
 <?php $h=$this->session->userdata('akses'); ?>
         <?php if($h=='Admin') { ?>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>1</h3>
              <p>Barang</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="<?php echo site_url('barang/index')?>" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

         <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>2<sup style="font-size: 20px"></sup></h3>
              <p>Pelanggan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo site_url('pelanggan/index')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

 		<div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>3<sup style="font-size: 20px"></sup></h3>
              <p>Pemasok</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo site_url('pemasok/index')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


         <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>4<sup style="font-size: 20px"></sup></h3>
              <p>User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo site_url('user/index')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

		<?php } else if($h=='Pegawai') { ?>
         <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>1<sup style="font-size: 20px"></sup></h3>
              <p>Pembelian</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo site_url('pembelian/index')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php } ?>

        