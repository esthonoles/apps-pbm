<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('Login_model');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        $data['title'] = 'Login';

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/index');
            $this->load->view('templates/auth/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = htmlspecialchars($this->input->post('password', true));
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];

                // set session user login
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin/dashboard');
                } else {
                    redirect('admin/dashboard');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Wrong password!
                        </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Email is not registered!
                    </div>');
            redirect('auth');
        }
    }

    // register function
    public function register()
    {
        // rules form validation
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

        $data['title'] = 'Register';
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth/footer');
        } else {
            $data = [
                'role_id' => 2,
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email')),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <strong>Congratulation!</strong> your account has been created. Pleas Login
            </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!
        </div>');
        redirect('auth');
    }
}

// -------------------batas code aslinya
    
    // private function _login()
    // {
    //     $email = $this->input->post('email');
    //     $password = $this->input->post('password');

    //     $user = $this->db->get_where('user', ['email' => $email])->row_array();

    //     if ($user) {
    //         if (password_verify($password, $user['password'])) {
    //             $data = [
    //                 'email' => $user['email'],
    //                 'role_id' => $user['role_id']
    //             ];

    //             // set session user login
    //             $this->session->set_userdata($data);
    //             if ($user['role_id'] == 1) {
    //                 redirect('admin');
    //             } else {
    //                 redirect('user');
    //             }
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //             Wrong password!
    //             </div>');
    //             redirect('auth');
    //         }
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //         Email is not registered!
    //         </div>');
    //         redirect('auth');
    //     }
    // }
    // public function register()
    // {
    //     // rules form validation
    //     $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]|valid_email');
    //     $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');



    //     $data['title'] = 'Register';
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/auth/header', $data);
    //         $this->load->view('auth/register');
    //         $this->load->view('templates/auth/footer');
    //     } else {
    //         $data = [
    //             'nama' => htmlspecialchars($this->input->post('nama', true)),
    //             'email' => htmlspecialchars($this->input->post('email')),
    //             'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    //             'role_id' => 2,
    //             'date_created' => time()
    //         ];
    //         $this->db->insert('user', $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //         <strong>Congratulation!</strong> your account has been created. Pleas Login
    //         </div>');
    //         redirect('auth');
    //     }
    // }

    // public function logout()
    // {
    //     $this->session->unset_userdata('email');
    //     $this->session->unset_userdata('role_id');

    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!
    //     </div>');
    //     redirect('auth');
    // }
    // public function blocked()
    // {
    //     $this->load->view('auth/blocked');
    // }