<?php

class Produksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Maintenance';

        $this->load->model('Produksi_model', 'produksis');
        $data['produksi'] = $this->produksis->getAllProduksi();

        $this->load->view('templates/header', $data);
        $this->load->view('produksi/index');
    }

    public function edit($id)
    {
        $data['produk'] = $this->Produksi_model->getProduksiById($id);
        $data['judul'] = 'Edit';
        $this->form_validation->set_rules('nama_alat_edit', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('produksi/edit');
        } else {
            $Klasifikasi = $this->input->post('klasifikasi_edit', true);
            $Nama_Alat = $this->input->post('nama_alat_edit', true);
            $Merk = $this->input->post('merk_edit', true);
            $Tipe_Ukuran = $this->input->post('tipe_ukuran_edit', true);
            $Jumlah = $this->input->post('jumlah_edit', true);
            $Satuan = $this->input->post('satuan_edit', true);
            $Kondisi = $this->input->post('kondisi_edit', true);
            $Lokasi = $this->input->post('lokasi_edit', true);
            $Keterangan = $this->input->post('keterangan_edit', true);
            $Kegunaan = $this->input->post('kegunaan_edit', true);
            // var_dump($gambar);
            // die;

            $this->db->set('Klasifikasi', $Klasifikasi);
            $this->db->set('Nama_Alat', $Nama_Alat);
            $this->db->set('Merk', $Merk);
            $this->db->set('Tipe_Ukuran', $Tipe_Ukuran);
            $this->db->set('Jumlah', $Jumlah);
            $this->db->set('Satuan', $Satuan);
            $this->db->set('Kondisi', $Kondisi);
            $this->db->set('Lokasi', $Lokasi);
            $this->db->set('Keterangan', $Keterangan);
            $this->db->set('Kegunaan', $Kegunaan);

            $no['co'] = $this->input->post('id');
            // var_dump($upload_image);
            // die;
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path']          = './tambahan/gambar/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100000;
                $config['max_width']            = 400000;
                $config['max_height']           = 300000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['produk']['kode_Gambar'];
                    if ($old_image != 'select.jpg') {
                        unlink(FCPATH . 'tambahan/gambar/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('kode_Gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->where('No', $no['co']);
            $this->db->update('produksi');
            $this->session->set_flashdata('message', 'Data Berhasil Di Edit!');
            redirect('produksi/edit/' . $no['co']);
        }
    }
    public function tambah()
    {
        $data['judul'] = 'Tambah Data';
        $this->form_validation->set_rules('nama_alat_tambah', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('produksi/tambah');
        } else {
            $Klasifikasi = $this->input->post('klasifikasi_tambah', true);
            $Nama_Alat = $this->input->post('nama_alat_tambah', true);
            $Merk = $this->input->post('merk_tambah', true);
            $Tipe_Ukuran = $this->input->post('tipe_ukuran_tambah', true);
            $Jumlah = $this->input->post('jumlah_tambah', true);
            $Satuan = $this->input->post('satuan_tambah', true);
            $Kondisi = $this->input->post('kondisi_tambah', true);
            $Lokasi = $this->input->post('lokasi_tambah', true);
            $Keterangan = $this->input->post('keterangan_tambah', true);
            $Kegunaan = $this->input->post('kegunaan_tambah', true);

            // var_dump($gambar);
            // die;

            $this->db->set('Klasifikasi', $Klasifikasi);
            $this->db->set('Nama_Alat', $Nama_Alat);
            $this->db->set('Merk', $Merk);
            $this->db->set('Tipe_Ukuran', $Tipe_Ukuran);
            $this->db->set('Jumlah', $Jumlah);
            $this->db->set('Satuan', $Satuan);
            $this->db->set('Kondisi', $Kondisi);
            $this->db->set('Lokasi', $Lokasi);
            $this->db->set('Keterangan', $Keterangan);
            $this->db->set('Kegunaan', $Kegunaan);

            $upload_image = $_FILES['image_tambah'];
            if ($upload_image) {
                $config['upload_path']          = './tambahan/gambar/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100000;
                $config['max_width']            = 400000;
                $config['max_height']           = 300000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image_tambah')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('kode_Gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->insert('produksi');
            $this->session->set_flashdata('message', 'Data Berhasil Di Tambah!');
            redirect('produksi/tambah');
        }
    }
    public function hapus($No)
    {
        $this->Produksi_model->hapuDataProduksi($No);
        $this->session->set_flashdata('hapus', 'Dihapus');
        redirect('produksi/index');
    }
    public function detail($id)
    {
        $data['produk'] = $this->Produksi_model->getProduksiById($id);
        $data['judul'] = 'Detail Alat';
        $this->load->view('templates/header', $data);
        $this->load->view('produksi/detail');
    }
    public function aklogin()
    {
        // $data['user_produksi'] = $this->$this->Produksi_model->getAllUser_produksi();
        $data['judul'] = 'Login';
        $user = $this->input->post('login', true);
        $pass = $this->input->post('password', true);
        $this->load->view('templates/header', $data);
        $this->load->view('produksi/login');
    }

    public function login()
    {
        $data['judul'] = 'Login';
        $this->load->view('templates/header', $data);
        $this->load->view('produksi/login');
        $username = $this->input->post('login');
        $password = $this->input->post('password');
        $where = array(
            'nama' => $username,
            'password' => $password
        );
        $cek = $this->Produksi_model->cek_login("user_produksi", $where)->num_rows();
        if ($cek > 0) {

            $data_session = array(
                'nama' => $username,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);

            redirect('produksi/user');
        } else {
            echo "Username dan password salah !";
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('produksi/login'));
    }
    public function user()
    {
        $data['judul'] = 'Maintenance';

        $this->load->model('Produksi_model', 'produksis');
        $data['produksi'] = $this->produksis->getAllProduksi();

        $this->load->view('templates/header', $data);
        $this->load->view('produksi/user');
    }
}
