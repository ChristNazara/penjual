<ul class="sidebar-menu" data-widget="tree">
		<li class="header">MENU</li>
        <li>
        <?php $h=$this->session->userdata('akses'); ?>
         <?php if($h=='Admin') { ?>
          <a href="<?php echo site_url('template/index')?>">
            <i class="fa fa-dashboard"></i> <span>BERANDA</span>
          </a>
          </li>
        
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>MASTER</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>            </span>          </a>
          <ul class="treeview-menu">
		  	<li class="active"><a href="<?php echo site_url('barang/index')?>"><i class="fa fa-circle-o text-blue"></i> <span>Barang</span></a></li>
            <li class="active"><a href="<?php echo site_url('pelanggan/index')?>"><i class="fa fa-circle-o text-green"></i> <span>Pelanggan</span></a></li>
              <li class="active"><a href="<?php echo site_url('pemasok/index')?>"><i class="fa fa-circle-o text-red"></i> <span>Pemasok</span></a></li>
            <li class="active"><a href="<?php echo site_url('user/index')?>"><i class="fa fa-circle-o text-orange"></i> <span>User</span></a></li>
          </ul>
        </li>
		<li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>TRANSAKSI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>            </span>          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo site_url('peminjaman/index')?>"><i class="fa fa-circle-o text-red"></i> <span>Peminjaman</span></a></li>
            <li class="active"><a href="<?php echo site_url('pengembalian/index')?>"><i class="fa fa-circle-o text-purple"></i> <span>Pengembalian</span></a></li>
			</a></li>
        </li>
		</ul>
		<li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>LAPORAN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>            </span>          </a>
          <ul class="treeview-menu">
			<li class="active"><a href="<?php echo site_url('lapanggota/index')?>"><i class="fa fa-circle-o text-blue"></i> <span>Lap. Barang</span></a></li>
			<li class="active"><a href="<?php echo site_url('lapkaryacetak/index')?>"><i class="fa fa-circle-o text-green"></i> <span>Lap. Pelanggan </span></a></li>

			 </a></li>
        </li>

         <?php } else if($h=='Pegawai') { ?>
          <a href="<?php echo site_url('template/index')?>">
            <i class="fa fa-dashboard"></i> <span>BERANDA</span>
          </a>
          </li>
        <li class="active"><a href="<?php echo site_url('pembelian/index')?>"><i class="fa fa-circle-o text-red"></i> <span>Pembelian</span></a></li>
           <li class="active"><a href="<?php echo site_url('pengembalian/index')?>"><i class="fa fa-circle-o text-red"></i> <span>Penjualan</span></a></li>
         <?php } else if($h=='Kasir') { ?>
          <a href="<?php echo site_url('template/index')?>">
            <i class="fa fa-dashboard"></i> <span>BERANDA</span>
          </a>
          </li>
          <li class="active"><a href="<?php echo site_url('peminjaman/index')?>"><i class="fa fa-circle-o text-red"></i> <span>Penjualan</span></a></li>
          <li class="active"><a href="<?php echo site_url('peminjaman/index')?>"><i class="fa fa-circle-o text-red"></i> <span>Ganti Password</span></a></li>
          <li class="active"><a href="<?php echo site_url('peminjaman/index')?>"><i class="fa fa-circle-o text-red"></i> <span>Cetak Laporan</span></a></li>
         <?php } ?>
     
		  
		  
		  
		  
		  
		  
		  
		  
           