<?php
class Penjualan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_penjualan');
        chek_akses_modul();
        chek_seesion();
    }

    function index() {
        $this->template->load('template', 'penjualan/list');
    }
    

    function form_penjualan_autocomplit() {
        $kd_barang = $_GET['kd_barang'];
        //$sql_barang = "SELECT tb.nama_barang,ts.satuan,tb.harga_jual,tb.stok_barang FROM tbl_barang as tb, tbl_satuan as ts where tb.barang_satuan=ts.id_satuan and kd_barang='$kd_barang' ";
        $sql_barang = "SELECT * FROM `v_barang` WHERE kd_barang='$kd_barang' ";
        $barang = $this->db->query($sql_barang)->row_array();
        $data = array(
            'nama_barang' => $barang['nama_barang'],
            'satuan'      => $barang['satuan'],
            'stok_barang' => $barang['stok_barang'],
            'harga_jual'  => $barang['harga_jual'],
        );
        echo json_encode($data);
    }

    function keranjang() {
        $jumlah    = $_GET['jumlah'];
        $kd_barang = $_GET['kd_barang'];
        $chek      = $this->db->get_where('v_transaksi', array('kd_barang' => $kd_barang));
        if ($chek->num_rows()>0) {
           $sql="update v_transaksi set total_beli=total_beli+$jumlah where kd_barang='$kd_barang' ";
           $this->db->query($sql);
        }
        else{
            $id = $this->Model_penjualan->insert($jumlah);
            $data = array(
                'kd_barang' => $kd_barang,
                'no_faktur' => $id,
            );
            $this->db->insert('transaksi_pembelian', $data);
        }
    }

    function load_temp() {
        echo "<div class='table-overflow table-responsive'>
                    <table class='table table-responsive'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>KD BARANG</th>
                                <th>NAMA BARANG</th>
                                <th>SATUAN</th>
                                <th>HARGA</th>
                                <th>JUMLAH BELI</th>
                                <th>TOTAL BELANJA</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>";
        $data = $this->Model_penjualan->show_temp()->result();
        $no = 1;
        $total = 0;
        foreach ($data as $d) {
            echo "<tr>"
            . "<td>$no</td>"
            . "<td>$d->kd_barang</td>"
            . "<td>$d->nama_barang</td>"
            . "<td>$d->Satuan</td>"
            . "<td>$d->harga_jual</td>"
            . "<td>$d->total_beli</td>"
            . "<td>".$d->harga_jual * $d->total_beli."</td>"
            . "<td><button type='submit'onclick='cancel($d->id_transaksi)' class='btn btn-danger btn-rounded btn-sm'>Cancel</button></td>"
            . "</tr>";
            $total = $total + ($d->harga_jual * $d->total_beli);
            $no++;
        }
     echo "</table>
             </div>";
        echo "<div class='table'>
             <table class='table'>
                      <thead><tr><th>Sub Total(Rp)</th><td><input type='number' value=" . $total . " name='total' id='total_belanja' disabled></td><td>" . Terbilang($total) . "</td></tr></thead>
                      <thead><tr><th>Jumlah Uang Rp</th><td><input type='number' onkeyup='jumlah_uang()' name='jumlah' id='jumlah_uang'></td><td><input type='text' id='Terbilang2' class='form-control'><td></tr></thead>
                      <thead><tr><th>Kembalian Rp</th><td><input type='number' name='kembalian' id='kembalian' disabled></td><td><input type='text' id='Terbilang' class='form-control'><td></tr></thead>
                      <thead><tr><td><button type='submit' id='submit' onclick='selesai()'  class='btn btn-info btn-rounded btn-sm'>SELESAI</button></td></tr></thead>
              </table>
              
         </div>";
    }

    function cancel() {
        $id = $_GET['id'];
        $this->db->where('id_transaksi', $id);
        $this->db->delete('transaksi_pembelian');
        
    }

    function kembalian() {
        $a = $_GET['jumlah_uang'];
        $b = $_GET['total_belanja'];
        $c = $a - $b;
        $data = array(
            'jumlah' => $a,
            'total_belanja' => $b,
            'hasil' => $c,
            'Terbilang' => Terbilang($c),
            'Terbilang2' => Terbilang($a),
        );
        echo json_encode($data);
    }

    function selesai() {
        $kd_barang=$_GET['kd_barang'];
        $jumlah   =$_GET['jumlah'];
        $satuan   = $_GET['satuan'];
        $jumlah_uang = $_GET['jumlah_uang'];
        $kembalian   = $_GET['kembalian'];
        $total_belanja = $_GET['total_belanja'];
        $query = "update transaksi_pembelian set status=1,jumlah_uang=$jumlah_uang,total_belanja=$total_belanja,uang_kembali=$kembalian where detail=0";
        $this->db->query($query);
        $this->db->query("update v_barang set stok_barang=stok_barang-$jumlah where kd_barang='$kd_barang'");
    }

    function cetak() {
        echo "<table class='table table-hover'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Jumlah Uang</th>
                                <th>Kembali</th>
                                <th class='text-right'>Total</th>
                            </tr>
                        </thead>";
        $penjualan = $this->db->get('v_transaksi_detail');
        $total = 0;
        $no = 1;
        foreach ($penjualan->result() as $jual) {
            echo "<tr>
                                <td>$no</td>
                                <td>$jual->nama_barang</td>
                                <td>$jual->harga_jual</td>   
                                <td>$jual->total_beli</td>
                                <td>$jual->jumlah_uang</td>
                                 <td>$jual->uang_kembali</td>   
                                <td class='text-right'>$jual->total_belanja</td>
            </tr>";
            $no++;
           $total = $total + ($jual->harga_jual * $jual->total_beli);
        }
        echo "</table>
                     <div class='row mrg-top-30'>
                   <div class='col-md-12'>
                   <div class='pull-right text-right'>
                   <p></p>
                  <p></p>
                 <hr>
               <h3><b>Total :</b>Rp ".$total."</h3>
              </div>
             <a href='".base_url('index.php/Penjualan/invoice')."' class='btn text-gray text-hover display-block padding-10 no-mrg-btm'>
            <i class='ti-printer text-info pdd-right-5'></i>
           <b>Print</b>
          </a>
         </div>
      </div>";
    }
    function invoice(){
      $data['record']=$this->db->get('v_transaksi_detail')->result();  
      $this->template->load('template','penjualan/invoice',$data);
    }
    function update_invoice(){
     $query="update transaksi_pembelian set detail=1 where status=1";   
     $this->db->query($query);
     redirect('Penjualan');
    }
    
    
}
?>
