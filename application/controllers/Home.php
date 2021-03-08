<?php


class home extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Inventaris QC';

        $this->load->view('home/index', $data);
    }
}
