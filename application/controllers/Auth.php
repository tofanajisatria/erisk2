<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    //fungsi auto dijalankan ketika controller dipanggil
    public function __construct()
    {
        //fungsi autoload (otomatis dijalankan ketika form dijalankan)
        parent::__construct();
        $this->load->library('form_validation');
    }

    //form autoload page login
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        //aturan pengisian input data
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');


        //inputan salah
        if ($this->form_validation->run() == false) {
            //fungsi menampilkan halaman utama (index)
            $data['title'] = 'E-Risk Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        //mengambil email dan password
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        //macth email yg dimasukan dan yg terdaftar
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //jika usenya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                    // } else
                    // {
                    //     redirect('superadmin');
                    // }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
                    redirect('auth');
                }
            }
            //jika usernya belum aktif
            else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated! </div>');
                redirect('auth');
            }
        } else {
            //menampilkan pesan kesalahan
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered</div>');
            redirect('auth');
        }
    }


    //form untuk registrasi
    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        //aturan dari data yang diisi
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'is_unique' => 'this email has already registered'
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[6]|matches[password2]',
            [
                'matches' => 'Password dont match!',
                'min_lenght' => 'Password too short'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        //fungsi mengembalikan form ketika datanya tidak valid
        if ($this->form_validation->run() == false) {
            $data['title'] = 'E-Risk Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        }
        //fungsi klarifikasi data berhasil ditambahkan
        else {
            $email = $this->input->post('email', true);
            //menangkap data yang dimasukan
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            //penyiapan token 
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            //insert ke database
            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            // $this->_sendEmail($token, 'verify');
            //memberi pesan berhasil atau tidaknya data diinputkan
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your Account has been created. please wait for activation,contact administrator! </div>');
            //mengembalikan ke form login
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'e.risk2019@gmail.com',
            'smtp_pass' => 'ayabiknight',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => '\r\n'
        ];
        $this->load->library('email', $config);
        $this->email->initialize($config);
        //     ini_set( 'display_errors', 1 );   
        // error_reporting( E_ALL ); 
        $this->email->from('e.risk2019@gmail.com', 'E-Risk QRM');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {

            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Activate </a>');
        } elseif ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Reset Password </a>');
        }


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please Login</div>');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert"> Account activation failed! Token expired  </div>');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert"> Account activation failed! wrong token </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert"> Account activation failed! wrong email </div>');
        }
    }




    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $identifikasi = [
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
            'hari'
        ];
        $this->session->unset_userdata($identifikasi);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout</div>');

        redirect('auth');
    }
    public function blocked()
    {
        $data['title'] = 'Page blocked';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('auth/blocked');
        $this->load->view('templates/footer', $data);
    }

    public function forgotPassword()
    {
        redirect('auth');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'E-Risk Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active'])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'data_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                //$this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">Please check Your E-mail to reset your password</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">Email is not registered or activated!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">Reset password failed! Wrong token</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">Reset password failed! Wrong email</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[6]|matches[password2]',
            [
                'matches' => 'Password dont match!',
                'min_lenght' => 'Password too short'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">Password has been changed! Please Login</div>');
            redirect('auth');
        }
    }
}
