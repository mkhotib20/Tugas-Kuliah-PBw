<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Order</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Order eHijab
                        </div>
                        <div class="panel-body">
                        <?php echo $this->session->flashdata('success') ?>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID Order</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Pesanan</th>
                                    <th>Warna</th>
                                    <th>Nama Pemesan</th>
                                    <th>Username Pemesan</th>
                                    <th>Alamat Pemesan</th>
                                    <th>Tagihan</th>
                                    <th>Operasi</th>

                                </tr>
                            </thead>
                            <tbody>
                           <?php foreach ($order as $g) { ?>
                                <tr class="odd gradeX">
                                   <td><?php echo $g['id_order'] ?></td>
                                   <td><?php echo $g['nama_produk'] ?></td>
                                   <td style="width: 5px;"><?php echo $g['jumlah'] ?></td>
                                   <td><?php echo $g['warna'] ?></td>
                                   <td style="width: 5px;"><?php echo $g['nama_user'] ?></td>
                                   <td style="width: 5px;"><?php echo $g['id_user'] ?></td>
                                   <td ><?php echo $g['alamat_user'] ?></td>
                                   <td><?php echo 'Rp. '.number_format($g['tagihan'], 2, ',', '.'); ?></td>
                                   <td><a class="btn btn-danger" href="<?php echo base_url('admin/deleteOrder/'. $g['id_order']) ?>"> Hapus</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
</div>

</div>