<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laundry extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model("laundry_m");
        $this->load->model("pelanggan_m");
        $this->load->model("category_m");
        $this->load->model("auth_m");
        $this->auth_m->isLoggedIn() == true || redirect("auth/login"); // True = True langsung redirect ke auth login
    }

    public function index()
    {
        $data['laundry'] = $this->laundry_m->findAll();
        $data['subview'] = 'admin/laundry/index';
        $this->load->view('admin/_layout', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules(
            'pelanggan_id',
            'Pelanggan',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Pelanggan id Harus di Isi</div>",
            ]
        );
        $this->form_validation->set_rules(
            'status',
            'Status',
            'required|min_length[4]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Status Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Status Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'berat',
            'Berat',
            'required|min_length[1]|numeric',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Berat Harus di Isi</div>",
                'numeric' => 'Harus angka',
                'min_length' => "<div class='alert alert-danger' role='alert'>Berat Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'status_pembayaran',
            'Status pembayaran',
            'required|min_length[4]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Status pembayaran di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Status pembayaran Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'category_id',
            'Category Id',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Category id Harus di Isi</div>",
            ]
        );
        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Keterangan di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Keterangan Terlalu Pendek</div>"
            ]
        );

        if ($this->form_validation->run() != true) {
            $data['subview'] = 'admin/laundry/create';
            $data['pelanggan'] = $this->pelanggan_m->findAll();
            $data['category'] = $this->category_m->findAll();
            $this->load->view('admin/_layout', $data);
        } else {
            $category_post = $this->input->post('category_id');

            $where = array('category_id' => $category_post);


            $category_all = $this->category_m->edit($where, 'categories')->result();

            if ($category_all) {
                $pelanggan_id = $this->input->post('pelanggan_id');
                $status = $this->input->post('status');
                $berat = $this->input->post('berat');
                $jumlah_total = intval($berat) * $category_all[0]->harga;
                $status_pembayaran = $this->input->post('status_pembayaran');
                $keterangan = $this->input->post('keterangan');
                $created_by = $this->session->userdata('firstname') . ' ' . $this->session->userdata('lastname');



                if ($this->laundry_m->create($pelanggan_id, $status, $berat, $jumlah_total, $status_pembayaran, $category_post, $keterangan, $created_by) == true) {
                    $this->session->set_flashdata('success_laundry', 'Proses membuat laundry Berhasil');
                    redirect("admin/laundry");
                } else {
                    $this->session->set_flashdata('error_laundry', 'Error pembuatan kategori');
                    redirect("admin/laundry", 'refresh');
                }
            } else {
                $this->session->set_flashdata('error_laundry', 'Error pada category id');
                redirect("admin/laundry", 'refresh');
            }
        }
    }


    public function edit($id=null)
    {
        $this->auth_m->isAdmin() == true || redirect("admin/laundry");

        $this->form_validation->set_rules(
            'pelanggan_id',
            'Pelanggan',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Pelanggan id Harus di Isi</div>",
            ]
        );
        $this->form_validation->set_rules(
            'status',
            'Status',
            'required|min_length[4]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Status Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Status Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'berat',
            'Berat',
            'required|min_length[1]|numeric',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Berat Harus di Isi</div>",
                'numeric' => 'Harus angka',
                'min_length' => "<div class='alert alert-danger' role='alert'>Berat Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'status_pembayaran',
            'Status pembayaran',
            'required|min_length[4]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Status pembayaran di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Status pembayaran Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'category_id',
            'Category Id',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Category id Harus di Isi</div>",
            ]
        );
        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Keterangan di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Keterangan Terlalu Pendek</div>"
            ]
        );

        if ($this->form_validation->run() != true) {
            $where = array('laundry_id' => $id);
            $data['laundry'] = $this->laundry_m->edit($where, 'laundry')->result();
            $data['pelanggan'] = $this->pelanggan_m->findAll();
            $data['category'] = $this->category_m->findAll();
            $data['subview'] = 'admin/laundry/edit';
            $this->load->view('admin/_layout', $data);
        } else {
            $category_post = $this->input->post('category_id');

            $where = array('category_id' => $category_post);

            $category_all = $this->category_m->edit($where, 'categories')->result();


            if ($category_all) {
                $laundry_id = $this->input->post('id');
                $pelanggan_id = $this->input->post('pelanggan_id');
                $status = $this->input->post('status');
                $berat = $this->input->post('berat');
                $jumlah_total = intval($berat) * $category_all[0]->harga;
                $status_pembayaran = $this->input->post('status_pembayaran');
                $keterangan = $this->input->post('keterangan');
                $created_by = $this->session->userdata('firstname') . ' ' . $this->session->userdata('lastname');


                if ($this->laundry_m->update($laundry_id, $pelanggan_id, $status, $berat, $jumlah_total, $status_pembayaran, $category_post, $keterangan, $created_by) == true) {
                    $this->session->set_flashdata('success_laundry', 'Proses update laundry Berhasil');
                    redirect("admin/laundry");
                } else {
                    $this->session->set_flashdata('error_laundry', 'Error update laundry');
                    redirect("admin/laundry", 'refresh');
                }
            }else{
                $this->session->set_flashdata('error_laundry', 'Error pada category id');
                redirect("admin/laundry", 'refresh');
            }
        }
    }


    public function delete($id)
    {
        $this->auth_m->isAdmin() == true || redirect("admin/laundry");
        if ($this->laundry_m->deleteLaundry($id) == true) {
            $this->session->set_flashdata('success_laundry', 'Proses delete laundry Berhasil');
            redirect("admin/laundry");
        } else {
            $this->session->set_flashdata('error_laundry', 'Error delete laundry');
            redirect("admin/laundry", 'refresh');
        }
    }
}
