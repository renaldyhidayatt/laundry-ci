<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model("auth_m");
    }
    
    // Nampilin Login view
    public function login(){
        $this->auth_m->isLoggedIn() == false || redirect("admin/dashboard");
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

        if($this->form_validation->run() != true){
            $data['subview'] = 'auth/login';
            $this->load->view("_layout", $data);
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            if($this->auth_m->login($email,$password) == True){
                redirect("admin/dashboard");

            }else{
                $this->session->set_flashdata('error','Write your email or password correctly');
                redirect('auth/login', 'refresh');
            }
        }
    }

    // Nampilin Login view
    public function register(){
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

        if($this->form_validation->run() != true){
            $data['subview'] = 'auth/register';
            $this->load->view("_layout", $data);
        }else{
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->auth_m->register($firstname,$lastname,$email,$password);
            $this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
            redirect("auth/login");
        }
        
    }

    

    public function logout(){
        $this->auth_m->logout();
        return redirect("auth/login");
        
    }
}