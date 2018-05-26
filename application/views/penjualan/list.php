
<div class="card border-success text-dark">
    <div class="card-heading border bottom bg-info">
        <h4 class="card-title">TRANSAKSI PENJUALAN</h4>
    </div>
    <div class="mrg-top-1">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>kd_barang</label>
                            <input type="text" name="kd_barang" id="kd_barang" onkeyup="isi_otomatis()" class="form-control"   placeholder="KD BARANG">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" readonly=""  placeholder="masukan nama barang">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" class="form-control" name="satuan" id="satuan" readonly="" placeholder="sataun">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>STOCK</label>
                            <input type="number" id="stok" name="stok" readonly="" class="form-control"  placeholder="harga pokok">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Harga Rp</label>
                            <input type="number" name="harga" id="harga_jual" readonly="" class="form-control"  placeholder="harga jual">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" value="1" disabled="" class="form-control"  placeholder="jumlah pemebelian">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Masukan Belanjaan</label>
                            <button type="submit" onclick="keranjang_belanja()" onkeyup="keranjang()"  name="submit" class="btn btn-primary btn-sm">BELANJA</button>
                        </div>
                    </div>
                </div>       
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card border-info text-dark">
        <div class="card-heading border bottom bg-info">
            <h4 class="card-title">TRANSAKSI PENJUALAN</h4>
        </div>

        <div id="list"> 

        </div>
    </div>
</div>



<div class="col-md-12">
    <div class="card border-dark text-dark">
        <div class="card-heading border bottom bg-info">
            <h4 class="card-title">INVOICE</h4>
        </div>
        <div id="cetak"> 

        </div>


    </div>
</div>



<script src="<?php echo base_url() ?>assets/jquery.min.js"></script>
<script type="text/javascript">
    
                                function cancel(id) {
                                    $.ajax({
                                        type: 'GET',
                                        url: '<?php echo base_url() ?>index.php/Penjualan/cancel',
                                        data: 'id=' + id,
                                        success: function (html) {
                                            swal("good job", "Berhasil di batalkan", "success");
                                            load_data_temp();
                                        }
                                    });
                                }

                                function load_data_temp() {
                                    $.ajax({
                                        type: 'GET',
                                        url: '<?php echo base_url() ?>index.php/Penjualan/load_temp',
                                        data: '',
                                        success: function (html) {
                                            $("#list").html(html);
                                        }
                                    });
                                }

                                function keranjang_belanja() {
                                    // var no_faktur = $("#no_faktur").val();
                                    var kd_barang = $("#kd_barang").val();
                                    var nama_barang = $("#nama_barang").val();
                                    var satuan = $("#satuan").val();
                                    var stok = $("#stok").val();
                                    var harga_jual = $("#harga_jual").val();
                                    var jumlah = $("#jumlah").val();
                                    if (kd_barang == 0) {
                                        swal("Masukan Kode Barang", "GAGAL", "warning");

                                    } else if (nama_barang == 0) {
                                        swal("Kode Barang Salah", "Anda Tidak Mempunyai Kode Barang Seperti Yang Anda Masukan", "warning");

                                    } else if (jumlah == 0) {
                                        swal("GAGAL", "Masukan Jumlah", "warning");

                                    }else if (jumlah >=stok) {
                                        swal("GAGAL", "Jumlah yang anda masukan melebihi stok anda", "warning");

                                    }else{
                                        $.ajax({
                                            type: 'GET',
                                            url: '<?php echo base_url() ?>index.php/Penjualan/keranjang',
                                            data: 'kd_barang=' + kd_barang + '&nama_barang=' + nama_barang + '&satuan=' + satuan + '&stok=' + stok + '&harga_jual=' + harga_jual + '&jumlah=' + jumlah,
                                            success: function (html) {
                                                swal("good job", "Masuk Ke Keranjang belanja", "success");
                                                load_data_temp();
                                            }
                                        });
                                    }
                                }


                                function isi_otomatis() {
                                    var kd_barang = $("#kd_barang").val();
                                    $.ajax({
                                        url: "<?php echo base_url() ?>index.php/Penjualan/form_penjualan_autocomplit",
                                        type: "GET",
                                        data: "kd_barang=" + kd_barang,
                                        success: function (data) {
                                            var json = data,
                                                    obj = JSON.parse(json);
                                            $("#nama_barang").val(obj.nama_barang);
                                            $("#satuan").val(obj.satuan);
                                            $("#stok").val(obj.stok_barang);
                                            $("#harga_jual").val(obj.harga_jual);

                                        }
                                    });
                                }


                                function jumlah_uang() {
                                    var total_belanja = $("#total_belanja").val();
                                    var jumlah_uang = $("#jumlah_uang").val();
                                    $.ajax({
                                        url: '<?php echo base_url() ?>index.php/Penjualan/kembalian',
                                        type: 'GET',
                                        data: 'total_belanja=' + total_belanja + '&jumlah_uang=' + jumlah_uang + '&kembalian',
                                        success: function (data) {
                                            var json = data,
                                                    obj = JSON.parse(json);
                                            $("#kembalian").val(obj.hasil);
                                            $("#Terbilang").val(obj.Terbilang);
                                            $("#Terbilang2").val(obj.Terbilang2);
                                        }
                                    });
                                }

                                function selesai() {
                                    var kd_barang = $("#kd_barang").val();
                                    var jumlah = $("#jumlah").val();
                                    var satuan = $("#satuan").val();
                                    var total_belanja = $("#total_belanja").val();
                                    var jumlah_uang = $("#jumlah_uang").val();
                                    var kembalian = $("#kembalian").val();
                                    if (total_belanja == 0) {
                                        swal("Eror", "Print terlebih dahulu invoice", "Eror");

                                    } else if (jumlah_uang == 0) {
                                        swal("Bayar Dulu", "Masukan Jumlah Uang", "Info");

                                    } else if (jumlah_uang <= total_belanja) {
                                        swal("Kurang", "Uang Yang Anda Masukan Kurang", "Warning");


                                    } else {
                                        $.ajax({
                                            type: 'GET',
                                            url: '<?php echo base_url() ?>index.php/Penjualan/selesai',
                                            data: 'total_belanja=' + total_belanja + '&jumlah_uang=' + jumlah_uang + '&kembalian=' + kembalian + '&satuan=' + satuan + '&jumlah=' + jumlah + '&kd_barang=' + kd_barang,
                                            success: function (html) {
                                                swal("good job", "Selesai belanja Lihat invoice", "success");
                                                cetak_laporan()

                                            }
                                        });

                                    }
                                }


                                function cetak_laporan() {
                                    $.ajax({
                                        type: 'GET',
                                        url: '<?php echo base_url() ?>index.php/Penjualan/cetak',
                                        data: '',
                                        success: function (html) {
                                            $("#cetak").html(html);
                                            load_data_temp();
                                        }
                                    });
                                }
</script>
