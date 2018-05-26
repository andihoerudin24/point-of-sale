<?php

function cmb_dinamis($name, $table, $field, $pk, $selected = NULL, $extra = NULL) {
    $ci = &get_instance();
    $cmb = "<select name='$name' class='form-control' $extra>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $row){
        $cmb .= "<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .= ">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function chek_akses_modul() {
    $ci = &get_instance();
    $controller = $ci->uri->segment(1);
    $method = $ci->uri->segment(2);
    if (empty($method)) {
        $url = $controller;
    } else {
        $url = $controller . '/' . $method;
    }

 //chek id menu
    $menu = $ci->db->get_where('tbl_menu', array('link' => $url))->row_array();
    $level_user = $ci->session->userdata('id_level_user');


    //chek module revisi 
    if (!empty($level_user)) {
        //chek apakah level user di bolehkan hakases atau tidak revisi kecuali menggunakan and
        $chek = $ci->db->get_where('tbl_user_rule', array('id_level_user' => $level_user, 'id_menu' => $menu['id']));
       if ($chek->num_rows() < 1 and $method != 'index' and $method != 'add' and $method != 'edit' and $method != 'Hapus' and $method != 'rule' and $method != 'add_rule' and $method != 'check_akses' and $method != 'modul' and $method != 'selesai' and $method != 'cancel' and $method != 'keranjang' and $method != 'load_temp' and $method != 'form_barang_autocomplit' and $method != 'upload_foto_user' and $method != 'add_rule' and $method != 'check_akses' and $method != 'excel' and $method != 'login' and $method != 'logout' and $method != 'index' and $method != 'keyword' and $method != 'tanggal' and $method != 'perbulan' and $method != 'tahun' and $method != 'fifo' and $method != 'load_temp' and $method != 'cetak' and $method != 'invoice' and $method != 'update_invoice' and $method != 'form_penjualan_autocomplit' and $method != 'kembalian' and $method != 'upload_foto_user' and $method != 'rule'  ) {
           redirect('Auth/logout');
           die;
        }
    } else {
        redirect('Auth');
    }
}
function tanggal() {
    return date('Y-m-d');
}

function chek_seesion(){
    $ci=&get_instance();
    $session=$ci->session->userdata('status_login');
    if ($session!='ok') {
        redirect('Auth');
    }
}


function chek_seesion_login(){
    $ci =&get_instance();
    $session=$ci->session->userdata('status_login');
    if ($session=='ok'){
        redirect('Dokumentasi');
    }
}


function jam(){
    $ci = &get_instance();
    $jam =$ci->db->get('tbl_pembeli');
    if ($jam->num_rows()>0) {
        foreach ($jam->result() as $j) {
            //2018-02-10 02:30:04
            $c= $j->no_faktur;
            $a= $j->tanggal_beli;
            $detik= substr($a,10,10);
            return $detik.$c;
        }
    }
}

function tgl_indo($tanggals) {
    //2018-02-01
    //concert to 01-02-2018
    $tanggal = substr($tanggals, 8, 2);
    $bulan = substr($tanggals, 5, 2);
    $tahun = substr($tanggals, 0, 4);
    return $tanggal . "-" . $bulan . "-" . $tahun;
}

function bulan($bulan) {
    switch ($bulan) {
        case 1: return 'Januari';
            break;

        case 2: return 'Febuari';
            break;

        case 3: return 'Maret';
            break;

        case 4: return 'April';
            break;

        case 5: return 'Mei';
            break;

        case 6: return 'Juni';
            break;

        case 7: return 'juli';
            break;

        case 8: return 'Agustus';
            break;

        case 9: return 'September';
            break;

        case 10: return 'Oktober';
            break;

        case 11: return 'November';
            break;

        case 12: return 'Desemeber';
            break;
    }
}

function kd_barang() {
    $ci = &get_instance();
    $chek = $ci->db->query("select kd_barang from tbl_barang order by kd_barang DESC");
    if ($chek->num_rows() > 0) {
        $chek=$chek->row_array();
        $laskode = $chek['kd_barang'];
        $ambil = substr($laskode, 2, 3) + 1;
        $newcode = "BR" . sprintf("%03s", $ambil);
        return $newcode;
    }else{
        return 'BR001';  
    }
}

function no_faktur() {
    $ci = &get_instance();
    $chek = $ci->db->query("select no_faktur from tbl_pembeli order by no_faktur DESC");
    if ($chek->num_rows() > 0) {
        $chek=$chek->row_array();
        $laskode = $chek['no_faktur'];
        $ambil = substr($laskode, 2, 3) + 1;
        $newcode = "AR" . sprintf("%03s", $ambil);
        return $newcode;
    }else{
        return 'AR001';  
    }
}



function get_faktur() {
    $ci = &get_instance();
    $chek = $ci->db->query("select no_faktur from transaksi_pembelian order by no_faktur DESC");
    if ($chek->num_rows() > 0) {
        $chek=$chek->row_array();
        $laskode = $chek['no_faktur'];
        $ambil = substr($laskode, 2, 3)+ 1;
        $newcode = "AR" . sprintf("%03s", $ambil);
        return $newcode;
    }else{
        return 'AR000';  
    }
}

function Terbilang($x){
        $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        if ($x < 12)
         return "" . $abil[$x];
        elseif ($x < 20)
            return Terbilang($x - 10) . "Belas";
        elseif ($x < 100)
            return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
        elseif ($x < 200)
            return " Seratus" . Terbilang($x - 100);
        elseif ($x < 1000)
            return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
        elseif ($x < 2000)
            return " Seribu" . Terbilang($x - 1000);
        elseif ($x < 1000000)
            return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
        elseif ($x < 1000000000)
            return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
    }
?>