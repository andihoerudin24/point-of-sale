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
<div class="col-md-12">
    <div class="card border-info text-dark">
        <div class="card-block">
            <h4 class="card-title">Data Menu</h4>
            <p>The <code></code>Managemen Menu:</p>
            <button data-toggle="modal" data-target="#modal-lg" class="btn btn-sm btn-primary">TAMBAH MENU</button>
            <div class="table-overflow">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA MENU</th>
                            <th>LINK</th>
                            <th>ICON</th>
                            <th>IS MAIN MENU</th>
                            <th colspan="2">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($menu As $row) {
                            echo "<tr>
                                <td>$no</td>
                                <td>$row->nama_menu</td>
                                <td>$row->link</td>
                                 <td>$row->icon</td>
                                <td>$row->is_main_menu</td>
                                <td>" . anchor('Menu/edit/' . $row->id, 'Edit', array('class' => 'btn btn-info btn-rounded')) . "</td>
                                <td>" . anchor('Menu/Hapus/' . $row->id, '<i class="btn btn-warning btn-rounded swal-function">Hapus</i>') . "</td>
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
            echo form_open('Menu/add');
            ?>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal mrg-top-40 pdd-right-30">
                    <div class="form-group row">
                        <label for="form-1-1" class="col-md-2 control-label">Nama menu</label>
                        <div class="col-md-10">
                             <small class="text-normal">*Maximal 15</small>
                            <input type="text" id="nama" maxlength="15" class="form-control" onkeyup="checkLetter()" name="nama_menu" placeholder="Nama_menu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="form-1-2" class="col-md-2 control-label">Link</label>
                        <div class="col-md-10">
                             <small class="text-normal">*Maximal 15</small>
                             <input type="text" id="link" maxlength="15" onkeyup="check()" class="form-control" name="link" placeholder="link">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="form-1-2" class="col-md-2 control-label">Icon</label>
                        <div class="col-md-10">
                             <small class="text-normal">*Maximal 20</small>
                            <input type="text" class="form-control" maxlength="20" name="icon" placeholder="masukan nama icon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="form-1-3" class="col-md-2 control-label">
                            IS MAIN MENU
                        </label>
                        <div class="col-sm-10">
                            <select name="is_main_menu" class="form-control">
                                <option value="0">MAIN MENU</option>
                                <?php
                                $main = $this->db->get('tbl_menu');
                                foreach ($main->result() as $row) {
                                    echo "<option value='$row->id'>$row->nama_menu</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                <button type="submit" name="submit" onclick="tambah()" class="btn btn-primary">SIMPAN</button>
            </div>
        </div>
        </form>

        <script type="text/javascript">
            function checkLetter()
            {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var namaKota = document.getElementById("nama");
                if (namaKota.value.match(validasiHuruf)) {
                } else {
                    swal("WAJIB HURUF", "TIDAK BISA DIMASUKAN ANGKA", "warning");
                }
            }
            
            function check()
            {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var link = document.getElementById("link");
                if (link.value.match(validasiHuruf)) {
                } else {
                    swal("WAJIB HURUF", "TIDAK BISA DIMASUKAN ANGKA", "warning");
                }
            }
        </script>
        <!-- END MENU TAMBAH -->











