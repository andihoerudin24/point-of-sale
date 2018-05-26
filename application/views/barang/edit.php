<?php
if ($this->session->flashdata('message')) {
    echo "<div class='alert alert-success'>";
    echo $this->session->flashdata('message');
    echo "</div>";
}elseif($this->session->flashdata('pesan')){
   echo "<div class='alert alert-danger'>";
   echo $this->session->flashdata('pesan');
   echo "</div>";    
}
?>
<div class="card border-dark text-dark">
    <div class="card-heading border bottom bg-info text-bold">
        <h4 class="card-title">Form Validation Layout</h4>
    </div>
    <div class="card-block ">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                     <?php echo form_open('Barang/edit','role="form" id="form-validation" novalidate="novalidate"');
                      echo form_hidden('kd_barang',$edit['kd_barang']);       
                      ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Barang</label><small class="text-normal">*Maximal 15 </small>
                                    <input type="text" class="form-control" maxlength="15" required="" value="<?php echo $edit['nama_barang'] ?>" name="nama_barang" placeholder="Nama BARANG...." >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori Barang</label>
                                    <?php echo cmb_dinamis('kategori','tbl_kategori','nama_kategori','id_kategori',$edit['id_kategori']);  ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Barang Satuan</label>
                                    <?php echo cmb_dinamis('Satuan','tbl_satuan','satuan','id_satuan');  ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Harga pokok</label>
                                    <input type="number" class="harpok form-control" value="<?php echo $edit['harga_pokok']?>" name="harga_pokok" placeholder="Harga poko Rp..">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Harga Jual</label>
                                    <input type="number" value="<?php echo $edit['harga_jual']?>" class="harga_jual form-control" name="harga_jual" placeholder="Harga jual Rp...">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stok Barang </label>
                                    <input type="number" value="<?php echo $edit['stok_barang']  ?>" class="stok_barang form-control" name="stok_barang" placeholder="Stok barang" required="" minlength="8" aria-required="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Minimal Stok</label>
                                    <input type="number" class="minal_stok form-control" value="<?php echo $edit['stok_minimal']  ?>" name="minimal_stok" placeholder="Enter a valid email format" required="" aria-required="true">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-rounded" name="submit" type="submit">Submit</button>
                    <?php echo anchor('Barang', 'KEMBALI', array('class' =>"btn btn-danger btn-rounded")) ?>
                    </form>
                </div>
            </div>
        </div>
    </div>


