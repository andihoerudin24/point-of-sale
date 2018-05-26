<?php

class Pembelian extends CI_Controller {

    function __construct() {
        parent::__construct();
       
        $this->load->model('Model_barang');
        $this->load->model('Model_pembelian_suplier');
        chek_akses_modul();
        chek_seesion();
    }

    function index() {
        $this->template->load('template', 'Pembelian_suplier/list');
    }
    
    function form_barang_autocomplit() {
        $kd_barang = $_GET['kd_barang'];
        $sql_barang = "SELECT tb.nama_barang,ts.satuan,tb.harga_pokok,tb.harga_jual FROM tbl_barang as tb,tbl_Satuan as ts where tb.barang_satuan=ts.id_Satuan and kd_barang='$kd_barang' ";
        $barang = $this->db->query($sql_barang)->row_array();
        $data = array(
            'nama_barang'   =>$barang['nama_barang'],
            'barang_satuan' =>$barang['satuan'],
            'harga_pokok'   =>$barang['harga_pokok'],
            'harga_jual'    =>$barang['harga_jual'],
        );
        echo json_encode($data);
    }

    function keranjang() {
        $this->Model_pembelian_suplier->insert_temp();
    }
    
    function load_temp(){
        echo " <div class='table-overflow'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No FAKTUR</th>
                            <th>KD BARANG</th>
                            <th>NAMA BARANG</th>
                            <th>SATUAN</th>
                            <th>HARGA POKOK</th>
                            <th>HARGA JUAL</th>
                            <th>JUMLAH BELI</th>
                            <th>TOTAL BELANJA</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>";
             $data= $this->Model_pembelian_suplier->show_temp()->result();
             $no=1;
             foreach ($data as $d){
            echo "<tr>"
                 . "<td>$no</td>"
                 . "<td>$d->no_faktur</td>"
                 . "<td>$d->kd_barang</td>"
                 . "<td>$d->nama_barang</td>"
                 . "<td>$d->satuan</td>"
                 . "<td>$d->harga</td>"
                 . "<td>$d->harga_jual</td>"
                 . "<td>$d->jumlah</td>"
                 . "<td>$d->total_belanja</td>"
                 . "<td><button type='submit'onclick='cancel($d->no_faktur)' class='btn btn-danger btn-rounded btn-sm'>Cancel</button></td>"
               . "</tr>";
                $no++;
             }
          echo "</table>
             </div>";
         
    }
    
    
    function cancel(){
        $id=$_GET['no_faktur'];
        $this->Model_pembelian_suplier->cancel($id);
        
    }
    
    function selesai(){
        $jumlah           =$_GET['jumlah'];
        $kd_barang        =$_GET['kd_barang'];
        $id_suplier       =$_GET['id_suplier'];
        $query            ="update tbl_beli_suplier set status=1 where id_suplier=$id_suplier";
        $this->db->query($query); 
        $this->db->query("update v_barang set stok_barang=stok_barang+$jumlah where kd_barang='$kd_barang' ");
        
        
    }
    
    function cetak(){
        echo " <div class='table-overflow'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No FAKTUR</th>
                            <th>KD BARANG</th>
                            <th>NAMA BARANG</th>
                            <th>SATUAN</th>
                            <th>HARGA POKOK</th>
                            <th>HARGA JUAL</th>
                            <th>JUMLAH BELI</th>
                            <th>TOTAL BELANJA</th>
                        </tr>
                    </thead>";
             $data= $this->Model_pembelian_suplier->show_laporan()->result();
             $total=0;
             $no=1;
             foreach ($data as $d){
            echo "<tr>"
                 . "<td>$no</td>"
                 . "<td>$d->no_faktur</td>"
                 . "<td>$d->kd_barang</td>"
                 . "<td>$d->nama_barang</td>"
                 . "<td>$d->satuan</td>"
                 . "<td>$d->harga</td>"
                 . "<td>$d->harga_jual</td>"
                 . "<td>$d->jumlah</td>"
                 . "<td>$d->total_belanja</td>"
               . "</tr>";
                $no++;
               $total = $total +($d->harga * $d->jumlah);
           
             }
           echo "</table>
                     <div class='row mrg-top-30'>
                   <div class='col-md-12'>
                   <div class='pull-right text-right'>
                   <p></p>
                  <p></p>
                 <hr>
               <h3><b>Total :</b>Rp ". Terbilang($total)."</h3>
              </div>
             <a href='".base_url('index.php/Pembelian/invoice')."' class='btn text-gray text-hover display-block padding-10 no-mrg-btm'>
            <i class='ti-printer text-info pdd-right-5'></i>
           <b>Print</b>
          </a>
         </div>
      </div>";
    }
     function invoice(){
      $data['record']= $this->Model_pembelian_suplier->show_laporan()->result();  
      $this->template->load('template','Pembelian_suplier/invoice',$data);
    }
    function update_invoice(){
     $query="update tbl_beli_suplier set detail=1 where status=1";   
     $this->db->query($query);
     redirect('Pembelian');
    }
    
}

?>