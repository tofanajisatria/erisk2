<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Library_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $id = $this->input->get('id');
        $tw = $this->input->get('tw');
        $app = $this->input->get('app'); //page approval
        $read = $this->input->get('read'); //viewers ok
        $approve = $this->input->get('approve'); //
        $pesan = $this->input->post('pesan'); //

        if ($read) {
            $up = [
                'lihat' => 1
            ];
            $this->db->where('id_identification', $id);
            $this->db->where('tw', $tw);
            $this->db->update('approval', $up);
            $app = 3;
        }
        if ($approve) {
            $up = [
                'setuju' => 1
            ];
            $this->db->where('id_identification', $id);
            $this->db->where('tw', $tw);
            $this->db->update('approval', $up);
            $app = 3;
        }
        if ($pesan) {
            $up = [
                'setuju' => 3,
                'pesan' => $pesan
            ];
            $this->db->where('id_identification', $id);
            $this->db->where('tw', $tw);
            $this->db->update('approval', $up);
            $app = 3;
        }

        if ($app == 1) {
            $data['app'] = 1;
        } else if ($app == 3) {
            $data['app'] = 99;
        } else {
            $data['app'] = 0;
        }
        $data['reading'] = $this->Library_model->fetch_asesmen($id, $tw);

        $data['title'] = 'E-Risk ';
        $dataUser = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $dataUser;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);

        $this->load->view('pages/read', $data);
        $this->load->view('templates/footer', $data);
    }
}
