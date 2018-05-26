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
<div class="card border-info text-dark">
    <div class="card-heading border bottom bg-info">
        <h4 class="card-title">Form Edit Menu</h4>
    </div>
    <div class="card-block border-warning">
        <div class="card-block">
            <div class="row border-warning">
                <div class="col-md-8 ml-auto mr-auto">
                    <?php
                    echo form_open('Menu/edit');
                    echo form_hidden('id', $edit['id']);
                    ?>
                    <form role="form" id="form-validation" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama menu<small class="text-normal">*Maximal 15 characters</small></label>
                                    <input type="text" id="nama" value="<?php echo $edit['nama_menu'] ?>" onkeyup="checkLetter()" class="form-control" name="nama_menu" placeholder="nama menu" required="" maxlength="15" aria-required="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Link<small class="text-normal">*Maximal 15 characters</small></label>
                                    <input type="text" id="link" value="<?php echo $edit['link'] ?>" onkeyup="check()"  maxlength="15" class="form-control" name="link" placeholder="Enter a valid email format" required="" aria-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Icon<small class="text-normal">*Maximal 15 characters</small></label>
                                    <input type="text" maxlength="15" value="<?php echo $edit['icon'] ?>" class="form-control" name="icon" required="" aria-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <select name="is_main_menu" class="form-group form-control">
                                    <option value="0">MAIN MENU</option>
                                    <?php
                                    $menu = $this->db->get('tbl_menu');
                                    foreach ($menu->result() as $row) {
                                        echo "<option value='$row->id'";

                                        echo $row->id == $edit['is_main_menu'] ? 'selected' : '';

                                        echo ">$row->nama_menu</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-rounded swal-success">UPDATE</button>
                        <?php echo anchor('Menu', 'KEMBALI', array('class' =>"btn btn-danger btn-rounded")) ?>
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
