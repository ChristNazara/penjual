<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-primary" onclick="location.href = ('<?php echo site_url('pelanggan/tambahpelanggan') ?>')">
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
                            <th>Kode Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
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
                                <td><?php echo $baris['kodepelanggan']; ?></td>
                                <td><?php echo $baris['namapelanggan']; ?></td>
                                <td><?php echo number_format($baris['nohp'], 0); ?></td>
                                <td><?php echo $baris['alamat']; ?></td>
                                <td>
                                    <button type="button" class="btn bg-purple" onclick="location.href = ('<?php echo site_url('pelanggan/edit/' . $baris['kodepelanggan']) ?>')">
                                        <i class="fa fa-pencil-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="return hapus('<?php echo $baris['kodepelanggan'] ?>')">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    <script>
                                        function hapus(kode) {
                                            pesan = confirm('Yakin data pelanggan ini di hapus');
                                            if (pesan) {
                                                location.href = ('<?php echo site_url('pelanggan/hapuspelanggan/') ?>' + kode);
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