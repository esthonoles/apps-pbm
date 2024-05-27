<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->model('User_model');
        $this->load->model('Sampah_model');
        $this->load->model('Transaksi_model');
    }
    public function index()
    {
        // $this->load->model('Member_model');
        $data['nasabah'] = $this->Member_model->get_data('tbl_member')->result();

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Transaksi';
        $this->load->view('templates/header', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');
    }



    public function debit($id)
    {
        // $this->load->model('Member_model');
        // $this->load->model('Sampah_model');

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['nasabah'] = $this->Member_model->get_data('tbl_member')->result();
        $data['sampah'] = $this->Sampah_model->get_data('tbl_sampah')->result();
        $data['idnasabah'] = $this->Transaksi_model->GetNasabahByid($id);

        $data['kodetransaksi'] = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi from tbl_transaksi")->row_array();


        $data['title'] = 'Transaksi | Debit';
        $this->load->view('templates/header', $data);
        $this->load->view('transaksi/debit', $data);
        $this->load->view('templates/footer');
    }

    public function kredit($id)
    {
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kodetransaksi'] = $this->db->query("SELECT MAX(kode) as kodetransaksi from tbl_debit")->row_array();

        $data['idnasabah'] = $this->Transaksi_model->GetNasabahByid($id);

        $data['title'] = 'Transaksi | Kredit';
        $this->load->view('templates/header', $data);
        $this->load->view('transaksi/kredit', $data);
        $this->load->view('templates/footer');
    }

    public function getharga()

    {
               
        $id = $this->input->post('id_sampah');
        $data['sampah'] = $this->Transaksi_model->getharga($id);

        echo json_encode($data['sampah']);

        

        // return $data['hargasampah'] = $this->db->get_where('tbl_sampah', ['id' => $id]);
        // return ->row_array();
        // var_dump($data['hargasampah'])
        // var_dump($data['hargasampah']);
    }
}
