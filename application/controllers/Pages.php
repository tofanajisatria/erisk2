<?php
//bismillah dulu :) JANGAN LUPA BACA DAN BUAT KOMENTAR
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Style\Border;

class Pages extends CI_Controller
{
    //membuat konstraktor agar setiap controller ini dijalankan ini wajib dijalankan
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Library_model');
        $this->load->library('form_validation');
    }

    //pengatur page identifikasi
    public function index()
    {
        //fungsi menampilkan halaman utama (index)
        $data['title'] = 'E-Risk ';
        $data['divisi'] = $this->Library_model->get_divisi();
        $data['sumber_risiko'] = $this->Library_model->get_aspek();
        $this->load->view('templates/home_header', $data);
        $this->load->view('pages/index', $data);
        $this->load->view('templates/home_footer');
    }

    //pengatur page identifikasi
    public function identifikasi()
    {
        //mengambil data pada database
        $data['divisi'] = $this->Library_model->get_divisi();

        //funsi agar data yang ditampilkan berbeda antara user dan admin
        $year = date('Y');
        $dataUser = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $dataUser;
        if ($dataUser['role_id'] == 1) {
            $data['identifikasi'] = $this->db->get_where('identification', ['tahun' => $year])->result_array();
        } else {
            $data['identifikasi'] = $this->db->get_where('identification', ['pengisi' => $dataUser['name']])->result_array();
        }
        $dataRisk = $this->db->get_where('risk_detail', ['id_identifikasi' => $this->session->userdata('id')])->result_array();
        $data['riskDetail'] = $dataRisk;

        //session untuk pengguna
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //menampilkan tampilan 
        $data['title'] = 'E-Risk ';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pages/identifikasi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function riskDetail()
    {
        //mengambil data pada database
        $data['sumber_risiko'] = $this->Library_model->get_aspek();

        //funsi agar data yang ditampilkan berbeda antara user dan admin
        $tgl = date('Y');
        $dataUser = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $dataUser;

        if ($dataUser['role_id'] == 1) {
            $data['identifikasi'] = $this->db->get_where('identification', ['tahun' => $tgl])->result_array();
            $codeUser = '1';
            $data['dataRisk'] = $this->Library_model->get_datarisk($codeUser);
        } else {
            $data['identifikasi'] = $this->db->get_where('identification', ['tahun' => $tgl, 'pengisi' => $dataUser['name']])->result_array();
            $codeUser = $dataUser['name'];
            $data['dataRisk'] = $this->Library_model->get_datarisk($codeUser);
        }
        $dataRisk = $this->db->get_where('risk_detail', ['id_identifikasi' => $this->session->userdata('id')])->result_array();
        $data['riskDetail'] = $dataRisk;

        //menampilkan tampilan 
        $data['title'] = 'E-Risk Risk Detail ';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pages/riskdetail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function evaluasi()
    {

        //default tampilan
        $data['title'] = 'E-Risk Evaluasi & Mitigasi';
        $tgl = date('Y');
        $data['mitigasiBerjalan'] = $this->db->get('mitigasi_berjalan')->result_array();
        $dataUser = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $dataUser;
        if ($dataUser['role_id'] == 1) {
            $data['identifikasi'] = $this->db->get_where('identification', ['tahun' => $tgl])->result_array();
            $codeUser = '1';
            $data['dataEval'] = $this->Library_model->get_dataevaluasi($codeUser);
        } else {
            $data['identifikasi'] = $this->db->get_where('identification', ['tahun' => $tgl, 'pengisi' => $dataUser['name']])->result_array();
            $codeUser = $dataUser['name'];
            $data['dataEval'] = $this->Library_model->get_dataevaluasi($codeUser);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pages/evaluasi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function mitigasi()
    {
        $data['title'] = 'E-Risk Evaluasi & Mitigasi (2)';
        $tgl = date('Y');
        $dataUser = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $dataUser;
        if ($dataUser['role_id'] == 1) {
            $data['identifikasi'] = $this->db->get_where('identification', ['tahun' => $tgl])->result_array();
            $codeUser = '1';
            $data['dataMiti'] = $this->Library_model->get_datamitigasi($codeUser);
        } else {
            $data['identifikasi'] = $this->db->get_where('identification', ['tahun' => $tgl, 'pengisi' => $dataUser['name']])->result_array();
            $codeUser = $dataUser['name'];
            $data['dataMiti'] = $this->Library_model->get_datamitigasi($codeUser);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pages/mitigasi', $data);
        $this->load->view('templates/footer', $data);
    }
    public function monitoring()
    {

        $active = 1;

        $data['title'] = 'E-Risk Monitoring Risiko';

        $data['divisi'] = $this->Library_model->get_divisi();
        $data['pengguna'] = $this->db->get_where('user', ['is_active' => $active])->result_array();


        //funsi agar data yang ditampilkan berbeda antara user dan admin
        $tgl = date('Y');
        $dataUser = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $dataUser;


        $divisi = $this->input->post('divisi');
        $bagian = $this->input->post('bagian');
        $tahun  = $this->input->post('tahun');
        $periode = $this->input->post('periode');
        $proyek = $this->input->post('proyek');


        if ($this->input->post('periode')) {
            $data['monitoring'] = $this->Library_model->fetch_monitoring($bagian, $tahun, $periode, $proyek);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data saat ini ' . $divisi . ' ' . 'bagian ' . $bagian . ' proyek ' . $proyek . ' pada tahun ' . $tahun . ' periode ' . $periode . '</div>');
            $moni = $data['monitoring'];
            $mon = $moni[0]['id'];
            $sessionMonitoring = [
                'divisi' => $divisi,
                'bagian' => $bagian,
                'tahun' => $tahun,
                'periode' => $periode,
                'proyek' => $proyek,
                'id_identifikasi' => $mon
            ];
            $this->session->set_userdata($sessionMonitoring);
        }

        if ($dataUser['role_id'] == 1) {
            $data['identifikasi'] = $this->db->get_where('identification', ['tahun' => $tgl])->result_array();
        } else {
            $data['identifikasi'] = $this->db->get_where('identification', ['pengisi' => $dataUser['name']])->result_array();
        }
        $dataRisk = $this->db->get_where('risk_detail', ['id_identifikasi' => $this->session->userdata('id')])->result_array();
        $data['riskDetail'] = $dataRisk;

        //session untuk pengguna
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);

            $this->load->view('pages/monitoring', $data);

            $this->load->view('templates/footer', $data);
        } else {
            //vsukses
            redirect('pages/monitoring');
        }
        // $bagian = $this->input->post('bagian');
        // $tahun  = $this->input->post('tahun');
        // $periode = $this->input->post('periode1');

        // $monitor = [
        //     'bagian' => $bagian,
        //     'tahun' => $tahun,
        //     'periode' => $periode
        // ];
        // // $data['monitoring'] = $this->Library_model->get_monitor($monitor);
        // $data['monitoring'] = ["hello World"];

    }
    

    public function approval()
    {
        $divisi = $this->input->post('divisi');
        $bagian = $this->input->post('bagian');
        $made = $this->input->post('made[]');
        $approval = $this->input->post('approval[]');
        $review = $this->input->post('review[]');


        $data['title'] = 'E-Risk Approval';
        $data['divisi'] = $this->Library_model->get_divisi();

        //funsi agar data yang ditampilkan berbeda antara user dan admin
        $tgl = date('Y');
        // $data['pengguna'] = $this->Library_model->get_pengguna();
        $active = 1;
        $data['pengguna'] = $this->db->get_where('user', ['is_active' => $active])->result_array();
        $dataUser = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $dataUser;
        if ($dataUser['role_id'] == 1) {
            $data['identifikasi'] = $this->db->get_where('identification', ['tahun' => $tgl])->result_array();
        } else {
            $data['identifikasi'] = $this->db->get_where('identification', ['pengisi' => $dataUser['name']])->result_array();
        }
        $dataRisk = $this->db->get_where('risk_detail', ['id_identifikasi' => $this->session->userdata('id')])->result_array();
        $data['riskDetail'] = $dataRisk;

        //session untuk pengguna
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pages/approval', $data);
        $this->load->view('templates/footer', $data);
    }
    public function summary()
    {
        $data['title'] = 'E-Risk Summary';
        $data['divisi'] = $this->Library_model->get_divisi();
        $data['summary'] = $this->Library_model->get_summary();
        $data['sum'] = $this->Library_model->get_sum();
      
        //funsi agar data yang ditampilkan berbeda antara user dan admin
        $tgl = date('Y');
        $dataUser = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $dataUser;
        if ($dataUser['role_id'] == 1) {
            $data['identifikasi'] = $this->db->get_where('identification', ['tahun' => $tgl])->result_array();
        } else {
            $data['identifikasi'] = $this->db->get_where('identification', ['pengisi' => $dataUser['name']])->result_array();
        }
        $dataRisk = $this->db->get_where('risk_detail', ['id_identifikasi' => $this->session->userdata('id')])->result_array();
        $data['riskDetail'] = $dataRisk;

        //session untuk pengguna
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pages/summary', $data);
        $this->load->view('templates/footer', $data);
    }
    public function result()
    { }
    public function onePage()
    {


        $data['title'] = 'E-Risk One Page Assesment';
        $data['sumber_risiko'] = $this->Library_model->get_aspek();

        $data['divisi'] = $this->Library_model->get_divisi();


        //funsi agar data yang ditampilkan berbeda antara user dan admin
        $tgl = date('Y');
        $dataUser = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $dataUser;


        $divisi = $this->input->post('divisi');
        $bagian = $this->input->post('bagian');
        $proyek = $this->input->post('namaProyek');
        $pelanggan = $this->input->post('namaPelanggan');
        $pic = $this->input->post('PICProyek');
        $akun = $this->input->post('PICAkun');
        $petugas = $this->input->post('PetugasA');
        $tujuan = $this->input->post('tujuan');
        $tahun  = $this->input->post('tahun');
        $triwulan = $this->input->post('triwulan');
        if ($this->input->post('triwulan')) {
            $onep = [
                'divisi'  => $divisi,
                'bagian'     => $bagian,
                'proyek'     => $proyek,
                'pelanggan'     => $pelanggan,
                'pic'     => $pic,
                'akun'     => $akun,
                'petugas'     => $petugas,
                'tujuan'     => $tujuan,
                'tahun'     => $tahun,
                'triwulan'     => $triwulan

            ];
            $this->session->set_userdata($onep);
            $data['onepage'] = $this->Library_model->get_onepage($bagian, $tahun, $triwulan);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data saat ini ' . $divisi . ' ' . 'bagian ' . $bagian . ' pada tahun ' . $tahun . ' periode ' . $triwulan . '</div>');
        }

        if ($dataUser['role_id'] == 1) {
            $data['identifikasi'] = $this->db->get_where('identification', ['tahun' => $tgl])->result_array();
        } else {
            $data['identifikasi'] = $this->db->get_where('identification', ['pengisi' => $dataUser['name']])->result_array();
        }
        $dataRisk = $this->db->get_where('risk_detail', ['id_identifikasi' => $this->session->userdata('id')])->result_array();
        $data['riskDetail'] = $dataRisk;

        //session untuk pengguna
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            if ($dataUser['role_id'] == 1) {

                $this->load->view('pages/onepage', $data);
            } else {
                $this->load->view('pages/onepage', $data);
            }
            $this->load->view('templates/footer', $data);
        } else {
            //vsukses
            redirect('pages/monitoring');
        }
    }

    //function dalam setiap page
    public function fetch_proyek()
    {
        $output = [];
        $proyek = $this->db->get_where('identification', ['bagian' => $_POST['bagian']])->result_array();
        $pro = array_unique(array_column($proyek, 'nama_proyek'));

        $output .= '<option selected="true" disabled="disabled">- Pilih proyek -</option>';

        foreach ($pro as $p) :
            $output .= '<option value="' . $p . '">' . $p . '</option>';
        endforeach;
        echo $output;
    }

    //function di halaman identifikasi

    //fungsi mengambil dropdown agar dinamis (sesuai dengan database)
    public function fetch_bagian()
    {
        $output = [];
        $bagian = $this->db->get_where('divisi', ['nama_divisi' => $_POST['namaDivisi']])->result_array();
        $output .= '<option selected="true" disabled="disabled">- Pilih bagian -</option>';

        foreach ($bagian as $bag) :
            $output .= '<option value="' . $bag['bagian'] . '">' . $bag['bagian'] . '</option>';
        endforeach;
        echo $output;
    }

    //fungsi mengambil dropdown profil agar dinamis
    public function fetch_profil()
    {
        $profilRisiko = [];
        $pro = $this->db->get_where('sumber_risiko', ['aspek' => $_POST['aspekRisiko']])->result_array();
        $profil = array_unique(array_column($pro, 'profil_risiko'));

        $profilRisiko .= '<option selected="true" disabled="disabled">- Pilih Profil Risiko -</option>';
        foreach ($profil as $prof) :
            $profilRisiko .= '<option value="' . $prof . '">' . $prof . '</option>';
        endforeach;
        echo $profilRisiko;
    }

    //dropdown sumber dinamis
    public function fetch_sumber()
    {
        $sumberRisiko = [];
        $sum = $this->db->get_where('sumber_risiko', ['profil_risiko' => $_POST['profil']])->result_array();
        $sumber = array_unique(array_column($sum, 'sumber_risiko'));

        $sumberRisiko .= '<option selected="true" disabled="disabled">- Pilih Sumber Risiko -</option>';
        foreach ($sumber as $s) :
            $sumberRisiko .= '<option value="' . $s . '">' . $s . '</option>';
        endforeach;
        echo $sumberRisiko;
    }

    //dropdown keterangan dinamis
    public function fetch_keterangan()
    {
        $keterangan = [];
        $ke_terangan = $this->db->get_where('sumber_risiko', ['sumber_risiko' => $_POST['sumber']])->result_array();
        $ket = array_unique(array_column($ke_terangan, 'keterangan'));
        $keterangan .= '<option selected="true" disabled="disabled">- Pilih Keterangan -</option>';
        foreach ($ket as $k) :
            $keterangan .= '<option value="' . $k . '">' . $k . '</option>';
        endforeach;
        echo $keterangan;
    }

    //menambah identifikasi
    public function addidentifikasi()
    {  //Mengambil data yang dikirimkan dengan variable baru agar variablenya dapat digunakan kembali
        $divisi = $this->input->post('divisi');
        $bagian = $this->input->post('bagian');
        $namaProyek = $this->input->post('namaProyek');
        $namaPelanggan = $this->input->post('namaPelanggan');
        $picProyek = $this->input->post('PICProyek');
        $picAkun = $this->input->post('PICAkun');
        $petugas = $this->input->post('petugasA');
        $tanggal =  $this->input->post('tanggalA');
        $tujuan = $this->input->post('tujuan');
        $waktu = time();
        $tahun = date("Y");
        $pengisi = $this->input->post('pengisi');
        $id = $this->input->post('idIdentifikasi');
        // menyimpan data yang ditangkap dengan array
        if (!$id) {
            $iden = [
                'divisi' => $divisi,
                'bagian' => $bagian,
                'nama_proyek' => $namaProyek,
                'nama_pelanggan' => $namaPelanggan,
                'pic_proyek' => $picProyek,
                'pic_akun' => $picAkun,
                'petugas' => $petugas,
                'tanggal' => $tanggal,
                'tujuan' => $tujuan,
                'waktu' => $waktu,
                'tahun' => $tahun,
                'pengisi' => $pengisi
            ];
            //insert ke database
            $this->Library_model->add_identifikasi($iden);
            //membuat session sesuai dengan data yang baru saja ditambahkan
            $ide = $this->db->get_where('identification', ['waktu' => $waktu])->row_array();
            $sessionIdentifikasi = [
                'id' => $ide['id'],
                'divisi' => $ide['divisi'],
                'bagian' => $ide['bagian'],
                'nama_proyek' => $ide['nama_proyek'],
                'tujuan' => $ide['tujuan']


            ];
            $this->session->set_userdata($sessionIdentifikasi);

            //memberikan notifikasi di tampilan
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
        } else {
            $iden = [
                'divisi' => $divisi,
                'bagian' => $bagian,
                'nama_proyek' => $namaProyek,
                'nama_pelanggan' => $namaPelanggan,
                'pic_proyek' => $picProyek,
                'pic_akun' => $picAkun,
                'petugas' => $petugas,
                'tanggal' => $tanggal,
                'tujuan' => $tujuan
            ];
            $this->Library_model->update_identifikasi($id, $iden);
            //membuat session sesuai dengan data yang baru saja ditambahkan
            $ide = $this->db->get_where('identification', ['waktu' => $waktu])->row_array();
            $sessionIdentifikasi = [
                'id' => $ide['id'],
                'divisi' => $ide['divisi'],
                'bagian' => $ide['bagian'],
                'nama_proyek' => $ide['nama_proyek'],
                'tujuan' => $ide['tujuan']


            ];
            $this->session->set_userdata($sessionIdentifikasi);

            //memberikan notifikasi di tampilan
            $this->session->set_flashdata('flash', 'diubah');
        }
        //merefresh page
        redirect('pages/identifikasi');
    }
    public function updateIdentifikasi()
    { }

    //mengubah session agar id pada risk detail sesuai dengan yang dipilih
    public function ubahIdentifikasiRisk($id)
    {

        //menghancurkan session yg dibuat dari fungsi addidentifikasi
        $identifikasi = [
            'id',
            'divisi',
            'bagian',
            'nama_proyek',
            'nama_pelanggan',
            'pic_proyek',
            'pic_akun',
            'petugas',
            'tanggal',
            'tujuan',
            'waktu',
            'tahun',
            'pengisi'
        ];
        $this->session->unset_userdata($identifikasi);

        //mengambil data yang akan dijadikan session baru
        $ide = $this->db->get_where('identification', ['id' => $id])->row_array();

        //membuat session baru
        $sessionIdentifikasi = [
            'id' => $ide['id'],
            'divisi' => $ide['divisi'],
            'bagian' => $ide['bagian'],
            'nama_proyek' => $ide['nama_proyek'],
            'tujuan' => $ide['tujuan']


        ];
        $this->session->set_userdata($sessionIdentifikasi);

        //mengembalikan page
        redirect('pages/riskdetail');
    }

    //menghapus data yang sudah diinputkan
    public function hapus($id)
    {
        $this->Library_model->hapusDataIdentifikasi($id);
        redirect('pages/identifikasi');
    }

    public function hapusrisk($id)
    {
        $this->Library_model->hapusDataRisk($id);
        redirect('pages/riskdetail');
    }

    //menambah risk detail
    public function addRiskDetail()
    {
        // Mengambil data sebagai sebuah variable baru
        $id = $this->input->post('idRisk');
        $aspek = $this->input->post('aspek');
        $profilRisiko = $this->input->post('profilRisiko');
        $sumberRisiko = $this->input->post('sumberRisiko');
        $kontrol = $this->input->post('kontrol');
        $keterangan = $this->input->post('keterangan');
        $konsekuensi = $this->input->post('konsekuensi');
        $nilai = $this->input->post('nilai');
        $idIndentifikasi =  $this->input->post('idIdentifikasi');
        $pengisi = $this->input->post('pengisi');
        $bagian = $this->input->post('bagian');
        if (!$id) {
            //menjadikan variable menjadi sebuah array
            $risk = [
                'id_identifikasi' => $idIndentifikasi,
                'aspek' => $aspek,
                'profil_risiko' => $profilRisiko,
                'sumber_risiko' => $sumberRisiko,
                'kontrol' => $kontrol,
                'keterangan' => $keterangan,
                'konsekuensi' => $konsekuensi,
                'nilai' => "Rp. " . $nilai,
                'pengisi' => $pengisi,
                'bagian' => $bagian

            ];
            //menyimpan risk detail
            $this->Library_model->add_riskDetail($risk);
        } else {

            $risk = [
                'aspek' => $aspek,
                'profil_risiko' => $profilRisiko,
                'sumber_risiko' => $sumberRisiko,
                'kontrol' => $kontrol,
                'keterangan' => $keterangan,
                'konsekuensi' => $konsekuensi,
                'nilai' =>  $nilai
            ];
            //menyimpan risk detail
            $this->Library_model->update_riskDetail($id, $risk);
        }
        //membuat session data
        $risks = $this->db->get_where('risk_detail', ['id_identifikasi' => $idIndentifikasi, 'konsekuensi' => $konsekuensi, 'nilai' => "Rp. " . $nilai, 'pengisi' => $pengisi])->row_array();

        $sessionRisk = [
            'id_risk' => $risks['id'],
            'profil_risiko' => $risks['profil_risiko'],
            'sumber_risiko' => $risks['sumber_risiko'],
            'keterangan' => $risks['keterangan']


        ];
        $this->session->set_userdata($sessionRisk);

        //merefresh page
        redirect('pages/riskdetail');
    }

    public function addNewRisk()
    {
        //mengambil data yang dipost
        $aspek = $this->input->post('aspek');
        $profilRisiko = $this->input->post('profilRisiko');
        $sumberRisiko = $this->input->post('sumberRisiko');
        $keterangan = $this->input->post('keterangan');

        //membuat array dari data
        $newRisk = [
            'aspek' => $aspek,
            'profil_risiko' => $profilRisiko,
            'sumber_risiko' => $sumberRisiko,
            'keterangan' => $keterangan
        ];
        //memanggil fungsi pada model
        $this->Library_model->add_new_risk($newRisk);

        //kembali ke page
        redirect('pages/riskdetail');
    }

    //akhir fungsi dari halaman identifikasi

    //awal fungsi dari halaman evaluasi
    public function addExitingControl()
    {
        $addExitingControl = $this->input->post('addExitingControl');
        $newExitingControl = ['exiting_control' => $addExitingControl];
        $this->Library_model->add_new_exitingcontrol($newExitingControl);
        redirect('pages/evaluasi');
    }
    public function hapusEvaluation($id)
    {
        $this->Library_model->hapusEvaluation($id);
        redirect('pages/evaluasi');
    }

    public function ubahSessionRisk($id)
    {

        //menghancurkan session yg dibuat dari fungsi addidentifikasi
        $sessionRisk = [
            'id_risk',
            'profil_risiko',
            'sumber_risiko',
            'keterangan',
            'bagian'



        ];
        $this->session->unset_userdata($sessionRisk);

        //mengambil data yang akan dijadikan session baru
        $risk = $this->db->get_where('risk_detail', ['id' => $id])->row_array();

        //membuat session baru
        $sessionRisk = [
            'id_risk' => $risk['id'],
            'profil_risiko' => $risk['profil_risiko'],
            'sumber_risiko' => $risk['sumber_risiko'],
            'keterangan' => $risk['keterangan'],
            'bagian' => $risk['bagian']

        ];
        $this->session->set_userdata($sessionRisk);

        //mengembalikan page
        redirect('pages/evaluasi');
    }

    public function fetch_LikelihoodKini()
    {
        $periode1 = (int) $_POST['periode'];
        $tahun1 = (int) $_POST['tahun'];
        $sumber = $_POST['sumber'];
        $bagian = $_POST['bagian'];

        if ($periode1 == 1) {
            $tahun = $tahun1 - 1;
            $periode = 4;
        } else {
            $tahun = $tahun1;
            $periode = $periode1 - 1;
        }
        $output = [];
        $hasil = $this->Library_model->fetch_nilaiRisk($sumber, $tahun, $periode, $bagian);
        $hasil1 = $this->Library_model->fetch_nilaiRisk($sumber, $tahun1, $periode1, $bagian);
        if ($hasil1) {
            $output .= '<option selected="true" value="9">' . $hasil1[0]['likelihood_kini'] . '</option>';
        } else {
            //jika ada 
            if ($hasil) {
                $likelihood = (int) $hasil[0]['likelihood_sisa'];
                if ($likelihood == 0) {

                    $output .= '<option selected="true" value="' . $hasil[0]['likelihood_kini'] . '">' . $hasil[0]['likelihood_kini'] . '</option>';
                } else {

                    $output .= '<option selected="true" value="' . $hasil[0]['likelihood_sisa'] . '">' . $hasil[0]['likelihood_sisa'] . '</option>';
                }
            }
            //jika tidak ada datanya
            else {

                $output .= '<option selected="true" disabled="disabled">- likelihood -</option>';

                for ($i = 1; $i < 6; $i++) {
                    $output .= '<option  value="' . $i . '">' . $i . '</option>';
                }
            }
        }
        print_r($output);
    }


    public function fetch_ConsequenceKini()
    {
        $periode1 = (int) $_POST['periode'];
        $tahun1 = (int) $_POST['tahun'];
        $sumber = $_POST['sumber'];
        $bagian = $_POST['bagian'];
        if ($periode1 == 1) {
            $tahun = $tahun1 - 1;
            $periode = 4;
        } else {
            $tahun = $tahun1;
            $periode = $periode1 - 1;
        }
        $output = [];
        $hasil = $this->Library_model->fetch_nilaiRisk($sumber, $tahun, $periode, $bagian);
        $hasil1 = $this->Library_model->fetch_nilaiRisk($sumber, $tahun1, $periode1, $bagian);
        if ($hasil1) {
            $output .= '<option selected="true" value="9">' . $hasil1[0]['consequence_kini'] . '</option>';
        } else {
            //jika ada 
            if ($hasil) {
                $consequence = (int) $hasil[0]['consequence_sisa'];
                if ($consequence == 0) {

                    $output .= '<option selected="true" value="' . $hasil[0]['consequence_kini'] . '">' . $hasil[0]['consequence_kini'] . '</option>';
                } else {

                    $output .= '<option selected="true" value="' . $hasil[0]['consequence_sisa'] . '">' . $hasil[0]['consequence_sisa'] . '</option>';
                }
            }
            //jika tidak ada datanya
            else {

                $output .= '<option selected="true" disabled="disabled">- consequence -</option>';

                for ($i = 1; $i < 6; $i++) {
                    $output .= '<option  value="' . $i . '">' . $i . '</option>';
                }
            }
        }
        print_r($output);
    }

    public function levelKini()
    {
        $periode1 = (int) $_POST['periode'];
        $tahun1 = (int) $_POST['tahun'];
        $sumber = $_POST['sumber'];
        $bagian = $_POST['bagian'];
        if ($periode1 == 1) {
            $tahun = $tahun1 - 1;
            $periode = 4;
        } else {
            $tahun = $tahun1;
            $periode = $periode1 - 1;
        }
        $output = [];
        $hasil = $this->Library_model->fetch_nilaiRisk($sumber, $tahun, $periode, $bagian);
        $hasil1 = $this->Library_model->fetch_nilaiRisk($sumber, $tahun1, $periode1, $bagian);
        if ($hasil1) {
            $output .= '<option selected="true" value="enable">' . $hasil1[0]['level_kini'] . '</option>';
        } else {
            //jika ada 

            if ($hasil) {
                $consequence = (int) $hasil[0]['consequence_sisa'];
                if ($consequence == 0) {

                    $output .= '<option selected="true" value="' . $hasil[0]['level_kini'] . '">' . $hasil[0]['level_kini'] . '</option>';
                } else {

                    $output .= '<option selected="true" value="' . $hasil[0]['level_sisa'] . '">' . $hasil[0]['level_sisa'] . '</option>';
                }
            } else {
                $output .= '<option  value="0">- level kini -</option>';
            }
        }
        print_r($output);
    }

    public function tanggapanKini()
    {
        $periode1 = (int) $_POST['periode'];
        $tahun1 = (int) $_POST['tahun'];
        $sumber = $_POST['sumber'];
        $bagian = $_POST['bagian'];
        if ($periode1 == 1) {
            $tahun = $tahun1 - 1;
            $periode = 4;
        } else {
            $tahun = $tahun1;
            $periode = $periode1 - 1;
        }
        $output = [];
        $hasil = $this->Library_model->fetch_nilaiRisk($sumber, $tahun, $periode, $bagian);
        $hasil1 = $this->Library_model->fetch_nilaiRisk($sumber, $tahun1, $periode1, $bagian);
        if ($hasil1) {
            $output .= '<option selected="true" value="enable">' . $hasil1[0]['tanggapan_kini'] . '</option>';
        } else {
            //jika ada 

            if ($hasil) {
                $consequence = (int) $hasil[0]['consequence_sisa'];
                if ($consequence == 0) {

                    $output .= '<option selected="true" value="' . $hasil[0]['tanggapan_kini'] . '">' . $hasil[0]['tanggapan_kini'] . '</option>';
                } else {

                    $output .= '<option selected="true" value="' . $hasil[0]['tanggapan_sisa'] . '">' . $hasil[0]['tanggapan_sisa'] . '</option>';
                }
            } else {
                $output .= '<option  value="0">- tanggapan -</option>';
            }
        }
        print_r($output);
    }

    public function fetch_LikelihoodSisa()
    {
        $periode1 = (int) $_POST['periode'];
        $tahun1 = (int) $_POST['tahun'];
        $sumber = $_POST['sumber'];
        $bagian = $_POST['bagian'];

        if ($periode1 == 1) {
            $tahun = $tahun1 - 1;
            $periode = 4;
        } else {
            $tahun = $tahun1;
            $periode = $periode1 - 1;
        }
        $output = [];
        $hasil = $this->Library_model->fetch_nilaiRisk($sumber, $tahun, $periode, $bagian);
        $hasil1 = $this->Library_model->fetch_nilaiRisk($sumber, $tahun1, $periode1, $bagian);
        if ($hasil1) {
            $output .= '<option selected="true" value="enable">' . $hasil1[0]['likelihood_sisa'] . '</option>';
        } else {
            if ($hasil) {

                $output .= '<option selected="true" disabled="disabled">- likelihood -</option>';

                for ($i = 1; $i < 6; $i++) {
                    $output .= '<option  value="' . $i . '">' . $i . '</option>';
                }
            } else {
                $output .= '<option  value="0"> ------- </option>';
            }
        }
        print_r($output);
    }



    public function fetch_ConsequenceSisa()
    {
        $periode1 = (int) $_POST['periode'];
        $tahun1 = (int) $_POST['tahun'];
        $sumber = $_POST['sumber'];
        $bagian = $_POST['bagian'];
        if ($periode1 == 1) {
            $tahun = $tahun1 - 1;
            $periode = 4;
        } else {
            $tahun = $tahun1;
            $periode = $periode1 - 1;
        }
        $output = [];
        $hasil = $this->Library_model->fetch_nilaiRisk($sumber, $tahun, $periode, $bagian);
        $hasil1 = $this->Library_model->fetch_nilaiRisk($sumber, $tahun1, $periode1, $bagian);
        if ($hasil1) {
            $output .= '<option selected="true" value="enable">' . $hasil1[0]['consequence_sisa'] . '</option>';
        } else {
            if ($hasil) {

                $output .= '<option selected="true" disabled="disabled">- consequence -</option>';

                for ($i = 1; $i < 6; $i++) {
                    $output .= '<option  value="' . $i . '">' . $i . '</option>';
                }
            } else {
                $output .= '<option  value="0"> ------- </option>';
            }
        }
        print_r($output);
    }

    public function fetch_LevelKini()
    {
        $levelKini = [];
        $level = $this->db->get_where('level_risiko', ['kemungkinan' => $_POST['likelihood'], 'konsekuensi' => $_POST['consequence']])->result_array();

        foreach ($level as $l) :
            $levelKini .= '<option value="' . $l['level'] . '" class="' . $l['button'] . '">' . $l['level'] . '</option>';
        endforeach;
        print_r($levelKini);
    }

    public function fetch_tanggapanKini()
    {
        $levelKini = [];
        $level = $this->db->get_where('level_risiko', ['kemungkinan' => $_POST['likelihood'], 'konsekuensi' => $_POST['consequence']])->result_array();

        foreach ($level as $l) :
            $levelKini .= '<option value="' . $l['tanggapan'] . '" class="' . $l['button'] . '">' . $l['tanggapan'] . '</option>';
        endforeach;
        print_r($levelKini);
    }

    public function LevelKiniOne()
    {
        $level = [];
        $level = $this->db->get_where('level_risiko', ['kemungkinan' => $_POST['likelihood'], 'konsekuensi' => $_POST['consequence']])->result_array();

        foreach ($level as $l) :
            $level .= '<input type="text" disabled value="' . $l['level'] . '" class="' . $l['button'] . '">';
        endforeach;
        print_r($level);
    }

    public function tanggapanKiniOne()
    {
        $level = [];
        $level = $this->db->get_where('level_risiko', ['kemungkinan' => $_POST['likelihood'], 'konsekuensi' => $_POST['consequence']])->result_array();

        foreach ($level as $l) :
            $level .= '<input type="text" disabled value="' . $l['tanggapan'] . '" class="' . $l['button'] . '">';
        endforeach;
        print_r($level);
    }

    public function levelSisa()
    {
        $periode1 = (int) $_POST['periode'];
        $tahun1 = (int) $_POST['tahun'];
        $sumber = $_POST['sumber'];
        $bagian = $_POST['bagian'];
        if ($periode1 == 1) {
            $tahun = $tahun1 - 1;
            $periode = 4;
        } else {
            $tahun = $tahun1;
            $periode = $periode1 - 1;
        }
        $output = [];
        $hasil = $this->Library_model->fetch_nilaiRisk($sumber, $tahun, $periode, $bagian);
        $hasil1 = $this->Library_model->fetch_nilaiRisk($sumber, $tahun1, $periode1, $bagian);
        if ($hasil1) {
            $output .= '<option selected="true" value="enable">' . $hasil1[0]['level_sisa'] . '</option>';
        } else {
            if ($hasil) {

                $output .= '<option selected="true" disabled="disabled">- level sisa -</option>';
            } else {
                $output .= '<option  value="0"> ------- </option>';
            }
        }
        print_r($output);
    }

    public function tanggapanSisa()
    {
        $periode1 = (int) $_POST['periode'];
        $tahun1 = (int) $_POST['tahun'];
        $sumber = $_POST['sumber'];
        $bagian = $_POST['bagian'];
        if ($periode1 == 1) {
            $tahun = $tahun1 - 1;
            $periode = 4;
        } else {
            $tahun = $tahun1;
            $periode = $periode1 - 1;
        }
        $output = [];
        $hasil = $this->Library_model->fetch_nilaiRisk($sumber, $tahun, $periode, $bagian);
        $hasil1 = $this->Library_model->fetch_nilaiRisk($sumber, $tahun1, $periode1, $bagian);
        if ($hasil1) {
            $output .= '<option selected="true" value="enable">' . $hasil1[0]['tanggapan_sisa'] . '</option>';
        } else {
            if ($hasil) {

                $output .= '<option selected="true" disabled="disabled">- tanggapan -</option>';
            } else {
                $output .= '<option  value="0"> ------- </option>';
            }
        }
        print_r($output);
    }

    public function fetch_LevelSisa()
    {
        $levelSisa = [];
        $level = $this->db->get_where('level_risiko', ['kemungkinan' => $_POST['likelihood'], 'konsekuensi' => $_POST['consequence']])->result_array();

        foreach ($level as $l) :
            $levelSisa .= '<option value="' . $l['level'] . '" class="' . $l['button'] . '">' . $l['level'] . '</option>';
        endforeach;
        print_r($levelSisa);
    }

    public function fetch_tanggapanSisa()
    {
        $levelSisa = [];
        $level = $this->db->get_where('level_risiko', ['kemungkinan' => $_POST['likelihood'], 'konsekuensi' => $_POST['consequence']])->result_array();

        foreach ($level as $l) :
            $levelSisa .= '<option value="' . $l['tanggapan'] . '" class="' . $l['button'] . '">' . $l['tanggapan'] . '</option>';
        endforeach;
        print_r($levelSisa);
    }

    public function addevaluasi()
    {
        $id_riskdetail = $this->input->post('idRiskDetail');
        $periode = $this->input->post('periode');
        $tahun = $this->input->post('tahun');
        $likelihoodKini = $this->input->post('likelihoodKini');
        $consequenceKini = $this->input->post('consequenceKini');
        $likelihoodSisa = $this->input->post('likelihoodSisa');
        $consequenceSisa = $this->input->post('consequenceSisa');
        $levelKini =  $this->input->post('levelKini');
        $levelSisa = $this->input->post('levelSisa');
        $tanggapanKini =  $this->input->post('tanggapanKini');
        $tanggapanSisa = $this->input->post('tanggapanSisa');
        $rules = $this->input->post('rules');
        $exitingControl1 = $this->input->post('exitingControl[]');
        if ($exitingControl1) {
            $exitingControl = implode(" , ", $exitingControl1);
        } else {
            $exitingControl = "-";
        }
        for ($i = 0; $i < count($exitingControl1); $i++) {
            $exit = $exitingControl1[$i];
            $exi = $this->db->get_where('mitigasi_berjalan', ['exiting_control' => $exit])->row_array();
            if (!$exi) {
                $exiting = [
                    'exiting_control' => $exit
                ];
                $this->db->insert('mitigasi_berjalan', $exiting);
            }
        }

        if ($likelihoodKini == 9) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tidak dapat ditambahkan, data sudah ada</div>');
            redirect('pages/evaluasi');
        } else {

            // menyimpan data yang ditangkap dengan array
            $eval = [
                'id_riskdetail' => $id_riskdetail,
                'periode' => $periode,
                'tahun' => $tahun,
                'likelihood_kini' => $likelihoodKini,
                'consequence_kini' => $consequenceKini,
                'likelihood_sisa' => $likelihoodSisa,
                'consequence_sisa' => $consequenceSisa,
                'level_kini' => $levelKini,
                'level_sisa' => $levelSisa,
                'tanggapan_kini' => $tanggapanKini,
                'tanggapan_sisa' => $tanggapanSisa,
                'exiting_control' => $exitingControl,
                'rules' => $rules
            ];
            //insert ke database
            $this->Library_model->add_evaluation($eval);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');

            //merefresh page
            redirect('pages/evaluasi');
        }
    }
    //akhir fungsi dari halaman evaluasi

    //awal fungsi halaman mitigasi

    public function ubahIdentifikasiMitigasi($id)
    {
        $ok = $this->input->get("ok");
        $tw = $this->input->get("tw");
        if ($ok) {
            $up = [
                'setuju' => 2
            ];
            $this->db->where('id_identification', $id);
            $this->db->where('tw', $tw);
            $this->db->update('approval', $up);
        }
        //menghancurkan session yg dibuat dari fungsi addidentifikasi
        $identifikasi = [
            'id',
            'divisi',
            'bagian',
            'nama_proyek',
            'nama_pelanggan',
            'pic_proyek',
            'pic_akun',
            'petugas',
            'tanggal',
            'tujuan',
            'waktu',
            'tahun',
            'pengisi'
        ];
        $this->session->unset_userdata($identifikasi);

        //mengambil data yang akan dijadikan session baru
        $ide = $this->db->get_where('identification', ['id' => $id])->row_array();

        //membuat session baru
        $sessionIdentifikasi = [
            'id' => $ide['id'],
            'divisi' => $ide['divisi'],
            'bagian' => $ide['bagian'],
            'nama_proyek' => $ide['nama_proyek'],
            'tujuan' => $ide['tujuan']


        ];
        $this->session->set_userdata($sessionIdentifikasi);

        //mengembalikan page
        redirect('pages/mitigasi');
    }
    public function addmonitoring()
    {

        $idRisk1 = $this->input->post('sumberId[]');
        $idRisk = implode(" , ", $idRisk1);
        $periode = $this->input->post('periode');
        $progress = $this->input->post('progress');
        $onprogress = $this->input->post('onprogress');
        $closed = $this->input->post('closed');
        $pending = $this->input->post('pending');

        if ($onprogress) {
            $status = "onprogress";
            $keterangan = $onprogress;
        } elseif ($closed) {
            $status = "closed";
            $keterangan = $closed;
        } elseif ($pending) {
            $status = "pending";
            $keterangan = $pending;
        } else {
            $status = "-";
            $keterangan = "-";
        }


        // menyimpan data yang ditangkap dengan array
        $monitor = [
            'id_identifikasi' => $idRisk,
            'periode_monitoring' => $periode,
            'progress' => $progress . "%",
            'status' => $status,
            'keterangan_monitoring' => $keterangan
        ];
        //insert ke database
        $this->Library_model->add_monitoring($monitor);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');

        //merefresh page
        redirect('pages/mitigasi');
    }



    public function addaction()
    {
        $idRisk = $this->input->post('idRisk');
        $title = $this->input->post('title');
        $deskripsi = $this->input->post('deskripsi');
        $waktu = $this->input->post('waktu');
        $nilai = $this->input->post('nilai');
        $pic = $this->input->post('pic');
        $evidence = $this->input->post('evidence');
        $hasil = $this->input->post('hasil');


        //cek jika ada gambar yang akan diedit
        $upload_file = $_FILES['attachment']['name'];

        if ($upload_file) {

            $config['allowed_types'] = 'gif|jpg|png|rar|pdf|doc|docx|xls|xlsx';
            $config['max_size'] = '51240';
            $config['upload_path'] = './assets/file/attachment/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('attachment')) {
                // $namaFile = $this->upload->data('file_name');



            } else {
                echo $this->upload->display_errors();
            }
        }
        $act = [
            'id_evaluation' => $idRisk,
            'title' => $title,
            'description' => $deskripsi,
            'attachment' => $upload_file,
            'date' => $waktu,
            'nilai_action' => 'Rp.' . $nilai,
            'PIC' => $pic,
            'evidence' => $evidence,
            'hasil' => $hasil

        ];
        // //insert ke database
        $this->db->insert('action_plan', $act);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diSimpan</div>');
        redirect('pages/mitigasi');
    }

    //akhir fungsi halaman mitigasi


    //awal fungsi halaman Monitoring
    public function fetchMonitoring()
    {
        $data['monitoring'] = ["a", "b", $this->input->post('bagian')];

        redirect('pages/monitoring', $data);
        // {
        //     $bagian = $this->input->post('bagian');
        //     $tahun = $this->input->post('tahun');
        //     $periode = $this->input->post('periode');
        //     $data['monitoring'] = $this->Library_model->fetch_monitoring($bagian, $tahun, $periode);
    }

    //akhir fungsi halaman Monitoring


    //awal fungsi halaman one page
    public function saveOnePage()
    {
        $divisi = $this->input->post('divisi');
        $bagian = $this->input->post('bagian');
        $proyek = $this->input->post('proyek');
        $pelanggan = $this->input->post('pelanggan');
        $pic = $this->input->post('pic');
        $akun = $this->input->post('akun');
        $petugas = $this->input->post('petugasA');
        $tujuan = $this->input->post('tujuan');
        $tahun = $this->input->post('tahun');
        $triwulan = $this->input->post('triwulan');
        $aspek = $this->input->post('aspek');
        $profil = $this->input->post('profil');
        $sumber = $this->input->post('sumber');
        $keterangan = $this->input->post('keterangan');
        $kontrol = $this->input->post('kontrol');
        $uraian = $this->input->post('uraian');
        $nilai = $this->input->post('nilai');
        $mitigasi = $this->input->post('mitigasi');
        $aturan = $this->input->post('aturan');
        $likelihood = $this->input->post('likelihood');
        $consequence = $this->input->post('consequence');
        $level = $this->input->post('level');
        $evidence = $this->input->post('evidence');
        $hasil = $this->input->post('hasil');
        $pengisi = $this->input->post('pengisi');

        $data = [
            'divisi' => $divisi,
            'bagian' => $bagian,
            'proyek' => $proyek,
            'pelanggan' => $pelanggan,
            'pic' => $pic,
            'akun' => $akun,
            'petugas' => $petugas,
            'tujuan' => $tujuan,
            'tahun' => $tahun,
            'triwulan' => $triwulan,
            'aspek' => $aspek,
            'profil' => $profil,
            'sumber' => $sumber,
            'keterangan' => $keterangan,
            'kontrol' => $kontrol,
            'uraian' => $uraian,
            'nilai' => $nilai,
            'mitigasi' => $mitigasi,
            'aturan' => $aturan,
            'likelihood' => $likelihood,
            'consequence' => $consequence,

            'level' => $level,
            'evidence' => $evidence,
            'hasil' => $hasil,
            'pengisi' => $pengisi
        ];
        $this->db->insert('one_page', $data);
        $data['onepage'] = $this->Library_model->get_onepage($bagian, $tahun, $triwulan);
        $onep = [
            'divisi'  => $divisi,
            'bagian'     => $bagian,
            'proyek'     => $proyek,
            'pelanggan'     => $pelanggan,
            'pic'     => $pic,
            'akun'     => $akun,
            'petugas'     => $petugas,
            'tujuan'     => $tujuan,
            'tahun'     => $tahun,
            'triwulan'     => $triwulan

        ];
        $this->session->set_userdata($onep);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data saat ini ' . $divisi . ' ' . 'bagian ' . $bagian . ' pada tahun ' . $tahun . ' periode ' . $triwulan . '</div>');
        redirect('pages/onepage');
    }

    //akhir fungsi halaman one page

    //awal fungsi halaman summary

    //akhir fungsi halaman summary

    public function addapproval()
    {
        $id =  $this->input->post('idm');
        $bagian =  $this->input->post('bagianm');
        $periode =  $this->input->post('periodem');
        $made =  $this->input->post('madebym');
        $review1 =  $this->input->post('review[]');
        $approval1 =  $this->input->post('approval[]');

        if ($approval1) {
            $approval = implode(" , ", $approval1);
        } else {
            $approval = "-";
        }
        if ($review1) {
            $review = implode(" , ", $review1);
        } else {
            $review = "-";
        }
        $approv = [
            'id_identification' => $id,
            'bagian'     => $bagian,
            'tw'     => $periode,
            'review'     => $review,
            'approval'     => $approval,
            'made'     => $made,
            'lihat' => 0,
            'setuju' => 0,
            'pesan' => 0,
            'rincian_tgl' => date('d F Y')

        ];
        $this->db->insert('approval', $approv);
        redirect('pages/summary');
    }

    public function unduhMonitoring()
    {
        $divisi = $this->input->post('divisi');
        $bagian = $this->input->post('bagian');
        $tahun  = $this->input->post('tahun');
        $periode = $this->input->post('periode');
        $proyek = $this->input->post('proyek');


        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
        $unduh = $this->Library_model->fetch_monitoring($bagian, $tahun, $periode, $proyek);

        $sheet = $spreadsheet->getActiveSheet();
        // Merge
        $sheet->mergeCells('A1:X1');
        $sheet->mergeCells('B13:B15');
        $sheet->mergeCells('C13:C15');
        $sheet->mergeCells('D13:D15');
        $sheet->mergeCells('E13:E15');
        $sheet->mergeCells('F13:F15');
        $sheet->mergeCells('G13:G15');
        $sheet->mergeCells('H13:I14');
        $sheet->mergeCells('J13:K14');
        $sheet->mergeCells('L13:O14');
        $sheet->mergeCells('P13:P15');
        $sheet->mergeCells('Q13:T14');
        $sheet->mergeCells('U13:U15');
        $sheet->mergeCells('V13:V15');


        // style
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],

        ];
        $styleArray1 = [

            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                ],
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $styleArray2 = [
            'font' => [
                'bold' => true,
            ],

        ];
        $styleArray3 = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],

        ];
        // $styleArray3 = array(
        //     'borders' => [
        //         'allBorders' => [
        //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,  
        //         ],
        //     ],
        // );

        $sheet->getStyle('A1')->applyFromArray($styleArray);
        $sheet->getStyle('B13:W15')->applyFromArray($styleArray1);
        $sheet->getStyle('C3')->applyFromArray($styleArray2);
        $sheet->getStyle('B13:W15')->applyFromArray($styleArray2);
        $sheet->getStyle('B13:W100')->applyFromArray($styleArray3);
        $sheet->getStyle('B13:W100')->getAlignment()->setWrapText(true);

        // for(){

        //     $sheet->mergeCells('C'.$i.':D'.$i); 
        //     $i++;
        // }
        // manually set table data value
        $sheet->setCellValue('A1', 'FORMAT ASESMEN & MITIGASI RISIKO'); //Judul Utama
        $sheet->setCellValue('C3', 'IDENTITAS'); //SubJudul
        $sheet->setCellValue('C4', 'Nama Divisi/SBU'); //SubJudul
        $sheet->setCellValue('C5', 'Nama Project'); //SubJudul
        $sheet->setCellValue('C6', 'Nama Customer'); //SubJudul
        $sheet->setCellValue('C7', 'PIC Project'); //SubJudul
        $sheet->setCellValue('C8', 'PIC Account'); //SubJudul
        $sheet->setCellValue('C9', 'Sasaran/Tujuan'); //SubJudul
        $sheet->setCellValue('C10', 'Tanggal Asesmen'); //SubJudul
        $sheet->setCellValue('C11', 'Petugas Asesmen'); //SubJudul
        $sheet->setCellValue('C12', 'Tahun'); //SubJudul

        //isian data
        $sheet->setCellValue('E4', ': ' . $unduh[0]['divisi'] . '/' . $unduh[0]['bagian']);
        $sheet->setCellValue('E5', ': ' . $unduh[0]['nama_proyek']);
        $sheet->setCellValue('E6', ': ' . $unduh[0]['nama_pelanggan']); //SubJudul
        $sheet->setCellValue('E7', ': ' . $unduh[0]['pic_proyek']); //SubJudul
        $sheet->setCellValue('E8', ': ' . $unduh[0]['pic_akun']); //SubJudul
        $sheet->setCellValue('E9', ': ' . $unduh[0]['tujuan']); //SubJudul
        $sheet->setCellValue('E10', ': ' . $unduh[0]['tanggal']); //SubJudul
        $sheet->setCellValue('E11', ': ' . $unduh[0]['petugas']); //SubJudul


        //pada tabel
        $sheet->setCellValue('B13', 'No'); //Tabel
        $sheet->setCellValue('C13', 'Aspek'); //Tabel
        $sheet->setCellValue('D13', 'Profil risiko'); //Tabel
        $sheet->setCellValue('E13', 'Sumber risiko'); //Tabel
        $sheet->setCellValue('F13', 'Keterangan'); //Tabel
        $sheet->setCellValue('G13', 'UC/C'); //Tabel
        $sheet->setCellValue('H13', 'Konsekuensi'); //Tabel
        $sheet->setCellValue('H15', 'Uraian'); //Tabel
        $sheet->setCellValue('I15', 'Nilai (Rp.)'); //Tabel
        $sheet->setCellValue('J13', 'Mitigasi Berjalan'); //Tabel
        $sheet->setCellValue('J15', 'Mitigasi'); //Tabel
        $sheet->setCellValue('K15', 'Aturan'); //Tabel
        $sheet->setCellValue('L15', 'L'); //Tabel
        $sheet->setCellValue('M15', 'C'); //Tabel
        $sheet->setCellValue('N15', 'Total (L*C)'); //Tabel
        $sheet->setCellValue('O15', 'Level Risiko'); //Tabel
        $sheet->setCellValue('P13', 'Tanggapan'); //Tabel


        $sheet->setCellValue('Q13', 'Rencana Mitigasi'); //Tabel
        $sheet->setCellValue('Q15', 'Uraian'); //Tabel
        $sheet->setCellValue('R15', 'Waktu'); //Tabel
        $sheet->setCellValue('S15', 'Nilai (Rp.)'); //Tabel
        $sheet->setCellValue('T15', 'PIC'); //Tabel
        $sheet->setCellValue('U13', 'Evidence'); //Tabel
        $sheet->setCellValue('V13', 'Hasil'); //Tabel


        $sheet->setCellValue('L13', 'Nilai Risiko Kini'); //Tabel




        $row = 16;
        $num = 1;
        foreach ($unduh as $u) :
            $sheet->setCellValue('B' . $row, $num);
            $sheet->setCellValue('C' . $row, $u['aspek']);
            $sheet->setCellValue('D' . $row, $u['profil_risiko']);
            $sheet->setCellValue('E' . $row, $u['sumber_risiko']);
            $sheet->setCellValue('F' . $row, $u['keterangan']);
            $sheet->setCellValue('G' . $row, $u['kontrol']);
            $sheet->setCellValue('H' . $row, $u['konsekuensi']);
            $sheet->setCellValue('I' . $row, $u['nilai']);
            $sheet->setCellValue('J' . $row, $u['exiting_control']);
            $sheet->setCellValue('K' . $row, $u['rules']);
            if ($u['likelihood_sisa'] == 0) {

                $sheet->setCellValue('L' . $row, $u['likelihood_kini']);
                $sheet->setCellValue('M' . $row, $u['consequence_kini']);
                $sheet->setCellValue('N' . $row, '=L' . $row . '*M' . $row);
                $sheet->setCellValue('O' . $row, $u['level_kini']);
                $sheet->setCellValue('P' . $row, $u['tanggapan_kini']);
            } else {
                $sheet->setCellValue('L' . $row, $u['likelihood_sisa']);
                $sheet->setCellValue('M' . $row, $u['consequence_sisa']);
                $sheet->setCellValue('N' . $row, '=L' . $row . '*M' . $row);
                $sheet->setCellValue('O' . $row, $u['level_sisa']);
                $sheet->setCellValue('P' . $row, $u['tanggapan_sisa']);
            }

            $sheet->setCellValue('Q' . $row, $u['description']);
            $sheet->setCellValue('R' . $row, $u['date']);
            $sheet->setCellValue('S' . $row, $u['nilai_action']);
            $sheet->setCellValue('T' . $row, $u['PIC']);
            $sheet->setCellValue('U' . $row, $u['evidence']);
            $sheet->setCellValue('V' . $row, $u['hasil']);

            $row++;
            $num++;
        endforeach;

        $writer = new Xlsx($spreadsheet); // instantiate Xlsx

        $filename = 'Asesmen ' . $tahun  . ' triwulan ' . $periode . $bagian; // set filename for excel file to be exported

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');    // download file 

    }


    public function unduhSummaryTahunan()
    {
        $bagian = $this->input->post('bagian');
        $tahun  = $this->input->post('tahun');
        $proyek = $this->input->post('proyek');


        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
        $unduh = $this->Library_model->fetch_tahunan($bagian, $tahun, $proyek);

        $sheet = $spreadsheet->getActiveSheet();
        // Merge
        $sheet->mergeCells('A1:X1');
        $sheet->mergeCells('B13:B15');
        $sheet->mergeCells('C13:C15');
        $sheet->mergeCells('D13:D15');
        $sheet->mergeCells('E13:E15');
        $sheet->mergeCells('F13:F15');
        $sheet->mergeCells('G13:G15');
        $sheet->mergeCells('H13:I14');
        $sheet->mergeCells('J13:K14');

        $sheet->mergeCells('L13:O13');
        $sheet->mergeCells('L14:M14');
        $sheet->mergeCells('N14:N15');
        $sheet->mergeCells('O14:O15');
        $sheet->mergeCells('P13:P15');
        $sheet->mergeCells('Q13:T14');
        $sheet->mergeCells('U13:U15');
        $sheet->mergeCells('V13:V15');

        $sheet->mergeCells('W13:Z13');
        $sheet->mergeCells('W14:X14');
        $sheet->mergeCells('Y14:Y15');
        $sheet->mergeCells('Z14:Z15');
        $sheet->mergeCells('AA13:AA15');
        $sheet->mergeCells('AB13:AE14');
        $sheet->mergeCells('AF13:AF15');
        $sheet->mergeCells('AG13:AG15');

        $sheet->mergeCells('AH13:AK13');
        $sheet->mergeCells('AH14:AI14');
        $sheet->mergeCells('AJ14:AJ15');
        $sheet->mergeCells('AK14:AK15');
        $sheet->mergeCells('AL13:AL15');
        $sheet->mergeCells('AM13:AP14');
        $sheet->mergeCells('AQ13:AQ15');
        $sheet->mergeCells('AR13:AR15');

        $sheet->mergeCells('AS13:AV13');
        $sheet->mergeCells('AS14:AT14');
        $sheet->mergeCells('AU14:AU15');
        $sheet->mergeCells('AV14:AV15');
        $sheet->mergeCells('AW13:AW15');
        $sheet->mergeCells('AX13:BA14');
        $sheet->mergeCells('BB13:BB15');
        $sheet->mergeCells('BC13:BC15');


        // style
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],

        ];
        $styleArray1 = [

            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                ],
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $styleArray2 = [
            'font' => [
                'bold' => true,
            ],

        ];
        $styleArray3 = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],

        ];
        // $styleArray3 = array(
        //     'borders' => [
        //         'allBorders' => [
        //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,  
        //         ],
        //     ],
        // );

        $sheet->getStyle('A1')->applyFromArray($styleArray);
        $sheet->getStyle('B13:BC15')->applyFromArray($styleArray1);
        $sheet->getStyle('B13:BC100')->applyFromArray($styleArray3);
        $sheet->getStyle('C3')->applyFromArray($styleArray2);
        $sheet->getStyle('B13:BC15')->applyFromArray($styleArray2);
        $sheet->getStyle('B13:BC100')->getAlignment()->setWrapText(true);

        // for(){

        //     $sheet->mergeCells('C'.$i.':D'.$i); 
        //     $i++;
        // }
        // manually set table data value
        $sheet->setCellValue('A1', 'FORMAT ASESMEN & MITIGASI RISIKO'); //Judul Utama
        $sheet->setCellValue('C3', 'IDENTITAS'); //SubJudul
        $sheet->setCellValue('C4', 'Nama Divisi/SBU'); //SubJudul
        $sheet->setCellValue('C5', 'Nama Project'); //SubJudul
        $sheet->setCellValue('C6', 'Nama Customer'); //SubJudul
        $sheet->setCellValue('C7', 'PIC Project'); //SubJudul
        $sheet->setCellValue('C8', 'PIC Account'); //SubJudul
        $sheet->setCellValue('C9', 'Sasaran/Tujuan'); //SubJudul
        $sheet->setCellValue('C10', 'Tanggal Asesmen'); //SubJudul
        $sheet->setCellValue('C11', 'Petugas Asesmen'); //SubJudul
        $sheet->setCellValue('C12', 'Tahun'); //SubJudul

        //isian data
        $sheet->setCellValue('E4', ': ' . $unduh[0]['divisi'] . '/' . $unduh[0]['bagian']);
        $sheet->setCellValue('E5', ': ' . $unduh[0]['nama_proyek']);
        $sheet->setCellValue('E6', ': ' . $unduh[0]['nama_pelanggan']); //SubJudul
        $sheet->setCellValue('E7', ': ' . $unduh[0]['pic_proyek']); //SubJudul
        $sheet->setCellValue('E8', ': ' . $unduh[0]['pic_akun']); //SubJudul
        $sheet->setCellValue('E9', ': ' . $unduh[0]['tujuan']); //SubJudul
        $sheet->setCellValue('E10', ': ' . $unduh[0]['tanggal']); //SubJudul
        $sheet->setCellValue('E11', ': ' . $unduh[0]['petugas']); //SubJudul


        //pada tabel
        $sheet->setCellValue('B13', 'No'); //Tabel
        $sheet->setCellValue('C13', 'Aspek'); //Tabel
        $sheet->setCellValue('D13', 'Profil risiko'); //Tabel
        $sheet->setCellValue('E13', 'Sumber risiko'); //Tabel
        $sheet->setCellValue('F13', 'Keterangan'); //Tabel
        $sheet->setCellValue('G13', 'UC/C'); //Tabel
        $sheet->setCellValue('H13', 'Konsekuensi'); //Tabel
        $sheet->setCellValue('H15', 'Uraian'); //Tabel
        $sheet->setCellValue('I15', 'Nilai (Rp.)'); //Tabel
        $sheet->setCellValue('J13', 'Mitigasi Berjalan'); //Tabel
        $sheet->setCellValue('J15', 'Mitigasi'); //Tabel
        $sheet->setCellValue('K15', 'Aturan'); //Tabel

        $sheet->setCellValue('L12', 'Monitoring I'); //Tabel
        $sheet->setCellValue('L13', 'Nilai Risiko Kini'); //Tabel
        $sheet->setCellValue('L14', 'Nilai'); //Tabel
        $sheet->setCellValue('L15', 'L'); //Tabel
        $sheet->setCellValue('M15', 'C'); //Tabel
        $sheet->setCellValue('N14', 'Total (L*C)'); //Tabel
        $sheet->setCellValue('O14', 'Level Risiko'); //Tabel
        $sheet->setCellValue('P13', 'Tanggapan'); //Tabel
        $sheet->setCellValue('Q13', 'Rencana Mitigasi'); //Tabel
        $sheet->setCellValue('Q15', 'Uraian'); //Tabel
        $sheet->setCellValue('R15', 'Waktu'); //Tabel
        $sheet->setCellValue('S15', 'Nilai (Rp.)'); //Tabel
        $sheet->setCellValue('T15', 'PIC'); //Tabel
        $sheet->setCellValue('U13', 'Evidence'); //Tabel
        $sheet->setCellValue('V13', 'Hasil'); //Tabel


        $sheet->setCellValue('W12', 'Monitoring II'); //Tabel
        $sheet->setCellValue('W13', 'Nilai Risiko Sisa'); //Tabel
        $sheet->setCellValue('W14', 'Nilai'); //Tabel
        $sheet->setCellValue('W15', 'L'); //Tabel
        $sheet->setCellValue('X15', 'C'); //Tabel
        $sheet->setCellValue('Y14', 'Total (L*C)'); //Tabel
        $sheet->setCellValue('Z14', 'Level Risiko'); //Tabel
        $sheet->setCellValue('AA13', 'Tanggapan'); //Tabel
        $sheet->setCellValue('AB13', 'Rencana Mitigasi'); //Tabel
        $sheet->setCellValue('AB15', 'Uraian'); //Tabel
        $sheet->setCellValue('AC15', 'Waktu'); //Tabel
        $sheet->setCellValue('AD15', 'Nilai (Rp.)'); //Tabel
        $sheet->setCellValue('AE15', 'PIC'); //Tabel
        $sheet->setCellValue('AF13', 'Evidence'); //Tabel
        $sheet->setCellValue('AG13', 'Hasil'); //Tabel

        $sheet->setCellValue('AH12', 'Monitoring III'); //Tabel
        $sheet->setCellValue('AH13', 'Nilai Risiko Sisa'); //Tabel
        $sheet->setCellValue('AH14', 'Nilai'); //Tabel
        $sheet->setCellValue('AH15', 'L'); //Tabel
        $sheet->setCellValue('AI15', 'C'); //Tabel
        $sheet->setCellValue('AJ14', 'Total (L*C)'); //Tabel
        $sheet->setCellValue('AK14', 'Level Risiko'); //Tabel
        $sheet->setCellValue('AL13', 'Tanggapan'); //Tabel
        $sheet->setCellValue('AM13', 'Rencana Mitigasi'); //Tabel
        $sheet->setCellValue('AM15', 'Uraian'); //Tabel
        $sheet->setCellValue('AN15', 'Waktu'); //Tabel
        $sheet->setCellValue('AO15', 'Nilai (Rp.)'); //Tabel
        $sheet->setCellValue('AP15', 'PIC'); //Tabel
        $sheet->setCellValue('AQ13', 'Evidence'); //Tabel
        $sheet->setCellValue('AR13', 'Hasil'); //Tabel

        $sheet->setCellValue('AS12', 'Monitoring IV'); //Tabel
        $sheet->setCellValue('AS13', 'Nilai Risiko Sisa'); //Tabel
        $sheet->setCellValue('AS14', 'Nilai'); //Tabel
        $sheet->setCellValue('AS15', 'L'); //Tabel
        $sheet->setCellValue('AT15', 'C'); //Tabel
        $sheet->setCellValue('AU14', 'Total (L*C)'); //Tabel
        $sheet->setCellValue('AV14', 'Level Risiko'); //Tabel
        $sheet->setCellValue('AW13', 'Tanggapan'); //Tabel
        $sheet->setCellValue('AX13', 'Rencana Mitigasi'); //Tabel
        $sheet->setCellValue('AX15', 'Uraian'); //Tabel
        $sheet->setCellValue('AY15', 'Waktu'); //Tabel
        $sheet->setCellValue('AZ15', 'Nilai (Rp.)'); //Tabel
        $sheet->setCellValue('BA15', 'PIC'); //Tabel
        $sheet->setCellValue('BB13', 'Evidence'); //Tabel
        $sheet->setCellValue('BC13', 'Hasil'); //Tabel

        // $sheet->setCellValue('A15', $unduh[0]); //Tabel

        $row = 16;
        $num = 1;
        foreach ($unduh as $u) :
            $sheet->setCellValue('B' . $row, $num);
            $sheet->setCellValue('C' . $row, $u['aspek']);
            $sheet->setCellValue('D' . $row, $u['profil_risiko']);
            $sheet->setCellValue('E' . $row, $u['sumber_risiko']);
            $sheet->setCellValue('F' . $row, $u['keterangan']);
            $sheet->setCellValue('G' . $row, $u['kontrol']);
            $sheet->setCellValue('H' . $row, $u['konsekuensi']);
            $sheet->setCellValue('I' . $row, $u['nilai']);
            
            if($u['id']){
            
                $id=$u['id'];
                $ev = $this->Library_model->fetch_evalact($id);
                foreach($ev as $e) :
                    $sheet->setCellValue('J' . $row, $e['exiting_control']);
                    $sheet->setCellValue('K' . $row, $e['rules']);
                if($e['periode']==1):
                    if ($e['likelihood_sisa'] == 0) {

                        $sheet->setCellValue('L' . $row, $e['likelihood_kini']);
                        $sheet->setCellValue('M' . $row, $e['consequence_kini']);
                        $sheet->setCellValue('N' . $row, '=L' . $row . '*M' . $row);
                        $sheet->setCellValue('O' . $row, $e['level_kini']);
                        $sheet->setCellValue('P' . $row, $e['tanggapan_kini']);
                    } else {
                        $sheet->setCellValue('L' . $row, $e['likelihood_sisa']);
                        $sheet->setCellValue('M' . $row, $e['consequence_sisa']);
                        $sheet->setCellValue('N' . $row, '=L' . $row . '*M' . $row);
                        $sheet->setCellValue('O' . $row, $e['level_sisa']);
                        $sheet->setCellValue('P' . $row, $e['tanggapan_sisa']);
                    }

                    $sheet->setCellValue('Q' . $row, $e['description']);
                    $sheet->setCellValue('R' . $row, $e['date']);
                    $sheet->setCellValue('S' . $row, $e['nilai_action']);
                    $sheet->setCellValue('T' . $row, $e['PIC']);
                    $sheet->setCellValue('U' . $row, $e['evidence']);
                    $sheet->setCellValue('V' . $row, $e['hasil']);
                elseif($e['periode']==2):
                    if ($e['likelihood_sisa'] == 0) {

                        $sheet->setCellValue('W' . $row, $e['likelihood_kini']);
                        $sheet->setCellValue('X' . $row, $e['consequence_kini']);
                        $sheet->setCellValue('Y' . $row, '=L' . $row . '*M' . $row);
                        $sheet->setCellValue('Z' . $row, $e['level_kini']);
                        $sheet->setCellValue('AA' . $row, $e['tanggapan_kini']);
                    } else {
                        $sheet->setCellValue('W' . $row, $e['likelihood_sisa']);
                        $sheet->setCellValue('X' . $row, $e['consequence_sisa']);
                        $sheet->setCellValue('Y' . $row, '=L' . $row . '*M' . $row);
                        $sheet->setCellValue('Z' . $row, $e['level_sisa']);
                        $sheet->setCellValue('AA' . $row, $e['tanggapan_sisa']);
                    }

                    $sheet->setCellValue('AB' . $row, $e['description']);
                    $sheet->setCellValue('AC' . $row, $e['date']);
                    $sheet->setCellValue('AD' . $row, $e['nilai_action']);
                    $sheet->setCellValue('AE' . $row, $e['PIC']);
                    $sheet->setCellValue('AF' . $row, $e['evidence']);
                    $sheet->setCellValue('AG' . $row, $e['hasil']);  
                elseif($e['periode']==3):
                    if ($e['likelihood_sisa'] == 0) {

                        $sheet->setCellValue('AH' . $row, $e['likelihood_kini']);
                        $sheet->setCellValue('AI' . $row, $e['consequence_kini']);
                        $sheet->setCellValue('AJ' . $row, '=L' . $row . '*M' . $row);
                        $sheet->setCellValue('AK' . $row, $e['level_kini']);
                        $sheet->setCellValue('AL' . $row, $e['tanggapan_kini']);
                    } else {
                        $sheet->setCellValue('AH' . $row, $e['likelihood_sisa']);
                        $sheet->setCellValue('AI' . $row, $e['consequence_sisa']);
                        $sheet->setCellValue('AJ' . $row, '=L' . $row . '*M' . $row);
                        $sheet->setCellValue('AK' . $row, $e['level_sisa']);
                        $sheet->setCellValue('AL' . $row, $e['tanggapan_sisa']);
                    }

                    $sheet->setCellValue('AM' . $row, $e['description']);
                    $sheet->setCellValue('AN' . $row, $e['date']);
                    $sheet->setCellValue('AO' . $row, $e['nilai_action']);
                    $sheet->setCellValue('AP' . $row, $e['PIC']);
                    $sheet->setCellValue('AQ' . $row, $e['evidence']);
                    $sheet->setCellValue('AR' . $row, $e['hasil']);  
                elseif($e['periode']==4):
                    if ($e['likelihood_sisa'] == 0) {

                        $sheet->setCellValue('AS' . $row, $e['likelihood_kini']);
                        $sheet->setCellValue('AT' . $row, $e['consequence_kini']);
                        $sheet->setCellValue('AU' . $row, '=L' . $row . '*M' . $row);
                        $sheet->setCellValue('AV' . $row, $e['level_kini']);
                        $sheet->setCellValue('AW' . $row, $e['tanggapan_kini']);
                    } else {
                        $sheet->setCellValue('AS' . $row, $e['likelihood_sisa']);
                        $sheet->setCellValue('AT' . $row, $e['consequence_sisa']);
                        $sheet->setCellValue('AU' . $row, '=L' . $row . '*M' . $row);
                        $sheet->setCellValue('AV' . $row, $e['level_sisa']);
                        $sheet->setCellValue('AW' . $row, $e['tanggapan_sisa']);
                    }

                    $sheet->setCellValue('AX' . $row, $e['description']);
                    $sheet->setCellValue('AY' . $row, $e['date']);
                    $sheet->setCellValue('AZ' . $row, $e['nilai_action']);
                    $sheet->setCellValue('BA' . $row, $e['PIC']);
                    $sheet->setCellValue('BB' . $row, $e['evidence']);
                    $sheet->setCellValue('BC' . $row, $e['hasil']);  
            endif;
            endforeach;
            }

            

            $row++;
            $num++;
        endforeach;

        $writer = new Xlsx($spreadsheet); // instantiate Xlsx

        $filename = 'Asesmen ' . $tahun . ' bagian ' . $bagian; // set filename for excel file to be exported

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');    // download file 

    }
    public function unduhPdfBulan()
    {
       
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        // Write some HTML code:
        $html = '
        <H1>Laporan Manajemen Risiko </H1>
        ';
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $mpdf->Output();
    }
}
