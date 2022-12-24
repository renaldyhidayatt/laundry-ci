<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model("karyawan_m");

        $this->load->model('auth_m');
        $this->load->model('user_m');
        $this->auth_m->isLoggedIn() == true || redirect("auth/login");
    }

    public function index()
    {
        $data['karyawan'] = $this->karyawan_m->findAll();
        $data['subview'] = 'admin/karyawan/index';
        $this->load->view('admin/_layout', $data);
    }

    public function create()
    {
        $this->auth_m->isAdmin() == true || redirect("admin/karyawan");

        $this->form_validation->set_rules(
            'user_id',
            'UserID',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Userid Harus di Isi</div>",
            ]
        );
        $this->form_validation->set_rules(
            'nama_karyawan',
            'Nama Karyawan',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Karyawan Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Karyawan Terlalu Pendek</div>"
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
            'required|min_length[10]|numeric',
            [
                'required' => "<div class='alert alert-danger' role='alert'>No Hp Harus di Isi</div>",
                'numeric' => 'No Hp harus angka',
                'min_length' => "<div class='alert alert-danger' role='alert'>No Hp Terlalu Pendek</div>"
            ]
        );

        if ($this->form_validation->run() != true) {
            $data['subview'] = 'admin/karyawan/create';
            $data['user'] = $this->user_m->findAll();
            $this->load->view('admin/_layout', $data);
        } else {
            $dt = new DateTime();
            $user_id = $this->input->post('user_id');
            $nama_karyawan = $this->input->post('nama_karyawan');
            $jenis_kelamin = $this->input->post('jeniskelamin');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');
            $tgl_bergabung = $dt->format('Y-m-d H:i:s');
            $created_by = $this->session->userdata('firstname'). ' '.$this->session->userdata('lastname');

            if($this->karyawan_m->create($user_id, $nama_karyawan, $jenis_kelamin, $alamat, $no_hp, $tgl_bergabung, $created_by) == true){
                $this->session->set_flashdata('success_karyawan','Proses membuat Karyawan Berhasil');
                redirect("admin/karyawan");
            }else{
                $this->session->set_flashdata('error_karyawan','Error pembuatan kategori');
                redirect("admin/karyawan", 'refresh');
            }
        }
    }


    public function edit($id=null)
    {
        $this->auth_m->isAdmin() == true || redirect("admin/karyawan");

        $this->form_validation->set_rules(
            'user_id',
            'UserID',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Userid Harus di Isi</div>",
            ]
        );
        $this->form_validation->set_rules(
            'nama_karyawan',
            'Nama Karyawan',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Karyawan Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Karyawan Terlalu Pendek</div>"
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

        $this->form_validation->set_rules(
            'tgl_berhenti',
            'Tanggal berhenti',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Tanggal berhenti Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Tanggal berhenti Terlalu Pendek</div>"
            ]
        );

        if ($this->form_validation->run() != true) {
            $where = array('karyawan_id' => $id);
            $data['karyawan'] = $this->karyawan_m->edit($where, 'karyawan')->result();
            $data['user'] = $this->user_m->findAll();
            $data['subview'] = 'admin/karyawan/edit';
            $this->load->view('admin/_layout', $data);
        } else {
            $id = $this->input->post('id');
            $user_id = $this->input->post('user_id');
            $nama_karyawan = $this->input->post('nama_karyawan');
            $jenis_kelamin = $this->input->post('jeniskelamin');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');
            $tgl_berhenti = $this->input->post('tgl_berhenti');
            $created_by = $this->session->userdata('firstname'). ' '.$this->session->userdata('lastname');

            if($this->karyawan_m->update($id, $user_id, $nama_karyawan, $jenis_kelamin, $alamat, $no_hp, $tgl_berhenti, $created_by) == true){
                $this->session->set_flashdata('success_karyawan','Proses Update karyawan Berhasil');
                redirect("admin/karyawan");
            }else{
                $this->session->set_flashdata('error_karyawan','Error Update karyawan');
                redirect("admin/category", 'refresh');
            }
        }
    }

    public function delete($id)
    {
        $this->auth_m->isAdmin() == true || redirect("admin/karyawan");

        if($this->karyawan_m->deleteKaryawan($id)){
            $this->session->set_flashdata('success_karyawan','Proses Delete karyawan Berhasil');
            redirect("admin/karyawan");
        }else{
            $this->session->set_flashdata('error_karyawan','Error Delete karyawan, undefined id' );
            redirect("admin/karyawan", 'refresh');
        }
    }
}
