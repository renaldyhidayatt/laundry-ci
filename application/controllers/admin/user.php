<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model("user_m");
        $this->load->model("auth_m");
        $this->auth_m->isLoggedIn() == true || redirect("auth/login"); // True = True langsung redirect ke auth login
    }

    // Nampilin Segala Row User
    public function index()
    {
        $data['user'] = $this->user_m->findAll();
        $data['subview'] = "admin/user/index";
        $this->load->view('admin/_layout', $data);
    }

    // Nampilin Create pada view
    public function create()
    {
        $this->auth_m->isAdmin() == true || redirect("admin/user");
        $this->form_validation->set_rules(
            'firstname',
            'Firstname',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Firstname Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Firstname Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'lastname',
            'Lastname',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Lastname Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Lastname Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Email Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Email Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Password Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Password Terlalu Pendek</div>"
            ]
        );

        if ($this->form_validation->run() != true) {
            $data['subview'] = 'admin/user/create';
            $this->load->view("admin/_layout", $data);
        } else {
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            if ($this->auth_m->register($firstname, $lastname, $email, $password) == true) {
                $this->session->set_flashdata('success_user', 'Proses membuat User Berhasil');
                redirect("admin/user");
            } else {
                $this->session->set_flashdata('error_users', 'Error pembuatan users');
                redirect("admin/user", 'refresh');
            }
        }
    }


    // Nampilin Edit pada view
    public function edit($id)
    {
        $this->auth_m->isAdmin() == true || redirect("admin/user");

        $this->form_validation->set_rules(
            'firstname',
            'Firstname',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Firstname Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Firstname Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'lastname',
            'Lastname',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Lastname Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Lastname Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Email Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Email Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Password Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Password Terlalu Pendek</div>"
            ]
        );

        if ($this->form_validation->run() != true) {
            $where = array('user_id' => $id);
            $data['user'] = $this->user_m->edit($where, 'user')->result();
            $data['subview'] = 'admin/user/edit';
            $this->load->view('admin/_layout', $data);
        } else {
            $id = $this->input->post('id');
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if($this->user_m->update($id, $firstname, $lastname, $email, $password) == true){

                $this->session->set_flashdata('success_user', 'Proses update User Berhasil');
                redirect("admin/user");
            }else{
                $this->session->set_flashdata('error_users', 'Error update users');
                redirect("admin/user", 'refresh');
            }
        }
    }


    // Proses Delete
    public function delete($id)
    {
        $this->auth_m->isAdmin() == true || redirect("admin/user");
        if($this->user_m->deleteUser($id) == true){

            $this->session->set_flashdata('success_user', 'Proses delete User Berhasil');
            redirect("admin/user");
        }else{
            $this->session->set_flashdata('error_users', 'Error delete users');
                redirect("admin/user", 'refresh');
        }
        
    }
}
