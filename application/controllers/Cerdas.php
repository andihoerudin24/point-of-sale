<?php

Class Cerdas extends CI_Controller {
    function __construct() {
        parent::__construct();
        //chek_akses_modul();
    }
            function index() {
        $this->template->load('template', 'cerdas/list');
    }

    function tampil() {
        $nama        = $_GET['nama'];
        $no          = $_GET['no'];
        $angka       = $_GET['angka'];
        $lahir       = $_GET['lahir'];
        $ulang_tahun = $_GET['ulang_tahun'];
        $pesan="tes pesan";
        $a = $angka * 2;
        $b = $a + 5;
        $c = $b * 50;
        $l = 1766;
        $k = 1767;
        if ($ulang_tahun < 1) {
            $m = $c + $l;
        } else {
            $m = $c + $k;
        }
        $d = $m - $lahir;
        echo " <table class='table table-bordered bg-gray'>
                    <thead class='border-info'>
                        <tr>
                            <th>Angka Pilihan Anda</th>
                            <th>Dua angka Dibelakang Adalah Usia Anda</th>
                        </tr>
                    </thead>
                   <tbody>
                         <tr>
                                <td>$angka</td>
                                <td>$d</td>
                         </tr>   
                 </tbody>
               </table>";
        pesan($pesan, $no);
    }

}

?>