<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_M extends CI_Model{
    public function countPelanggan(){
        return $this->db->count_all('pelanggan');
    }

    public function countKaryawan(){
        return $this->db->count_all('karyawan');
    }

    public function countLaundry(){
        return $this->db->count_all('laundry');
    }

    public function sum_totalJumlah(){
        $result = $this->db->query("select sum(jumlah_total) as total_pendapatan from laundry ")->result();
        return $result[0]->total_pendapatan;
    }
}