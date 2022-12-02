<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_m extends CI_Model{
    public function findAll(){
        return $this->db->get('pelanggan')->result();
    }

    public function create($nama_pelanggan,$jeniskelamin,$alamat,$no_hp, $created_by){
        $data = [
            'nama_pelanggan' => $nama_pelanggan,
            'jeniskelamin' => $jeniskelamin,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'created_by' => $created_by
        ];

        $this->db->insert('pelanggan', $data);

        return true;
    }

    public function edit($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update($pelanggan_id, $nama_pelanggan,$jeniskelamin,$alamat,$no_hp, $created_by){
        $this->db->where('pelanggan_id', $pelanggan_id);
        $data = [
            'nama_pelanggan' => $nama_pelanggan,
            'jeniskelamin' => $jeniskelamin,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'created_by' => $created_by
        ];
        $this->db->update('pelanggan', $data);

        return true;
    }

    public function deletePelanggan($pelanggan_id){
        $this->db->where('pelanggan_id', $pelanggan_id);
        $this->db->delete('pelanggan');

        return true;
    }
}
