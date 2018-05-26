<?php
if ($this->session->flashdata('message')) {
    echo "<div class='alert alert-success'>";
    echo $this->session->flashdata('message');
    echo "</div>";
} elseif ($this->session->flashdata('pesan')){
    echo "<div class='alert alert-danger'>";
    echo $this->session->flashdata('pesan');
    echo "</div>";
}
?>
<div class="col-md-12">
    <div class="card border-primary text-dark">
        <div class="card-block">
            <h4 class="card-title">Data Suplier</h4>
            <p>The <code></code>Managemen Suplier:</p>
            <button data-toggle="modal" data-target="#modal-lg" class="btn btn-sm btn-primary">TAMBAH Suplier</button>
            <div class="table-overflow">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA SUPlIER</th>
                            <th>ALAMAT</th>
                            <th>NO TELPON</th>
                            <th>KETERANGAN</th>
                            <th colspan="2" width="50">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($suplier as $row) {
                            echo "<tr>
                          <td>$no</td>
                          <td>$row->nama_suplier</td>
                          <td>$row->alamat</td>
                          <td>$row->No_telpon</td>
                          <td>$row->keterangan</td>   
                          <td>" . anchor('Suplier/edit/' . $row->id_suplier, 'Edit', array('class' => 'btn btn-info btn-rounded')) . "</td>
                          <td>" . anchor('Suplier/Hapus/' . $row->id_suplier, '<i class="btn btn-warning btn-rounded swal-function">Hapus</i>') . "</td>
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
<!-- MENU TAMBAH -->
<div class="modal fade" id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php
            echo form_open('Suplier/add', 'id="form-validation" novalidate="novalidate"');
            ?>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah suplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal mrg-top-40 pdd-right-30">
                    <div class="form-group row">
                        <label for="form-1-1" class="col-md-2 control-label">Nama suplier</label>
                        <div class="col-md-10">
                            <small class="text-normal">*Maximal 25 characters</small>
                            <input type="text" id="nama" onkeyup="checkLetter()" class="form-control" maxlength=25" name="nama_suplier" placeholder="Nama_suplier">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="form-1-2" class="col-md-2 control-label">Alamat</label>
                        <div class="col-md-10">
                            <small class="text-normal">*Maximal 35 characters</small>
                            <input type="text"  class="form-control" name="alamat" maxlength="35" placeholder="alamat suplier">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="form-1-2" class="col-md-2 control-label">No telpon</label>
                        <div class="col-md-10">
                            <small class="text-normal">*Maximal 13 characters</small>
                            <input type="text" maxlength="13" onkeypress="return hanyaAngka(event)" class="form-control" name="no_telpon" placeholder="masukan nomor telpon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="form-1-2" class="col-md-2 control-label">Keterangan</label>
                        <div class="col-md-10">
                            <small class="text-normal">*Maximal 50 characters</small>
                            <textarea class="form form-control" maxlength="90" type="text" name="keterangan" placeholder="Keterangan Contoh Belanja barang A di suplier ini">
                            </textarea>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                <button type="submit" name="submit" onclick="tambah()" class="btn btn-primary">SIMPAN</button>
            </div>
        </div>
        </form>
        <!-- END MENU TAMBAH -->
        <script type="text/javascript">
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










