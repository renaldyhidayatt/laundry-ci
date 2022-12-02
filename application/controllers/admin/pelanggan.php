<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model("pelanggan_m");
        $this->load->model("auth_m");
        $this->auth_m->isLoggedIn() == true || redirect("auth/login"); // True = True langsung redirect ke auth login
    }

    //
    public function index()
    {
        $data['pelanggan']  = $this->pelanggan_m->findAll(); /// array berupa row  
        $data['subview'] = 'admin/pelanggan/index';
        $this->load->view('admin/_layout', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules(
            'nama_pelanggan',
            'Nama',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'jeniskelamin',
            'Jenis Kelamin',
            'required|min_length[4]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Jenis Kelamin Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Jenis Kelamin Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Alamat Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Alamat Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'no_hp',
            'No Hp',
            'required|min_length[6]|numeric',
            [
                'required' => "<div class='alert alert-danger' role='alert'>No Hp Harus di Isi</div>",
                'numeric' => 'No Hp harus angka',
                'min_length' => "<div class='alert alert-danger' role='alert'>No Hp Terlalu Pendek</div>"
            ]
        );

        if ($this->form_validation->run() != true) {
            $data['subview'] = 'admin/pelanggan/create';

            $this->load->view("admin/_layout", $data);
        } else {
            $namapelanggan = $this->input->post('nama_pelanggan');
            $jenis_kelamin = $this->input->post('jeniskelamin');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');
            $created_by = $this->session->userdata('firstname'). ' '.$this->session->userdata('lastname');


            if ($this->pelanggan_m->create($namapelanggan, $jenis_kelamin, $alamat, $no_hp, $created_by) == true) {
                $this->session->set_flashdata('success_pelanggan', 'Proses membuat pelanggan Berhasil');
                redirect("admin/pelanggan");
            } else {
                $this->session->set_flashdata('error_categories', 'Error pembuatan kategori');
                redirect("admin/pelanggan", 'refresh');
            }
        }
    }


    public function edit($id)
    {
        $this->auth_m->isAdmin() == true || redirect("admin/pelanggan");

        $this->form_validation->set_rules(
            'nama_pelanggan',
            'Nama',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'jeniskelamin',
            'Jenis Kelamin',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Jenis Kelamin Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Jenis Kelamin Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Alamat Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Alamat Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'no_hp',
            'No Hp',
            'required|min_length[10]|numeric',
            [
                'required' => "<div class='alert alert-danger' role='alert'>No Hp Harus di Isi</div>",
                'numeric' => 'No Hp harus angka',
                'min_length' => "<div class='alert alert-danger' role='alert'>No Hp Terlalu Pendek</div>"
            ]
        );

        if ($this->form_validation->run() != true) {
            $where = array('pelanggan_id' => $id);

            $data['pelanggan'] = $this->pelanggan_m->edit($where, 'pelanggan')->result();
            $data['subview'] = 'admin/pelanggan/edit';
            $this->load->view('admin/_layout', $data);
        } else {
            $id = $this->input->post('pelanggan_id');
            $namapelanggan = $this->input->post('nama_pelanggan');
            $jenis_kelamin = $this->input->post('jeniskelamin');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');
            $created_by = $this->session->userdata('firstname'). ' '.$this->session->userdata('lastname');

            if ($this->pelanggan_m->update($id, $namapelanggan, $jenis_kelamin, $alamat, $no_hp, $created_by) == true) {
                $this->session->set_flashdata('success_pelanggan', 'Proses update pelanggan Berhasil');
                redirect("admin/pelanggan");
            } else {
                $this->session->set_flashdata('error_pelanggan', 'Error update pelanggan');
                redirect("admin/pelanggan", 'refresh');
            }
        }
    }


    public function delete($id)
    {
        $this->auth_m->isAdmin() == true || redirect("admin/pelanggan");

        if ($this->pelanggan_m->deletePelanggan($id)) {
            $this->session->set_flashdata('success_pelanggan', 'Proses delete pelanggan Berhasil');
            redirect("admin/pelanggan");
        } else {
            $this->session->set_flashdata('error_pelanggan', 'Error delete pelanggan');
            redirect("admin/pelanggan", 'refresh');
        }
    }
}
