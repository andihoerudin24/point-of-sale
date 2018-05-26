<div class="card border-info text-dark">
    <div class="card-heading bg-info border bottom">
        <h4 class="card-title">Form Edit Suplier</h4>
    </div>
    <div class="card-block">
        <div class="card-block">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <?php
                    echo form_open('Suplier/edit');
                    echo form_hidden('id_suplier',$edit['id_suplier']);
                    ?>
                    <form role="form" id="form-validation" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama suplier <small class="text-normal">*Minimum 20 characters</small></label>
                                    <input type="text" value="<?php echo $edit['nama_suplier'] ?>" id="nama" onkeyup="checkLetter()"  class="form-control" maxlength="20" name="nama_suplier" placeholder="nama suplier" required="" minlength="8" aria-required="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat<small class="text-normal">*Minimum 35 characters</small></label>
                                    <input type="text" value="<?php echo $edit['alamat'] ?>" maxlength="35" class="form-control" name="alamat" placeholder="Enter a valid email format" required="" aria-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>No telpon<small class="text-normal">*Minimum 13 characters</small></label>
                                    <input type="text" value="<?php echo $edit['No_telpon']?>" onkeypress="return hanyaAngka(event)" maxlength="13" class="form-control" name="no_telpon" required="" aria-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Keterangan<small class="text-normal">*Minimum 50 characters</small></label>
                                    <textarea value="<?php echo $edit['keterangan']?>"class="form form-control" maxlength="90" type="text" name="keterangan" placeholder="Keterangan Contoh Belanja barang A di suplier ini">
                            </textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-rounded swal-success">UPDATE</button>
                        <?php echo anchor('Suplier', 'KEMBALI', array('class' =>"btn btn-danger btn-rounded")) ?>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <script type="text/javascript">
            function hanyaAngka(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }
            function hanyaAngka(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }

            function checkLetter()
            {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var namaKota = document.getElementById("nama");
                if (namaKota.value.match(validasiHuruf)) {
                } else {
                    swal("WAJIB HURUF", "TIDAK BISA DIMASUKAN ANGKA", "warning");
                }
            }
        </script>
