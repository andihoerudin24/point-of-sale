<div class="row">
    <div class="col-md-6">
        <div id="accordion-1" class="accordion panel-group" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default border-dark">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a data-toggle="collapse"  data-parent="#accordion-1" href="#collapseOne"  aria-expanded="false" class="collapsed bg-dark text-light">
                            <span>Laporan Data Barang</span>
                            <i class="icon ti-arrow-circle-down"></i> 
                        </a>
                    </h4>
                </div>

                <div id="collapseOne" class="panel-collapse  collapse" style="">
                    <div class="panel-body card-block text-bold"  id="area-1">
                        <p>
                            <textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
                            <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
                        <table class="table table-responsive">
                            <a href="javascript:printDiv('area-1');" class="btn btn-success" id="print" onclick="printlayer('div-id-name')" >
                                <i class="ti-printer pdd-right-5"></i>
                                <span>Print</span>
                            </a>    
                            <?php
                            $urut = 0;
                            $nomor = 0;
                            $grup = '-';
                            foreach ($data as $d) {
                                if ($grup == '-' || $grup != $d['nama_kategori']) {
                                    $kat = $d['nama_kategori'];
                                    if ($grup != '-')
                                        echo "</table><br>";
                                    echo " <table class='table table-responsive '>";
                                    echo "<tr><td colspan='6'><b>kategori : $kat</b></td></tr>";
                                    echo "<tr>
                                            <th scope='col'>No</th>
                                            <th scope='col'>Kode Barang</th>
                                            <th scope='col'>Nama Barang</th>
                                            <th scope='col'>Satuan</th>
                                            <th scope='col'>Harga Jual</th>
                                            <th scope='col'>Stok</th>
                                    </tr>";
                                    $nomor = 1;
                                }
                                $grup = $d['nama_kategori'];
                                if ($urut == 500) {
                                    $nomor = 0;
                                    echo "<div class='pagebreak'> </div> ";
                                }
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $nomor ?></th>
                                    <td><?php echo $d['kd_barang'] ?></td>
                                    <td><?php echo $d['nama_barang'] ?></td>
                                    <td><?php echo $d['satuan'] ?></td>
                                    <td><?php echo $d['harga_jual'] ?></td>
                                    <td><?php echo $d['stok_barang'] ?></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </table>
                        </p>
                        <table class="table table-responsive" align="center" style="width: 800px; border: none; margin-top: 5px; margin-bottom: 20px;">
                            <tr>
                                <td></td>
                        </table>

                        <table class="table table-responsive" align="center" style="width: 800px; border: none; margin-top: 5px; margin-bottom: 20px;">
                            <tr>
                                <td alifn="right">Bogor, <?php echo tgl_indo(tanggal()) ?> </td>
                            </tr>
                            <tr>
                                <td alifn="right"></td>
                            </tr>
                            <tr>
                                <td align="right"></td>
                            </tr>


                            <tr>
                                <td align="left"><?php echo $this->session->userdata('nama_lengkap') ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>




            <div class="panel panel-default border-info">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed text-light bg-info" data-toggle="collapse" data-parent="#accordion-1" href="#collapseTwo" aria-expanded="false">
                            <span>Laporan Stock Barang</span> 
                            <i class="icon ti-arrow-circle-down"></i> 
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" style="">
                    <div class="panel-body">
                        <p>
                        <table class="table table-responsive">
                            <?php
                            $urut = 0;
                            $nomor = 0;
                            $grup = '-';
                            foreach ($data as $d) {
                                if ($grup == '-' || $grup != $d['nama_kategori']) {
                                    $kat = $d['nama_kategori'];
                                    if ($grup != '-')
                                        echo "</table><br>";
                                    echo " <table class='table table-responsive'>";
                                    echo "<tr><td colspan='6'><b>kategori : $kat</b></td></tr>";
                                    echo "<tr>
                                            <th scope='col'>No</th>
                                            <th scope='col'>Kode Barang</th>
                                            <th scope='col'>Nama Barang</th>
                                            <th scope='col'>Stok</th>
                                    </tr>";
                                    $nomor = 1;
                                }
                                $grup = $d['nama_kategori'];
                                if ($urut == 500) {
                                    $nomor = 0;
                                    echo "<div class='pagebreak'> </div> ";
                                }
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $nomor ?></th>
                                    <td><?php echo $d['kd_barang'] ?></td>
                                    <td><?php echo $d['nama_barang'] ?></td>
                                    <td><?php echo $d['stok_barang'] ?></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </table>
                        </p>
                        <table class="table table-responsive" align="center" style="width: 800px; border: none; margin-top: 5px; margin-bottom: 20px;">
                            <tr>
                                <td></td>
                        </table>

                        <table class="table table-responsive" align="center" style="width: 800px; border: none; margin-top: 5px; margin-bottom: 20px;">
                            <tr>
                                <td alifn="right">Bogor, <?php echo tgl_indo(tanggal()) ?> </td>
                            </tr>
                            <tr>
                                <td alifn="right"></td>
                            </tr>
                            <tr>
                                <td align="right"></td>
                            </tr>
                            <tr>
                                <td align="left"><?php echo $this->session->userdata('nama_lengkap') ?></td>
                            </tr>
                        </table> 
                        </p>
                    </div>
                </div>
            </div>




            <div class="panel panel-default border-success">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed text-light bg-success" data-toggle="collapse" data-parent="#accordion-1" href="#collapseThree" aria-expanded="false">
                            <span>Laba Rugi</span> 
                            <i class="icon ti-arrow-circle-down"></i> 
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="collapse panel-collapse" role="tabpanel">
                    <div class="panel-body">
                        <p>
                          Laba Rugi Belum Bisa Didapatkan Karna Laba Rugi Hanya Bisa Di Peroleh Dari Harga Jual Di Kurangi Harga Satuan 
                          Dari Situlah Akan Mendapatkan Keuntungan Per Unit Sementara Aplikasi Saya pada Saat Membangun Perancangan Itu Kurang Dan Masih Dalam Tahap Pembelajaran,
                          Kegagalan Ini di Sebabkan Karna Kurang Nya Bimbingan Secara Insten     
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div id="accordion-2" class="accordion panel-group" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default border-primary">
                <div class="panel-heading bg-danger text-light " role="tab" id="heading-2-One">
                    <h4 class="panel-title">
                        <a class="collapsed text-light" data-toggle="collapse" data-parent="#accordion-2" href="#collapse-2-One" aria-expanded="false">
                            <span>Laporan Penjualan Per tanggal</span>
                            <i class="icon ti-arrow-circle-down"></i> 
                        </a>
                    </h4>
                </div>
                <div id="collapse-2-One" class="panel-collapse collapse" style="">
                    <div class="panel-body card-block text-bold">


                        <p>
                        <table class="table table-responsive">
                            <tr><td >Masukan Tanggal</td><td><input type="number" name="search_text" id="search_text" class="form-control-sm" placeholder="contoh 18" aria-controls="dt-opt"></td></tr>
                        </table>
                        <p id="laporan">

                        </p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default border-warning">
                <div class="panel-heading text-light bg-warning" role="tab" id="heading-2-Two">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion-2" href="#collapse-2-Two" aria-expanded="false" class="collapsed">
                            <span>Laporan Penjulan Perbulan</span> 
                            <i class="icon ti-arrow-circle-down"></i> 
                        </a>
                    </h4>
                </div>
                <div id="collapse-2-Two" class="panel-collapse collapse" style="">
                    <div class="panel-body">
                        <p>
                        <table class="table-responsive">
                            <tr>
                                <td>Plihi Bulan</td>
                                <td><input type="number" name="bulan" id="lap_bulan"  class="form-control-sm" placeholder="contoh 02" aria-controls="dt-opt"></td>
                            </tr>
                            <hr>
                        </table>
                        <div id="bulan">

                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default border-success">
                <div class="panel-heading  bg-success " role="tab" id="heading-2-Three">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion-2" href="#collapse-2-Three" class="collapsed text-light" aria-expanded="false">
                            <span>Laporan Penjualan Per tahun</span> 
                            <i class="icon ti-arrow-circle-down"></i> 
                        </a>
                    </h4>
                </div>
                <div id="collapse-2-Three" class="collapse panel-collapse">
                    <div class="panel-body">
                        <p>
                        <table class="table-responsive">
                            <tr>
                                <td>masukan tahhun</td>
                                <td><input type="number" name="tahun" id="lap_tahun"  class="form-control-sm" placeholder="contoh 2018" aria-controls="dt-opt"></td>
                            </tr>
                            <hr>
                        </table>
                        <div id="tahun">

                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card border-primary">
    <div class="card-heading  bg-primary border bottom">
        <h4 class="card-title text-light">Laporan Jurnal Penjualan</h4>
    </div>
    <div class="card-block ti-arrow-circle-down text-bold">
        <table id="" class="table table-lg table-hover table-responsive  " role="grid" aria-describedby="">
            <thead class="theme-colors">
            <th>NO</th>
            <th>Ko Barang</th>
            <th>Tanggal Beli</th>
            <th>Harga Pokok</th>
            <th>Harga Jual</th>
            <th>Jumlah</th>
            </thead>
            <tbody>
                <?php
                $no = 1 + $this->uri->segment(3);
                foreach ($laporan as $row) {
                    echo "<tr>
                                <td>$no</td>
                                <td>$row->kd_barang</td>
                                <td>$row->tanggal_beli</td>
                                <td>$row->harga_pokok</td>
                                <td>$row->harga_jual</td>
                                <td>$row->total_beli</td>
                                
                         </tr>";
                    $no++;
                }
                ?>  
            </tbody>
        </table>
        <?php echo $pagination ?>
        <p>
        <hr>



        <div class="card border-primary">
            <div class="card-heading  bg-info border bottom">
                <h4 class="card-title text-light">Perhitungan Fifo</h4>
            </div>
            <div class="card-block ti-arrow-circle-down text-bold">
                <table id="" class="table table-lg table-hover table-responsive" role="grid" aria-describedby="">
                    <thead class="theme-colors">
                    <th>NO</th>
                    <th>Tanggal Beli</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($laba as $row) {
                            echo "<tr>
                                <td>$no</td>
                                <td>$row->tanggal_beli</td>
                                <td>$row->jumlah</td>
                                <td>$row->harga</td>
                         </tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
                <table class="table table-lg table-hover table-responsive border-info" role="grid" aria-describedby="">
                    <thead class="bg-success-inverse text-light">
                        <tr>
                            <th>Dilakukan Penjulan  Sekitar:</th>
                            <th class="left">
                                <?php
                                $lap=$this->db->query("SELECT sum(total_beli)as total FROM `v_laba`")->result();
                                foreach ($lap as $row){
                                 echo "$row->total Unit
                                       <p></p>
                                  <td><button type='button' onclick='fifo($row->total)' class='btn btn-info btn-rounded'>Hitung</button></td>";
                                }
                                ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="border-success text-dark">
                        <tr>
                            <td>Pertanyaan Berapakah Barang Yang Keluar Dari Gudang Berdasarka Penjualan Unit DI Atas ? Klik Button Untung Menghitung</td>
                            <td><p>Pertanyaan itu Muncul Karna Setiap Tanggal Pembelian Saya Memiliki Harga Yang Berbeda-Beda</p></td>
                        </tr>
                   </tbody>
                   <tbody><tr><td></td></tr></tbody>
                </table>
                <div id="fifohitung">
                    
                </div>

                
                
            </div>
                

        </div>                





<script src="<?php echo base_url() ?>assets/jquery.min.js"></script>
<script type="text/javascript">
                        $(document).ready(function () {

                                    load_data();

                                    function load_data(query)
                                    {
                                        $.ajax({
                                            url: "<?php echo base_url() ?>index.php/Laporan/tanggal",
                                            method: "POST",
                                            data: {query: query},
                                            success: function (data)
                                            {
                                                $('#laporan').html(data);
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

                                function load_data(query)
                                {
                                    $.ajax({
                                        url: "<?php echo base_url() ?>index.php/Laporan/perbulan",
                                        method: "POST",
                                        data: {query: query},
                                        success: function (data)
                                        {
                                            $('#bulan').html(data);
                                        }
                                    });
                                }
                                $('#lap_bulan').keyup(function () {
                                    var bulan = $(this).val();
                                    if (bulan != '')
                                    {
                                        load_data(bulan);
                                    } else
                                    {
                                        load_data();
                                    }
                                });


                                function load_data1(query)
                                {
                                    $.ajax({
                                        url: "<?php echo base_url() ?>index.php/Laporan/tahun",
                                        method: "POST",
                                        data: {query: query},
                                        success: function (data)
                                        {
                                            $('#tahun').html(data);
                                        }
                                    });
                                }
                                $('#lap_tahun').keyup(function () {
                                    var tahun = $(this).val();
                                    if (tahun != '')
                                    {
                                        load_data1(tahun);
                                    } else
                                    {
                                        load_data();
                                    }
                                });
                                
                                

                               function fifo(total){
                                    $.ajax({
                                        url: "<?php echo base_url() ?>index.php/Laporan/fifo",
                                        method: "GET",
                                        data:'total='+total,
                                        success: function(html) {
                                        swal("good job", "Perhitungsn Berhasil Silahkan Di Jelaskan", "success");
                                        $("#fifohitung").html(html);;
                                        }
                                    });

                               }

                                function printDiv(elementId) {
                                    var a = document.getElementById('printing-css').value;
                                    var b = document.getElementById(elementId).innerHTML;
                                    window.frames["print_frame"].document.title = document.title;
                                    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
                                    window.frames["print_frame"].window.focus();
                                    window.frames["print_frame"].window.print();
                                }

</script>