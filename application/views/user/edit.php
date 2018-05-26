<div class="card">
    <div class="card-heading border bottom">
        <h4 class="card-title">Form Edit User</h4>
    </div>
    <div class="card-block">
        <div class="card-block">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <?php
                    echo form_open('User/edit');
                    echo form_hidden('id_user', $user['id_user']);
                    ?>
                    <form role="form" id="form-validation" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lengkap <small class="text-normal">*Maximal 15 characters</small></label>
                                    <input type="text" value="<?php echo $user['nama_lengkap'] ?>" onkeyup="checkLetter()" id="nama" class="form-control" name="nama_lengkap" placeholder="nama lengkap" required="" maxlength="15" aria-required="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username<small class="text-normal">*Minimum 15 characters</small></label>
                                    <input type="text" value="<?php echo $user['username'] ?>" class="form-control" name="username" placeholder="username" maxlength="15" required="" aria-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password<small class="text-normal">*Minimum 15 characters</small></label>
                                    <input type="password" value="<?php echo $user['password'] ?>" maxlength="15" class="form-control" name="password" required="" aria-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Level User</label>
                                    <?php echo cmb_dinamis('level', 'tbl_level_user', 'nama_level', 'id_level_user', $user['id_level_user']) ?> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="userfile"><br>
                                    <img src="<?php echo base_url() . 'uploads/', $user['foto'] ?>" width="100">
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-rounded">UPDATE</button>
                        <?php echo anchor('User', 'KEMBALI', array('class' => "btn btn-danger btn-rounded")) ?>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  function checkLetter()
    {
        var validasiHuruf = /^[a-zA-Z ]+$/;
        var nama = document.getElementById("nama");
        if (nama.value.match(validasiHuruf)) {
        } else {
            swal("WAJIB HURUF", "TIDAK BISA DIMASUKAN ANGKA", "warning");
        }
    }
</script>