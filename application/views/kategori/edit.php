<div class="col-md-8 ml-auto mr-auto">
    <div class="card border-success text-dark">
        <div class="card-heading border bottom">
            <h4 class="card-title">Form Edit Kategori</h4>
        </div>
        <div class="card-block">
            <div class="card-block">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <?php
                        echo form_open('Kategori/edit');
                        echo form_hidden('id_kategori', $edit['id_kategori']);
                        ?>
                        <form role="form" id="form-validation" novalidate="novalidate">
                            <div class="row border-dark">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Nama kaetgori <small class="text-normal">*Maximal 15 characters</small></label>
                                        <input type="text" value="<?php echo $edit['nama_kategori'] ?>" onkeyup="checkLetter()" id="nama_kategori" class="form-control" name="nama_kategori" placeholder="nama kategori" required="" maxlength="15" aria-required="true">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-rounded swal-success">UPDATE</button>
                            <?php echo anchor('Kategori', 'KEMBALI', array('class' => "btn btn-danger btn-rounded")) ?>
                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function checkLetter()
    {
        var validasiHuruf = /^[a-zA-Z ]+$/;
        var nama_kategori = document.getElementById("nama_kategori");
        if (nama_kategori.value.match(validasiHuruf)) {
        } else {
            swal("WAJIB HURUF", "TIDAK BISA DIMASUKAN ANGKA", "warning");
        }
    }

</script>