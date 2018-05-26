<?php
if ($this->session->flashdata('message')) {
    echo "<div class='alert alert-success'>";
    echo $this->session->flashdata('message');
    echo "</div>";
} elseif ($this->session->flashdata('pesan')) {
    echo "<div class='alert alert-danger'>";
    echo $this->session->flashdata('pesan');
    echo "</div>";
}
?>
<div class="col-md-12">
    <div class="card border-success text-dark">
        <div class="card-block">
            <h4 class="card-title">Pengguna Sistem</h4>
            <p><code></code>Data Pengguna Sistem:</p>
            <?php echo anchor('User/rule', 'RULE USER', array('class' => 'btn btn-sm btn-info btn-rounded')) ?>
            <div class="float-right"><button data-toggle="modal" data-target="#modal-lg" class="btn btn-sm btn-rounded btn-primary">TAMBAH USER</button></div>
            <div style="clear: both"></div>
            <div class="table-overflow">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama lengkap</th>
                            <th>Level</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($User->result() as $row) {
                            echo "<tr>
                                <td>$no</td>
                                <td><img src='" . base_url() . "uploads/$row->foto' width='40px' ></td>
                                <td>$row->nama_lengkap</td>
                                <td>$row->nama_level</td>
                                <td>" . anchor('User/edit/' . $row->id_user, 'Edit', array('class' => 'btn btn-info btn-rounded')) . "</td>
                                <td>" . anchor('User/Hapus/' . $row->id_user, '<i class="btn btn-warning btn-rounded" onclick="hapus()">Hapus</i>') . "</td>
                             </tr>";
                            $no++;
                        }
                        ?>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- START USER TAMBAH -->

<div class="modal fade" id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Penggua</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open_multipart('User/add') ?>            
                <form class="form-horizontal mrg-top-40 pdd-right-30">
                    <div class="form-group row">
                        <label for="form-1-1" class="col-md-2 control-label">Nama Lengkap</label>
                        <div class="col-md-10">
                            <small class="text-normal">*Maximal 15</small>
                            <input type="text" id="nama" onkeyup="checkLetter()" class="form-control" name="nama_lengkap" maxlength="15" placeholder="Nama lengkap">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="form-1-2"  class="col-md-2 control-label">Username</label>
                        <div class="col-md-10">
                            <small class="text-normal">*Maximal 15</small>
                            <input type="text" id="username" class="form-control" name="username" maxlength="15" placeholder="masukan username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="form-1-2" class="col-md-2 control-label">Password</label>
                        <div class="col-md-10">
                            <small class="text-normal">*Maximal 15</small>
                            <input type="password" id="password" class="form-control" maxlength="15" name="password" placeholder="masukan password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="form-1-2" class="col-md-2 control-label">foto</label>
                        <div class="col-md-10">
                            <input type="file" id="foto" class="form-control" name="userfile" placeholder="Masukan foto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="form-1-3" class="col-md-2 control-label">
                            Nama Level User
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo cmb_dinamis('level', 'tbl_level_user', 'nama_level', 'id_level_user', NULL, 'id="level"')
                            ?>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                <button type="submit" name="submit" onclick="tambah()" class="btn btn-success">SIMPAN</button>
            </div>
        </div>
        </form>
        <script type="text/javascript">
            function hapus() {
                swal("Ok", "Data Berhasil Di Hapus", "success")
            }

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

        <!-- END USER TAMBAH -->

