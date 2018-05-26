<?php

class Model_barang extends CI_Model {

    function tampil_barang($limit, $start) {
        $query = $this->db->get('v_barang', $limit, $start);
        return $query;
    }

    function save() {
        $this->load->library('ciqrcode');
        $config['cacheable'] = true; //boolean, the default is true
        $config['cachedir'] = './assets/'; //string, the default is application/cache/
        $config['errorlog'] = './assets/'; //string, the default is application/logs/
        $config['imagedir'] = './assets/images/'; //direktori penyimpanan qr code
        $config['quality'] = true; //boolean, the default is true
        $config['size'] = '1024'; //interger, the default is 1024
        $config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        $image_name=kd_barang().'.png'; //buat name dari qr code sesuai dengan kd_barang
        $params['data'] = kd_barang(); //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $data = array(
            'kd_barang' => kd_barang(),
            'nama_barang' => $this->input->post('nama_barang'),
            'barang_satuan' => $this->input->post('Satuan'),
            'harga_pokok' => $this->input->post('harga_pokok'),
            'harga_jual' => $this->input->post('harga_jual'),
            'stok_barang' => $this->input->post('stok_barang'),
            'stok_minimal' => $this->input->post('minimal_stok'),
            'id_kategori' => $this->input->post('kategori'),
            //'image'=>kd_barang(),
        );
        $this->db->insert('tbl_barang', $data);
    }

    function update() {
        $data = array(
            //'kd_barang'=>kd_barang(),
            'nama_barang' => $this->input->post('nama_barang'),
            'harga_pokok' => $this->input->post('harga_pokok'),
            'harga_jual' => $this->input->post('harga_jual'),
            'stok_barang' => $this->input->post('stok_barang'),
            'stok_minimal' => $this->input->post('minimal_stok'),
            'id_kategori' => $this->input->post('kategori'),
        );
        $kd_barang = $this->input->post('kd_barang');
        $this->db->where('kd_barang', $kd_barang);
        $this->db->update('tbl_barang', $data);
    }

}

?>