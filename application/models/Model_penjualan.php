<?php
class Model_penjualan extends CI_Model{
    
    function insert($jumlah){
        $data =array(
            'total_beli'  =>$jumlah,
            );
        
            $this->db->insert('tbl_pembeli',$data);     
            return $this->db->insert_id();
     }
     
     function show_temp(){
         $query="SELECT tpl.id_transaksi,tpl.kd_barang,tb.nama_barang,ts.Satuan,tb.harga_jual,tp.total_beli FROM `transaksi_pembelian` as tpl, tbl_barang as tb,tbl_pembeli as tp,tbl_satuan as ts WHERE tpl.kd_barang=tb.kd_barang and tpl.no_faktur=tp.no_faktur and tb.barang_satuan=ts.id_satuan and status=0";
         return $this->db->query($query);
     }
}
?>