<div class="row">
    <div cla
    ss="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-primary" onclick="location.href = ('<?php echo site_url('barang/tambahbarang') ?>')">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                </h3>
            </div>
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Merek</th>
                            <th>Harga Beli</th>
                             <th>Harga Jual</th>
                             <th>Stock</th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 0;
                        foreach ($tampildata->result_array() as $baris):
                            $nomor++;
                            ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $baris['kodebarang']; ?></td>
                                <td><?php echo $baris['namabarang']; ?></td>
                                <td><?php echo $baris['merek']; ?></td>
                                <td><?php echo number_format($baris['hargabeli'], 0); ?></td>
                                 <td><?php echo number_format($baris['hargajual'], 0); ?></td>
                                 <td><?php echo number_format($baris['stock'], 0); ?></td>
                                <td>
                                    <button type="button" class="btn bg-purple" onclick="location.href = ('<?php echo site_url('barang/edit/' . $baris['kodebarang']) ?>')">
                                        <i class="fa fa-pencil-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="return hapus('<?php echo $baris['kodebarang'] ?>')">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    <script>
                                        function hapus(kode) {
                                            pesan = confirm('Yakin data barang ini di hapus');
                                            if (pesan) {
                                                location.href = ('<?php echo site_url('barang/hapusbarang/') ?>' + kode);
                                            } else
                                                return false;
                                        }
                                    </script>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>