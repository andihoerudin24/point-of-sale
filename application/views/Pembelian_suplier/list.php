<body onload="load_data_tempt()"></body>
<div class="card border-info text-dark">
    <div class="card-heading border bottom tab-info bg-info">
        <h4 class="card-title">FORM PEMEBELIAN</h4>
    </div>
    <div class="card-block">
        <div class="mrg-top-1">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Suplier</label>
                                <?php echo cmb_dinamis('suplier', 'tbl_suplier', 'nama_suplier','id_suplier',NULL,'id="id_suplier"') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>tanggal</label>
                                <div class="timepicker-input input-group">
                                    <span class="input-group-addon">
                                        <i class="ti-calendar"></i>
                                    </span>
                                    <input type="date" value="<?php echo tanggal() ?>" readonly="" class="form-control datepicker-2" placeholder="" data-provide="datepicker">
                                </div>
                            </div>
                        </div>
                    </div>
                      

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>kd_barang</label>
                                <?php echo cmb_dinamis('kd_barang','tbl_barang','kd_barang','kd_barang',null,"id='kd_barang' onChange='isi_otomatis()'") ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_barnag" id="nama_barang" class="form-control" readonly=""  placeholder="masukan nama barang">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Satuan</label>
                                <input type="text" class="form-control" name="satuan" id="barang_satuan" readonly="" placeholder="sataun">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Harga Pokok</label>
                                <input type="number" id="harga_pokok" name="harga_pokok" readonly="" class="form-control"  placeholder="harga pokok">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="number" name="harga_jual" id="harga_jual" readonly="" class="form-control"  placeholder="harga jual">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control"  placeholder="jumlah pemebelian">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>NO FAKTUR</label>
                                <input type="text" name="no_faktur" id="no_faktur"  class="form-control" required=""  placeholder="Masukan no faktur">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Masukan Belanjaan</label>
                                <button type="submit" onclick="keranjang_belanja()"  name="submit" class="btn btn-primary btn-sm">BELANJA</button>
                           </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Selesai Belanja</label>
                                <button type="submit" id="submit" onclick="selesai()" class="btn btn-danger">SELESAI</button>
                           </div>
                        </div>
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 border-dark">
    <div class="card border-danger text-dark">
        <div class="card-block">
            <h4 class="card-title ">Data Belanjaan</h4>
            <p><code></code>Keranjang:</p>
            <div id="list"> 
           
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card border-success text-dark">
        <div class="card-block">
            <h4 class="card-title">Invoice</h4>
            <div id="cetak"> 
           
            </div>
        </div>
    </div>
</div>



<script src="<?php echo base_url() ?>assets/jquery.min.js"></script>
<script type="text/javascript">
    function selesai(){
       var id_suplier=$("#id_suplier").val();
       var jumlah=$("#jumlah").val();
       var kd_barang=$("#kd_barang").val();
        $.ajax({
             type: 'GET',
             url:  '<?php echo base_url() ?>index.php/Pembelian/selesai',
             data: 'id_suplier='+id_suplier+'&jumlah='+jumlah+'&kd_barang='+kd_barang,
             success: function (html) {
             swal("good job", "Sukses belanja", "success");
             cetak_laporan()
             load_data_tempt();
             }
           });   
    }
    
    function load_data_tempt(){
        $.ajax({
             type: 'GET',
             url:  '<?php echo base_url() ?>index.php/Pembelian/load_temp',
             data: '',
             success: function (html) {
               $("#list").html(html);
             }
           });
    }
    
    
    function cancel(id){
        $.ajax({
             type: 'GET',
             url:  '<?php echo base_url() ?>index.php/Pembelian/cancel',
             data: 'no_faktur='+id,
             success: function (html) {
              swal("good job", "Tidak jadi belanja", "success");   
               load_data_tempt()
             }
           });
    }
    
    
     function keranjang_belanja() {
            var no_faktur     = $("#no_faktur").val()
            var id_suplier    = $("#id_suplier").val()
            var kd_barang     = $("#kd_barang").val()
            var nama_barang   = $("#nama_barang").val()
            var barang_satuan = $("#barang_satuan").val()
            var harga_pokok   = $("#harga_pokok").val()
            var harga_jual    = $("#harga_jual").val()
            var jumlah        = $("#jumlah").val()
            if(no_faktur==''){
               swal("GAGAL", "Masukan No Faktur", "warning");
               die;
           }else if(id_suplier==''){
               swal("GAGAL", "Masukan Nama Suplier", "warning");
               die;
           }else if(kd_barang==''){
               swal("GAGAL", "Masukan kd barang", "info");
               die;
           }else if(nama_barang==''){
             swal("GAGAL", "Masukan Nama Barang", "info");
               
           }else if(barang_satuan==''){
                alert('masukan satuan barang')
           
           }else if(harga_pokok==''){
               alert('masukan harga')
           
           }else if(harga_jual==''){
               alert('masukan harga jual')
           
           }else if(jumlah==''){
               swal("GAGAL", "Masukkan Jumlah", "warning");
               
           }else{
             $.ajax({
             type: 'GET',
             url: '<?php echo base_url() ?>index.php/Pembelian/keranjang',
             data: 'kd_barang=' + kd_barang+'&nama_barang='+nama_barang+'&barang_satuan='+barang_satuan+'&harga_pokok='+harga_pokok+'&harga_jual='+harga_jual+'&jumlah='+jumlah+'&id_suplier='+id_suplier+'&no_faktur='+no_faktur,
             success: function (html) {
                  swal("good job", "Masuk Ke Keranjang belanja", "success");
                  load_data_tempt();
             }
           });  
           }
       }
       
      function cetak_laporan() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>index.php/pembelian/cetak',
            data: '',
            success: function (html) {
                $("#cetak").html(html);
                load_data_temp();
            }
        });
                                }
       
      function isi_otomatis() {
        var kd_barang = $("#kd_barang").val();
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>index.php/Pembelian/form_barang_autocomplit',
            data: 'kd_barang=' + kd_barang,
            success: function (data) {
                var json = data,
                   obj = JSON.parse(json);
                $("#nama_barang").val(obj.nama_barang);
                $("#barang_satuan").val(obj.barang_satuan);
                $("#harga_jual").val(obj.harga_jual);
                $("#harga_pokok").val(obj.harga_pokok);
            }
        });
    }
</script>
