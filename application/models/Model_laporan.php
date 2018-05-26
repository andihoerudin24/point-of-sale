<?php

Class Model_laporan extends CI_Model {

    function tampil_laba($limit, $start) {
        $query = $this->db->get('v_laba', $limit, $start);
        return $query;
    }

    function laporan(){
        $query = $this->db->query("SELECT * FROM `tbl_beli_suplier` GROUP BY tanggal_beli");
        return $query;
    }

}

?>