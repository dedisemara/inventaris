<?php



class con_edit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Qualitycontrol_model');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
    }
    public function index($id)
    {
        $data['coba'] = $this->Qualitycontrol_model->getCobaById($id);
        $data['judul'] = 'Edit';
        $this->form_validation->set_rules('namaunit_e', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('qualitycontrol/edit');
            $this->load->view('templates/footer');
        } else {

            // var_dump($upload_image);
            // die;
            $dataedit = [
                "klasifikasi" => $this->input->post('klasifikasi_e', true),
                "nama_alat" => $this->input->post('namaunit_e', true),
                "serial_number" => $this->input->post('serialnumber_e', true),
                "kode" => $this->input->post('kode_e', true),
                "supplier" => $this->input->post('supplier_e', true),
                "tanggal_masuk" => $this->input->post('tanggalmasuk_e', true),
                "kondisi" => $this->input->post('kondisi_e', true),
                "lokasi" => $this->input->post('lokasi_e', true),
                "fungsi" => $this->input->post('fungsi_e', true)
                // "gambar" => $upload_image
            ];
            $no['co'] = $this->input->post('id');

            // var_dump($upload_image);
            // die;
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path']          = './tambahan/img/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000000;
                $config['max_width']            = 4000000;
                $config['max_height']           = 30000000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                    echo getcwd();
                }
            }
            $this->db->set('gambar', $upload_image);
            $this->db->where('id', $no['co']);
            $this->db->update('coba');
            $this->Qualitycontrol_model->ubahDataEdit($dataedit, 'coba', $no['co']);
        }
    }

    public function do_upload()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100000;
        $config['max_width']            = 4000;
        $config['max_height']           = 3000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            echo $this->upload->display_errors();
        } else {
            echo "success";
        }
    }
}
