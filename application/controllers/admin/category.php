<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model("category_m");
        $this->load->model("auth_m");
        $this->auth_m->isLoggedIn() == true || redirect("auth/login"); // True = True langsung redirect ke auth login
    }

    public function index(){
        $data['categories'] = $this->category_m->findAll();
        $data['subview'] = 'admin/categories/index';
        $this->load->view('admin/_layout', $data);
    }

    public function create(){
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|min_length[3]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required|min_length[3]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Harga Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Harga Terlalu Pendek</div>"
            ]
        );

        if($this->form_validation->run() != true){
            $data['subview'] = 'admin/categories/create';
        
            $this->load->view("admin/_layout", $data);
        }else{
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $created_by = $this->session->userdata('firstname'). ' '.$this->session->userdata('lastname');
    
            if($this->category_m->create($nama, $harga, $created_by) == true){
                $this->session->set_flashdata('success_categories','Proses membuat kategori Berhasil');
                redirect("admin/category");
            }else{
                $this->session->set_flashdata('error_categories','Error pembuatan kategori');
                redirect("admin/category", 'refresh');
            }

        }       
        
        
    }

    public function edit($id=null){
        $this->auth_m->isAdmin() == true || redirect("admin/category");
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required|min_length[3]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Harga Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Harga Terlalu Pendek</div>"
            ]
        );

        if($this->form_validation->run() != true){
            $where = array('category_id' => $id);
            
            $data['categories'] = $this->category_m->edit($where, 'categories')->result();
            $data['subview'] = 'admin/categories/edit';
            $this->load->view('admin/_layout', $data);
        }else{
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $created_by = $this->session->userdata('firstname'). ' '.$this->session->userdata('lastname');
            
            if($this->category_m->update($id, $nama,$harga,$created_by) == true){
                $this->session->set_flashdata('success_categories','Proses Update kategori Berhasil');
                redirect("admin/category");
            }else{
                $this->session->set_flashdata('error_categories','Error Update kategori');
                redirect("admin/category", 'refresh');
            }
        }
        
    }

    public function delete($id){
        $this->auth_m->isAdmin() == true || redirect("admin/category");

        if($this->category_m->deleteCategory($id) == true){
            $this->session->set_flashdata('success_categories','Proses Delete kategori Berhasil');
            redirect("admin/category");
        }else{
            $this->session->set_flashdata('error_categories','Error Delete kategori, undefined id' );
            redirect("admin/category", 'refresh');
        }
    }
}