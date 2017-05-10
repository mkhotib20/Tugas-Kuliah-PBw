<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Produk eHijab
                        </div>
                        <div class="panel-body">
                        <a class="btn btn-success" href="<?php echo base_url('admin/tambah') ?>">+ Tambah Produk</a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID Product</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th style="width: 250px;">Gambar</th>
                                    <th style="width: 200px;">Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($produk as $p) {?>
                                <tr class="odd gradeX">
                                    <td><?php echo $p['id_produk'] ?></td>
                                    <td><?php echo $p['nama_produk'] ?></td>
                                    <td><?php echo 'Rp. '.number_format($p['harga_produk'], 2, ',', '.'); ?></td>
                                    <td class="center"><?php echo $p['kategori'] ?></td>
                                    <td class="center"><img style="width: 100%" src="<?php echo $p['gambar_produk'] ?>"></td>
                                    <td class="center">
                                        <a class="btn btn-primary btn-outline" href="#">Perbaharui</a>
                                        <a class="btn btn-danger btn-outline" href="#">Hapus</a>
                                    </td>
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