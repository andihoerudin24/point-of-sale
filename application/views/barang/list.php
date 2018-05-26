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
<div class="card border-info text-dark">
    <div class="card-block">
        <button data-toggle="modal" data-target="#modal-lg" class="btn btn-sm btn-danger">TAMBAH BARANG</button>
        <?php echo anchor('Dokumentasi', 'KEMBALI', array('class' => "btn btn-danger btn-rounded")) ?>
        <button type="button" class="btn btn-primary right" data-toggle="modal" data-target="#exampleModalLong">
            upload barang file excel
        </button>

        <div class="table-responsive">
            <div id="dt-opt_wrapper" class="dataTables_wrapper no-footer">
                <div class="dataTables_length" id="dt-opt_length">
                    <label>Show 
                        <select name="dt-opt_length" aria-controls="dt-opt" class="">
                            <option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div>
                <div id="dt-opt_filter" class="dataTables_filter"><label>Search:
                        <input type="type=" name="search_text" id="search_text" class="form-control-sm" placeholder="" aria-controls="dt-opt"></label>
                </div>
                <table id="" class="table table-lg table-hover table-responsive  " role="grid" aria-describedby="">
                    <thead class="theme-colors">
                    <th>NO</th>
                    <th>KODE BARANG</th>
                    <th>NAMA BARANG</th>
                    <th>KATEGORI BARANG</th>
                    <th>BARANG SATUAN</th>
                    <th>HARGA POKOK</th>
                    <th>HARGA JUAL</th>
                    <th>STOK BARANG</th>
                    <th>STOK MINIMAL</th>
                    <th>QR CODE</th>
                    <th colspan="2">AKSI</th>
                    </thead>
                    <tbody>
                    <div id="result">

                    </div>

                    <tr role="row" class="odd">
                        <?php
                        $no = 1 + $this->uri->segment(3);
                        foreach ($barang as $row) {
                            echo "<tr>
                                <td>$no</td>
                                <td>$row->kd_barang</td>
                                <td>$row->nama_barang</td>
                                <td>$row->nama_kategori</td>
                                <td>$row->satuan</td>
                                <td>$row->harga_pokok</td>
                                <td>$row->harga_jual</td>
                                <td>$row->stok_barang</td>
                                <td>$row->stok_minimal</td>
                                <td><img src='".base_url()."assets/images/$row->kd_barang.png' width='50px'></td>
                                <td>" . anchor('Barang/edit/'.$row->kd_barang,'Edit',array('class'=>'btn btn-info btn-rounded')) . "</td>
                                <td>" . anchor('Barang/Hapus/'.$row->kd_barang,'<i class="btn btn-warning btn-rounded swal-function">Hapus</i>') . "</td>
                             </tr>";
                            $no++;
                        }
                        ?>      

                    </tr>
                     
                    </tbody>
                </table>

            </div>
        </div>

        <?php echo $pagination; ?>
    </div>
</div>




<div class="modal fade col-md-12 card-block border-info" id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card-heading border bottom border-info">
                <h4 class="card-title">Form Data Barang</h4>
            </div>
            <div class="card-block border-info">
                <div class="card-block border-info">
                    <div class="row">
                        <div class="col-md-12 ml-auto mr-auto">

                            <?php echo form_open('Barang', 'role="form" id="form-validation" novalidate="novalidate"') ?>            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <small class="text-normal">*Maximal 15</small>
                                        <input type="text" class="form-control" id="nama" onkeyup="checkLetter()" required="" id="nama_barang" name="nama_barang"  maxlength="15" placeholder="Nama Barang...." >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Minimal Stok</label>
                                        <input type="text" required="" onkeypress="return hanyaAngka(event)" id class="minal_stok form-control" maxlength="2"  name="minimal_stok" placeholder="minimal Stok"  aria-required="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Harga pokok</label>
                                    <input type="text" id="harga_pokok" onkeypress="return hanyaAngka(event)" maxlength=10 class="harpok form-control" name="harga_pokok" placeholder="Harga poko Rp..">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Harga Jual</label>
                                    <input type="text" required="" onkeypress="return hanyaAngka(event)" maxlength=10 id="harga_jual" class="harga_jual form-control" name="harga_jual" placeholder="Harga jual Rp...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stok Barang</label>
                                    <input type="text" id="stok_barang" onkeypress="return hanyaAngka(event)" maxlength=10 class="stok_barang form-control" name="stok_barang" placeholder="Stok barang" required="" minlength="8" aria-required="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori Barang</label>
                                    <?php echo cmb_dinamis('kategori', 'tbl_kategori', 'nama_kategori', 'id_kategori', null, "id='kategori' "); ?>
                                </div>
                            </div>
                        </div>     
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Barang Satuan</label>
                                <?php echo cmb_dinamis('Satuan', 'tbl_satuan', 'satuan', 'id_satuan', null, "id='barang_satuan'"); ?>
                            </div>
                        </div>
                    </div> 
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog border-warning" role="document">
        <div class="modal-content border-warning ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Upload Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('Barang/excel', 'role="form" id="form-validation" novalidate="novalidate"') ?>  
            <div class="modal-body border-warning">
                <table class="table-responsive border-warning">
                    <tr>
                        <td>Pilih kategori</td>       
                        <td><?php echo cmb_dinamis('kategori', 'tbl_kategori', 'nama_kategori', 'id_kategori', null, "id='kategori' "); ?></td>
                    </tr>
                    <tr>
                        <td>Barang Satuan</td>       
                        <td><?php echo cmb_dinamis('satuan', 'tbl_satuan', 'satuan', 'id_satuan', null, "id='barang_satuan'"); ?></td>
                    </tr>
                    <tr>
                        <td>Maukan File Excel</td>
                        <td> 
                            <input name="userfile" id="form-field-1" class="form-control-sm" type="file">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php form_close(); ?>   
        </div>
    </div>
</div>





<script src="<?php echo base_url() ?>assets/jquery.min.js"></script>


<script>
                                        $(document).ready(function () {

                                            load_data();

                                            function load_data(query)
                                            {
                                                $.ajax({
                                                    url: "<?php echo base_url() ?>index.php/Barang/cari",
                                                    method: "POST",
                                                    data: {query: query},
                                                    success: function (data)
                                                    {
                                                        $('#result').html(data);
                                                    }
                                                });
                                            }
                                            $('#search_text').keyup(function () {
                                                var search = $(this).val();
                                                if (search != '')
                                                {
                                                    load_data(search);
                                                } else
                                                {
                                                    load_data();
                                                }
                                            });
                                        });

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
