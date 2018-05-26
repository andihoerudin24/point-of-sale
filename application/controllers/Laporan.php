<?php

class Laporan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_laporan');
        $this->load->model('Model_pembelian_suplier');
        chek_akses_modul();
        chek_seesion();
    }

    function index() {
        $this->load->library('pagination');
        $config['base_url']           = site_url() . '/Laporan/index/';
        $config['total_rows']         = $this->db->count_all('v_laba');
        $config['per_page']           = 5;
        $config["uri_segment"]        = 3;
        $choice                       = $config["total_rows"] / $config["per_page"];
        $config["num_links"]          = floor($choice);
        //style paging
        $config['first_link']         = 'First';
        $config['last_link']          = 'Last';
        $config['next_link']          = 'Next';
        $config['prev_link']          = 'Prev';
        $config['full_tag_open']      = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']     = '</ul></nav></div>';
        $config['num_tag_open']       = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']      = '</span></li>';
        $config['cur_tag_open']       = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']      = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']      = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']    = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']      = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']    = '</span>Next</li>';
        $config['first_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close']   = '</span></li>';
        $config['last_tag_open']      = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']    = '</span></li>';
        $this->pagination->initialize($config);
        $barang['page']               = $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $barang['pagination']         = $this->pagination->create_links();
        $barang['laba']               = $this->Model_laporan->laporan()->result();
        $barang['laporan']            = $this->Model_laporan->tampil_laba($config['per_page'], $barang['page'])->result();
        $barang['data']               = $this->db->get('v_barang')->result_array();
        $this->template->load('template', 'laporan/list', $barang);
    }

    function tanggal() {
        $search = $this->input->post('query');
        if (isset($_POST["query"])) {
            $query = $this->db->query("SELECT * FROM `v_transaksi_laporan_penjualan` WHERE DATE_FORMAT(tanggal_beli,'%d')='$search'");
            if ($query->num_rows() > 0) {
                echo"<div class='table-overflow'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah Beli</th>
                            <th>Jumlah Uang</th>
                            <th>Uang Kembali</th>
                            <th>Total Beli</th>
                            <th>Total Belanja</th>
                        </tr>
                    </thead>";
                $total = 0;
                $no = 1;
                foreach ($query->result() as $row) {
                    echo "<tr>"
                    . "<td>$row->nama_barang</td>"
                    . "<td>$row->harga_jual</td>"
                    . "<td>$row->total_beli</td>"
                    . "<td>$row->jumlah_uang</td>"
                    . "<td>$row->uang_kembali</td>"
                    . "<td>$row->total_beli</td>"
                    . "<td>$row->total_belanja</td>"
                    . "</tr>";
                    $total = $total + ($row->harga_jual * $row->total_beli);
                }
                echo "</table>
                <table class='table'>
                <thead><tr><th>Sub Total(Rp)</th><td><input type='number' value=" . $total . " name='total' id='total_belanja' disabled></td><td>" . Terbilang($total) . "</td></tr></thead>
            </div>";
            } else {
                echo "Mohon Maaf TIdak ada Transaki Di Tanggal Yang Anda Pilih";
            }
        }
    }

    function perbulan() {
        $bulan = $this->input->post('query');
        if (isset($_POST["query"])) {
            $query =$this->db->query("SELECT * FROM `v_transaksi_laporan_penjualan` WHERE DATE_FORMAT(tanggal_beli,'%m')='$bulan'");
            if ($query->num_rows() > 0) {
                echo"<div class='table-overflow'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah Beli</th>
                            <th>Jumlah Uang</th>
                            <th>Uang Kembali</th>
                            <th>Total Beli</th>
                            <th>Total Belanja</th>
                        </tr>
                    </thead>";
                $total = 0;
                $no = 1;
                foreach ($query->result() as $row) {
                    echo "<tr>"
                    . "<td>$row->nama_barang</td>"
                    . "<td>$row->harga_jual</td>"
                    . "<td>$row->total_beli</td>"
                    . "<td>$row->jumlah_uang</td>"
                    . "<td>$row->uang_kembali</td>"
                    . "<td>$row->total_beli</td>"
                    . "<td>$row->total_belanja</td>"
                    . "</tr>";
                    $total = $total + ($row->harga_jual * $row->total_beli);
                }
                echo "</table>
                <table class='table'>
                <thead><tr><th>Sub Total(Rp)</th><td><input type='number' value=" . $total . " name='total' id='total_belanja' disabled></td><td>" . Terbilang($total) . "</td></tr></thead>
            </div>";
            } else {
                echo "Mohon Maaf TIdak ada Transaki Di Bulan Yang Anda Masukan";
            }
        }
    }

    function tahun() {
        $tahun = $this->input->post('query');
        if (isset($_POST["query"])) {
            $query = $this->db->query("SELECT * FROM `v_transaksi_laporan_penjualan` WHERE DATE_FORMAT(tanggal_beli,'%Y')='$tahun'");
            if ($query->num_rows() > 0) {
                echo"<div class='table-overflow'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah Beli</th>
                            <th>Jumlah Uang</th>
                            <th>Uang Kembali</th>
                            <th>Total Beli</th>
                            <th>Total Belanja</th>
                        </tr>
                    </thead>";
                $total = 0;
                $no = 1;
                foreach ($query->result() as $row) {
                    echo "<tr>"
                    . "<td>$row->nama_barang</td>"
                    . "<td>$row->harga_jual</td>"
                    . "<td>$row->total_beli</td>"
                    . "<td>$row->jumlah_uang</td>"
                    . "<td>$row->uang_kembali</td>"
                    . "<td>$row->total_beli</td>"
                    . "<td>$row->total_belanja</td>"
                    . "</tr>";
                    $total = $total + ($row->harga_jual * $row->total_beli);
                }
                echo "</table>
                <table class='table'>
                <thead><tr><th>Sub Total(Rp)</th><td><input type='number' value=" . $total . " name='total' id='total_belanja' disabled></td><td>" . Terbilang($total) . "</td></tr></thead>
            </div>";
            }else{
                echo "Mohon Maaf TIdak ada Transaki Di Tahun Yang Anda Masukan";
            }
        }
    }

    function fifo(){
        $total = $_GET['total'];
        echo "<table id='' class='table table-lg table-hover table-responsive' role='grid' aria-describedby=''>
                    <thead class='theme-colors'>
                    <th>NO</th>
                    <th>Tanggal Beli</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Fifo</th>
                    <th>Hpp (Harga Pokok)</th>
                    </thead>
              <tbody>";
        $no = 1;
        $data = $this->Model_laporan->laporan()->result();
        foreach ($data as $row) {
            $total=$total - $row->jumlah;
            $penjumlahan = $total * $row->harga;
            $keseluruhan=1162000+1320000+85000;
            echo "<tr>
                            <td>$no</td>
                            <td>$row->tanggal_beli</td>
                            <td>$row->jumlah</td>
                            <td>$row->harga</td>
                            <td>";
            if($total < 0) {
                echo "Stop</td>";
            } else {
                echo "$total</td>";
            }
            echo "<td>";
            if ($penjumlahan < 0) {
                echo "Stop</td>";
            }else{
                echo "$penjumlahan</td>";
            }
            echo"</tr>";
            $no++;
           //$keseluruhan=$keseluruhan+($total+$total);
        }
       echo "</tbody>
             </table>";
       $max_harga= $this->db->query("SELECT max(harga_jual) as harga FROM `v_laba`")->result();
       foreach ($max_harga as $val){
       $kasbang=200*$val->harga;
       echo "<tr><td>Sub Total Dari Keseluruhan Perhitungan Hpp Adalah :$keseluruhan </td><tr><p>";
       echo "<p><tr><td>Harga Per Unit    :$val->harga</td><tr></p>";
       echo "<p><tr><td>Penjualan Sekitar :200 Unit</td><tr></p>";
       echo "Kas Bank Yang Bisa Di Dapatakan Adalah : $kasbang <p>";
       echo "<hr>";
       echo "Sedikit Penjelasan Yah<p><br>";
       echo "Kasbang di dapatkan Akibat Adanya Penjualan Aset Bertambah Karna Ada Penjualan dan Penjualan Bertambah Dari Kredit<br><p>";
       echo "Nilai Hpp Adalah Barang Yang Keluar Dari Gudang Kita Sekitar: $keseluruhan Sehingga Nilai Ini Adalah Nilai Awal Pada Saat Saya Membeli Persediaan<br><p>";
       echo "Dari Sini Sudah Terlihat Ada Penjualan Sekitar: $kasbang<p>";
       echo "Dan Persedian Kita Adalah $keseluruhan<br><p>";
       $hasil=$kasbang-$keseluruhan;
       echo "Maka Didapatkan Ke Untungan : $hasil ". Terbilang($hasil)."<br><p>";
       echo "Aplikasi Ini Masih Dalam Tahap Pengembangan Untuk Metode Perhitungan, Pun Ini masih Jauh Dari Kata Sempurna Kegagalan Dalam Perhitungan<br>";
       echo "Karna Kurang Nya Pengalaman Dan Pengetahuan Salam Sukses";
       }
       
    }
}
?>