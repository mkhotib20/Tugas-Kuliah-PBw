       
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
                            Tambah Produk eHijab
                        </div>
                        <div class="panel-body">
                        <?php echo form_open_multipart('admin/tambahProduk'); ?>
                                <p class="col-md-6"><input type="text" class="form-control" placeholder="Id Produk" name="id"></p>
                                <p class="col-md-6"><input type="text" class="form-control" placeholder="Nama Produk" name="nama"></p>
                                <p class="col-md-6"><input type="text" class="form-control" placeholder="Harga" name="harga"></p>
                                <p class="col-md-6"><input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi"></p>
                                <p class="col-md-6"><select name="kategori" class="form-control">
                                    <option selected="" disabled="">--kategori--</option>
                                    <option>Pasminah</option>
                                    <option>Kotak</option>
                                </select></p>
                                <p class="col-md-6"><input type="file" class="form-control" placeholder="Harga" name="gambar"></p>
                                <br>
                                <p class="col-lg-12"><input type="submit" value="Tambah" class="btn btn-warning" name=""></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
</div>

    </div>

