<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("auth_m");
        $this->load->model("dashboard_m");
        $this->auth_m->isLoggedIn() == true || redirect("auth/login");
    }


    public function index(){
        $data['subview'] = "admin/index";
        $data['pelanggan'] = $this->dashboard_m->countPelanggan();
        $data['karyawan'] = $this->dashboard_m->countKaryawan();
        $data['laundry'] = $this->dashboard_m->countLaundry();
        $data['total_pendapatan'] = $this->dashboard_m->sum_totalJumlah();
        $this->load->view("admin/_layout", $data);
    }
}
