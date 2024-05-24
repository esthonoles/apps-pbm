<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datasampah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sampah_model');
    }

    public function index()
    {
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sampah'] = $this->Sampah_model->get_data('tbl_sampah')->result();

        $data['title'] = 'Data Sampah';
        $this->load->view('templates/header', $data);
        $this->load->view('data/datasampah');
        $this->load->view('templates/footer');
    }

    public function updateData($id)
    {

        $data = [
            'id' => $id,
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga')
        ];
        // $this->Sampah_model->update_data($data, 'tbl_sampah');
        $this->db->where('id', $data['id']);
        $this->db->set('nama', $data['nama']);
        $this->db->update('tbl_sampah', $data);


        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('datasampah');
    }
    public function delete($id)
    {
        $where = [
            'id' => $id
        ];
        $this->Sampah_model->delete($where, 'tbl_sampah');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('datasampah');
    }

    public function add()
    {
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Tambah Data';
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('data/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true)),
            ];
            $this->db->insert('tbl_sampah', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('datasampah');
        }
    }
}
