<?php

class Barang extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_barang');
        chek_seesion();
       // chek_akses_modul();
        //$this->load->Model('Model_kategori');
    }

    function index() {
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
        $this->form_validation->set_rules('harga_pokok', 'harga_pokok', 'required');
        $this->form_validation->set_rules('harga_jual',  'harga_jual', 'required');
        $this->form_validation->set_rules('stok_barang', 'stok_barang', 'required');
        $this->form_validation->set_rules('minimal_stok', 'minimal_stok', 'required');
        if (isset($_POST['submit'])) {
            if ($this->form_validation->run() != false) {
                $this->Model_barang->save();
                echo $this->session->set_flashdata('message', 'Berhasil Ditambahkan...!!!');
            } else {
                echo $this->session->set_flashdata('pesan','Anda Memasukan Data Yang Tidak Benar...!!!');
            }
            redirect('Barang');
        } else {
            $this->load->library('pagination');
            $config['base_url']             = site_url() . '/Barang/index/';
            $config['total_rows']           = $this->db->count_all('v_barang');
            $config['per_page']             = 5;
            $config["uri_segment"]          = 3;
            $choice                         = $config["total_rows"] / $config["per_page"];
            $config["num_links"]            = floor($choice);
            //style paging
            $config['first_link']       = 'First';
            $config['last_link']        = 'Last';
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span>Next</li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';
            $this->pagination->initialize($config);
            $data['page'] = $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['pagination'] = $this->pagination->create_links();
            //  $data['kategori'] = $this->Model_kategori->tampilkan_data_paging($config['per_page'], $data['page'])->result();
            $data['barang'] = $this->Model_barang->tampil_barang($config['per_page'], $data['page'])->result();
            $this->template->load('template', 'barang/list', $data);
        }
    }

    function cari() {
        $search = $this->input->post('query');
        if (isset($_POST["query"])) {
            $query = $this->db->query("SELECT kd_barang,nama_barang,harga_pokok,harga_jual,stok_barang,stok_minimal,nama_kategori,satuan FROM v_barang WHERE nama_barang like '%$search%' or kd_barang like '%$search%' or nama_kategori like '%$search%' or satuan like '%$search%' ")->result();
            echo"<div class='table-overflow'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>KD BARANG</th>
                            <th>NAMA BARANG</th>
                            <th>HARGA POKOK</th>
                            <th>HARGA JUAL</th>
                            <th>STOK BARANG</th>
                            <th>STOK MINIMAL</th>
                            <th>HARGA JUAL SATUAN</th>
                            <th>NAMA KATEGORI</th>
                            <th>SATUAN BARANG</th>
                            <th colspan='2' width='50'>AKSI</th>
                        </tr>
                    </thead>";
            $no = 1;
            foreach ($query as $row) {
                echo "<tr><td>$no</td>"
                . "<td>$row->kd_barang</td>"
                . "<td>$row->nama_barang</td>"
                . "<td>$row->harga_pokok</td>"
                . "<td>$row->harga_jual</td>"
                . "<td>$row->stok_barang</td>"
                . "<td>$row->stok_minimal</td>"
                . "<td>$row->nama_kategori</td>"
                . "<td>$row->satuan</td>"
                . "<td>" . anchor('Barang/edit/' . $row->kd_barang, 'Edit', array('class' => 'btn btn-info btn-rounded')) . "</td>"
                . "<td>" . anchor('Barang/Hapus/' . $row->kd_barang, '<i class="btn btn-warning btn-rounded swal-function">Hapus</i>') . "</td>"
                . "</tr>";
                $no++;
            }
            echo "</table>
            </div>";
        } else {
            $query = "SELECT * FROM v_barang ORDER BY kd_barang ";
        }
    }

    function edit() {
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
        $this->form_validation->set_rules('harga_pokok', 'harga_pokok', 'required');
        $this->form_validation->set_rules('harga_jual', 'harga_jual', 'required');
        $this->form_validation->set_rules('stok_barang', 'stok_barang', 'required');
        $this->form_validation->set_rules('minimal_stok', 'minimal_stok', 'required');
        if (isset($_POST['submit'])) {
            if ($this->form_validation->run() != false) {
                $this->Model_barang->update();
                echo $this->session->set_flashdata('message', 'Berhasil Di Update...!!!');
            } else {
                echo $this->session->set_flashdata('pesan', 'Mohon Isi Data Yang Benar...!!!');
            }
            redirect('Barang');
        } else {
            $id = $this->uri->segment(3);
            $data['edit'] = $this->db->get_where('tbl_barang', array('kd_barang' => $id))->row_array();
            $this->template->load('template', 'barang/edit', $data);
        }
    }

    function hapus() {
        $id = $this->uri->segment(3);
        $this->db->where('kd_barang', $id);
        $this->db->delete('tbl_barang');
        echo $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus...!!!');
        redirect('Barang');
    }

    function excel() {
        if (isset($_POST['submit'])) {
            $kategori = $this->input->post('kategori');
            $satuan = $this->input->post('satuan');
            $config['upload_path']     = './uploads/phonebook';
            $config['allowed_types']   = 'xlsx';
            $config['max_size']        = 100;
            $config['max_width']       = 1024;
            $config['max_height']      = 768;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $uploads                   = $this->upload->data();

            //$file_name=$uploads['file_name'];
            //membaca data excel
            $this->load->library('CPHP_excel');
            // nama file
            $inputFileName = "uploads/phonebook/" . $uploads['file_name'];
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }
            //  Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            //  Loop through each row of the worksheet in turn
            for ($row = 2; $row <= $highestRow; $row++) {
                //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                //kolom yang ada di excel kalo mau di tambahkan tinggal tambahkan array lagi
                echo $nama_barang   = $rowData[0][0];
                echo $harga_pokok   = $rowData[0][1];
                echo $harga_jual    = $rowData[0][2];
                echo $stok_barang   = $rowData[0][3];
                echo $stok_minimal  = $rowData[0][4];


                $this->db->insert('tbl_barang', array(
                    'kd_barang'     => kd_barang(),
                    'nama_barang'   => $nama_barang,
                    'barang_satuan' => $satuan,
                    'harga_pokok'   => $harga_pokok,
                    'harga_jual'    => $harga_jual,
                    'stok_barang'   => $stok_barang,
                    'stok_minimal'  => $stok_minimal,
                    'id_kategori'   => $kategori,
                ));
            }
            redirect('Barang');
        }
    }

}

?>