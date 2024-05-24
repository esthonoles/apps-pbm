<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datamember extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->model('User_model');
    }
    public function index()
    {
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['member'] = $this->Member_model->get_data('tbl_member')->result();

        $data['title'] = 'Data Nasabah';
        $this->load->view('templates/header', $data);
        $this->load->view('member/index', $data);
        $this->load->view('templates/footer');
    }

    public function addmember()
    {
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['member'] = $this->Member_model->get_data('tbl_member')->result();

        $data['title'] = 'Tambah Member';
        // set rules
        $this->form_validation->set_rules('ktp', 'KTP', 'required|trim|is_unique[tbl_member.ktp]', [
            'is_unique' => 'NO KTP telah terdaftar!'
        ]);

        $this->form_validation->set_rules('notlp', 'NO HP', 'required|trim|is_unique[tbl_member.no_hp]', [
            'is_unique' => 'NO HP telah terdaftar!'
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal_Lahir', 'required|trim');
        

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('member/addmember', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'ktp' => htmlspecialchars($this->input->post('ktp', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'no_hp' => htmlspecialchars($this->input->post('notlp', true)),
                'dated_created' => time()
            ];
            $this->db->insert('tbl_member', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('datamember');
        }
    }

    public function update($id)
    {
        $data['title'] = 'Tambah Member';
        $this->form_validation->set_rules('ktp', 'KTP', 'required|trim|is_unique[tbl_member.ktp]', [
            'is_unique' => 'NO KTP telah terdaftar!'
        ]);

        // $this->form_validation->set_rules('notlp', 'NO HP', 'required|trim|is_unique[tbl_member.no_hp]', [
        //     'is_unique' => 'NO HP telah terdaftar!'
        // ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            NO KTP telah terdaftar!! | Gagal Mengubah data
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('datamember');
        } else {
            $data = [
                'id' => $id,
                'ktp' => $this->input->post('ktp'),
                'nama' => $this->input->post('nama'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'no_hp' => $this->input->post('notlp')
            ];
            

            $this->db->where('id', $data['id']);
            $this->db->set('ktp', $data['ktp']);
            $this->db->set('nama', $data['nama']);
            $this->db->set('tgl_lahir', $data['tgl_lahir']);
            $this->db->set('no_hp', $data['notlp']);
            $this->db->update('tbl_member', $data);


            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data berhasil diubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('datamember');
        }
    }

    public function delete($id)
    {
        $where = [
            'id' => $id,
        ];

        $this->Member_model->delete($where, 'tbl_member');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');

        redirect('datamember');
    }

    function akun_detail($id)
    {
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Transaksi_model');
        $data['idnasabah'] = $this->Transaksi_model->GetNasabahByid($id);


        $data['title'] = 'Detail Akun';
        $this->load->view('templates/header', $data);
        $this->load->view('member/akun_detail', $data);
        $this->load->view('templates/footer');
    }
}
