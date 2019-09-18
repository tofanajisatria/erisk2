<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Library extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Library_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Library Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['divisi'] = $this->db->get('divisi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('library/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function datasumber()
    {
        $data['title'] = 'Library Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['sumber'] = $this->db->get('sumber_risiko')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('library/datasumber', $data);
        $this->load->view('templates/footer', $data);
    }
    public function dataRisiko()
    {
        $data['title'] = 'Library Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['level_risiko'] = $this->db->get('level_risiko')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('library/dataRisiko', $data);
        $this->load->view('templates/footer', $data);
    }
    public function dataUser()
    {
        $data['title'] = 'Library Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pengguna'] = $this->db->get_where('user', ['role_id' => '2'])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('library/dataUser', $data);
        $this->load->view('templates/footer', $data);
    }


    // fungsi pada bagian Risk Library Management

    // fungsi pada halaman index (data divisi)
    public function deleteDivision($id)
    {
        $this->Library_model->delete_division($id);
        redirect('library');
    }
    public function updateDivision()
    {
        $idDivisi = $this->input->post('idDivisi');
        $divisi = $this->input->post('divisi');
        $subdivisi = $this->input->post('subdivisi');
        // menyimpan data yang ditangkap dengan array
        $div = [
            'nama_divisi' => $divisi,
            'bagian' => $subdivisi,
        ];
        $this->Library_model->update_division($idDivisi, $div);


        //memberikan notifikasi di tampilan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diperbaharui</div>');
        //merefresh page
        redirect('Library');
    }
    public function addDivision()
    {
        //Mengambil data yang dikirimkan dengan variable baru agar variablenya dapat digunakan kembali
        $divisi = $this->input->post('divisi');
        $subdivisi = $this->input->post('subdivisi');
        // menyimpan data yang ditangkap dengan array
        $div = [
            'nama_divisi' => $divisi,
            'bagian' => $subdivisi,
        ];
        //insert ke database
        $this->Library_model->add_division($div);

        //memberikan notifikasi di tampilan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');

        //merefresh page
        redirect('Library');
    }

    //akhir fungsi pada halaman index (data divsi)

    //awal fungsi pada halaman data sumber

    public function deleteRisk($id)
    {
        $this->Library_model->delete_Risk($id);
        redirect('library/datasumber');
    }
    public function updateRisk()
    {
        $idRisk = $this->input->post('idSumber');
        $aspek = $this->input->post('aspek');
        $profil = $this->input->post('profil');
        $sumber = $this->input->post('sumber');
        $keterangan = $this->input->post('keterangan');
        // menyimpan data yang ditangkap dengan array
        $risk = [
            'aspek' => $aspek,
            'profil_risiko' => $profil,
            'sumber_risiko' => $sumber,
            'keterangan' => $keterangan

        ];
        $this->Library_model->update_risk($idRisk, $risk);


        //memberikan notifikasi di tampilan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diperbaharui</div>');
        //merefresh page
        redirect('library/datasumber');
    }
    public function addRisk()
    {
        //Mengambil data yang dikirimkan dengan variable baru agar variablenya dapat digunakan kembali
        $aspek = $this->input->post('aspek');
        $profil = $this->input->post('profilRisiko');
        $sumber = $this->input->post('sumberRisiko');
        $keterangan = $this->input->post('keterangan');

        // menyimpan data yang ditangkap dengan array
        $risk = [

            'aspek' => $aspek,
            'profil_risiko' => $profil,
            'sumber_risiko' => $sumber,
            'keterangan' => $keterangan
        ];
        //insert ke database
        $this->Library_model->add_risk($risk);

        //memberikan notifikasi di tampilan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');

        //merefresh page
        redirect('library/datasumber');
    }
    //akhir fungsi pada halaman data sumber
    //akhir fungsi pada bagian Risk Library Management
}
