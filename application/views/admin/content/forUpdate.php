       
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
                        <?php foreach ($tampil as $t) {
                            $id_produk = $t['id_produk'];
                            $nama_produk = $t['nama_produk'];
                            $harga = $t['harga_produk'];
                            $kategori = $t['kategori'];
                        } ?>
                         <?php echo form_open('admin/updatecoy/'.$id_produk); ?>
                                <p>Kode Produk : <?php echo $id_produk ?></p>
                                <p class="col-md-6"><input type="text" class="form-control" placeholder="Nama Produk" name="nama" value="<?php echo $nama_produk; ?>"></p>
                                <p class="col-md-6"><input type="text" class="form-control" placeholder="Harga" name="harga" value="<?php echo $harga; ?>"></p>
                                <p class="col-md-6"><select name="kategori" class="form-control" >
                                    <option selected="" disabled="">--kategori--</option>
                                    <option <?php 
                                        if ($kategori = 'Pasminah') {
                                            echo 'selected="selected"';
                                        }
                                         ?>>Pasminah
                                    </option>
                                    <option <?php 
                                        if ($kategori = 'Kotak') {
                                            echo 'selected="selected"';
                                        }
                                         ?>>Kotak
                                    </option>
                                </select></p>
                                <br>
                                <p class="col-lg-12"><input type="submit" value="Update" class="btn btn-warning" name="" ></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
</div>

    </div>

