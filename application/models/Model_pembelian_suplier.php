<?php
class Model_pembelian_suplier extends CI_Model{
    
    function insert_temp(){
        
        $id_suplier    = $_GET['id_suplier'];
        $kd_barang     = $_GET['kd_barang'];
        $nama_barang   = $_GET['nama_barang'];
        $barang_satuan = $_GET['barang_satuan'];
        $harga_pokok   = $_GET['harga_pokok'];
        $harga_jual    = $_GET['harga_jual'];
        $jumlah        = $_GET['jumlah'];
        $no_faktur     = $_GET['no_faktur'];
        $total_belanja =$harga_pokok*$jumlah;
        $data          =array(
                       'status'=>0,
                       'tanggal_beli'=>tanggal(),
                       'id_suplier'=>$id_suplier,
                       'kd_barang'=>$kd_barang,
                       'no_faktur'=>$no_faktur,
                       'harga'=>$harga_pokok,
                       'jumlah'=>$jumlah,
                       'total_belanja'=>$total_belanja,
            );
        $chek= $this->db->get_where('tbl_beli_suplier',array('kd_barang'=>$kd_barang,'status'=>0,'no_faktur'=>$no_faktur));
        if ($chek->num_rows()<1) {
             $this->db->insert('tbl_beli_suplier',$data);
              
         }else{
          $sql="update tbl_beli_suplier set harga=$harga_pokok,jumlah=$jumlah,total_belanja=$total_belanja where no_faktur='$no_faktur' ";
          $this->db->query($sql);
          
        }
        return $this->db->insert_id();
            
    }
    
    function show_temp(){
         $query="SELECT tbs.no_faktur, tbs.kd_barang,tb.nama_barang,s.satuan,tbs.harga,tb.harga_jual,tbs.jumlah,tbs.total_belanja "
                . "FROM tbl_beli_suplier as tbs,tbl_barang as tb, tbl_suplier as ts, tbl_satuan as s"
                . " WHERE tbs.id_suplier=ts.id_suplier and tb.kd_barang=tbs.kd_barang and tb.barang_satuan=s.id_satuan and status=0";
     return $this->db->query($query);
    }
    
    function show_laporan(){
         $query="SELECT tbs.no_faktur,tbs.kd_barang,tb.nama_barang,s.satuan,tbs.harga,tb.harga_jual,tbs.jumlah,tbs.total_belanja FROM tbl_beli_suplier as tbs,tbl_barang as tb, tbl_suplier as ts, tbl_satuan as s WHERE tbs.id_suplier=ts.id_suplier and tb.kd_barang=tbs.kd_barang and tb.barang_satuan=s.id_satuan and status=1 and detail=0";
     return $this->db->query($query);
    }
    
    function cancel($id){
        $this->db->where('no_faktur',$id);
        $this->db->delete('tbl_beli_suplier');
    }
    
    
}



?>