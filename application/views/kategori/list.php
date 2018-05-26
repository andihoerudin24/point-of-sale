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
    <div class="card border-info text-dark">
        <div class="card-block">
            <h4 class="card-title">Data Kategori</h4>
            <p>The <code></code>Managemen Kategori:</p>
            <table>

            </table>
            <button data-toggle="modal" data-target="#modal-lg" class="btn btn-sm btn-primary">TAMBAH kKATEGORI</button>
            <input type="text" onkeyup="pencarian()"  placeholder="Cari kategori" id="cari" class="form-control-sm">

            <div class="table-overflow border-dark">

                <div id="pencarian"  class="thead-primary">

                </div>

            </div>
        </div>
    </div>
</div>
<!-- MENU TAMBAH -->
<div class="modal fade" id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="form-1-2" class="col-md-2 control-label">NAMA KATEGORI<small class="text-normal">*Maximal 15 characters</small></label>
                    <div class="col-md-10">
                        <input type="text" id="nama_kategori" onkeyup="checkLetter()" class="form-control" name="nama_kategori" placeholder="nama_kategori" required="" maxlength="15">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">SELESAI</button>
                <button type="submit" name="submit" onclick="tambah()" class="btn btn-primary">SIMPAN</button>
            </div>
        </div>
    </div>


    <!-- END MENU TAMBAH -->
    <script src="<?php echo base_url() ?>assets/jquery.min.js"></script>
    <script>
                    $(document).ready(function () {
                        pencarian()
                    });
    </script>
    <script type="text/javascript">
        function tambah() {
            var nama_kategori = $("#nama_kategori").val()
            if (nama_kategori == '') {
                swal("EROR", "Nama Ketegori Hrus Disi", "warning");
            } else {

                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url() ?>index.php/Kategori/add',
                    data: 'nama_kategori=' + nama_kategori,
                    success: function (html) {
                        swal("good job", "kategori berhasil di tambah", "success");
                        pencarian();
                    }
                });
            }
        }
        function pencarian() {
            var cari = $("#cari").val();
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>index.php/Kategori/keyword',
                data: 'cari=' + cari,
                success: function (html) {
                    $("#pencarian").html(html)

                }
            });
        }
        
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










