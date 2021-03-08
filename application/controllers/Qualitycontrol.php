<?php



class Qualitycontrol extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Qualitycontrol_model');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
    }
    public function index()
    {

        $data['judul'] = 'QualityControl';
        $this->load->model('Qualitycontrol_model', 'qualitycontrol');


        //load library
        $this->load->library('pagination');

        //ambil data dari search
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }


        //config
        $this->db->like('nama_alat', $data['keyword']);
        $this->db->or_like('nama_alat', $data['keyword']);
        $this->db->or_like('kode', $data['keyword']);
        $this->db->or_like('fungsi', $data['keyword']);
        $this->db->or_like('serial_number', $data['keyword']);
        $this->db->or_like('tanggal_masuk', $data['keyword']);
        $this->db->or_like('supplier', $data['keyword']);
        $this->db->or_like('lokasi', $data['keyword']);
        $this->db->or_like('kondisi', $data['keyword']);

        $this->db->from('alatuji');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 9;


        //inisial
        $this->pagination->initialize($config);



        $data['start'] = $this->uri->segment(3);
        $data['qualitycontrol'] = $this->qualitycontrol->getQualitycontrol($config['per_page'], $data['start'], $data['keyword']);


        $this->load->view('templates/header', $data);
        $this->load->view('qualitycontrol/index');
        $this->load->view('templates/footer');
    }


    public function detail($id)
    {
        $data['qualitycontrol'] = $this->Qualitycontrol_model->getQualitycontrolById($id);
        $value = $data['qualitycontrol'];
        $no = $value['iduser'];
        $data['user'] = $this->Qualitycontrol_model->getPenggunaById($no);
        $data['judul'] = 'Detail Alat';
        $this->load->view('templates/header', $data);
        $this->load->view('qualitycontrol/detail');
        $this->load->view('templates/footer');
    }

    public function pinjam($id)
    {
        $data['qualitycontrol'] = $this->Qualitycontrol_model->getQualitycontrolById($id);
        $data['judul'] = 'From Peminjaman';
        $this->form_validation->set_rules('namapeminjam', 'Nama', 'required');
        $this->form_validation->set_rules('tanggalpeminjaman', 'Tanggal', 'required');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('qualitycontrol/pinjam');
        } else {
            $datapinjam = [
                "nama_peminjam" => $this->input->post('namapeminjam', true),
                "kode_alat" =>  $this->input->post('kodealat', true),
                "nama_unit" =>  $this->input->post('namaalat', true),
                "tanggal_peminjaman" => $this->input->post('tanggalpeminjaman', true),
                "kondisi" =>  $this->input->post('kondisi', true),
                "idalat" =>  $this->input->post('id_unit', true),
                "divisi" =>  $this->input->post('divisi', true),
                "status1" => 1
            ];
            $datakonfirm = [
                "status" =>  2
            ];

            $no['qc'] = $this->input->post('id_unit');

            $this->Qualitycontrol_model->ubahDataPinjam($datakonfirm, 'alatuji', $no['qc']);
            $this->Qualitycontrol_model->tambahDataQC($datapinjam, 'peminjaman');
            $this->session->set_flashdata('coba', 'Peminjaman!');
            redirect('qualitycontrol/pinjam/' . $id);
        }
    }

    public function user()
    {
        $data['judul'] = 'User Interface';

        $this->load->model('qualitycontrol_model', 'users');
        $data['peminjamans'] = $this->users->getAllpengguna();

        $this->load->view('templates/header', $data);
        $this->load->view('qualitycontrol/user');
        $datakonfirm = [
            "status" =>  $this->input->post('status_utama', true),
            "iduser" =>  $this->input->post('id_user', true),
        ];
        $datakonfirmuser = [
            "status1" =>  $this->input->post('status_user', true),
        ];
        $id['qc'] = $this->input->post('id_alat1');
        $id['no'] = $this->input->post('id_user');

        $this->Qualitycontrol_model->ubahDataUser($datakonfirmuser, 'peminjaman', $id['no'], $datakonfirm, 'alatuji', $id['qc']);

        //$this->Qualitycontrol_model->ubahDataQC();
        // $this->session->set_flashdata('coba', 'Peminjaman!');
        // redirect('qualitycontrol/user/');
    }
    public function hapus($no)
    {
        $data['user'] = $this->Qualitycontrol_model->getUserById($no);
        $id = $data['user']['idalat'];
        $status['data'] = '';
        $this->db->set('status', $status['data']);
        $this->db->where('id', $id);
        $this->db->update('alatuji');

        $this->Qualitycontrol_model->hapuDataUser($no);
        $this->session->set_flashdata('hapus', 'Dibatalkan');
        redirect('qualitycontrol/user');
    }
    public function pengembalian($no)
    {
        $data['user'] = $this->Qualitycontrol_model->getUserById($no);
        $data['judul'] = 'From Pengembalian';
        $data['menit'] = [];
        for ($i = 0; $i <= 59; $i++) {
            $data['menit'][] = $i;
        }
        $data['jam'] = [];
        for ($i = 0; $i <= 23; $i++) {
            $data['jam'][] = $i;
        }
        $data['detik'] = [];
        for ($i = 0; $i <= 59; $i++) {
            $data['detik'][] = $i;
        }
        $this->form_validation->set_rules('jumlah', 'Jumlah Penggunaan', 'required|numeric');
        $this->form_validation->set_rules('tanggalpengembalian', 'Tanggal', 'required');
        $this->form_validation->set_rules('penerima', 'Pilih Operator', 'required');
        // $this->form_validation->set_rules('Jam', 'jam', 'required');
        // $this->form_validation->set_rules('Menit', 'menit', 'required');
        // $this->form_validation->set_rules('Detik', 'detik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('qualitycontrol/pengembalian');
        } else {
            $datautama = [
                "status" =>  $this->input->post('status_utama', true),
                "kondisi" =>  $this->input->post('kondisi', true),

            ];
            $jam = $this->input->post('jam');
            $menit = $this->input->post('menit');
            $detik = $this->input->post('detik');
            $waktu = "$jam:$menit:$detik";
            $datapengembalian = [
                "nama_operator" => $this->input->post('penerima', true),
                "kondisi_pengembalian" =>  $this->input->post('kondisi', true),
                "tanggal_pengembalian" => $this->input->post('tanggalpengembalian', true),
                "jumlah_penggunaan" =>  $this->input->post('jumlah', true),
                "keterangan_tambahan" =>  $this->input->post('keterangan', true),
                "waktu_penggunaan" =>  $waktu,
                "status1" =>  $this->input->post('status_user', true)

            ];
            $id['qc'] = $this->input->post('id_alat1');
            $id['no'] = $this->input->post('id_user');

            $this->Qualitycontrol_model->ubahDataKembali($datapengembalian, 'peminjaman', $id['no'], $datautama, 'alatuji', $id['qc']);
            $this->session->set_flashdata('coba', 'Terimakasih');
            redirect('qualitycontrol/pengembalian/' . $no);
        }
    }

    public function dokumen()
    {
        $data['judul'] = 'Pribadi';

        $this->load->model('qualitycontrol_model', 'dokumens');
        $data['dokumen'] = $this->dokumens->getAllQualitycontrol();

        $this->load->view('templates/header', $data);
        $this->load->view('qualitycontrol/dokumen');

        //$this->Qualitycontrol_model->ubahDataQC();
        // $this->session->set_flashdata('coba', 'Peminjaman!');
        // redirect('qualitycontrol/user/');
    }
    public function edit($id)
    {
        $data['coba'] = $this->Qualitycontrol_model->getQualitycontrolById($id);
        $data['judul'] = 'Edit';
        $this->form_validation->set_rules('namaunit_e', 'Nama', 'required');
        $this->form_validation->set_rules('kode_e', 'Kode', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('qualitycontrol/edit');
            $this->load->view('templates/footer');
        } else {

            // var_dump($upload_image);
            // die;
            $klasifikasi = $this->input->post('klasifikasi_e', true);
            $nama_alat = $this->input->post('namaunit_e', true);
            $serial_number = $this->input->post('serialnumber_e', true);
            $kode = $this->input->post('kode_e', true);
            $supplier = $this->input->post('supplier_e', true);
            $tanggal_masuk = $this->input->post('tanggalmasuk_e', true);
            $kondisi = $this->input->post('kondisi_e', true);
            $lokasi = $this->input->post('lokasi_e', true);
            $fungsi = $this->input->post('fungsi_e', true);





            $no['co'] = $this->input->post('id');
            // var_dump($upload_image);
            // die;
            // $upload_image = $_FILES['image']['name'];
            // $upload_sop = $_FILES['sop_e']['name'];

            // if ($upload_image) {
            //     $config['upload_path']          = './tambahan/img/';
            //     $config['allowed_types']        = 'gif|jpg|png';
            //     $config['max_size']             = 10;
            //     $config['max_width']            = 40;
            //     $config['max_height']           = 30;

            //     $this->load->library('upload', $config);

            //     if ($this->upload->do_upload('image')) {
            //         $old_image = $data['coba']['gambar'];
            //         if ($old_image != 'select.jpg') {
            //             unlink(FCPATH . 'tambahan/gambar/' . $old_image);
            //         }
            //         $new_image = $this->upload->data('file_name');
            //         $this->db->set('gambar', $new_image);
            //     } else {
            //         echo $this->upload->display_errors();
            //     }
            // }
            // elseif ($upload_sop) {
            //     $config['upload_path']          = './tambahan/sop/';
            //     $config['allowed_types']        = 'pdf';
            //     $config['max_size']             = 1000000;

            //     $this->load->library('upload', $config);

            //     if ($this->upload->do_upload('sop_e')) {
            //         $new_sop = $this->upload->data('file_name');
            //         $this->db->set('sop', $new_sop);
            //     } else {
            //         echo $this->upload->display_errors();
            //     }
            // }
            // gambar upload
            $config = array();
            $config['upload_path'] = './tambahan/img/';
            $config['allowed_types'] = 'gif|jpg|png|';
            $config['max_size'] = '100000';
            $config['max_width'] = '102400';
            $config['max_height'] = '76800';
            $this->load->library('upload', $config, 'images'); // Create custom object for cover upload
            $this->images->initialize($config);
            $this->images->do_upload('image');
            $data_gambar = $this->images->data();
            if ($this->images->do_upload('image')) {
                $this->db->set('gambar', $data_gambar['file_name']);
            }

            // sop upload
            $config = array();
            $config['upload_path'] = './tambahan/sop/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config, 'sops');  // Create custom object for catalog upload
            $this->sops->initialize($config);
            $this->sops->do_upload('sop_e');
            $data_sop = $this->sops->data();
            if ($this->sops->do_upload('sop_e')) {
                $old_image = $data['coba']['gambar'];
                if ($old_image != 'select.jpg') {
                    unlink(FCPATH . 'tambahan/gambar/' . $old_image);
                }
                $this->db->set('sop', $data_sop['file_name']);
            }
            // manual upload
            $config = array();
            $config['upload_path'] = './tambahan/manual/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config, 'manuals');  // Create custom object for catalog upload
            $this->manuals->initialize($config);
            $this->manuals->do_upload('manual_e');
            $data_manual = $this->manuals->data();
            if ($this->manuals->do_upload('manual_e')) {
                $this->db->set('manual', $data_manual['file_name']);
            }
            // riwayat upload
            $config = array();
            $config['upload_path'] = './tambahan/riwayat/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config, 'riwayats');  // Create custom object for catalog upload
            $this->riwayats->initialize($config);
            $this->riwayats->do_upload('riwayat_e');
            $data_riwayat = $this->riwayats->data();
            if ($this->riwayats->do_upload('riwayat_e')) {
                $this->db->set('riwayat', $data_riwayat['file_name']);
            }

            // sertif upload
            $config = array();
            $config['upload_path'] = './tambahan/sertif/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config, 'sertifs');  // Create custom object for catalog upload
            $this->sertifs->initialize($config);
            $this->sertifs->do_upload('sertif_e');
            $data_sertif = $this->sertifs->data();
            if ($this->sertifs->do_upload('sertif_e')) {
                $this->db->set('sertif_kalibrasi', $data_sertif['file_name']);
            }



            $this->session->set_flashdata('error_sop', $this->sops->display_errors());
            $this->db->set('fungsi', $fungsi);
            $this->db->set('klasifikasi', $klasifikasi);
            $this->db->set('nama_alat', $nama_alat);
            $this->db->set('serial_number', $serial_number);
            $this->db->set('kode', $kode);
            $this->db->set('supplier', $supplier);
            $this->db->set('tanggal_masuk', $tanggal_masuk);
            $this->db->set('kondisi', $kondisi);
            $this->db->set('lokasi', $lokasi);
            $this->db->where('id', $no['co']);
            $this->db->update('alatuji');
            $this->session->set_flashdata('message', 'Data Berhasil Di Edit!');
            redirect('qualitycontrol/edit/' . $no['co']);
        }
    }
    public function tambah()
    {
        $data['judul'] = 'Tambah Data';
        $this->form_validation->set_rules('klasifikasi_e', 'Kode', 'required');
        $this->form_validation->set_rules('namaunit_e', 'Nama Unit', 'required');
        $this->form_validation->set_rules('kode_e', 'Kode', 'required');
        $this->form_validation->set_rules('kondisi_e', 'Kondisi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('qualitycontrol/tambah');
            $this->load->view('templates/footer');
        } else {

            // var_dump($upload_image);
            // die;
            $klasifikasi = $this->input->post('klasifikasi_e', true);
            $nama_alat = $this->input->post('namaunit_e', true);
            $serial_number = $this->input->post('serialnumber_e', true);
            $kode = $this->input->post('kode_e', true);
            $supplier = $this->input->post('supplier_e', true);
            $tanggal_masuk = $this->input->post('tanggalmasuk_e', true);
            $kondisi = $this->input->post('kondisi_e', true);
            $lokasi = $this->input->post('lokasi_e', true);
            $fungsi = $this->input->post('fungsi_e', true);

            $config = array();
            $config['upload_path'] = './tambahan/img/';
            $config['allowed_types'] = 'gif|jpg|png|';
            $config['max_size'] = '100000';
            $config['max_width'] = '102400';
            $config['max_height'] = '76800';
            $this->load->library('upload', $config, 'images'); // Create custom object for cover upload
            $this->images->initialize($config);
            $this->images->do_upload('image');
            $data_gambar = $this->images->data();
            if ($this->images->do_upload('image')) {
                $this->db->set('gambar', $data_gambar['file_name']);
            }

            // sop upload
            $config = array();
            $config['upload_path'] = './tambahan/sop/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config, 'sops');  // Create custom object for catalog upload
            $this->sops->initialize($config);
            $this->sops->do_upload('sop_e');
            $data_sop = $this->sops->data();
            if ($this->sops->do_upload('sop_e')) {
                $this->db->set('sop', $data_sop['file_name']);
            }
            // manual upload
            $config = array();
            $config['upload_path'] = './tambahan/manual/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config, 'manuals');  // Create custom object for catalog upload
            $this->manuals->initialize($config);
            $this->manuals->do_upload('manual_e');
            $data_manual = $this->manuals->data();
            if ($this->manuals->do_upload('manual_e')) {
            }
            $this->db->set('manual', $data_manual['file_name']);
            // riwayat upload
            $config = array();
            $config['upload_path'] = './tambahan/riwayat/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config, 'riwayats');  // Create custom object for catalog upload
            $this->riwayats->initialize($config);
            $this->riwayats->do_upload('riwayat_e');
            $data_riwayat = $this->riwayats->data();
            if ($this->riwayats->do_upload('riwayat_e')) {
            }
            $this->db->set('riwayat', $data_riwayat['file_name']);

            // sertif upload
            $config = array();
            $config['upload_path'] = './tambahan/sertif/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config, 'sertifs');  // Create custom object for catalog upload
            $this->sertifs->initialize($config);
            $this->sertifs->do_upload('sertif_e');
            $data_sertif = $this->sertifs->data();
            if ($this->sertifs->do_upload('sertif_e')) {
            }
            $this->db->set('sertif_kalibrasi', $data_sertif['file_name']);

            $this->session->set_flashdata('error_sop', $this->sops->display_errors());
            $this->db->set('fungsi', $fungsi);
            $this->db->set('klasifikasi', $klasifikasi);
            $this->db->set('nama_alat', $nama_alat);
            $this->db->set('serial_number', $serial_number);
            $this->db->set('kode', $kode);
            $this->db->set('supplier', $supplier);
            $this->db->set('tanggal_masuk', $tanggal_masuk);
            $this->db->set('kondisi', $kondisi);
            $this->db->set('lokasi', $lokasi);

            $this->db->insert('alatuji');
            $this->session->set_flashdata('message', 'Data Berhasil Di Tambah!');
            redirect('qualitycontrol/tambah');
        }
    }
    public function hapus_alatuji($id)
    {
        $this->Qualitycontrol_model->hapuDataAlatuji($id);
        $this->session->set_flashdata('hapus', 'Dihapus');
        redirect('qualitycontrol/dokumen');
    }
}
